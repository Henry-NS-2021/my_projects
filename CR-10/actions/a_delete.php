<?php
    require_once("db_connect.php");

    if($_POST){
        $id = $_POST["media_id"];
        $picture = $_POST["picture"];
        ($picture == "media.png")?: unlink("../pictures/".$picture);

        $sql = "DELETE FROM media WHERE media_id = '{$id}';";
        
        if(mysqli_query($connect, $sql) === true){
            $class = "success";
            $message = "<h2>Congratulations:</h2><p class='mt-4 mb-5 fs-5'>The Record has been successfully <b>Deleted</b>!</p>";
        } else  {
            $class = "danger";
            $message = "<h2>ATTENTION:</h2>
            <p class='mt-3 mb-5'>The record has not been deleted due to: <br>"
              . $connect->error . "</p>";
        }
        mysqli_close($connect);

        } else {
        header("location: ../error.php" );
    }

?>


<!-- 
------------------
    HTML
------------------ 
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Henry Ngo-Sytchev">
    <!-- [BOOTSTRAP] -->
    <?php require_once("../components/bootstrap.php")?>
    <!-- CSS -->
    <style>
        main{
            min-height: 70vh;
        }
    </style>
    <title>Code Review 10: Deleted</title>
</head>
<body>
    <!-- [HERO] & [NAVBAR] -->
    <?php 
        $url = "../";
        require_once("../components/hero.php");//hero component 
        require_once("../components/navbar.php"); //navbar component
    ?>
    
    <!-- [MAIN] -->
    <main class="bg-dark h-100 m-0 py-5">
        <div class="container mb-3">
            <div class="mt-2">
                <div class="h2 display-1 py-3 mt-0 text-center text-warning">
                    <h1 class="mt-0">Delete request response</h1><hr>
                </div>
                <hr>
            </div>
            <div class="alert alert-<?=$class;?> text-center pt-4 pb-4 mb-5"  role="alert">
                <p><?=$message;?></p>
               <a href ='../index.php'><button class ="btn btn-outline-dark mb-2 py-0 px-5 fw-bold w-100" type='button' >Home</button></a >
           </div>
       </div>
    </main>
    <!-- [FOOTER] -->
    <?php require_once("../components/footer.php"); ?>
</body>
</html>