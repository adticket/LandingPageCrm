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
    <form action="aboutUs.php" method="POST">
        <div class="container-aboutUshtml"> 

            <?php
                $sql = "SELECT id, headline, teaser_text, link_text, link_url FROM aboutUs";
                $results = mysqli_query($connect, $sql);
                foreach($results as $result) {
                    echo 
                            '<input type="hidden" name="aboutUs['.$result['id'].'][id]" value="'.$result['id'].'"'

                            .'<label for="headline'.$result['id'].'"><b> edit '.$result['headline'].'</b></label>'
                            .'<input type="text" id="headline'.$result['id'].'"  placeholder="'.$result['headline'].'" name="aboutUs['.$result['id'].'][headline]">'

                            .'<label for="teaser_text'.$result['id'].'"><b> edit '.$result['teaser_text'].'</b></label>'
                            .'<textarea id="teaser_text'.$result['id'].'"  placeholder="'.$result['teaser_text'].'" name="aboutUs['.$result['id'].'][teaser_text]"></textarea>'

                            .'<label for="link_url'.$result['id'].'"><b> edit '.$result['link_url'].'</b></label>'
                            .'<input id="link_url'.$result['id'].'" type="text" placeholder="'.$result['link_url'].'" name="aboutUs['.$result['id'].'][link_url]" >'

                            .'<label for="link_text'.$result['id'].'"><b> edit '. $result['link_text'].'</b></label>'
                            .'<input id="link_text'.$result['id'].'" type="text" placeholder="'. $result['link_text'].'" name="aboutUs['.$result['id'].'][link_text]" > <hr>'
                            ; 
                }
            ?> 
            <br>
            <br>
          
            <hr>
            <br>
            <br>

            <b>Add New Abou Us</b>
            <br>
            
            <input type="hidden" name="feature[new][id]" value="new">
            <label for="new_headline'"><b>header</b></label>
            <input id="new_header'" type="text" placeholder="header text" name="newHeadline">

            <label for="newTeasertext'"><b> text</b></label>
            <input id="newTeasertext'" type="text" placeholder="text" name="newTeasertext" >

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