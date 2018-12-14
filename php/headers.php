<?php
include_once 'connectDB.php';


 if (isset($_POST['submit'])){
 
        $errors_general = array();
        foreach ($_POST['headers'] as $headers){
             $errors_headers = array();
             $id = mysqli_escape_string($connect, $headers['id']);

            $header_name = mysqli_escape_string($connect, $headers['header_name']);

            if(empty($header_name)){
                echo ' Die felder sind leer!';
            }else{
                $update = "UPDATE headers set 
                header_name='$header_name'
                WHERE id= '$id'";
                $result = mysqli_query($connect, $update);
                echo ' Du hast '.$header_name.' in headers von jeder Section geändert';
            }

            if(count($errors_general) > 0) {
                //Fehler ans front end übergeben
              
            }
        }


}