<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TaniKuy!</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>Loginuser/images/icons/tanikuyicon.png" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo base_url() ?>NiceUser/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>NiceUser/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo base_url() ?>NiceUser/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo base_url() ?>NiceUser/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <?= $this->include('Components/navbaruserlogin'); ?>



    <?= $this->renderSection('content') ?>


    <?= $this->include('Components/footeruser'); ?>



    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>NiceUser/lib/easing/easing.min.js"></script>
    <script src="<?php echo base_url() ?>NiceUser/lib/waypoints/waypoints.min.js"></script>
    <script src="<?php echo base_url() ?>NiceUser/lib/lightbox/js/lightbox.min.js"></script>
    <script src="<?php echo base_url() ?>NiceUser/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?php echo base_url() ?>NiceUser/js/main.js"></script>
</body>

</html>