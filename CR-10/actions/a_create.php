<?php
    require_once ("db_connect.php");
    require_once ("file_upload.php");

if ($_POST){  
    $title = $_POST['title'];
    $author_first_name = $_POST['author_first_name'];
    $author_last_name = $_POST['author_last_name'];
    $publisher_name = $_POST['publisher_name'];
    $publish_date = $_POST['publish_date'];
    $publisher_address = $_POST['publisher_address'];
    $ISBN = $_POST['ISBN'];
    $status = $_POST['status'];
    $type = $_POST['type'];
    $short_description = $_POST['short_description'];
   //this function exists in the service file upload.
   $picture = file_upload($_FILES['picture']);  
   
   $uploadError = '';
   
   $sql = "INSERT INTO media (title, author_first_name, author_last_name, publisher_name, publish_date, publisher_address, short_description, type, isbn, picture) VALUES ('$title', '$author_first_name', '$author_last_name', '$publisher_name', '$publish_date', '$publisher_address', '$short_description', '$type', '$ISBN', '$picture->fileName')" ;

   if (mysqli_query($connect, $sql) === true) {
       $class = "success";
       $message = "<p class='my-2 fs-4'>The entry below was successfully created</p> <br>
            <table class='table table-success table-striped border border-2 border-light rounded w-100 m-auto'>
            <tr>
            <th>Picture</th><td> <img class='img-fluid w-100' src='../pictures/{$picture->fileName}'></td>
            </tr>
            <tr>
            <th>Title</th><td> $title </td>
            </tr>
            <tr>
            <th>Author's Name</th><td> $author_first_name </td>
            </tr>
            <tr>
            <th>Author's Surname</th><td> $author_last_name </td>
            </tr>
            <tr>
            <th>Publication Date</th><td> $publish_date </td>
            </tr>
            <tr>
            <th>Publisher Name</th><td> $publisher_name </td>
            </tr>
            <tr>
            <th>Publisher Address</th><td> $publisher_address </td>
            </tr>
            <tr>
            <th>Status</th><td> $status </td>
            </tr>
            <tr>
            <th>Media Type</th><td> $type </td>
            </tr>
            <tr>
            <th>ISBN</th><td> $ISBN </td>
            </tr>
            <th>Description</th><td> $short_description </td>
            </tr>
            </table>
            <hr>";
       $uploadError = ($picture->error != 0)? $picture->ErrorMessage :'';
   } else {
       $class = "danger";
       $message = "Error while creating record. Try again: <br>" . $connect->error;
       $uploadError = ($picture->error != 0)? $picture->ErrorMessage :'';
   }
   mysqli_close($connect);
} else  {
   header("location: ../error.php");
}
?>


<!-- 
------------------
    HTML
------------------ 
-->

<!DOCTYPE html>
<html lang= "en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Henry Ngo-Sytchev">
    <!-- [BOOTSTRAP] -->
    <?php require_once ("../components/bootstrap.php")?>
    <!-- CSS -->
    <style>
        main{
            min-height: 70vh;
        }
    </style>
    <title>Code Review 10: Created</title>
</head>
<body>
<!-- [HERO] & [NAVBAR] -->
<?php 
    $url = "../";
    require_once("../components/hero.php");//hero component 
    require_once("../components/navbar.php"); //navbar component
?>

<!-- [MAIN] -->
<main class="bg-dark">
    <!-- [MESSAGE] -->
    <div class="container py-5">
        <div class="my-3">
        <div class="h2 display-1 py-3 mt-0 text-center text-warning">
            <h1 class="mt-4">Create request response</h1><hr>
        </div>

            <hr>
        </div>
        <div class="alert alert-<?=$class;?> text-center my-0"  role="alert">
            <p><?php echo ($message) ?? ''; ?></p>
            <p><?php echo ($uploadError) ?? '' ; ?></p>
            <a href='../index.php'><button class="btn btn-outline-dark mt-3 mb-2 py-0 px-5 fw-bold w-100"  type='button'>Home</button></a>
        </div>
    </div>
    <br><br><br><br><br>
</main>
<!-- [FOOTER] -->
<?php require_once("../components/footer.php"); ?>


<!-- [JAVASCRIPT] -->
<script>
    // prevents submiting the data again after refreshing the page
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

</body>
</html>