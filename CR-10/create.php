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
            background: url("pictures/layout/bg_library.jpg") no-repeat center right;
            background-size: cover;
            filter: sepia(25%);
        }
    
        input{
            width: 100%;
        }

        .label {
            font-weight: lighter;
            color: lightgrey;
        }

        main{
            min-height: 70vh;
        }   

    </style>
    <title>Code Review 10: Create</title>
</head>
<body>
    <!-- [HERO] & [NAVBAR] -->
    <?php 
        $url = "";
        require_once("components/hero.php");//hero component 
        require_once("components/navbar.php"); //navbar component
    ?>
    <!-- [MAIN] -->
    <main id="bg" class="py-5">
    <legend  class="h2 display-1 py-3 mt-0 text-center text-warning">
        <h1 class="mt-4">Create request</h1><hr>
    </legend>
    <!-- [FORM] -->
    <form class="w-75 mx-auto" method="POST" action="actions/a_create.php" enctype="multipart/form-data" class=" mx-5 my-0">
        
        <table class="bg-dark table table-hover m-0 text-muted fs-6 rounded-3">
                <tr>
                    <td colspan="2"><h2 class="display-1 mb-5 text-center text-white my-4">New Media Record</h2>
                    </td>
                </tr>
                <tr>
                    <td class="label">Title</td>
                    <td><input class="form-control" type="text" name="title" placeholder="Title"></td>
                </tr>
                <tr>
                    <td class="label">Author Name</td>
                    <td><input class="form-control" type="text" name="author_first_name" placeholder="Author Name"></td>
                </tr>
                <tr>
                    <td class="label">Author Surname</td>
                    <td><input class="form-control" type="text" name="author_last_name" placeholder="Author Surname" step="any"></td>
                </tr>
                <tr>
                    <td class="label">Publisher</td>
                    <td><input class="form-control" type="text" name="publisher_name" placeholder="Publisher"></td>
                </tr>
                <tr>
                    <td class="label">Publication Date</td>
                    <td><input class="form-control" type="date" name="publish_date" placeholder="Publication Date"></td>
                </tr>
                <tr>
                    <td class="label">Publisher Address</td>
                    <td><input class="form-control" type="text" name="publisher_address" placeholder="Publisher Address"></td>
                </tr>
                <tr>
                    <td class="label">Media Type</td>
                    <td>
                        <select class="form-control" name="type">
                            <option value="Book">Book</option>
                            <option value="CD">CD</option>
                            <option value="DVD">DVD</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="label">ISBN</td>
                    <td><input class="form-control" type="text" name="ISBN" placeholder="ISBN"></td>
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
                        <input class="form-control"  type="file" name="picture" id="upload_picture">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="label">Description</td>
                    <td>
                    <textarea class="form-control" name="short_description" rows="8" placeholder="Leave the description of the media in here..."></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        
                    </td>
                    <td>
                        <input class="btn btn-outline-success px-5 py-3 mb-2 mt-4 fw-bold" type="submit" name="name" placeholder="Name" value="Confirm">
                        <a href="index.php">
                            <p class="btn btn-outline-light py-0 mb-2 fw-bold w-100">Home</p>
                        </a>
                    <br>
                    <br>
                    <br>
                </td>
                </tr>
            </table>
    </form>
    </main>
    <!-- [FOOTER] -->
    <?php require_once("components/footer.php"); ?>
</body>
</html>