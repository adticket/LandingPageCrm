<?php
include_once 'connectDB.php';


 if (isset($_POST['submit'])){
     $newLinkurl = $_POST['newLinkurl'];
     $newLinktext = $_POST['newLinktext'];

        $errors_general = array();
        foreach ($_POST['footer'] as $footer){
             $errors_footer = array();
            $id = mysqli_escape_string($connect, $footer['id']);
          
            foreach ($footer as $item) {
                if (empty($item)){ 
                    $errors_footer[] = "fields cannot be empty!"; 
                }
            } 


            $link_url = mysqli_escape_string($connect, $footer['link_url']);
            $link_text = mysqli_escape_string($connect, $footer['link_text']);
            echo $link_text;

            if (count($errors_footer) === 0) {
                    // sql UPDATE
                    if(empty($newLinkurl) && empty($newLinktext)){
                        $update = "UPDATE footer set 
                        link_url='$link_url',
                        link_text='$link_text'
                        WHERE id='$id'";
                        $result = mysqli_query($connect, $update);
                            echo 'Deine Änderung sind ergolgreich updatet!';
                    }else{
                 // sql INSERT
                        $inser = "INSERT INTO footer (link_url, link_text) VALUES($newLinkurl, $newLinktext);";
                        $result = mysqli_query($connect, $inser);
                        echo 'you have successfuly inserted ';
                    }


            }
            else {
                foreach ($errors_feature as $err) {
                    $errors_general[] = $err;
                }
            }
            

            if(count($errors_general) > 0) {
                //Fehler ans front end übergeben
              
            }
        }


}
   