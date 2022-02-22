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
        #bg{
            background: url("pictures/layout/bg_1.jpg") black no-repeat center right;
            filter: sepia(25%);
            background-size: cover;
        }

        main{
            min-height: 70vh;
        }  
    </style>
    <!-- website icon in the browser -->
    <link rel="shortcut icon" href="pictures/layout/logo.png" type="image/png">
    <title>Code Review 10: Error</title>
</head>
<body>
    <!-- [HERO] & [NAVBAR] -->
    <?php 
        $url = "";
        require_once("components/hero.php");//hero component 
        require_once("components/navbar.php"); //navbar component
    ?>
    <!-- [MAIN] -->
    <main id="bg" class="my-0 py-5">
    <article class="w-75 bg-light p-3 border border-1 border-danger rounded-3 text-center my-5 mx-auto fs-3">
        <h1 class="text-danger mt-5 mb-3 display-1 fw-bold"><i class="bi bi-envelop"></i>ERROR!</h1><hr class="bg-danger mt-0 mb-5">
        <p>There is an issue with the action you have performed.</p><p> Please, try again.</p>
        <p><a  href="index.php"><span class="btn btn-outline-danger rounded-3 mt-3 px-5 py-0 fw-bold fs-3 w-100">OK</span></a> </p>
     </p>
    </article>
    <br><br><br><br><br>
    </main>
    <!-- [FOOTER] -->
    <?php require_once("components/footer.php"); ?>
</body>
</html>