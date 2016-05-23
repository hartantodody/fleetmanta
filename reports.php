<?php include('includes/header.php'); ?>
<?php include('Functions/select_reports.php'); ?>
    <main>
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content blue-grey darken-1">
                        <span class="card-title white-text">Scheduling Reports</span>
                    </div>
                    <div class="card-content">
                        <table class="striped highlight">
                            <thead>
                                <tr>
                                    <th data-field="id">ID. Reports</th>
                                    <th data-field="name">Name</th>
                                    <th data-field="desc">Description</th>
                                    <th data-field="time">Created At</th>
                                    <th data-field="time">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    foreach ($reports->array as $report) {
                                        echo "
                                        <tr>
                                            <td>R-00{$report['reportid']}</td>
                                            <td>{$report['name']}</td>
                                            <td>{$report['description']}</td>
                                            <td>{$report['created_at']}</td>
                                            <td><a class='waves-effect waves-light btn' href='reports_details.php?reportid={$report['reportid']}'>View</a></td>
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

    <?php include('includes/scripts.php'); ?>
    <script>
        $(document).ready(function(){
            $(".button-collapse").sideNav();
            $( ".collapsible-header" ).click(function() {
                if ($(this).find(".material-icons.right").css( "transform" ) == 'none' ){
                    $(this).find(".material-icons.right").css("transform","rotate(90deg)");
                } else {
                    $(this).find(".material-icons.right").css("transform","" );
                }
            });
        })
    </script>
</body>

</html>
