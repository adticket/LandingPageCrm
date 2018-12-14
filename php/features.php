<?php
include_once 'connectDB.php';


 if (isset($_POST['submit'])){
     $newHeadline = $_POST['newHeadline'];
     $newTeasertext = $_POST['newTeasertext'];
     $newLinkurl = $_POST['newLinkurl'];
     $newLinktext = $_POST['newLinktext'];

        $errors_general = array();
        foreach ($_POST['feature'] as $feature){
             $errors_feature = array();
            $id = mysqli_escape_string($connect, $feature['id']);
          
            foreach ($feature as $item) {
                if (empty($item)){ 
                    $errors_feature[] = "fields cannot be empty!"; 
                }
            } 

            $headline = mysqli_escape_string($connect, $feature['headline']);
            $teaserText = mysqli_escape_string($connect, $feature['teaser_text']);
            $link_url = mysqli_escape_string($connect, $feature['link_url']);
            $link_text = mysqli_escape_string($connect, $feature['link_text']);

     

            if (count($errors_feature) === 0) {
                if($id !== 'new') {
                    // sql UPDATE
                $update = "UPDATE features set 
                    headline = '$headline', 
                    teaser_text = '$teaserText',
                    link_url='$link_url',
                    link_text='$link_text'
                    WHERE id='$id'";
                    $result = mysqli_query($connect, $update);
                    echo 'Deine Änderung sind ergolgreich updatet!';
                } elseif ($id === 'new') {
                    // sql INSERT
                   if(!empty($newHeadline) || !empty($newLinktext) || !empty($newLinkurl) || !empty($newTeasertext)){
                    $inser = "INSERT INTO features (headline, teaser_text, link_url, link_text) VALUES('$newHeadline', '$newTeasertext', '$newLinkurl', '$newLinktext');";
                    $result = mysqli_query($connect, $inser);
                    echo 'you have successfuly inserted ';
                   }
                }

            } else {
                foreach ($errors_feature as $err) {
                    $errors_general[] = $err;
                }
            }
            

            if(count($errors_general) > 0) {
                //Fehler ans front end übergeben
              
            }
        }


}
   