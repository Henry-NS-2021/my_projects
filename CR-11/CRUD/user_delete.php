<?php 
session_start();
require_once 'components/db_connect.php';
// if session is not set this will redirect to login page
if( !isset($_SESSION['adm']) && !isset($_SESSION['user']) ) {
   header("Location: index.php");
   exit;
  }
if(isset($_SESSION["user"])){
   header("Location: home.php");
   exit;
  }
  

  $visibility = "d-none"; //empty var to hide the alerts
  $class = "";//initial bootstrap class for the confirmation message
  $message = "";//empty var

//the GET method will show the info from the user to be deleted
  if ($_GET['id']) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM users WHERE id = {$id}" ;
  $result = mysqli_query($connect, $sql);
  $data = mysqli_fetch_assoc($result);
  if (mysqli_num_rows($result) == 1) {
   $f_name = $data['first_name'];
   $l_name = $data['last_name'];
   $user_status = $data['user_status'];
   $email = $data['email'];
   $phone_number = $data['phone_number'];
   $address = $data['address'];
   $picture = $data['picture'];
} }
//the POST method will actually delete the user permanently
if ($_POST) {
   $id = $_POST['id'];
   $picture = $_POST['picture'];
   ($picture =="avatar.png")?: unlink("pictures/$picture");

  $sql = "DELETE FROM users WHERE id = {$id}";
  if ($connect->query($sql) === TRUE) {
   $visibility = "";//displays the alert
   $class = "success";
   $var = "d-none"; //hides the initial notification if the query is executed
   $message = "
   <hr class='bg-success py-1 mb-4 mx-auto w-75'>
   <p class='mt-4 mb-5 fs-5'>User has been successfully <b>deleted</b>!</p>";
   header("refresh:3;url=dashboard.php");
} else {
   $visibility = "";//displays the alert
   $class = "danger";
   $var = "d-none"; //keeps the delete notification if query not executed 
   $message = "<hr class='bg-danger py-1 mb-4 mx-auto w-75'>
   <p class='mt-4 mb-5 fs-5'>The entry was not deleted due to: <br>" . $connect->error . "</p>";
}
}
mysqli_close($connect);
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- BOOTSTRAP -->
   <?php require_once 'components/bootstrap.php'?>
   <!-- CSS -->
   <link rel="stylesheet" href="styles/style.css">
   <title>Delete User</title>
</head>
<body class="dashboard_body">
   <!-- [MAIN] -->
   <main class="bg-transparent">
      
      <div class='container my-5 p-3 mx-auto text-danger text-center' style='min-width: 18rem; max-width: 720px;'>
         <!-- alert notification -->
         <div class="<?=$visibility;?> bg-none border border-3 border-<?=$class;?> text-<?=$class;?> text-center pt-4 pb-4 mb-5 mx-auto alert_notification" role="alert">
               <p><?=$message;?></p>
            <a href ='dashBoard.php'><button class ="btn btn-<?=$class;?> mb-2 py-0 px-5 fw-bold mx-auto w-50" type='button'>Dashboard</button></a >
         </div>
         <!-- DELETE NOTIFICATION -->
         <div class='<?php echo $var?> row justify-content-center align-items-center bg-light text-danger border border-2 border-danger rounded-3 py-4 shadow'>
            <h1 class="text-danger"><i class="bi bi-exclamation-triangle-fill"></i> ATTENTION</h1>
            <hr class='bg-danger py-1 mb-4 mx-auto w-75'>
            <p class='mt-3 mb-0 fs-5 text-dark'>You are about to delete the user below:</p>
            <!-- user data -->
            <div class="row shadow border rounded text-dark py-1 mt-1 w-75">
                  <div class="col-sm-12 col-md-2 align-self-center"><img class="img-fluid" width="50px" src="pictures/<?php echo $picture?>"></div>
                  <div class="col-sm-12 col-md-5 align-self-center"><?php echo "$f_name $l_name"?></div>
                  <div class="col-sm-12 col-md-5 align-self-center text-wrap"><?php echo $email?></div>
            
            </div>

            <h3 class="mt-5 mb-3">Would you like to continue?</h3>
            <div class='col-sm-12 col-md-7 border-start border-1 ps-3'>

            </div>
            <div class='col-12 py-0 my-2'>
                  <!-- post method with hidden id and picture data -->
               <form method="post">
                  <input type="hidden" name="id" value="<?php echo $id ?>" />
                  <input type="hidden" name="picture" value="<?php echo $picture ?>" />
                  <button class="btn btn-outline-danger fw-bold py-0 my-1" type="submit">Yes, please!</button >
                  <a href="dashboard.php">
                  <button class="btn btn-primary fw-bold py-0 my-1" type="button">No, return</button></a>
               </form>
            </div>
         </div>
      </div>
   </main>

               
</body>
</html>