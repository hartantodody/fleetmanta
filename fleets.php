<?php include('includes/header.php'); ?>
<?php include('Functions/select_trucks.php'); ?>
<main>
    <div class="row">
        <div class="col s12">

            <div class="card">
                <div class="card-content blue-grey darken-1">
                    <span class="card-title white-text">Fleet List</span>
                </div>
                <div class="card-content">
                    <table class="striped highlight">
                        <thead>
                            <tr>
                                <th data-field="id">No. Seri</th>
                                <th data-field="jenis">Jenis Angkutan</th>
                                <th data-field="kapasitas">Kapasitas</th>
                                <th data-field="cost">Cost/km</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($trucks->array as $truck) {
                                    echo
                                    "<tr>
                                            <td>TR-00{$truck['idtrucks']}</td>
                                            <td>{$truck['jenis_angkutan']}</td>
                                            <td>{$truck['capacity']}</td>
                                            <td>{$truck['cost/km']}</td>
                                    </tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--Modal trigger-->
        <a class="btn-floating btn-large waves-effect waves-light teal modal-trigger" id="addFleet" href="#modal1"><i class="material-icons">add</i></a>
        <!-- Modal Structure -->
        <div id="modal1" class="modal modal-fixed-footer">
            <div class="modal-content">
                <center><h4>Vehicle Details</h4></center>
                <div class="row">
                    <form action="Functions/insert_truck.php" method="post" class="col s12">
                        <div class="row">
                            <div class="col m6">
                                <div class="row">
                                <div class="input-field col s12">
                                    <input id="name" name="name" type="text">
                                    <label for="name">Vehicle Name</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="capacity" name="capacity" type="number">
                                    <label for="capacity">Capacity</label>
                                </div>
                            </div>
                        </div>
                        <div class="col m6">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="load" name="load" type="text">
                                    <label for="load">Load Type</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="cost" name="cost" type="number">
                                    <label for="cost">Cost Per Km (Rp)</label>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="modal-footer">
            <div class="text-center">
                <button type="submit" class=" modal-action modal-close waves-effect waves-green btn"><i class="material-icons left">add_circle</i> Add new vehicle </buttons>
            </div>
        </div>
    </form>
    </div>
</div>
</main>
<?php include('includes/scripts.php'); ?>
<script>
$(document).ready(function(){
    $(".button-collapse").sideNav();
    $('.modal-trigger').leanModal();
    $('select').material_select();
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });
    $( ".collapsible-header" ).click(function() {
        if ($(this).find(".material-icons.right").css( "transform" ) == 'none' ){
            $(this).find(".material-icons.right").css("transform","rotate(90deg)");
        } else {
            $(this).find(".material-icons.right").css("transform","" );
        }
    });
    // $('#menu .row').pushpin({ top: $('#menu').offset().top });
})
</script>
</body>

</html>
