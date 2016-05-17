<?php include('includes/header.php'); ?>
<main>
    <div class="blue-grey darken-3 white-text" id="routes">
        <div id="menu">
            <h4>Locations <a class='dropdown-button btn right' href='#' data-activates='dropdown2'><i class="material-icons">settings</i></a></h4>
            <ul id='dropdown2' class='dropdown-content'>
                <li><a href="#!">one</a></li>
                <li><a href="#!">two</a></li>
                <li class="divider"></li>
                <li><a href="#!">three</a></li>
            </ul>
            <a class="waves-effect waves-light btn red" id="addLocation">Add Location</a>
            <a class="waves-effect waves-light btn" id="showLocation">Show All Location</a>
            <div class="row">
                <div class="col s6">
                    <p>
                        <input name="group1" type="radio" id="test7" />
                        <label for="test7">Stations</label>
                    </p>
                </div>
                <div class="col s6">
                    <p>
                        <input name="group1" type="radio" id="test6" />
                        <label for="test6">Depots</label>
                    </p>
                </div>
            </div>

            <div class="collection blue-grey darken-4">
                <a href="#!" class="collection-item">Alan<span class="badge">1</span></a>
            </div>
        </div>
    </div>
    <div id="googleMap"></div>
</main>

<!-- Modal Trigger -->
<!-- <a class="waves-effect waves-light btn modal-trigger" href="#modal1" id="buttonTimeline">Open Timeline</a> -->

<!-- Modal Structure -->
<div id="modal1" class="modal bottom-sheet">
    <div class="modal-content">
        <h4>Timeline</h4>
        <div class="row">
            <div class="col l12">
                <div class="card">
                    <div class="card-content">
                        <div class="hide-overflow">
                            <div id="timeline" height="auto"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Exit</a>
    </div>
</div>

<!--Google maps API-->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZXB3DMls7nIoTpVeC2PjLy4dQmjPAe0E&callback=initialize"
type="text/javascript"></script>
<script>
//initialize google maps
function initialize() {

    //map prpoerty set to PELINDO and TPKS locations
    var mapProp = {
        center:new google.maps.LatLng(-7.207069000596542, 112.72695779800415),
        zoom:14,
        mapTypeId:google.maps.MapTypeId.HYBRID,
        draggable:true
    };

    //initialize google maps
    var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

    //add listener to add marker
    map.addListener("click", function(evt){
        placeMarker(evt.latLng);
    });

    //add marker function
    function placeMarker(location) {
        var marker = new google.maps.Marker({
            position: location,
            map: map,
            draggable:true
        });
    }
}

</script>

<?php include('includes/scripts.php'); ?>
<script>
$(document).ready(function(){
    $(".button-collapse").sideNav();
    $('.collapsible').collapsible();

    $( ".collapsible-header" ).click(function() {
        if ($(this).find(".material-icons.right").css( "transform" ) == 'none' ){
            $(this).find(".material-icons.right").css("transform","rotate(90deg)");
        } else {
            $(this).find(".material-icons.right").css("transform","" );
        }
    });
    $('.modal-trigger').leanModal();

    $('#toggleMap').click(function() {
        $('#routes').toggleClass("expand adjust-sidenav");
    });
    $('select').material_select();
    $('.dropdown-button').dropdown({
        belowOrigin: true, // Displays dropdown below the button
        alignment: 'right' // Displays dropdown with edge aligned to the left of button
    });
    $('#showLocation').click(function(){
        $('input[type="radio"]').prop('checked', false);
    });
});
</script>
</body>

</html>
