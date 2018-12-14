<?php 
include_once 'connectDB.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<link rel="stylesheet" href="../css/login.css" type="text/css">
</head>
<body>
    <form action="contact.php" method="POST">
        <div class="container-contacthtml"> 

            <?php
                $sql = "SELECT first_name, last_name, eMail, request, reservix, id FROM contact";
                $results = mysqli_query($connect, $sql);
                foreach($results as $result) {
                    echo  '<input type="hidden" name="contact[]" value="'.$result['id'].'"'

                            .'<label for="first'.$result['first_name'].'"><b> edit '. $result['first_name'].'</b></label>'
                            .'<input id="first'.$result['first_name'].'" type="text" placeholder="'. $result['first_name'].'" name="contact['.$result['id'].'][first_name]">'
                            
                            .'<label for="last'.$result['last_name'].'"><b> edit '. $result['last_name'].'</b></label>'
                            .'<input id="last'.$result['last_name'].'" type="text" placeholder="'. $result['last_name'].'" name="contact['.$result['id'].'][last_name]">'

                            .'<label for="eMail'.$result['eMail'].'"><b> edit '. $result['eMail'].'</b></label>'
                            .'<input id="last'.$result['eMail'].'" type="text" placeholder="'. $result['eMail'].'" name="contact['.$result['id'].'][eMail]">'

                            .'<label for="request'.$result['request'].'"><b> edit '. $result['request'].'</b></label>'
                            .'<input id="request'.$result['request'].'" type="text" placeholder="'. $result['request'].'" name="contact['.$result['id'].'][request]">'

                            .'<label for="reservix'.$result['reservix'].'"><b> edit '. $result['reservix'].'</b></label>'
                            .'<input id="reservix'.$result['reservix'].'" type="text" placeholder="'. $result['reservix'].'" name="contact['.$result['id'].'][reservix]">'
                            ; 
                }
            ?> 
  
           
            <input type="submit" name="submit" value="save" />
            <a href="/vue"> abbrechen</a>

        </div>

    </form>

</body>
</html>