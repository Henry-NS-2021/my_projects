<!--     
        -------------------------------
            NAVBAR
        ------------------------------- 
    -->


        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Henry Ngo-Sytchev">
    <!-- [BOOTSTRAP] -->
    <?php require_once("bootstrap.php")?>
    <title>Code Review 10: Navbar</title>
</head>
<body>

<!-- NAVBAR-1 -->
<div class="text-start bg-success mb-0 d-flex align-items-center">
        <a href="index.php">
            <img class="rounded-pill border border-1 border-muted mx-3 my-2" src="<?= $url;?>pictures/layout/logo.png" alt="logo" width="50" height="50" class="d-inline-block align-text-top">
        </a>
        <p class="text-center pt-2 d-flex flex-wrap justify-content-between">
        <a class="text-decoration-none text-light fs-6 fw-lighter" href="<?= $url;?>index.php">
            <span class="px-2 py-0 mb-1 mx-1">HOME</span></a>
        <a class="text-decoration-none text-light fs-6 fw-lighter" href="<?= $url;?>publishers.php">
            <span class="px-2 py-0 mb-1 mx-1">PUBLISHERS</span></a>
        <a class="text-decoration-none text-light fs-6 fw-lighter" href="<?= $url;?>create.php">
            <span class="px-2 py-0 mb-1 mx-1">ADD MEDIA</span>
        </a>
        </p>
</div>

</body>
</html>