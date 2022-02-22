<?php

    require_once("actions/db_connect.php");

    $remove_journey = "";

    if(@$_GET["id"]){
    $id = $_GET["id"];

    $sql = "SELECT * FROM journeys WHERE journey_id = '{$id}';";
    $query = mysqli_query($connect, $sql);
    $record = mysqli_fetch_assoc($query);
    if(mysqli_num_rows($query) == 1){
  
        $remove_journey = "
            <div class='card bg-transparent mb-5 mx-auto' style='min-width: 320px; width: 100%; max-width: 720px; backdrop-filter: blur(3px)'>
                <div class='card-body bg-muted text-light'>
                    <h1 class='card-title text-center display-1'>{$record["location_name"]}</h1>
                    <hr class='mt-1 mb-2'>
                    <p class='card-subtitle text-center mb-5 h6 text-white'><i class='bi bi-geo-fill'></i> {$record["city"]} | {$record["country"]}</p>

                    <p class='card-text'>
                    <i class='bi bi-info-square'></i> {$record["description"]}
                    </p>
                    <p class='card-text'>
                    <i class='bi bi-calendar-event'></i> {$record["date"]}
                    </p>
                    <p class='card-text text-end text-light fs-4'>
                    <i class='bi bi-currency-euro'></i>{$record["price"]}
                    </p>              
                </div>
                <div class='text-center'>
                <img class='img-fluid' src='img/{$record["picture"]}' alt='img/{$record["location_name"]}'>
                </div>
            </div>
            ";
        }

        $picture = $record["picture"];
        echo $picture;
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
        <!-- BOOTSTRAP -->
        <?php require_once("components/bootstrap.php"); ?>
    <!-- CSS -->
    <style>
        body *{
            box-sizing: border-box;
        }
        #delete_page{
            margin: 0px;
            padding: 5% 0% 3%;
            background: url("img/layout/bg_delete1.jpg") no-repeat fixed;
            background-size: cover;
        }
    </style>
    <!-- website icon in the browser -->
    <link rel="shortcut icon" href="img/layout/logo_navbar.png" type="image/jpg">
    <title>Code Review-12: Mount Everest</title>
</head>
<body>
    <!-- HERO & NAVBAR-->
<?php 
    $hero = $url = "";
    require_once("components/hero.php");
    require_once("components/navbar.php"); 
    ?>

<!-- MAIN -->
<main id="delete_page">
    <div id="remove_journey" class="alert alert-muted shadow  border border-danger border-3 text-center pt-5 mx-auto w-75" style="min-width: 320px; width: 100%; max-width: 720px; backdrop-filter: blur(3px)">
        <h1 class="text-danger"><i class="bi bi-shield-fill-exclamation fs-1"></i> ATTENTION!</h1>
        <hr class="text-danger py-2 fw-bold mt-2 mb-5 mx-5">
        <p class="text-light fw-light fs-5 lh-1">You are about to remove the journey below
        <br><br><span class="fs-3 fw-bold">Continue the action?</span></p>
        <hr class="bg-white mt-5 mx-auto w-75">
        <form  class="mb-3" method="POST" action="actions/a_delete.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="picture" value="<?= $record["picture"] ?>">
            <button class='btn btn-danger px-3 py-0' type="submit">Remove</button>
            <a class='mx-2 text-decoration-none' href='index.php'>
            <button class='btn btn-outline-light px-3 py-0'>Return</button>
            </a>
        </form>
    </div>

    <div class="container pt-5 my-5">
        <?php echo $remove_journey; ?>
    </div>

</main>
    <!-- FOOTER -->
    <?php require_once("components/footer.php")?>
</body>
</html>