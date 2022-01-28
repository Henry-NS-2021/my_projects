<!-- 
----------------------
CHECK THE WHOLE SCRIPT
---------------------- 
-->
<?php
    require_once ("db_connect.php");
    require_once ("file_upload.php");

    if ($_POST) {    
        $media_id = $_POST['media_id'];
        $title = $_POST['title'];
        $author_first_name = $_POST['author_first_name'];
        $author_last_name = $_POST['author_last_name'];
        $publisher_name = $_POST['publisher_name'];
        $publish_date = $_POST['publish_date'];
        $publisher_address = $_POST['publisher_address'];
        $ISBN = $_POST['ISBN'];
        $type = $_POST['type'];
        $status = $_POST['status'];
        $short_description = $_POST['short_description'];
        //variable for upload pictures errors is initialized
        $uploadError = '';

        $picture = file_upload($_FILES['picture']);//file_upload() called  
            if($picture->error===0){
                ($_POST["picture" ]=="media.png")?: unlink("../pictures/$_POST[picture]");          
                echo $sql = "UPDATE media SET title = '$title', author_first_name = '$author_first_name', author_last_name = '$author_last_name', publish_date = '$publish_date', publisher_name = '$publisher_name', publisher_address = '$publisher_address', isbn = '$ISBN', type = '$type', status = '$status', short_description = '$short_description', picture = '$picture->fileName' WHERE media_id = {$media_id}";
            } else {
                $sql = "UPDATE media SET title = '$title', author_first_name = '$author_first_name', author_last_name = '$author_last_name', publish_date = '$publish_date', publisher_name = '$publisher_name', publisher_address = '$publisher_address', isbn = '$ISBN', type = '$type', status = '$status', short_description = '$short_description' WHERE media_id = {$media_id}";
            }    

            if (mysqli_query($connect, $sql) === TRUE) {
                $class = "success";
                $message = "The record was successfully updated" ;
                $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'' ;
            } else {
                $class = "danger";
                $message = "Error while updating record : <br>" . mysqli_connect_error();
                $uploadError = ($picture->error != 0)? $picture->ErrorMessage :'';
            }
            
            mysqli_close($connect);  

        } else {
            header("location: ../error.php");
            
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
    <?php require_once("../components/bootstrap.php")?>
    <!-- CSS -->
    <style>
        main{
            min-height: 70vh;
        }
    </style>
    <title>Code Review 10: Updated</title>
</head>
<body>
    <!-- [HERO] & [NAVBAR] -->
    <?php 
        $url = "../";
        require_once("../components/hero.php");//hero component 
        require_once("../components/navbar.php"); //navbar component
    ?>
    
    <!-- [MAIN] -->
    <main class="bg-dark py-5">
    <!-- CHECK THIS BLOCK -->
    <div class="container mb-5 pb-5">
            <div class="my-5">
                <div class="h2 display-1 py-3 mt-0 text-center text-warning">
                    <h1 class="mt-4">Update request response</h1><hr>
                </div>
                <hr>
           </div>
            <div class="alert alert-<?php echo $class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <!-- correct the variable -->
               
                <a href="../update.php?id=<?= $media_id?>"><button class="btn btn-warning mb-1 w-100" type='button'>Back </button></a>
                <a href='<?= $url;?>index.php' ><button class="btn btn-outline-dark w-100" type='button'>Home </button></a>
           </div>
       </div>
    </main>
    <!-- [FOOTER] -->
    <?php require_once("../components/footer.php"); ?>
</body>
</html>