<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="author" content="Henry Ngo-Sytchev">
    <!-- [BOOTSTRAP] -->
    <?php require_once("bootstrap.php")?>
    <style>
        .custom{
            padding: 2% 0%;
            min-height: 20vh;
            /* height: 20vh; */
            background: url("../img/layout/hero_dark.jpg") top center;
            background: black;
            background-size: cover;
            color: whitesmoke;
            text-align: center;
        }

        .link_footer{
            font-size: 0.7rem;
            color: whitesmoke;
            transition: 0.55s;
        }

        .link_footer:hover{
            color: seagreen;
            text-shadow: 10px -10px white;
        }

        .footer_media {
            color: seagreen;
            font-size: 1.2rem;
            transition: color .35s;
        }
        
        .footer_media:hover{
            color: whitesmoke;
        }

        
    </style>
    <title>Code Review 12: Mount Everest</title>
</head>
<body>

    <!-- FOOTER -->
    <footer class="custom py-3">
        <div class="d-flex justify-content-center flex-wrap mb-1">
            <div class="px-4 py-0 mb-3 border-end border-0">
                <a class="link_footer text-decoration-none" href="<?= $url ?>index.php">HOME</a>
            </div>
            <div class="px-4 py-0 mb-1 border-end border-0">
                <a class="link_footer text-decoration-none" href="<?= $url ?>create.php">ADD A JOURNEY</a>
            </div>
            <div class="px-4 py-0 mb-1 border-end border-0">
                    <a class="link_footer text-decoration-none" href="<?= $url ?>RESTful/display_all.php">REST API</a>
            </div>
            <div class="px-4 py-0 mb-1">
                    <a class="link_footer text-decoration-none" href="<?= $url ?>ajax.php">AJAX</a>
            </div>
        </div>
        <div class="border-bottom border-top border-success p-2 fs-6 mb-5 mx-auto" style="min-width: 120px; width: 100%; max-width: 330px">
            <a class="px-4 footer_media" href="#"><i class="bi bi-facebook"></i></a>
            <a class="px-4 footer_media" href="#"><i class="bi bi-twitter"></i></a>
            <a class="px-4 footer_media" href="#"><i class="bi bi-youtube"></i></a>
            <a class="px-4 footer_media" href="#"><i class="bi bi-instagram"></i></a>
        </div>
        <p class="text-muted mt-4"><sub>2021&copy;Henry Ngo-Sytchev</sub></p>
    </footer>
</body>
</html>