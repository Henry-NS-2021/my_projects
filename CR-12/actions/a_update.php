<?php
    require_once ("db_connect.php");
    require_once ("file_upload.php");

    if ($_POST){    
        $journey_id = $_POST['journey_id'];
        $location_name = $_POST['location_name'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $date = $_POST['date'];
        $duration = $_POST['duration'];
        $price = $_POST['price'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        $description = $_POST['description'];
        
        //initialise variable for upload pictures errors
        $picture = file_upload($_FILES['picture']);//call file_upload()  
        $uploadError = '';


        if($picture->error === 0){
            ($_POST["picture" ]=="logo.png")?: unlink("../img/$_POST[picture]");          
            $sql = "UPDATE journeys SET location_name = '$location_name', city = '$city', country = '$country', date = '$date', duration = '$duration', price = '$price', latitude = '$latitude', longitude = '$longitude', description = '$description',  picture = '$picture->fileName' WHERE journey_id = {$journey_id}";
        } else {
            $sql = "UPDATE journeys SET location_name = '$location_name', city = '$city', country = '$country', date = '$date', duration = '$duration', price = '$price', latitude = '$latitude', longitude = '$longitude', description = '$description' WHERE journey_id = {$journey_id}";
        }    
        if (mysqli_query($connect, $sql) === TRUE) {
            $class = "success";
            $message = "The record was successfully updated<br>" ;
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
        #a_update{
            min-height: 100vh;
            background: black;
            margin: 0px;
            padding: 5% 0% 3%;
            background: url("../img/layout/bg_info.jpg") center center no-repeat;
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

<main class="py-5" id="a_update">
<!-- CHECK THIS BLOCK -->
<div class="my-5">
            <div class="my-0">
            <div class="py-3 mt-0 mb-4 text-center text-white">
                <h1 class="display-3 fw-lighter fw-lighter">Journey Updated</h1>
                <hr class="w-75 bg-success py-2 mt-4 mx-auto">
            </div>

           </div>
            <div class="alert border border-success border-3 text-center fs-4 py-5 mx-auto"  role="alert" style="min-width: 180px; width: 100%; max-width: 720px; backdrop-filter: blur(3px)">
               <p class="mt-3"><?php echo ($message) ?? ''; ?></p>
               <p><?php echo ($uploadError) ?? '' ; ?></p>
                <a href='../index.php'><button class="btn btn-<?=$class;?> mt-3 text-center mx-auto py-0 px-5 w-50"  type='button'>Home</button></a>
            </div>
</main>
<!-- [FOOTER] -->
<?php require_once("../components/footer.php"); ?>
</body>
</html>