 
     <!-- footer -->
     <div class="footers">
      <div class="footer">
      <?php
        $sql = "SELECT icon, link_url, link_text, teaser_text from footer";
        $results = mysqli_query($connect, $sql);
        ?>
        <div class="footer-logo"  >
          <img src="./images/logo.png" class="logo-f">
        </div>

        <div class="navbar">
            <ul>
              <li>
                  <?php
                      foreach($results as $footer){
                    ?>
                        <a href="<?php echo $footer['link_url']; ?>"><?php echo $footer['link_text']; ?></a>
                        <?php  
                    }
                    ?>
                </li>      
            </ul>
         </div>
            <div class="recht">
                <p>
                    <?php
                      foreach($results as $footer){
                        echo $footer['teaser_text'];
                    }
                    ?>
                </p>
           </div>
 
      </div>
  </div>
  <!-- end of app id-->
</div>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>
                <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
    integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
    crossorigin=""></script>

    <script src="js/vue.js"></script>
    <script>
        var mymap = L.map('map').setView([50.108490, 8.668240], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '',
            maxZoom: 18,
        }).addTo(mymap);
        var marker = L.marker([50.108490, 8.668240]).addTo(mymap);
        marker.bindPopup("<b>Hello world!</b><br>Reservix GmbH befindet sich hier !.").openPopup();
    </script>
    </body>
</html>