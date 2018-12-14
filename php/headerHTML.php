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
    <form action="header.php" method="POST">
        <div class="container-headerhtml"> 

            <?php
                $sql = "SELECT id, link_text, link_url, tel FROM header";
                $results = mysqli_query($connect, $sql);
                foreach($results as $result) {
                    echo 
                            '<input type="hidden" name="header['.$result['id'].'][id]" value="'.$result['id'].'"'

                            .'<label for="link_url'.$result['id'].'"><b> edit '.$result['link_url'].'</b></label>'
                            .'<input id="link_url'.$result['id'].'" type="text" placeholder="'.$result['link_url'].'" name="header['.$result['id'].'][link_url]" >'

                            .'<label for="link_text'.$result['id'].'"><b> edit '. $result['link_text'].'</b></label>'
                            .'<input id="link_text'.$result['id'].'" type="text" placeholder="'. $result['link_text'].'" name="header['.$result['id'].'][link_text]" >'

                            .'<label for="tel'.$result['id'].'"><b> edit '. $result['tel'].'</b></label>'
                            .'<input id="tel'.$result['id'].'" type="text" placeholder="'. $result['tel'].'" name="header['.$result['id'].'][tel]"> <hr>' 
                            ; 
                }
            ?> 
            <br>
            <br>
          
            <hr>
            <br>
            <br>

            <b>Add New </b>
            <br>
            
            <input type="hidden" name="feature[new][id]" value="new">

            <label for="newLinkurl'"><b>link url</b></label>
            <input id="link_url_new'" type="text" placeholder="link url" name="newlink_url">
            <label for="link_text_new'"><b>link text</b></label>
            <input id="link_text_new'" type="text" placeholder="link text" name="newlink_text" >
           
            <input type="submit" name="submit" value="save" />
            <a href="/vue"> abbrechen</a>

        </div>

    </form>

</body>
</html>