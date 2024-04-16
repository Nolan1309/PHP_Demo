<!DOCTYPE html>
<html class="no-js" lang="zxx">
<!-- Index.php -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">
    <title>Floda - Flower eCommerce Bootstrap 4 Template</title>
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="./Library/assets/img/favicon.ico" type="image/x-icon" />
    <!-- Google fonts include -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,900%7CYesteryear" rel="stylesheet">
    <!-- All Vendor & plugins CSS include -->
    <link href="./Library/assets/css/vendor.css" rel="stylesheet">
    <!-- Main Style CSS -->
    <link href="./Library/assets/css/style.css" rel="stylesheet">
 
</head>

<body>
    <?php
        //include_once('Config/database.php');
        include_once('Model/Database.php');
        include_once 'Layout/header.php';
        include_once('Controller/controller.php');
        include_once ('Layout/footer.php');
    ?>



  
    <!-- offcanvas mini cart end -->

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    <!-- All vendor & plugins & active js include here -->
    <!--All Vendor Js -->
    <script src="./Library/assets/js/vendor.js"></script>
    <!-- Active Js -->
    <script src="./Library/assets/js/active.js"></script>
</body>

</html>