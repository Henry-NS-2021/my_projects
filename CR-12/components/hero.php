<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Henry Ngo-Sytchev">
    <!-- [BOOTSTRAP] -->
    <?php require_once("bootstrap.php")?>
    <title>Code Review 12: Mount Everest</title>
</head>
<style>
    header{
        position: relative;
        height: 39.75vh;
        background: url("<?php  echo $hero; ?>img/layout/hero_dark.jpg") center center;
        /* filter: grayscale(65%); */
    }

    #hero_text {
        /* border: solid yellow 3px; */
        height: 100%;
        width: 100%;
        color: whitesmoke;
        font-style: oblique;
        font-weight: lighter;
        font-family: 'Times New Roman', Times, serif;
        color: black;
        /* bottom: 1vh; */
        /* right: 10%; */
        backdrop-filter: grayscale(65%);
    }

    #hero_text p {
        position: absolute;
        bottom: 2vh;
        right: 1vw;
        text-shadow: 0 0 8px black;
    }

    #test{
        vertical-align: sub;
    }
</style>
<body>
    
<header class="fw-light">
<div id="hero_text">
    <!-- <h1 class="display-1 fw-bold">Mount Everest</h1> -->
    <p id="test"  class="text-end pe-2"><span class="align-baseline py-0 my-0 display-4 border-bottom border-white text-success">MountEverest</span> <br><small class="text-light fs-6"><span class="ps-3 py-0 my-0"> The</span> <span class="text-success">Peak</span> <span class="py-0 my-0"> of Adventure</span></small>
    </p>
</div>
</header>
    
</body>
</html>