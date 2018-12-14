<?php
include_once 'connectDB.php';


 if (isset($_POST['submit'])){
     $newHeader = $_POST['newHeader'];
     $newTel = $_POST['newTel'];
     $newButton = $_POST['newButton'];
     $newtext = $_POST['newtext'];
     $newinfos = $_POST['newinfos'];

        $errors_general = array();
        foreach ($_POST['service'] as $service){
             $errors_service = array();
            $id = mysqli_escape_string($connect, $service['id']);

            foreach ($service as $item) {
                if (empty($item)){ 
                    $errors_service[] = "fields cannot be empty!"; 
                }
            } 

            $header = mysqli_escape_string($connect, $service['header']);
            $tel = mysqli_escape_string($connect, $service['tel']);
            $button = mysqli_escape_string($connect, $service['button']);
            $teaser_text = mysqli_escape_string($connect, $service['teaser_text']);
            $infos = mysqli_escape_string($connect, $service['infos']);
     

            if (count($errors_service) === 0) {
                if($id !== 'new') {
                    echo $id;
                    // sql UPDATE
                    $update = "UPDATE services set 
                    header = '$header', 
                    tel = '$tel',
                    button='$button',
                    teaser_text='$teaser_text',
                    infos='$infos'";
                    $result = mysqli_query($connect, $update);
                    echo 'Deine Änderungen sind ergolgreich updatet!';
                } elseif ($id === 'new') {
                    // sql INSERT
                 
                }
                $inser = "INSERT INTO services (header, tel, button, teaser_text, infos) VALUES($newHeader, $newTel, $newButton, $newtext, $newinfos);";
                $result = mysqli_query($connect, $inser);
                 echo 'you have successfuly inserted ';
                 echo $id;

            } else {
                foreach ($errors_service as $err) {
                    $errors_general[] = $err;
                }
            }
            

            if(count($errors_general) > 0) {
                //Fehler ans front end übergeben
            }
        }


}
   
