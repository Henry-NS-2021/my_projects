<?php 
    require_once("actions/db_connect.php");

    if($_GET["id"]){
        $id = $_GET["id"];
        $sql = "SELECT * FROM media WHERE media_id = '{$id}';";
        $query = mysqli_query($connect, $sql);

        if(mysqli_num_rows($query) == 1){
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC); //fetched row
            foreach($result as $data){
            $id = $data['media_id'];
            $title = $data['title'];
            $author_first_name = $data['author_first_name'];
            $author_last_name = $data['author_last_name'];
            $publisher_name = $data['publisher_name'];
            $publish_date = $data['publish_date'];
            $publisher_address = $data['publisher_address'];
            $ISBN = $data['ISBN'];
            $type = $data['type'];
            $status = $data['status'];
            $short_description = $data['short_description'];
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
        .label {
            font-weight: lighter;
            color: lightgrey;
        }
        /* PREWORK CSS */
        fieldset {
               margin: auto;
               margin-top: 5vh;
               width: auto;
        }  

        .img-thumbnail{
            width: 70px !important;
            height: 70px !important;
        }    

        main{
            min-height: 70vh;
        }   
    </style>
    <title>Code Review 10: Update</title>
</head>
<body>
    <!-- [HERO] & [NAVBAR] -->
    <?php 
        $url = "";
        require_once("components/hero.php");//hero component 
        require_once("components/navbar.php"); //navbar component
    ?>

    <!-- [MAIN] -->
    <main class="bg-dark py-5">
    <!-- [FORM] -->

    <!-- <legend  class="h2 display-1 py-3 mt-0 text-center text-warning">
        <h1 class="mt-4">Update request <img class="img-thumbnail rounded-3 border border-1" src="pictures/<?php echo $picture; ?>" alt= "<?php echo $title ?>">
    </h1>
    <hr>
    </legend> -->
    <form class="w-75 mx-auto my-3" method="POST" action="actions/a_update.php" enctype="multipart/form-data" class="rounded-3 bg-dark mx-5">
        
        <table class="table mx-0 mb-0 text-white fs-6">
                <tr class="text-center">
                    <td colspan="2"><h2 class="display-1 my-5 text-center text-white my-4">Update Media Record</h2>
                    
                    <br>
                    <img class="bg-light img-fluid w-25 mb-4 rounded-3 border border-1" src="pictures/<?php echo $picture; ?>" alt= "<?php echo $title ?>"></h2>
                </td>
                </tr>
                <tr>
                    <td class="label">Title</td>
                    <td><input class="form-control" type="text" name="title" value="<?= $data['title']; ?>" placeholder="Title"></td>
                </tr>
                <tr>
                    <td class="label">Author Name</td>
                    <td><input class="form-control" type="text" name="author_first_name" value="<?= $data['author_first_name']?>" placeholder="Author Name"></td>
                </tr>
                <tr>
                    <td class="label">Author Surname</td>
                    <td><input class="form-control" type="text" name="author_last_name" value="<?= $data['author_last_name']?>" placeholder="Author Surname" step="any"></td>
                </tr>
                <tr>
                    <td class="label">Publisher</td>
                    <td><input class="form-control" type="text" name="publisher_name" value="<?= $data['publisher_name']?>" placeholder="Publisher"></td>
                </tr>
                <tr>
                    <td class="label">Publication Date</td>
                    <td><input class="form-control" type="date" name="publish_date" value="<?= $data['publish_date']?>" placeholder="Publication Date"></td>
                </tr>
                <tr>
                    <td class="label">Publisher Address</td>
                    <td><input class="form-control" type="text" name="publisher_address" value="<?= $data['publisher_address']?>" placeholder="Publisher Address"></td>
                </tr>
                <tr>
                    <td class="label">Media Type</td>
                    <td>
                        <select class="form-control" name="type" value="<?= $data['type']?>">
                            <option value="Book">Book</option>
                            <option value="CD">CD</option>
                            <option value="DVD">DVD</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="label">ISBN</td>
                    <td><input class="form-control" type="text" name="ISBN" value="<?= $data['ISBN']?>" placeholder="ISBN"></td>
                </tr>
                <tr>
                    <td class="label">Status</td>
                    <td>
                        <select class="form-control" name="status">
                            <option value="available">Available</option>
                            <option value="reserved">Reserved</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="label">Picture</td>
                    <td>
                        <div class="input-group">
                            <label class="input-group-text" for="upload_picture"><i class="bi bi-camera-fill"></i></label>
                        <input class="form-control"  type="file" name="picture" value="<?= $data['picture']?>" id="upload_picture">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="label">Description</td>
                    <td>
                    <textarea class="form-control" name="short_description" rows="8" value="<?= $data['short_description']?>"><?= $data['short_description']?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                    <input type="hidden" name="media_id" value="<?= $data['media_id'] ?>">
                    <input type="hidden" name="picture" value="<?= $data['picture'] ?>">
                    </td>
                
                    <td>
                        <div>
                            <input class="btn btn-outline-success px-5 py-3 mb-2 mt-4 fw-bold w-100" type="submit" value="Save changes">
                        </div>
                        <a href="index.php">
                        <p class="btn btn-outline-light py-0 mb-2 fw-bold w-100">Back</p>
                        </a>
                    </td>
                </tr>
            </table>
    </form>
    </main>
    <!-- [FOOTER] -->
    <?php require_once("components/footer.php"); ?>
</body>
</html>