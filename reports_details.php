<?php
include('Functions/require.php');
$reportid = $_GET['reportid'];
if (!isset($reportid)) {
    header('Location: reports.php');
    die();
}
include('includes/header.php');
include('Functions/select_reports_details.php')
?>
    <main>
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content blue-grey darken-1">
                        <span class="card-title white-text">R-00<?php echo $reportid; ?></span>
                    </div>
                    <div class="card-content">
                        
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
