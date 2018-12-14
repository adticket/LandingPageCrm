<?php
include_once 'connectDB.php';


 if (isset($_POST['submit'])){
     $newLinkurl = $_POST['newlink_url'];
     $newLinktext = $_POST['newlink_text'];

        $errors_general = array();
        foreach ($_POST['header'] as $header){
             $errors_header = array();
             $id = mysqli_escape_string($connect, $header['id']);

            foreach ($header as $item) {
                if (empty($item)){ 
                    $errors_header[] = "fields cannot be empty!"; 
                }
            } 


            $link_url = mysqli_escape_string($connect, $header['link_url']);
            $link_text = mysqli_escape_string($connect, $header['link_text']);
            $tel = mysqli_escape_string($connect, $header['tel']);

            if(empty($newLinkurl) && empty($newLinktext)){

                    $update = "UPDATE header set 
                    link_url='$link_url',
                    link_text='$link_text',
                    tel='$tel'
                    WHERE id= '$id'";
                    echo ' Du hast '.$link_url.' und '.$link_text.' in header Menu geändert';
                    $result = mysqli_query($connect, $update);
            }else{
                $insert = "INSERT INTO header (link_url, link_text) VALUES ('$newLinkurl', '$newLinktext')";
                $result = mysqli_query($connect, $insert);
                echo ' Du hast '.$newLinkurl.' und '.$newLinktext.' in header Menu hinzugefügt';
            }

            if(count($errors_general) > 0) {
                //Fehler ans front end übergeben
              
            }
        }


}
   