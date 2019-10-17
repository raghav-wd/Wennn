<?php
    session_start();
    include "includes/config.php";
    include "includes/header.php";
?>
    <link rel="stylesheet" type="text/css" media="screen" href="css/index.css" />
    <title>Wen | Find upcoming events</title>
</head>
<body onload="a()">

     <form action="home.php" method="GET">
        <?php 
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $sql = "SELECT * FROM posts WHERE event_poster='$id'";
                $res = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($res);
                $d = $row['event_date'];
                $d = str_replace(" ", "-", $d);

                $dc = $d;
                $mY = substr($dc, 6);
                $dc = strrev($dc);
                $mD = substr($dc, 6);
                $mD = strrev($mD);
                $dc = substr($dc, 3);
                $dc = strrev($dc);
                $mM = substr($dc, 3);

                if($d{0} == '0')
                {
                    $d = substr($d, 1);
                    $d = strrev($d);
                    $d = substr($d, 3);
                    $d = strrev($d);
                }
                else {
                    $d = strrev($d);
                    $d = substr($d, 3);
                    $d = strrev($d);
                }
                echo "<script>
                        function a() {
                        setTimeout(function() {
                            var offset = document.getElementById('".$id."').offsetTop;
                            window.scrollTo(0, offset);
                        }, 1000);
                        
                        }
                    </script>";
            }
        ?>
    </form>

    <!--Extended Navbar with tabs-->
    <nav class="nav-extended amber darken-4">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo fantasy">Wen</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="myevents.php">My Events</a></li>
                <li><a href="publish.php">Publish</a></li>
            </ul>
        </div>
        <div class="nav-content amber darken-4">
            <ul class="tabs tabs-transparent">
                <li class="tab"><a href='#search'>Search</a></li>
                <?php
                $tot_days = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
                $today = date('j');
                $mth = date('m');
                $year = date('y');
                $num_mth = 0;

                    for($i = $today-1; $i<= $tot_days; $i++) //creates a callender
                    {
                    if($i >= 10){
                         $sql = "SELECT * FROM posts WHERE event_date LIKE '$i"."_".$mth."%"."$year"."'";
                    }
                    else {
                        $sql = "SELECT * FROM posts WHERE event_date LIKE '0".$i."_".$mth."%"."$year"."'";
                    }
                    $res = mysqli_query($conn, $sql);
                    $num_arrays = mysqli_num_rows($res);

                    if($num_arrays != '0')
                    {
                            if(isset($_GET['id']) && $i == $mD && $mth == $mM && $year == $mY){
                            echo "<li class='tab'><a class='active' href='#test".$i."-".$mth."'>".$i."/".$mth."/".$year."</a></li>";
                            }
                            else if($i == $today && (!isset($_GET['id']))){
                            echo "<li class='tab'><a class='active' href='#test".$i."-".$mth."'>".$i."/".$mth."/".$year."</a></li>";
                            }
                            else {
                                echo "<li class='tab'><a href='#test".$i."-".$mth."'>".$i."/".$mth."/".$year."</a></li>";
                            }
                        }

                        if($i == $tot_days && $num_mth < 2){
                            $i = 0;  //parent for loop increments i to 1 so here i = 0
                            if($mth == '12'){$mth = '1'; $year = $year+1;}
                            else
                            {
                                $mth = $mth<10?"0".++$mth:++$mth;
                            }
                            // $a = 'false';
                            ++$num_mth;
                            $tot_days = cal_days_in_month(CAL_GREGORIAN, $mth, $year);
                        }
                }
                ?>
            </ul>
        </div>
    </nav>
    
    
    <?php 

        // $days_in_nxt_mth = 31-($tot_days-$today);
        $tot_days = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
        $today = date('j');
        $mth = date('m');
        $num_mth = 0;

        for($i = $today-1; $i<= $tot_days; $i++) //creates a callender
                    {
                    if($i >= 10){
                         $sql = "SELECT * FROM posts WHERE event_date LIKE '$i"."_".$mth."%"."$year"."'";
                    }
                    else {
                        $sql = "SELECT * FROM posts WHERE event_date LIKE '0".$i."_".$mth."%"."$year"."'";
                    }
            $res = mysqli_query($conn, $sql);
            $num_arrays = mysqli_num_rows($res);

            if($num_arrays != '0')
            {
                echo "<div id='test".$i."-".$mth."' class='col s12'>";
                for($j = 1; $j<=$num_arrays; $j++)
                {
                    $row = mysqli_fetch_assoc($res);
                    if($row['event_title'] != "")
                    {
                        
            
                        if(!strpos($row['event_poster'], "."))
                        echo  "<div class='center'>
                                        <div class='container' style='text-align: left;'>
                                            <div id='".$row['event_poster']."' class='card small'>
                                                <div class='card-image waves-effect waves-block waves-light'>
                                                </div>";
                        else 
                            echo       "<div class='center'>
                                        <div class='container' style='text-align: left;'>
                                            <div id='".$row['event_poster']."' class='card medium'>
                                                <div class='card-image waves-effect waves-block waves-light'>
                                                    <img class='activator' src='posters/".$row['event_poster']."'>
                                                </div>";
                                        echo    "<div class='card-content'>
                                                    <span class='card-title activator grey-text text-darken-4'>"
                                                        .$row['event_title']."
                                                        <br/>"
                                                        .$row['event_date']."
                                                        <i class='material-icons right'>more_vert</i>";

                                        if(strpos($row['event_poster'], "."))echo "<a href='posters/".$row['event_poster']."' target='_blank'><i class='fa fa-expand right'></i></a>";
                                                    echo "<a href='whatsapp://send?text=wennn.xyz/home.php?id=".$row['event_poster']."'><i class='fa fa-share right'></i></a></span>
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

                                                echo    "</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
                            
                    }
                }
                echo "</div>";
            }
            if($i == $tot_days && $num_mth < 2){
                            $i = 0;  //parent for loop increments i to 1 so here i = 0
                            if($mth == '12'){$mth = '1'; $year = $year+1;}
                            else
                            {
                                $mth = $mth<10?"0".++$mth:++$mth;
                            }
                            // $a = 'false';
                            ++$num_mth;
                            $tot_days = cal_days_in_month(CAL_GREGORIAN, $mth, $year);
                        }
        }
    

        

    ?>

    <?php 
    // include "includes/home_header.php";
    ?>
    <?php include "includes/mobile_sidenav.php"; ?>

   

    <div id="search" style="padding: 10px 0 150px 0">
        <form action="searched.php" method="GET">
            <div class="container">
                <div class="input-field">
                    <i class="material-icons prefix">search</i>
                    <input name="search" type="text" id="autocomplete-input" class="autocomplete">
                    <label for="autocomplete-input">Search Here</label>
                </div>
            </div>
        </form><br />
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

            $('input.autocomplete').autocomplete({
                data: {
                    //CS Fields
                    "Artificial_Intelligence": null,
                    "Machine_Learning": null,
                    "Web_Development": null,
                    "Web_Dev": null,
                    "Automotive": null,
                    //Coding Languages
                    "Block_Chain": null,
                    "Python": null,
                    "Ruby": null,
                    "Android": null,
                    "C": null,
                    "C++": null,
                    "C#": null,
                    "Django": null,
                    "Java": null,
                    "Larvel": null,
                    "MongoDB": null,
                    "Ruby": null,
                    "Swift": null,
                    "": null,
                    //Softwares
                    "Android_Studio": null,
                    "Autocad": null,
                    "Blender": null,
                    "Maya": null,
                    "Illustrator": null,
                    "Photoshop": null,
                    "Premier_Pro": null,
                    "After_Effects": null,

                },
            });
        });

        document.querySelector('#small').addEventListener("click", function () {
            document.getElementsByClassName("ps-card-container").classList.add("change");
        });


    </script>
</body>
</html>