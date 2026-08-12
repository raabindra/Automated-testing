<head>
<?php 
    include 'server/api.php';  
    include 'pages/assets.php';  

    $setting = getAllSettings();
    $res = mysqli_fetch_assoc($setting);

    $header = $res['header_image'];
    $header_src = "server/uploads/settings/".$header;

    $subheader = $res['sub_image'];
    $subheader_src = "server/uploads/settings/".$subheader;

    $about = $res['about_image'];
    $about_src = "server/uploads/settings/".$about;

    $background_image = $res['background_image'];
    $background_image_src = "server/uploads/settings/".$background_image;


    ?>
    <title>Royal Express</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Self-hosted (no external font request = nothing for SRI to flag; Google's
         dynamic font CSS varies per User-Agent so it cannot carry a stable SRI hash). -->
    <link rel="stylesheet" href="fonts/self-hosted/poppins/poppins.css">
    <link rel="stylesheet" href="fonts/self-hosted/playfair-display/playfair-display.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">



    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>