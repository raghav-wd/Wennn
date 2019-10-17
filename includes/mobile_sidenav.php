<ul class="sidenav" id="mobile-demo">
    <li><a href="home.php"><b>Home</b></a></li>
    <div class="divider"></div>
    <li><a href="publish.php">Publish</a></li>
    <div class="divider"></div>
    <li><a href="myevents.php">My Events</a></li>
    <div class="divider"></div>
    <li><a href="signup.php">Sign up</a></li>
    <li><a href="login.php">Log in</a></li>
    <?php if(isset($_SESSION['uniqid'])){
                        echo "<div class='divider'></div>
                        <li class='amber darken-4'><a class=' white-text' href='includes/logout.php'>Logout</a></li>";
    };?>
</ul>