<?php
    require_once("actions/db_connect.php");
    
    
    if(@$_GET["id"]){
        $id = $_GET["id"];
        $sql = "SELECT * FROM media WHERE media_id = '{$id}'";
        $query = mysqli_query($connect, $sql);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        $display = "";

        if(mysqli_num_rows($query) == 1){
            foreach($result as $row){
                $display = "
                <div class='card row my-5 mx-auto'>
                    <img class='card-img-top img-fluid' src='pictures/{$row["picture"]}' alt='Card image cap'>
                    <div class='card-body'>
                    <p class='card-text bg-dark fs-5 text-center text-light px-2 fw-bold'>Status: <i class='". ($row["status"] == "reserved"? "text-danger": "text-success") ."'>{$row['status']}</i></p>
                        <hr class='mt-1'>

                        <p class='p-0 m-0'>
                        <p class='card-text mt-0 mb-0'><small class='text-muted'>Title: </small><i>{$row['title']}</i></p>

                        <p class='p-0 m-0'>
                        <p class='card-text mt-0 mb-0'><small class='text-muted'>Author: </small><i>{$row["author_first_name"]} {$row["author_last_name"]}</i></p>

                        <p class='p-0 m-0'>
                        <p class='card-text mt-0 mb-0'><small class='text-muted'>Publisher: </small><i>{$row['publisher_name']}</i></p>

                        <p class='card-text mt-0 mb-0'><small class='text-muted'>Date: </small><i>{$row['publish_date']}</i></p>

                        
                        <p class='card-text mt-0 mb-0'><small class='text-muted'>ISBN: </small><i>{$row['ISBN']}</i></p>
                        
                        <p class='card-text mt-0 mb-2'><small class='text-muted'>Media Type: </small><i>{$row['type']}</i></p>
                        
                        <hr class='my-3'>

                        <p class='card-text'><i class='bi bi-file-earmark-text'></i> <b class='text-secondary'>Description</b><br>{$row["short_description"]}</p>
                        </div>
                        <p class='card-footer text-center m-0'><small class='text-muted'><a href='index.php'>Return to the media list</a></small></p>
                </div>
                ";
            }
        } else {
            header("error.php");
        }
    } else {
        echo "The record you are trying to see is not available";
        header("error.php");
    }
?>



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
    <?php require_once("components/bootstrap.php");?>
    <!-- [CSS] -->
    <style>
        main{
            padding: 3% 15%;
            min-height: 70vh;
        }

        .card{
            max-width: 20rem;
            width: 100%;
        }
    </style>
    <title>Code Review 10: Media Details</title>
</head>
<body>
    <!-- [HERO] & [NAVBAR] -->
    <?php 
        $url = "";
        require_once("components/hero.php");//hero component 
        require_once("components/navbar.php"); //navbar component
    ?>
    <!-- [MAIN] -->
    <main class="bg-dark">
    <?php echo ($display)?:"";?>
    </main>
        <!-- [FOOTER] -->
    <?php require_once("components/footer.php"); ?>
</body>
</html>