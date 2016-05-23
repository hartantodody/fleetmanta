<?php include('includes/header.php'); ?>
<?php include('Functions/require.php'); ?>
<?php include('Functions/select_goods.php'); ?>
<main>
    <div class="row">
        <div class="col s12">

            <div class="card">
                <div class="card-content blue-grey darken-1">
                    <span class="card-title white-text">Containers</span>
                </div>
                <div class="card-content">
                    <table class="striped highlight">
                        <thead>
                            <tr>
                                <th data-field="id">ID. Container</th>
                                <th data-field="width">Width</th>
                                <th data-field="length">Length</th>
                                <th data-field="height">Height</th>
                                <th data-field="weight">Weight</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($containers->array as $container) {
                                    echo
                                    "<tr>
                                            <td>GOODS-{$container['idcontainers']}</td>
                                            <td>{$container['width']}</td>
                                            <td>{$container['length']}</td>
                                            <td>{$container['height']}</td>
                                            <td>{$container['weight']}</td>
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
                <h4>Vehicle Details</h4>
                <div class="row">
                    <form action="Functions/insert_good.php" method="post" class="col s12">
                        <div class="row">
                            <div class="col m6">
                                <div class="row">
                                <div class="input-field col s12">
                                    <input id="width" name="width" type="text">
                                    <label for="width">Width</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="length" name="length" type="number">
                                    <label for="length">Length</label>
                                </div>
                            </div>
                        </div>
                        <div class="col m6">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="height" name="height" type="text">
                                    <label for="height">Height</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="weight" name="weight" type="number">
                                    <label for="cost">Weight</label>
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
