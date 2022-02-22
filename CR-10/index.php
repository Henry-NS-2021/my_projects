<?php
   
    require_once("actions/db_connect.php");

    $sql = "SELECT * FROM media;";
    $query = mysqli_query($connect, $sql);
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
    $media = "";
    
    if(mysqli_num_rows($query) > 0){
        foreach($result as $row){
            $media .= "
            <tr class='align-middle text-center border-top border-bottom border-secondary'>
                <td>
                <img class='img-fluid' width='130px' src='pictures/{$row["picture"]}'>
                </td>
                <td>{$row['title']}</td>
                <td>{$row['author_first_name']} {$row['author_last_name']}</td>
                <td>{$row['type']}</td>
                <td>
                <a class='btn btn-primary py-0 m-1' href='details.php?id={$row['media_id']}'><span>Show</span></a>
                <a class='btn btn-warning py-0 m-1' href='update.php?id={$row['media_id']}'><span>Update</span></a>
                <a class='btn btn-danger py-0 m-1' href='delete.php?id={$row['media_id']}'><span>Delete</span></a>
                </td>
            </tr>
            ";
        }
    }

?>

<!-- 
------------------------
        HTML
------------------------ 
-->

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
    <title>Code Review 10: Big Library</title>
</head>
<body>
    <!-- [HERO] -->
    <?php 
    $url = "";
    require_once("components/hero.php"); ?>
    <!-- [NAVBAR] -->
    <?php require_once("components/navbar.php"); ?>
    <main id="bg" class="py-5">
        <div class="table-responsive">
    <table class="table table-secondary table-striped table-hover border border-success my-0 mx-auto w-75">
        <thead class="table-dark text-center">
            <tr class="align-middle fw-lighter">
                <td>Media</td>
                <td>Title</td>
                <td>Author</td>
                <td>Type</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            <?= $media ?>
        </tbody>
    </table>
    </div>
    </main>
    <!-- [FOOTER] -->
    <?php require_once("components/footer.php"); ?>
</body>
</html>