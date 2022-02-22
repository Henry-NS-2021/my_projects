<?php
    require_once("actions/db_connect.php");
    
    $delete = "";

    if($_GET["id"]){
        $id = $_GET["id"];
        $sql = "SELECT * FROM media WHERE media_id = '{$id}';";
        $query = mysqli_query($connect, $sql);

        if(mysqli_num_rows($query) == 1){
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            
            foreach($result as $data){
                $delete .= "
                <div class='alert alert-danger my-5 text-center fs-5'>
                    <h2 class='display-3 my-3 fw-bold'>Attention!</h2>
                    <p>You are about to <b>delete</b> this record. Would you REALLY like to do it?</p>
                </div>
                
                <article class='my-3 mx-5 card h-auto w-75 mx-auto'>
                    <div class='card-body row'>
                        <div class='col-sm-12 col-md-5'>
                            <img class='img-fluid' src='pictures/" .$data["picture"] . "'>
                        </div>
                        <div class='col-sm-12 col-md-7'>
                            <hr>
                            <h5 class='card-title display-6 fs-5 mt-3 mb-4 text-center'>{$data['title']}</h5>
                            
                            <h5 class='card-subtitle text-secondary text-center mb-3'>{$data['author_first_name']}{$data['author_last_name']}</h5>

                            <hr>

                          

                            <p class='card-text mt-0 mb-0'><small class='text-muted'>Publisher: </small><i>{$data['publisher_name']}</i></p>

                            <p class='card-text mt-0 mb-0'><small class='text-muted'>Date: </small><i>{$data['publish_date']}</i></p>

                            <p class='card-text mt-0 mb-0'><small class='text-muted'>Media Type: </small><i>{$data['type']}</i></p>

                            <p class='card-text mt-0 mb-0'><small class='text-muted'>ISBN: </small><i>{$data['ISBN']}</i></p>

                            <p class='card-text fs-3 mt-5 mb-2 px-3 text-end'><small class='text-muted fw-bold'>Status: </small><i class='". ($data["status"] == "reserved"? "text-danger": "text-success") ."'>{$data['status']}</i></p>

                        </div>
                    </div>

                    <div class='card-footer pt-3 m-0'>

                    <form class='m-0 p-0' action='actions/a_delete.php' method='POST'>
                        <input type='hidden' name='media_id' value='{$data["media_id"]}'>
                        <input type='hidden' name='picture' value='{$data["picture"]}'>
                        <p class='text-center m-0'>
                            <button class='btn btn-sm btn-outline-danger py-0 px-5 mx-2' type='submit'>YES, please
                            </button>
                            <a href='index.php'>
                            <span class='btn btn-sm btn-outline-primary py-0 px-5 mx-2'>NO, keep it
                            </span>
                            </a>
                        </p>
                    </form> 
                    </div>
                    
                </article>";
            }
        } else {
        echo "<div class='alert alert-info m-5 p-3 text-dark text-center fs-4'><h1 class='mt-4 mb-3 pb-0'>SORRY!</h1>
        <p>No record could be identified.</p></div>";
        }
        mysqli_close($connect);
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
        main{
            min-height: 70vh;
        }  
    </style>
    <!-- website icon in the browser -->
    <link rel="shortcut icon" href="pictures/layout/logo.png" type="image/png">
    <title>Code Review 10: Delete</title>
</head>
<body>
    <!-- [HERO] & [NAVBAR] -->
    <?php 
        $url = "";
        require_once("components/hero.php");//hero component 
        require_once("components/navbar.php"); //navbar component
    ?>
    <!-- [MAIN] -->
    <main>
        <section class="container-fluid m-0 py-5 bg-dark">
        
        <!-- [Here comes a selected item to be deleted or an Message] -->
            <?= $delete?>
        </section>
    </main>
    <!-- [FOOTER] -->
    <?php require_once("components/footer.php"); ?>
</body>
</html>