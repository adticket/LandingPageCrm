<?php
include_once 'connectDB.php';


 if (isset($_POST['submit'])){

        $errors_general = array();

             $errors_section = array();

            $crmH1 = mysqli_escape_string($connect, $_POST['section']['crmH1']);
             $crmsmall = mysqli_escape_string($connect, $_POST['section']['crmsmall']);
             $oder = mysqli_escape_string($connect, $_POST['section']['oder']);
             $direct = mysqli_escape_string($connect, $_POST['section']['direct']);

            if (count($errors_section) === 0) {
                    // sql UPDATE
                $update = "UPDATE section set 
                    crmH1='$crmH1',
                    crmsmall='$crmsmall',
                    oder='$oder',
                    direct='$direct'";

                    $result = mysqli_query($connect, $update);
                   
                } 

echo 'deine Änderung war erfolgreich';
            

            if(count($errors_general) > 0) {
                //Fehler ans front end übergeben
              
            }
        
}


   