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
        footer {
            padding: 3% 8%;
            min-height: 10vh;
            background: black;
            color: white;
            text-align: center;
        }

        #face{
            width: 15%;
            margin-bottom: 10px;
        }

        a {
            text-decoration: none;
            color: white;
            transition: all .25s;
        }

        footer a:hover{
            transform: scale(1.5,1.1);
            /* font-size: .2em; */
            color: gold;
        }
        
    </style>
    <title>Code Review 11: Adopt a pet</title>
</head>
<body>
    <footer class="bg-success">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-sm-center justify-content-md-around justify-content-lg-evenly mb-2">
                <!-- <div class="d-flex border align-items-center text-center py-2 mb-4 w-50 mx-auto"> -->
                <h1 class="border border-3 pt-3 pb-2align-self-center mb-4 w-auto mx-auto display-6 text-uppercase text-center" style="min-width:220px; width: 100%; max-width:420px"><span class="fw-bold">Pet</span> St<img id="face" src="<?= $url ?>pictures/layout_img/home.png.">rey</h1>
                <!-- </div> -->
                <!-- Social media -->
                <div class="align-self-center text-center mx-auto">
                    <h6 class="fw-light border-bottom border-1 border-warning text-uppercase pt-1 pb-2 mb-0"> Our Pet Media Channels</h6>
                    <p class="mt-1 py-0 fw-lighter">
                    <small><a href="#"><span class="bi bi-facebook me-2"> Facebook</span></a>
                    <a href="#"><span class="bi bi-youtube me-2"> Youtube</span></a>
                    <a href="#"><span class="bi bi-instagram me-2"> Instagram</span></a>
                    <a href="#"><span class="bi bi-whatsapp me-2"> Whatsapp</span></a></small>
                    </p>
                </div>
            </div>
            <p class="col-12 mt-5 mb-0 text-center text-dark">
            <sup>2021&copy;Henry Ngo-Sytchev</sup>
            </p>
        </div>

    </footer>
</body>
</html>