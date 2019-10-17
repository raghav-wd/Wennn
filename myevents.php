<?php
session_start();
if(isset($_SESSION['uniqid'])){
    //access granted only to publishers;
}
else {
    header("Location: login.php");
}
include "includes/config.php";
include "includes/header.php";


?>
    <link rel="stylesheet" type="text/css" media="screen" href="css/index.css" />
</head>
<body>

    <?php include "includes/topbar.php"; ?>
    
    <?php include "includes/mobile_sidenav.php"; ?>

    <?php
    $u_uniqid = $_SESSION['uniqid'];
    $sql = "SELECT * FROM posts where uniqid='$u_uniqid'";
    $res = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($res);
    
    for($j =1; $j<=$num_rows; $j++)
                {
                    $row = mysqli_fetch_assoc($res);
                    if($row['event_title'] != "")
                    {
                        
            
                       if(!strpos($row['event_poster'], "."))
                        echo  "<div class='center'>
                                        <div class='container' style='text-align: left;'>
                                            <div class='card small'>
                                                <div class='card-image waves-effect waves-block waves-light'>
                                                </div>";
                        else 
                            echo       "<div class='center'>
                                        <div class='container' style='text-align: left;'>
                                            <div class='card medium'>
                                                <div class='card-image waves-effect waves-block waves-light'>
                                                    <img class='activator' src='posters/".$row['event_poster']."'>
                                                </div>";
                                        echo    "<div class='card-content'>
                                                    <span class='card-title activator grey-text text-darken-4'>"
                                                        .$row['event_title']."
                                                        <br/>"
                                                        .$row['event_date']."
                                                        <i class='material-icons right'>more_vert</i>
                                                    </span>
                                                    <p><a href='".$row['event_url']."'>".$row['event_url']."</a></p>
                                                </div>
                                                <div class='card-reveal'>
                                                    <span class='card-title grey-text text-darken-4'>".$row['event_title']."<i class='material-icons right'>close</i></span>
                                                    <p>".$row['event_details']."</p>
                                                    <p>";
                                                                    if(isset($row['chip_text_1']))
                                                                echo "<div class='chip'>&deg;"
                                                                        .$row['chip_text_1'].
                                                                    "</div>";
                                                                    if(isset($row['chip_text_2']))
                                                                echo "<div class='chip'>&deg;"
                                                                        .$row['chip_text_2'].
                                                                    "</div>";
                                                                    if(isset($row['chip_text_3']))
                                                                echo "<div class='chip'>&deg;"
                                                                        .$row['chip_text_3'].
                                                                    "</div>";
                                                                    if(isset($row['chip_text_4']))
                                                                echo "<div class='chip'>&deg;"
                                                                        .$row['chip_text_4'].
                                                                    "</div>";

//next sending the event poster to delete.php as an id 
                                                echo    "</p>
                                                    <p><form action='scripts/delete.php' method='GET'><input style='display: none;' name='event_poster' value='".$row['event_poster']."' type='text'><input value='Delete' type='submit'></form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
                            
                    }
            }

    ?>
    

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