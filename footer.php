<footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 copyright">

                Copyright &copy;
                All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a
                        href="https://colorlib.com" target="_blank">Stanislav Nikitin</a>

            </div>
            <div class="col-sm-6">
                <div class="social">
	                <?php
	                $socnet_options = libchurch_socnet_link_options();
	                foreach ($socnet_options as $socnet_item):?>
                        <a href="<?php echo $socnet_item['option_link'];?>"><i class="fa-brands <?php echo $socnet_item['option_select'];?> fa-xl" style="color: #ffffff;"></i></a>
	                <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
<script>
    function initialize() {
        var myOptions = {
            zoom: 16,
            center: new google.maps.LatLng(51.488966, -0.096777), //change the coordinates
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            scrollwheel: false,
            mapTypeControl: false,
            zoomControl: false,
            streetViewControl: false,
            styles: [{"elementType":"geometry","stylers":[{"color":"#f5f5f5"}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#616161"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#f5f5f5"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text.fill","stylers":[{"color":"#bdbdbd"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#eeeeee"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#e5e5e5"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#dadada"}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"color":"#616161"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"color":"#e5e5e5"}]},{"featureType":"transit.station","elementType":"geometry","stylers":[{"color":"#eeeeee"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#c9c9c9"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]}]
        }
        var img_icon = "<?php echo get_template_directory_uri() . '/assets/img/map-marker.png'?>"
        var map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);
        var marker = new google.maps.Marker({
            map: map,
            icon: img_icon,
            position: new google.maps.LatLng(51.488966, -0.096777) //change the coordinates
        });
        google.maps.event.addListener(marker, "click", function() {
            infowindow.open(map, marker);
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>


</html>