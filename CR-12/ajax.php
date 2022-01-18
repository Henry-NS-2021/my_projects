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
        #journey_AJAX{
            min-height: 100vh;
            margin: 0px;
            padding: 5% 0% 3%;
            background: url("img/layout/banner_canyon.jpg") no-repeat fixed;
        }
    </style>
    <title>Code Review-12: Mount Everest</title>
</head>
<body>
<!-- HERO & NAVBAR -->
<?php 
    $hero = $url = "";
    require_once("components/hero.php");
    require_once("components/navbar.php"); 
    ?>

<!-- MAIN -->
<main class="px-5" id="journey_AJAX">
    <h1 class="text-center text-light display-4 fw-light shadow shadow-danger">Mount Everest Offers with AJAX</h1>
    <hr class="bg-success py-1 px-5 mb-0 mx-auto w-75">
    <p class="text-center">
    <button class="btn btn-outline-light text-success py-0 mt-3 mx-auto w-75" id="activate_ajax">Activate AJAX</button></p>

   <!-- Display AJAX data from here -->
   <div class="container-fluid">
        <div id="journey_list" class="row">
        </div>
    </div>
</main>

<!-- FOOTER -->
<?php require_once("components/footer.php") ?>
<script>
    let btn = document.getElementById("activate_ajax");
    btn.addEventListener("click", showAJAX);

    function showAJAX(){
        // create object
        let request = new XMLHttpRequest();

        request.open("GET", "RESTful/display_all.php", true);
        request.onload = function showJourneys(){
            if(this.status == 200){//if status ok, print
                // console.log("This works!");
                // console.log(request);
                let journeys = JSON.parse(this.responseText);
                // console.log(journeys.data); -> the parameter containing an array of objects
                let journey_array = journeys.data;
                // console.log(journey_array);
                let output = "";
                for(let i in journey_array){
                    output += `
                    <article class="card-group col-sm-12 col-md-6 col-lg-3 py-4 px-2 justify-content-center text-light">
                        <div class="card bg-transparent" style="width: 18rem; backdrop-filter: blur(5px)">
                            <img src="img/${journey_array[i].picture}" class="card-img-top" alt="journey_image">
                        <div class="card-body">
                            <h5 class="card-title fw-bolder text-center mb-2">${journey_array[i].location_name}</h5>
                            <h6 class="card-subtitle text-center text-muted fw-lighter mt-3 mb-3">
                            <i class="bi bi-geo-fill"></i>${journey_array[i].city}, ${journey_array[i].country}</h6>
                            </div>
                            <hr class="mt-0 mb-2">

                        <p class="card-footer bg-dark py-0 my-0 text-end"><span class="text-light h4">€${journey_array[i].price}</span></p>
                    </article>
                    `;
                }   
                document.getElementById("journey_list").innerHTML = output;
            }
        }
        request.send();            
    }
    
</script>
</body>
</html>