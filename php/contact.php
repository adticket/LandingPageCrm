<?php
include_once 'connectDB.php';


 if (isset($_POST['submit'])){

        $errors_general = array();
   
        foreach ($_POST['contact'] as $contact){
             $errors_contact = array();
        //      $id = mysqli_escape_string($connect, $contact['id']);



            $first_name = mysqli_escape_string($connect, $contact['first_name']);
            $last_name = mysqli_escape_string($connect, $contact['last_name']);
            $eMail = mysqli_escape_string($connect, $contact['eMail']);
            $request= mysqli_escape_string($connect, $contact['request']);
            $reservix = mysqli_escape_string($connect, $contact['reservix']);

                    $update = "UPDATE contact set 
                    first_name='$first_name',
                    last_name='$last_name',
                    eMail='$eMail',
                    request='$request',
                    reservix='$reservix'";
                    $result = mysqli_query($connect, $update);


                    echo ' Du hast folgende: '.$first_name.' '.$last_name.' '.$eMail.' '.$request.$reservix .' in contact hinzugefügt';
        }

}
   