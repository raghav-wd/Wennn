
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper amber darken-4">
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <a href="home.php" class="brand-logo fantasy">Wen</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="index.php">Home</a></li>
                    <?php if(isset($_SESSION['uniqid'])){
                        echo "<li><a href='includes/logout.php'>Logout</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </nav>
    </div>