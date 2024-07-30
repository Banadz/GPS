<?php
if (isset($_SESSION['agent'])) { ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>GPS/home</title>
        <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
                
        <link rel="shortcut icon" href="<?php echo base_url();?>/bootstrap/images/2_1@300x.png" />

        <!-- Fonts and icons -->
        <script src="<?php echo base_url();?>bootstrap/assets/js/plugin/webfont/webfont.min.js"></script>
        <script>
            WebFont.load({
                google: {"families":["Lato:300,400,700,900"]},
                custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?php echo base_url();?>bootstrap/assets/css/fonts.min.css']},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>

        <!-- CSS Files -->
        <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/assets/css/atlantis.min.css">

        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/assets/css/demo.css">
        
        <script>window.jQuery || document.write('<script src="<?php echo(base_url()) ?>/bootstrap/assets_old/js/jquery-3.6.1.js"><\/script>')</script>
    </head>
    <?php include('menubar.php');?>
<?php
}else{
    redirect("Login","refresh");
}
?>