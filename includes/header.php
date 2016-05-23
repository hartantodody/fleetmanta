<!DOCTYPE php>
<php>

<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php include('includes/styles.php') ?>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <header>
        <div class="navbar-fixed">
            <ul id="dropdown1" class="dropdown-content">
                <li><a href="#!"><i class="material-icons left">account_box</i> Profile</a></li>
                <li><a href="#!"><i class="material-icons left">power_settings_new</i>Logout</a></li>
            </ul>
            <nav class="blue-grey darken-1 adjust-sidenav">
                <div class="nav-wrapper">
                    <a href="#" class="brand-logo center hide-on-large-only">Fleetmanta</a>
                    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                    <ul class="hide-on-med-and-down" id="search">
                        <li class="col l12">
                            <form action="get">
                                <i class="material-icons">search</i>
                                <input id="first_name2" type="text" class="validate" placeholder="Search">
                            </form>
                        </li>
                    </ul>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="#" class="dropdown-button" data-activates="dropdown1"><i class="material-icons left">account_circle</i>John Doe</a></li>
                    </ul>
                    <ul class="side-nav" id="mobile-demo">
                        <li class="no-padding">
                            <ul class="collapsible" data-collapsible="accordion">
                                <li>
                                    <a class="collapsible-header waves-effect waves-teal" href="#!"><i class="material-icons left">dashboard</i>Dashboard <i class="material-icons right">chevron_right</i></a>
                                    <div class="collapsible-body">
                                        <ul>
                                            <li><a href="dashboard.php">Overview</a></li>
                                            <li><a href="#!">Routes</a></li>
                                            <li><a href="#!">Fleets</a></li>
                                            <li><a href="#!">Containers</a></li>
                                            <li><a href="#!">Drivers</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="no-padding">
                            <ul class="collapsible" data-collapsible="accordion">
                                <li>
                                    <a class="collapsible-header waves-effect waves-teal" href="#!"><i class="material-icons left">library_books</i>Reports <i class="material-icons right">chevron_right</i></a>
                                    <div class="collapsible-body">
                                        <ul>
                                            <li><a href="reports.php">Scheduling Reports</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li><a href="index.php"><i class="material-icons left">map</i> Routeplans</a></li>
                        <li><a href="locations.php"><i class="material-icons left">place</i> Locations</a></li>
                        <li><a href="fleets.php"><i class="material-icons left">local_shipping</i> Fleets</a></li>
                        <li><a href="containers.php"><i class="material-icons left">local_shipping</i> Containers</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="navbar-fixed" id="fixed2">
            <nav id="breadcrumbs" class="blue-grey">
                <div class="nav-wrapper">
                    <div class="col s12">
                        <a href="#!" class="breadcrumb">Dashboard</a>
                        <a href="#!" class="breadcrumb">Overview</a>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <ul id="slide-out" class="side-nav fixed blue-grey darken-2 white-text">
        <li><center><h4>Fleetmanta</h4></center></li>
        <li class="no-padding">
            <ul class="collapsible" data-collapsible="accordion">
                <li>
                    <a class="collapsible-header waves-effect waves-teal" href="#!"><i class="material-icons left">dashboard</i>Dashboard <i class="material-icons right">chevron_right</i></a>
                    <div class="collapsible-body blue-grey darken-1">
                        <ul>
                            <li><a href="dashboard.php">Overview</a></li>
                            <li><a href="#!">Routes</a></li>
                            <li><a href="#!">Fleets</a></li>
                            <li><a href="#!">Containers</a></li>
                            <li><a href="#!">Drivers</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
        <li class="no-padding">
            <ul class="collapsible" data-collapsible="accordion">
                <li>
                    <a class="collapsible-header waves-effect waves-teal" href="#!"><i class="material-icons left">library_books</i>Reports <i class="material-icons right">chevron_right</i></a>
                    <div class="collapsible-body blue-grey darken-1">
                        <ul>
                            <li><a href="reports.php">Scheduling Reports</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
        <li class="no-padding"><a href="index.php"><i class="material-icons left">map</i>Routeplans </a></li>
        <li class="no-padding"><a href="locations.php"><i class="material-icons left">place</i>Locations </a></li>
        <li class="no-padding"><a href="fleets.php"><i class="material-icons left">local_shipping</i>Fleets </a></li>
        <li class="no-padding"><a href="containers.php"><i class="material-icons left">local_shipping</i>Containers </a></li>
    </ul>
