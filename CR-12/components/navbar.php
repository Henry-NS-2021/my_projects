
<!--     
        -------------------------------
            NAVBAR
        ------------------------------- 
    -->


        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Henry Ngo-Sytchev">
    <!-- [BOOTSTRAP] -->
    <?php require_once("bootstrap.php")?>
    <style>
        nav{
            position: relative;
        }

        .nav_link{
            color: seagreen;
            transition:  font-weight .2s, color 1.55s;
        }

        .nav_link:hover{
            color:black;
            font-weight:bold;
        }

        @media screen and (max-width:480px) {
            div a {
                font-size: 5vw;
                padding: 0 auto;
                line-height: 0px;
            }
        }
        /* .nav-2 {
            color: whitesmoke;
            transition: all 0.55s;
        }

        .nav-2:hover{
            font-size: 1.05rem;
            color: red;
        } */
    </style>
    <title>Code Review 12: Mount Everest</title>
</head>
<body>

<!-- NAVBAR -->
<nav class="sticky-top">
    <div class="d-flex flex-wrap justify-content-sm-center justify-content-md-start text-start bg-white text-warning border-top border-dark border-2 my-0 justify-content-start align-items-center">
            <!-- logo -->
            <div><a href="index.php#">
                <img class="rounded-circle ms-2 me-3 my-0" src="<?= $url ?>img/layout/logo_navbar.png" alt="" width="50" height="50" class="d-inline-block align-text-top">
            </a></div>
            <!-- links -->
            <section class="text-center d-flex justify-content-between align-items-center">
            
                <div class="px-2 py-0 mb-1 display-6 fs-6 border-end border-dark align-self-center">
                    <a class="text-decoration-none nav_link" href="<?= $url ?>index.php#list_journey">HOME</a>
                </div>
                
                <div class="px-2 py-0 mb-1 display-6 fs-6 border-end border-dark align-self-center">
                    <a class="text-decoration-none nav_link" href="<?= $url ?>create.php#add_journey">ADD JOURNEY</a>
                </div>
            
                <div class="px-2 py-0 mb-1 display-6 fs-6 border-end border-dark align-self-center">
                        <a class="text-decoration-none nav_link" href="<?= $url ?>RESTful/display_all.php">RestAPI</a>
                </div>

                <div class="px-2 py-0 mb-1 display-6 fs-6 align-self-center">
                        <a class="text-decoration-none nav_link" href="<?= $url ?>ajax.php">AJAX</a>
                </div>
                
            </section>
    </div>        
</nav>
</body>
</html>