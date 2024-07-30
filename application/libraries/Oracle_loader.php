
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oracle_loader {
    private $CI;
    private $db;
    private $conn;

    public function __construct() {
        $this->CI =& get_instance();
        $this->db = $this->CI->load->database('default', TRUE);
        $this->conn = oci_connect($this->db->username, $this->db->password, $this->db->hostname);
    }

    public function load($data, $table, $options = array()) {
        // set default options
        $delimiter = isset($options['delimiter']) ? $options['delimiter'] : ',';
        $enclosure = isset($options['enclosure']) ? $options['enclosure'] : '"';
        $escape = isset($options['escape']) ? $options['escape'] : '\\';
        $skip = isset($options['skip']) ? $options['skip'] : 0;
        $field = isset($options['field']) ? $options['field'] : array();

        // build SQL statement
        $sql = "INSERT INTO " . $table . " (";
        if (count($field) == 0) {
            // use first row as column names
            $field = $data[0];
            $skip = 1;
        }
        $sql .= implode(',', $field) . ") VALUES (";
        for ($i = 0; $i < count($field); $i++) {
            $sql .= ":" . ($i + 1) . ",";
        }
        $sql = rtrim($sql, ",") . ")";

        // prepare statement
        $stmt = oci_parse($this->conn, $sql);
        if (!$stmt) {
            $error = oci_error($this->conn);
            throw new Exception($error['message']);
        }

        // bind variables
        for ($i = 0; $i < count($field); $i++) {
            oci_bind_by_name($stmt, ":" . ($i + 1), $field[$i]);
        }

        // insert data
        for ($row = $skip; $row < count($data); $row++) {
            $col = 0;
            foreach ($data[$row] as $value) {
                $value = str_replace($enclosure, $enclosure . $enclosure, $value);
                if ($enclosure != "") {
                    $value = $enclosure . $value . $enclosure;
                }
                $value = str_replace($escape . $enclosure, $enclosure, $value);
                $field[$col] = $value;
                $col++;
            }
            for ($i = 0; $i < count($field); $i++) {
                oci_bind_by_name($stmt, ":" . ($i + 1), $field[$i]);
            }
            if (!oci_execute($stmt)) {
                $error = oci_error($stmt);
                throw new Exception($error['message']);
            }
        }

        oci_commit($this->conn);
    }

    public function __destruct() {
        if (is_resource($this->conn)){
            oci_close($this->conn);
        }
    }
}

