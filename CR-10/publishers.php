
<?php
   
   require_once("actions/db_connect.php");

   $sql = "SELECT * FROM media GROUP BY publisher_name ASC;";
   $query = mysqli_query($connect, $sql);
   $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
   $publishers = "";
   
   if(mysqli_num_rows($query) > 0){
       foreach($result as $row){
        // var_dump($row["publisher_name"]);   
        $publishers .= "
           <tr class='align-middle text-center border-top border-bottom border-secondary my-2'>
               <td class='text-start ps-5'>{$row['publisher_name']}</td>
               <td>{$row['publisher_address']}</td>
               <td class='text-center'>
               <a class='btn btn-primary py-0 m-1' href='publications.php?publisher_name={$row['publisher_name']}'><div>Publications</div></a>
               </td>
           </tr>
           ";
       }
   }

?>


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
            background: url("pictures/layout/bg.jpg") no-repeat left center;
            filter: sepia(25%);
            background-size: cover;
        }
        
        main{
            min-height: 70vh;
        }   
    </style>
    <title>Code Review 10: Publishers</title>
</head>
<body id="bg">
    <!-- [HERO] & [NAVBAR] -->
    <?php 
        $url = "";
        require_once("components/hero.php");//hero component 
        require_once("components/navbar.php"); //navbar component
    ?>
    <!-- [MAIN] -->
    <table class="table table-muted table-hover text-light mb-5 mx-auto w-75">
        <thead class="table-dark text-white text-center fw-light">
            <tr class="align-middle">
                <td>Publisher</td>
                <td>Address</td>
                <td>About</td>
            </tr>
        </thead>
        <tbody>
            <main class="py-5 px-3">
            <?= $publishers ?>
            </main>
        </tbody>
    </table>

    <!-- [FOOTER] -->
    <?php require_once("components/footer.php"); ?>
</body>
</html>