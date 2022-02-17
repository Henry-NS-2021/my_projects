<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Henry Ngo-Sytchev">
    <!-- [BOOTSTRAP] -->
    <?php require_once("bootstrap.php")?>
    <!-- CSS -->
    <style>
        header{
            height: 25vh;
            background: url("<?= $url ?>pictures/layout/hero.jpg") black content-box center;
            /* background-repeat: no-repeat; */
            filter: grayscale(30%);
            object-fit: cover;
        }
        h3{
            position:absolute;
            bottom: 12%;
            right: 0%;
            font-weight: lighter;
            color: whitesmoke;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 0.5% 2% 0.5% 15%;
            text-align: right;
            vertical-align: bottom;
        }
    </style>
    <title>Code Review 10: Hero</title>
</head>
<body>
    <!-- [HERO] -->
    <header class="bg-secondary text-center" style=>
   
    <h3>Source of Inspiration & Knowledge</h3>
</header>

    
</body>
</html>