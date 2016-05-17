<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fleetmanta | Login</title>

    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="bower_components/Materialize/dist/css/materialize.min.css" media="screen,projection"/>
    <!--Csutom css-->
    <link rel="stylesheet" href="css/login.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
    <div class="wrapper">
        <div class="card blue-grey darken-4">
            <form action="index.html">
                <div class="row">
                    <div class="col s12">
                        <div class="row">
                            <div class="card-content white-text">
                                <center><span class="card-title">Register</span></center>
                                <div class="input-field col s12">
                                    <input id="name" type="text" class="validate">
                                    <label for="name">Name</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="email" type="email" class="validate">
                                    <label for="email">Email</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="password" type="password" class="validate">
                                    <label for="password">Password</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="confirmedPassword" type="password" class="validate">
                                    <label for="confirmedPassword">Confirmed Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <input type="submit" value="Register" class="waves-effect waves-light btn">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
