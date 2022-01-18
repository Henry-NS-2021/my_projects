<?php 
    require_once("actions/db_connect.php");

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
    main{
        height: 100%;
        margin: 0px;
        padding: 5% 0% 3%;
        background: url("img/layout/bg_create.jpg");
        background-size: cover;
    }

    /* label{
        color: whitesmoke;
    } */
</style>
    <title>CR-12: Mount Everest</title>
</head>
<body>
<!-- NAVBAR -->
<?php 
    $hero = $url = "";
    require_once("components/hero.php");
    require_once("components/navbar.php"); ?>
<!-- MAIN -->
    <main id="create"class="py-5">
        <fieldset id="add_journey" class="mx-auto pt-5 pb-3" style="min-width: 220px; width: 100%; max-width: 720px; backdrop-filter: blur(3px)">
            <legend><h1 class='card-title text-center text-light display-3 fw-light mb-2'>Add New Journey</h1></legend>
            <hr class="bg-success py-1 w-75 px-5 mx-auto mb-5">
        <!-- form -->
        <form action="actions/a_create.php" method="post" enctype="multipart/form-data">
            <div class="table-responsive">
            <table class="table table-muted table-hover text-light mx-auto">
                <tr>
                    <td><label for="location_name">Location</label>   </td> 
                    <td><input class="form-control" type="text" name="location_name" id="location_name" placeholder="Name of the location"></td>
                </tr>
                <tr>
                    <td><label for="city">City</label></td>
                    <td><input class="form-control" type="text" name="city" id="city" placeholder="City name"></td>
                </tr>
                <tr>
                    <td><label for="country">Country</label></td>
                    <td><input class="form-control" type="text" name="country" id="country" placeholder="Country name"></td>
                </tr>
                <tr>
                    <td><label for="date">Date</label></td>
                    <td><input class="form-control" type="date" name="date" id="date" placeholder="01-01-2021"></td>
                </tr>
                <tr>
                    <td><label for="duration">Duration</label></td>
                    <td><input class="form-control" type="number" name="duration" id="duration" placeholder="Number of days"></td>
                </tr>
                <tr>
                    <td><label for="price">Price</label></td>
                    <td><input class="form-control" type="number" name="price" id="price" placeholder="Amount in euro"></td>
                </tr>
                <tr>
                    <td><label for="latitude">Latitude</label></td>
                    <td><input class="form-control" type="text" name="latitude" id="latitude" placeholder="-12.000000"></td>
                </tr>
                <tr>
                    <td><label for="longitude">Longitude</label></td>
                    <td><input class="form-control" type="text" name="longitude" id="longitude" placeholder="12.000000"></td>
                </tr>
                <tr>
                    <td><label for="picture">Picture</label></td>
                    <td>
                        <div class="input-group">
                            <label class="input-group-text" for="upload_picture"><i class="bi bi-card-image"></i></label>
                            <input class="form-control"  type="file" name="picture" id="upload_picture">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="description">Description</label>
                    </td>
                    <td>
                        <textarea class="form-control" type="text" name="description" id="description" rows="8" placeholder="Leave your journey description in here"></textarea>
                    </td>
                </tr>
                <!-- buttons -->
                <tr> 
                    <td>
                        <a href="index.php"><p class="btn btn-outline-light fs-4 fw-light py-0 my-3 w-100">Return</p></a>
                    </td>
                    <td>
                        <button class="btn btn-success w-100 fs-4 fw-light py-0 my-3" type="submit">Create a Journey</button>
                    </td>
                </tr>
            </table>
            </div>
        </form>
        </fieldset>
    </main>
    <!-- FOOTER -->
    <?php require_once("components/footer.php")?>

</body>
</html>