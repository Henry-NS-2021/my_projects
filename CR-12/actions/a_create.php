<?php
    require_once ("db_connect.php");
    require_once ("file_upload.php");

if ($_POST){  
    $location_name = $_POST['location_name'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $date = $_POST['date'];
    $duration = $_POST['duration'];
    $price = $_POST['price'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $description = $_POST['description'];
    //this function exists in the service file upload
    $picture = file_upload($_FILES['picture']);  
   
   $uploadError = '';
   
   $sql = "INSERT INTO journeys (location_name, city, country, date, duration, price, latitude, longitude, description, picture) VALUES ('$location_name', '$city', '$country', '$date', '$duration', '$price', '$latitude', '$longitude','$description',  '$picture->fileName');" ;

   if (mysqli_query($connect, $sql) === true) {
       $class = "muted text-center border-1 mx-auto";
       $message = "<p class='mt-2 mb-3 fs-4 text-center text-success'>The entry below was successfully created!</p> <br>
       <div class='table-responsive text-start'>
                <table class='table table-muted table-hover border border-1 border-dark rounded-3 text-dark m-auto'>
                <tr>
                <th>Picture</th><td> <img class='img-fluid' src='../img/$picture->fileName'></td>
                </tr>
                <tr>
                <th>Location</th><td> $location_name </td>
                </tr>
                <tr>
                <th>City</th><td> $city </td>
                </tr>
                <tr>
                <th>Country</th><td> $country </td>
                </tr>
                <tr>
                <th>Date</th><td> $date </td>
                </tr>
                <tr>
                <th>Duration</th><td> $duration </td>
                </tr>
                <tr>
                <th>Price</th><td> $price </td>
                </tr>
                <tr>
                <th>Longitude</th><td> $longitude </td>
                </tr>
                <tr>
                <th>Latitude</th><td> $latitude </td>
                </tr>
                <th>Description</th><td> $description </td>
                </tr>
                </table>
            </div>
            <hr class='bg-light'>";
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
        #a_create{
            min-height: 100vh;
            background: black;
            margin: 0px;
            padding: 5% 0% 3%;
            background: url("../img/layout/bg_info.jpg") center right no-repeat;
            background-size: cover;
        }
    </style>
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
    <main id="a_create" class="bg-dark">
        <!-- [MESSAGE] -->
        <div class="container">
            <div class="my-0">
                <div class="py-3 mt-0 text-center text-white">
                    <h1 class="display-3 fw-lighter">Added Record</h1><hr class="w-75 bg-success py-2 mt-1 mx-auto">
                </div>
           </div>
            <div class="alert alert-<?=$class;?> my-0"  role="alert" style="min-width: 320px; width: 100%; max-width: 720px; backdrop-filter: blur(10px)">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? '' ; ?></p>
                <a href='../index.php'><button class="btn btn-outline-dark mt-3 mb-2 py-0 px-5 fw-bold mx-auto w-75"  type='button'>Home</button></a>
            </div>
       </div>
       <br>
    </main>
    <!-- [FOOTER] -->
    <?php require_once("../components/footer.php"); ?>
   </body>
</html>