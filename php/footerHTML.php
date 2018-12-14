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
    <form action="footer.php" method="POST">
        <div class="container-footerhtml"> 

            <?php
                $sql = "SELECT id, link_text, link_url FROM footer";
                $results = mysqli_query($connect, $sql);
                foreach($results as $result) {
                    echo 
                            '<input type="hidden" name="footer['.$result['id'].'][id]" value="'.$result['id'].'"'

                            .'<label for="link_text'.$result['id'].'"><b> edit '. $result['link_text'].'</b></label>'
                            .'<input id="link_text'.$result['id'].'" type="text" placeholder="'. $result['link_text'].'" name="footer['.$result['id'].'][link_text]">'
                            
                            .'<label for="link_url'.$result['id'].'"><b> edit '.$result['link_url'].'</b></label>'
                            .'<input id="link_url'.$result['id'].'" type="text" placeholder="'.$result['link_url'].'" name="footer['.$result['id'].'][link_url]"> <hr>'
                            ; 
                }
            ?> 
            <br>
            <br>
          
            
            <br>
            <br>

            <b>Add New Footer</b>
            <br>
            
            <input type="hidden" name="footer[new][id]" value="new">

            <label for="new_link_url'"><b>link url</b></label>
            <input id="new_link_url'" type="text" placeholder="link url" name="newLinkurl">

            <label for="link_text_new'"><b>link text</b></label>
            <input id="link_text_new'" type="text" placeholder="link text" name="newLinktext" >
           
            <input type="submit" name="submit" value="save" />
            <a href="/vue"> abbrechen</a>

        </div>

    </form>

</body>
</html>