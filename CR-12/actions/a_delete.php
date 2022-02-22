<?php
    require_once("db_connect.php");

    $title = "Oops";
    $msg = "If you see this, something went wrong";
    $class = "";

    if(@$_POST){
        $id = $_POST["id"];
        $picture = $_POST["picture"];
        ($picture == "logo.png")?: unlink("../pictures/".$picture);

        $sql = "DELETE FROM journeys WHERE journey_id = '{$id}';";

        if(mysqli_query($connect, $sql) == true){
            $title = "Congratulations";
            $msg = "The Journey has been removed.";
            $class = "success";
        } else {
            $title = "Warning";
            $msg = "The journey you have selected could not be deleted: <br>" . $connect->error;
            $class = "danger";
        }
        mysqli_close($connect);

        } else {
        header("location: ../error.php" );
    }
?>


<!-- 
------------------
    -- HTML --
------------------ 
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- [BOOTSTRAP] -->
    <?php require_once ("../components/bootstrap.php")?>
    <!-- CSS -->
    <style>
        main{
            min-height: 100vh;
        }
        #a_delete{
            height: 100%;
            background: black;
            margin: 0px;
            padding: 5% 0% 3%;
            background: url("../img/layout/bg_info.jpg") center center no-repeat;
            background-size: cover;
        }
    </style>
    <!-- website icon in the browser -->
    <link rel="shortcut icon" href="../img/layout/logo_navbar.png" type="image/jpg">
    <title>Code Review-12: Mount Everest</title>
</head>
<body>
    <!-- HERO & NAVBAR -->
<?php 
    $hero= "../";
    $url = "../";
    require_once("../components/hero.php");
    require_once("../components/navbar.php"); 
    ?>
    <!-- [MAIN] -->
    <main id="a_delete">
       <!-- TO DO: TO BE FORMATTED-->
        <div class="alert alert-muted w-75 border border-<?= $class ?> border-3 text-center mx-auto"  style="min-width: 320px; width: 100%; max-width: 720px; backdrop-filter: blur(3px)">
            <h1 class="text-<?= $class ?>"><i class="bi bi-shield-fill-check fs-1"></i> <?= $title ?></h1>
            <hr class="text-<?= $class ?> py-2 fw-bold mt-2 mb-4 mx-5">
            <p class="text-light fs-4"><?= $msg ?></p>
            <a href="../index.php"><p class="btn btn-outline-<?= $class ?> shadow w-50 mt-3 mx-auto py-0">OK</p></a>
        </div>
    <!-- ---------------------- -->
    </main>
   <!-- [FOOTER] -->
   <?php require_once("../components/footer.php"); ?>
</body>
</html>