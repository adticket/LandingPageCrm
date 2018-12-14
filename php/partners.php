<?php
include_once 'connectDB.php';


 if (isset($_POST['submit'])){
     $newTeaserText = $_POST['newteassertext'];

        $errors_general = array();
        foreach ($_POST['partners'] as $partners){
             $errors_partners = array();
            $id = mysqli_escape_string($connect, $partners['id']);

            foreach ($partners as $item) {
                if (empty($item)){ 
                    $errors_partners[] = "fields cannot be empty!"; 
                }
            } 

            $teaser_text = mysqli_escape_string($connect, $partners['teaser_text']);
     

            if (count($errors_partners) === 0) {
                if($id !== 'new') {

                    // sql UPDATE
                    $update = "UPDATE partners set 
                    teaser_text = '$teaser_text'
                    ";
                    $result = mysqli_query($connect, $update);
                    echo 'Deine Änderungen sind ergolgreich updatet!';
                } elseif ($id === 'new') {
                    // sql INSERT
                 
                }
                // $inser = "INSERT INTO services (header, tel, button, teaser_text, infos) VALUES($newHeader, $newTel, $newButton, $newtext, $newinfos);";
                // $result = mysqli_query($connect, $inser);
                //  echo 'you have successfuly inserted ';
                //  echo $id;

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
   
