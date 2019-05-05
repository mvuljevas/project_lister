<?php

//setting the URL for the current DIR
if(isset($_GET['q'])){
	$pathfinder = base64_decode($_GET['q']);
}else{
	$pathfinder = "";
}

?>
<!DOCTYPE html>
<html>
<!-- Main Header -->
	<head>

        <!-- Meta -->
        <title>Lister</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="robots" content="noindex, nofollow">

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="assets/images/favicon-green.png" />

        <!-- CSS -->
        <link rel="stylesheet" href="assets/css/animsition.min.css"      type="text/css" />
        <link rel="stylesheet" href="assets/css/bootstrap.min.css"      type="text/css" />
        <link rel="stylesheet" href="assets/css/font-awesome.min.css"   type="text/css" />
        <link rel="stylesheet" href="assets/css/animate.css"            type="text/css" />
        <link rel="stylesheet" href="assets/css/main.css"               type="text/css" />


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Abel"               rel="stylesheet" type="text/css">
		<link href='https://fonts.googleapis.com/css?family=Droid+Serif' 		rel='stylesheet' type='text/css'>

        <!-- Scripts -->
        <script src="assets/js/jquery-1.12.1.min.js"></script>
        <script src="assets/js/animsition.min.js"></script>
        <script src="assets/js/custom.js"></script>
        <!-- Scripts -->

    </head>


<!-- Change background here -->
<body style="background:url(assets/images/base-wall-7.jpg) no-repeat;">

<!-- transition effect / animsition -->
<div class="animsition">
<!-- <div class="animsition"> -->

<!-- Main Nav -->
<div class="button-frame">
<nav id="prev-nav" class="framed-nav">

    <div class="frm-wrapper">
        <div class="r-frame">
            <a href="<?php echo $pathfinder; ?>"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> <span class="rmo-link">remove frame</span></a>
        </div>

        <div id="metaTitle" class="frm-tlt"> <!-- --></div>

        <a href="index.php" class="cta-navbar anlinkate" data-toggle="modal" data-target=".bs-modal-lg">
            <i class="fa fa-reply" aria-hidden="true"></i>
            GO BACK
        </a>
        <div class="mini-btnmv"><i class="fa fa-bars" aria-hidden="true"></i></div>

    </div>

</nav>
</div>
<!-- Main Nav -->


<section class="sized-frame">
    <iframe id="mainFrame" width="100%" height="100%" frameborder="0" src="<?php echo $pathfinder; ?>" onload="onLoadHandler();"> </iframe>
</section>
<!-- container-fluid end -->

</div>
<!-- ./animsition ends -->
</body>
</html>
