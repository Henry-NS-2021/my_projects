<?php
   
   require_once("actions/db_connect.php");

   if(@$_GET["publisher_name"]){
    $publisher_name = $_GET["publisher_name"];//fetch the publisher_name

    $sql = "SELECT * FROM media WHERE publisher_name = '{$publisher_name}';";//identify all entries matching the publilsher_name
    $query = mysqli_query($connect, $sql);
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
    $publications = "";
    
    if(mysqli_num_rows($query) != 0){
        foreach($result as $row){
            $publications .= "
            <tr class='align-middle text-center border-top border-bottom border-secondary my-2'>
                <td class=''>
                <img class='m-0 p-0' width='50%' src='pictures/{$row["picture"]}' alt='{$row["picture"]}'>
                </td>
                <td>{$row['title']}</td>
                <td>{$row['author_first_name']} {$row['author_last_name']}</td>
                <td>{$row['publish_date']}</td>
            </tr>
            ";
        } 
    } else {
        echo "<tr colspan='3'>No results available</tr>";
    }
    } else {
        header("location: error.php");
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
    <?php require_once("components/bootstrap.php")?>
    <!-- CSS -->
    <style>
        #bg{
            background: url("pictures/layout/bg.jpg") no-repeat center center;
            filter: sepia(25%);
            background-size: cover;
        }

        main{
            min-height: 70vh;
        }   
    </style>
    <!-- website icon in the browser -->
    <link rel="shortcut icon" href="pictures/layout/logo.png" type="image/png">
    <title>Code Review 10: Publications</title>
</head>
<body id="bg">
    <!-- [HERO] & [NAVBAR] -->
    <?php 
    $url = "";
    require_once("components/hero.php"); 
    require_once("components/navbar.php"); ?>
    <main class="pt-4 pb-3 px-3">
        <div class="table-responsive">
        <table class="table table-muted border text-light mb-5 mx-auto w-75">
            <thead class="table-dark text-white text-center fw-light">
                <tr class="align-middle">
                    <td>Picture</td>
                    <td>Title</td>
                    <td>Author</td>
                    <td>Date</td>
                </tr>
            </thead>
            <tbody>
                
                <?= $publications ?>
                
            </tbody>
        </table>
    </div>
    </main>
    <!-- [FOOTER] -->
    <?php require_once("components/footer.php"); ?>
</body>
</html>