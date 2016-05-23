<?php include('includes/header.php'); ?>
<?php include('Functions/select_locations.php'); ?>
<?php include('Functions/select_goods.php'); ?>
<?php include('Functions/select_tasks.php'); ?>
<main>
    <div class="blue-grey darken-3 white-text" id="routes">
        <div id="menu">
            <h4>Tasks <a class='dropdown-button btn right' href='#' data-activates='dropdown2'><i class="material-icons">settings</i></a></h4>
            <ul id='dropdown2' class='dropdown-content'>
                <li><a href="#!">Delete All</a></li>
                <li><a href="#!">two</a></li>
                <li class="divider"></li>
                <li><a href="#!">three</a></li>
            </ul>
            <a class="modal-trigger waves-effect waves-light btn red" href="#modal1">New Task</a>
            <a class="modal-trigger waves-effect waves-light btn" href="#modal2">Optimize</a>
            <div class="collection blue-grey darken-4">
                <?php
                foreach ($tasks->array as $task) {
                    echo "<a href='#' class='collection-item'>TS-00{$task['orderid']}<span class='badge'></span></a>";
                }
                ?>

            </div>
        </div>
    </div>
    <div id="googleMap"></div>
</main>

<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
        <center><h4>New Task - T001</h4></center>
        <form action="Functions/insert_task.php" method="post">
            <div class="row">
                <div class="col s12">
                    <div class="row">
                        <div class="input-field col m6">
                            <select name="goods">
                                <option value="" disabled selected>Goods</option>
                                <?php
                                foreach ($containers->array as $container) {
                                    echo "<option value='{$container['idcontainers']}'>GOODS - {$container['idcontainers']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="input-field col m6">
                            <input type="number" id="loadAmount" name="loadAmount">
                            <label for="loadAmount">Load Amount</label>
                        </div>
                        <div class="input-field col m6">
                            <select name="origin">
                                <option value="" disabled selected>Pick up location</option>
                                <?php
                                foreach ($stops->array as $stop) {
                                    echo "<option value='{$stop['idstop']} {$stop['locationname']}'>{$stop['locationname']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="input-field col m6">
                            <select name="destination">
                                <option value="" disabled selected>Delivery location</option>
                                <?php
                                foreach ($stops->array as $stop) {
                                    echo "<option value='{$stop['idstop']} {$stop['locationname']}'>{$stop['locationname']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <div class="text-center">
                <button type="submit" class=" modal-action modal-close waves-effect waves-green btn"><i class="material-icons left">add_circle</i>Add new task</button>
            </div>
        </div>
    </form>
</div>

<!-- Modal Structure -->
<div id="modal2" class="modal modal-fixed-footer">
    <div class="modal-content">
        <center><h4>Optimize</h4></center>
        <form action="Functions/insert_report.php" method="post">
            <div class="row">
                <div class="input-field col s12">
                    <input id="optimname" type="text" name="optimname">
                    <label for="optimname">Save Report As</label>
                </div>
                <div class="input-field col s12">
                    <textarea id="optimdesc" name="optimdesc" class="materialize-textarea"></textarea>
                    <label for="optimdesc">Description</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <div class="text-center">
                <button type="submit" class=" modal-action modal-close waves-effect waves-green btn"><i class="material-icons left">add_circle</i>Add new task</button>
            </div>
        </div>
    </form>
</div>


<!--Google maps API-->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZXB3DMls7nIoTpVeC2PjLy4dQmjPAe0E&callback=initialize"
type="text/javascript"></script>
<script>
//initialize google maps
var waypoint = <?=json_encode($stops->array);?>;
function initialize() {
    var markerArray = [];
    // Instantiate a directions service.
    var directionsService = new google.maps.DirectionsService;

    //map prpoerty set to PELINDO and TPKS locations
    var mapProp = {
        center:new google.maps.LatLng(-7.207069000596542, 112.72695779800415),
        zoom:8,
        mapTypeId:google.maps.MapTypeId.HYBRID,
        draggable:true
    };

    //initialize google maps
    var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

    // Create a renderer for directions and bind it to the map.
    var directionsDisplay = new google.maps.DirectionsRenderer({map: map});

    // Instantiate an info window to hold step text.
    var stepDisplay = new google.maps.InfoWindow;

    calculateAndDisplayRoute(directionsDisplay, directionsService, markerArray, stepDisplay, map);

    function calculateAndDisplayRoute(directionsDisplay, directionsService, markerArray, stepDisplay, map) {
        var wypoint = [];
        for (var i = 1; i < waypoint.length-1; i++) {
            wypoint.push({
                location: new google.maps.LatLng(waypoint[i].lat,waypoint[i].lang)}
            );
        }
        // First, remove any existing markers from the map.
        for (var i = 0; i < markerArray.length; i++) {
            markerArray[i].setMap(null);
        }

        // Retrieve the start and end locations and create a DirectionsRequest using
        // WALKING directions.
        directionsService.route({
            origin: new google.maps.LatLng(waypoint[0].lat, waypoint[0].lang),
            destination: new google.maps.LatLng(waypoint[waypoint.length-1].lat, waypoint[waypoint.length-1].lang),
            waypoints: wypoint,
            travelMode: google.maps.TravelMode.WALKING
        }, function(response, status) {
            // Route the directions and pass the response to a function to create
            // markers for each step.
            if (status === google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
                // showSteps(response, markerArray, stepDisplay, map);
            } else {
                window.alert('Directions request failed due to ' + status);
            }
        });
    }

    function showSteps(directionResult, markerArray, stepDisplay, map) {
        // For each step, place a marker, and add the text to the marker's infowindow.
        // Also attach the marker to an array so we can keep track of it and remove it
        // when calculating new routes.
        var myRoute = directionResult.routes[0].legs[0];
        for (var i = 0; i < myRoute.steps.length; i++) {
            var marker = markerArray[i] = markerArray[i] || new google.maps.Marker;
            marker.setMap(map);
            marker.setTitle(waypoint[i].locationame);
            marker.setPosition(myRoute.steps[i].start_location);
            // attachInstructionText(stepDisplay, marker, myRoute.steps[i].instructions, map);
        }
    }

    function attachInstructionText(stepDisplay, marker, text, map) {
        google.maps.event.addListener(marker, 'click', function() {
            // Open an info window when the marker is clicked on, containing the text
            // of the step.
            stepDisplay.setContent(text);
            stepDisplay.open(map, marker);
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
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });
    $('select').material_select();
    $('.dropdown-button').dropdown({
        belowOrigin: true, // Displays dropdown below the button
        alignment: 'right' // Displays dropdown with edge aligned to the left of button
    }
);
});
</script>
</body>

</html>
