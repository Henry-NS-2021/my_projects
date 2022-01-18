<?php

    require_once("actions/db_connect.php");
    // $sorting = "";

    $sql = "SELECT * FROM journeys ORDER BY location_name;";
    $query= mysqli_query($connect, $sql);
    $records = mysqli_fetch_all($query, MYSQLI_ASSOC);
    $display_journeys="";

    if(mysqli_num_rows($query) != 0){
        foreach($records as $record){
        $display_journeys .="
        <article class='row shadow text-light text-align-middle rounded-3 pt-3 pb-1 mx-auto my-5 ' style='min-width: 120px; width: 100%; max-width: 1220px; backdrop-filter: blur(1px)'>
            <div class='col-sm-12 col-md-3 col-lg-3 mx-auto align-self-center'>
                <a class='text-decoration-none text-light' href='details.php?id={$record["journey_id"]}'>
                <img class='img-fluid rounded-3 m-0 p-0' src='img/{$record["picture"]}' alt='{$record["location_name"]}'></a>
            </div>
            <div class='col-sm-12 col-md-3 col-lg-3 text-center align-self-center'>
                <span class='fw-light text-light fs-3'>{$record["location_name"]}</span>
            </div>
            <div class='col-sm-12 col-md-2 col-lg-2 text-center align-self-center'>
                {$record["country"]}
            </div>
            <div class='col-sm-12 col-md-1 col-lg-2 my-3 text-center align-self-center'> 
                €{$record["price"]}
            </div>
            <div class='col-sm-12 col-md-3 col-lg-2 mx-auto text-center align-self-center'> 
                <a class='text-decoration-none' href='details.php?id={$record["journey_id"]}'><p class='btn btn-outline-primary my-1 w-100 py-0'>Details</p></a>
                
                <a class='text-decoration-none' href='update.php?id={$record["journey_id"]}#update_journey'><p class='btn btn-outline-success my-1 w-100 px-2 py-0'>Update</p></a>
                
                <a class='text-decoration-none' href='delete.php?id={$record["journey_id"]}#remove_journey'><p class='btn btn-outline-danger my-1 w-100 px-2 py-0'>Remove</p></a>
                
            </div>
        </article>";
        }
    } else {
        echo "<p class='text-center'> Sorry, there are no available journeys </p>";
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
        #journey_offers{
            margin: 0px;
            padding: 5% 0% 3%;
            background: url("img/layout/banner_canyon.jpg") no-repeat fixed;
        }
    </style>
    <title>Code Review-12: Mount Everest</title>
</head>
<body>
<!-- HERO & NAVBAR -->
<?php 
    $hero = $url = "";
    require_once("components/hero.php");
    require_once("components/navbar.php"); 
    ?>

<!-- MAIN -->
<main class="py-5" id="journey_offers">
    <h1 id='list_journey' class="pt-5 mb-3 text-center text-light display-4 fw-light">Mount Everest Offers</h1>
    <hr class="bg-success py-1 w-75 mx-auto mb-5">
   
    <div class="container">
        <?php echo $display_journeys; ?>
    </div>
</main>

<!-- FOOTER -->
<?php require_once("components/footer.php") ?>
</body>
</html>