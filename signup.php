<?php
    session_start();
    include "includes/config.php";
    include "includes/header.php";
?>
    <link rel="stylesheet" type="text/css" media="screen" href="css/index.css" />
    <title>Publish SRM</title>
</head>
<body class="deep-purple lighten-5">

    <?php include "includes/topbar.php"; ?>

    <ul class="sidenav" id="mobile-demo">
        <li><a href="publish.php">Publish</a></li>
        <div class="divider"></div>
        <li><a href="myevents.php">My Events</a></li>
        <div class="divider"></div>
        <li><a href="signup.php">Sign up</a></li>
        <li><a href="login.php">Log in</a></li>
    </ul>

    <div class="center">
        <div class="container" style="text-align: left;">
            <div class="card-panel">
                <span class="teal-text text-darken-2 center login-plate">
                    <p class="header">Sign Up</p>
                    <span class="wen-error"><?php if(isset($_SESSION['error'])){echo $_SESSION['error']; unset($_SESSION['error']);}?></span>
                </span>
            </div>
        </div>
    </div>

    <div class="center">
        <div class="container" style="text-align: left;">
            <div class="card-panel">
                <span class="blue-text text-darken-2">
                    <form action="scripts/signup_prc.php" method="POST">
                        <div class="input-field col s12">
                            <input name="name" id="name" type="text" class="validate">
                            <label for="name">Name</label>
                        </div>
                        <div class="input-field col s12">
                            <input name="email" id="email" type="email" class="validate">
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field col s12">
                            <input name="phno" id="phno" type="number" class="validate">
                            <label for="phno">Mobile no.</label>
                        </div>
                        <div class="input-field col s12">
                            <input name="pwd" id="pwd" type="password" class="validate">
                            <label for="pwd">Password</label>
                        </div>
                        <div class="input-field col s12">
                            <input name="cpwd" id="cpwd" type="password" class="validate">
                            <label for="cpwd">Remember your password?</label>
                        </div>
                        <div class="center">
                            <div class="container">
                                <input name="finished" type="submit" value="Finished?">
                            </div>
                        </div>
                    </form>
                </span>
            </div>
        </div>
    </div>

    <div class="center">
        <div class="container" style="text-align: left;">
            <div class="card-panel">
                <span class="teal-text text-darken-2 center login-plate">
                    <p><a class="red-text signup-flag" href="login.php">Already have a publisher account?</a></p>
                </span>
            </div>
        </div>
    </div>

    <?php include "includes/footer.php"; ?>

    
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