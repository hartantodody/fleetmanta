<?php
include('Functions/require.php');
$reportid = $_GET['reportid'];
if (!isset($reportid)) {
    header('Location: reports.php');
    die();
}
include('includes/header.php');
?>
    <main>
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content blue-grey darken-1">
                        <span class="card-title white-text">R-00<?php echo $reportid; ?></span>
                    </div>
                    <div class="card-content">
                        <table class="striped highlight">
                            <thead>
                                <tr>
                                    <th data-field="desc">Routes</th>
                                    <th data-field="idorder">ID. Order</th>
                                    <th data-field="qty">Load</th>
                                    <th data-field="dist">Distance</th>
                                    <th data-field="dist">Trucks</th>
                                    <th data-field="dist">Cost</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                include('Functions/select_reports_details.php');
                                    foreach ($orders->array as $order) {
                                        echo "
                                        <tr>
                                            <td>{$order['description']}</td>
                                            <td>OR-TS-00{$order['orderid']}</td>
                                            <td>{$order['quantity']}</td>
                                            <td>{$order['distance_in_m']} m</td>
                                            <td>TR-001</td>
                                            <td>Rp 3657</td>
                                        </tr>
                                        ";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include('includes/scripts.php');?>
    <script>
        $(document).ready(function(){
            $(".button-collapse").sideNav();
            $( ".collapsible-header" ).click(function() {
                if ($(this).find(".material-icons.right").css( "transform" ) == "none" ){
                    $(this).find(".material-icons.right").css("transform","rotate(90deg)");
                } else {
                    $(this).find(".material-icons.right").css("transform","" );
                }
            });
        })
    </script>
</body>
</html>
