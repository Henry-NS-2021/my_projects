<!-- ------------------------
        HTML
------------------------ -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Henry Ngo-Sytchev">
    <!-- [BOOTSTRAP] -->
    <?php require_once("components/bootstrap.php")?>
    <!-- CSS -->
    <style>
        main{
            min-height: 100vh;
            background: url("img/layout/bg_info.jpg") black no-repeat center right;
            filter: sepia(25%);
            background-size: cover;
        }
    </style>
    <!-- website icon in the browser -->
    <link rel="shortcut icon" href="img/layout/logo_navbar.png" type="image/jpg">
    <title>Code Review 12: Error</title>
</head>
<body>
    <!-- [HERO] & NAVBAR -->
    <?php 
    $hero = $url = "";    
    require_once("components/hero.php");
    require_once("components/navbar.php"); 
    ?>
    <!-- [MAIN] -->
    <main class="my-0 py-5">
    <article class="w-75 bg-transparent pb-3 border border-3 border-danger rounded-3 text-light text-center my-5 mx-auto fs-3" style="min-width: 320px; width: 100%; max-width: 720px; backdrop-filter: blur(3px)">
        <h1 class="text-danger mt-5 mb-3 display-3 fw-bold"><i class="bi bi-shield-fill-x mx-2"></i>ERROR!</h1><hr class="bg-danger py-3 mx-auto mt-0 mb-5 w-75">
        <p>Oops... We got a bit lost here.</p><p> Please, let's go back on our steps.</p>
        <p><a  href="index.php"><span class="btn btn-danger rounded-3 mt-3 py-0 w-75">OK</span></a> </p>
     </p>
    </article>
    <br>
    </main>
    <!-- [FOOTER] -->
    <?php require_once("components/footer.php"); ?>
</body>
</html>