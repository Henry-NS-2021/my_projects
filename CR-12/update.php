<?php 
    require_once("actions/db_connect.php");

    if($_GET["id"]){
        $id = $_GET["id"];
        $sql = "SELECT * FROM journeys WHERE journey_id = '{$id}';";
        $query = mysqli_query($connect, $sql);

        if(mysqli_num_rows($query) == 1){
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            foreach($result as $data){
            $location_name = $data['location_name'];
            $city = $data['city'];
            $country = $data['country'];
            $date = $data['date'];
            $duration = $data['duration'];
            $price = $data['price'];
            $latitude = $data['latitude'];
            $longitude = $data['longitude'];
            $description = $data['description'];
            $picture = $data['picture'];  
            }
        } else {
            header("location: error.php");
        }
        mysqli_close($connect);
    } else {
        header("location: error.php");
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
        #update_page{
            min-height: 100vh;
            margin: 0px;
            padding: 5% 0%;
            background: url("img/layout/bg_update.jpg") no-repeat fixed;
            background-size: cover;
        }
    </style>
    <!-- website icon in the browser -->
    <link rel="shortcut icon" href="img/layout/logo_navbar.png" type="image/jpg">
    <title>Code Review-12: Mount Everest</title>
</head>
<body>
    <!-- NAVBAR -->
<?php 
    $hero = $url = "";
    require_once("components/hero.php");
    require_once("components/navbar.php"); ?>
<!-- MAIN -->
    <main id="update_page">
        <fieldset id="update_journey" class="mx-auto pt-5 pb-3" style="min-width: 220px; width: 100%; max-width: 720px; backdrop-filter: blur(1px)">
        <legend>
            <h1 class='card-title text-center text-white display-3 mb-4'>Add Changes</h1>
            <hr class="w-75 bg-warning py-2 mt-1 mb-5 mx-auto">
        </legend>
        <!-- form -->
        <form  class="table-responsive" action="actions/a_update.php" method="post" enctype="multipart/form-data">
            <table class="w-75 mx-auto table table-muted table-hover text-light">
                <tr>
                    <td><label for="location_name">Location</label>   </td> 
                    <td><input class="form-control" type="text" name="location_name" value="<?= $location_name ?>" id="location_name"></td>
                </tr>
                <tr>
                    <td><label for="city">City</label></td>
                    <td><input class="form-control" type="text" name="city" value="<?= $city ?>" id="city"></td>
                </tr>
                <tr>
                    <td><label for="country">Country</label></td>
                    <td><input class="form-control" type="text" name="country" value="<?= $country ?>" id="country"></td>
                </tr>
            
                <tr>
                    <td><label for="description">Description</label></td>
                    <td><input class="form-control" type="text" name="description" value="<?= $description ?>" id="description"></td>
                </tr>
                <tr>
                    <td><label for="date">Date</label></td>
                    <td><input class="form-control" type="date" name="date" value="<?= $date ?>" id="date"></td>
                </tr>
                <tr>
                    <td><label for="duration">Duration</label></td>
                    <td><input class="form-control" type="number" name="duration" value="<?= $duration ?>" id="duration"></td>
                </tr>
                <tr>
                    <td><label for="price">Price</label></td>
                    <td><input class="form-control" type="number" name="price" value="<?= $price ?>" id="price"></td>
                </tr>
                <tr>
                    <td><label for="latitude">Latitude</label></td>
                    <td><input class="form-control" type="number" name="latitude" value="<?= $latitude ?>" id="latitude"></td>
                </tr>
                <tr>
                    <td><label for="longitude">Longitude</label></td>
                    <td><input class="form-control" type="number" name="longitude" value="<?= $longitude ?>" id="longitude"></td>
                </tr>
                <tr>
                    <td><label for="picture">Picture</label></td>
                    <td>
                        <div class="input-group">
                            <label class="input-group-text" for="upload_picture"><i class="bi bi-card-image"></i></label>
                            <input class="form-control"  type="file" name="picture" value="<?= $picture ?>" id="upload_picture">
                        </div>
                    </td>
                </tr>
                <!-- hidden id and picture reference for the GET method-->
                <tr>
                    <input class="form-control" type="hidden" name="journey_id" value="<?= $id ?>" id="journey_id">
                    <input class="form-control" type="hidden" name="picture" value="<?= $picture ?>" id="picture">
                </tr>
                <tr>
                    <!-- buttons -->
                    <td>
                        <a href="index.php"><p class="btn btn-outline-light fs-4 fw-light py-0 my-3 w-100">Return</p></a>
                    </td>
                    <td class="text-center"><button class="btn btn-warning shadow w-100 fs-4 fw-light py-0 my-3" type="submit">Confirm Changes</button>
                </td>
                </tr>
            </table>
        </form>
        </fieldset>
    </main>
    <!-- FOOTER -->
    <?php require_once("components/footer.php")?>
</body>
</html>