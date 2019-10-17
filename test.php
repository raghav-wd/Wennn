
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#ff7043"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/framework.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"><!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Publish SRM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/framework.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="css/index.css" />
</head>
<body>

    
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper amber darken-4">
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <a href="index.php" class="brand-logo fantasy">Wen</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="index.php">Home</a></li>
                    <li><a href='includes/logout.php'>Logout</a></li>                </ul>
            </div>
        </nav>
    </div>
    228807<div class='center'>
        <div class='container' style='text-align: left;'>
            <form action='scripts/publish_prc.php' method='POST'>
                <div class='card small'>
                    <div class='card-image waves-effect waves-block waves-light'>
                        <!-- <img class='activator' src='posters/5c326ea9e98be.jpg'> -->
                    </div>
                    <div class='card-content'>
                        <span class='card-title activator grey-text text-darken-4'>
                        yumeno
                            <br />
                        11 01 19
                            <i class='material-icons right'>more_vert</i></span>
                        <p><a href='#'>
                            https://tinyurl.com/phpworksop</a></p>
                    </div>
                    <div class='card-reveal'>
                        <span class='card-title grey-text text-darken-4'>
                        yumeno<i class='material-icons right'>close</i></span>
                        <p>
                        donkey
                        </p>
                        <p><div class='chip'>&deg;kk </div></p>
                    </div>
                </div>                
                <div class="row">
                    <div class="col s12 m5">
                        <div class="card-panel yellow lighten-4">
                            <span class="white-text">
                                <input id="publish" type="submit" value="publish">
                                <a href="publish.php" class="btn waves-effect waves-teal light-green darken-1">Go Back</a>
                            </span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    
    <script src="js/index.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>


        $(document).ready(function () {
            $('.tabs').tabs();
            $('.sidenav').sidenav();
        });

        document.querySelector('#small').addEventListener("click", function () {
            document.getElementsByClassName("ps-card-container").classList.add("change");
        });


    </script>
</body>
</html>