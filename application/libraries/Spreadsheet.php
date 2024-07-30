<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH.'third_party/PhpSpreadsheet/vendor/autoload.php';

use PhpSpreadsheet\IOFactory;

class Spreadsheet {
    
    public function read($file_path) {
        // Load the spreadsheet file
        $spreadsheet = IOFactory::load($file_path);

        // Get the first sheet
        $worksheet = $spreadsheet->getActiveSheet();

        // Get the highest row number and column letter
        $highest_row = $worksheet->getHighestRow();
        $highest_column = $worksheet->getHighestColumn();

        $data = array();

        // Loop through each row of the worksheet
        for ($row = 1; $row <= $highest_row; $row++) {
            $row_data = array();

            // Loop through each column of the row
            for ($col = 'A'; $col <= $highest_column; $col++) {
                $cell_value = $worksheet->getCell($col . $row)->getValue();
                $row_data[] = $cell_value;
            }

            $data[] = $row_data;
        }

        return $data;
    }

}

