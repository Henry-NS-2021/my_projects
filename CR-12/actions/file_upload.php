
<?php
function file_upload($picture) {
   $result = new stdClass(); //this object will carry status from file upload
   $result->fileName = 'logo.png';
   $result->error = 1;//it could also be a boolean true/false
   //collect data from object $picture
   $fileName = $picture["name"];
//    $fileType = $picture["type"];
   $fileTmpName = $picture["tmp_name" ];
   $fileError = $picture["error"];
   $fileSize = $picture["size"];
   $fileExtension = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));    
   $filesAllowed = ["png", "jpg", "jpeg"];
   if ($fileError == 4) {      
       $result->ErrorMessage = "<p class='text-danger'>No picture was chosen. It can always be updated later.</p>" ;
       return $result;
   } else {
        if (in_array($fileExtension, $filesAllowed)) {
           if ($fileError === 0) {
               if ($fileSize < 500000 ) { //max picture size 500kb this number is in bytes
                   //it gives a file name based microseconds
                   $fileNewName = uniqid('') . "."  . $fileExtension; // create unique id from the  initial file name
                   $destination = "../img/$fileNewName";
                   if (move_uploaded_file($fileTmpName, $destination)) {
                       $result->error = 0;
                       $result->fileName = $fileNewName;
                        return $result;
                   } else {    
                       $result->ErrorMessage = "There was an error uploading this file.";
                        return $result;
                   }
               } else {                                      
                   $result->ErrorMessage = "This picture is bigger than the allowed 500Kb size. <br> Please choose a smaller one and update the product.";
                    return $result;
               }
           } else {                              
               $result->ErrorMessage = "There was an error uploading - $fileError code. Check the PHP documentation.";
                return $result;
           }
       } else {                      
           $result->ErrorMessage = "This file type cannot be uploaded.";
            return $result;
       }
   }
}

