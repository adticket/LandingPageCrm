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
    <form action="features.php" method="POST">
        <div class="container-featureshtml"> 

            <label for="crmH1"><b> features H1</b></label>
            <input type="text" placeholder="crm header" name="crmH1" >
            <?php
                $sql = "SELECT id, icon, headline, teaser_text, link_text, link_url FROM features";
                $results = mysqli_query($connect, $sql);
                foreach($results as $result) {
                    echo 
                            '<input type="hidden" name="feature['.$result['id'].'][id]" value="'.$result['id'].'"'

                            .'<label for="headline'.$result['id'].'"><b> edit '.$result['headline'].'</b></label>'
                            .'<input type="text" id="headline'.$result['id'].'"  placeholder="'.$result['headline'].'" name="feature['.$result['id'].'][headline]">'

                            .'<label for="teaser_text'.$result['id'].'"><b> edit teaser text</b></label>'
                            .'<textarea id="teaser_text'.$result['id'].'"  placeholder="teaser text" name="feature['.$result['id'].'][teaser_text]">'.$result['teaser_text'].'</textarea>'

                            .'<label for="link_url'.$result['id'].'"><b> edit '.$result['link_url'].'</b></label>'
                            .'<input id="link_url'.$result['id'].'" type="text" placeholder="'.$result['link_url'].'" name="feature['.$result['id'].'][link_url]" >'

                            .'<label for="link_text'.$result['id'].'"><b> edit '. $result['link_text'].'</b></label>'
                            .'<input id="link_text'.$result['id'].'" type="text" placeholder="'. $result['link_text'].'" name="feature['.$result['id'].'][link_text]" > <hr>'
                            ; 
                }
            ?> 
            <br>
            <br>
          
            <hr>
            <br>
            <br>

            <b>Add New Features</b>
            <br>
            
            <input type="hidden" name="feature[new][id]" value="new">
            <label for="newHeadline'"><b>header</b></label>
            <input id="icon_new'" type="text" placeholder="header text" name="newHeadline">
            <label for="link_text_new'"><b> text</b></label>
            <input id="link_icon_new'" type="text" placeholder="text" name="newTeasertext" >
            <label for="newLinkurl'"><b>link url</b></label>
            <input id="link_url_new'" type="text" placeholder="link url" name="newLinkurl">
            <label for="link_text_new'"><b>link text</b></label>
            <input id="link_text_new'" type="text" placeholder="link text" name="newLinktext" >
           
            <input type="submit" name="submit" value="save" />
            <a href="/vue"> abbrechen</a>

        </div>

    </form>

</body>
</html>