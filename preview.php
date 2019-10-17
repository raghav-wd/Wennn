<?php
    session_start();
    include "includes/config.php";
    include "includes/header.php";
    if(isset($_SESSION['uniqid'])){
    //access granted only to publishers;
}
else {
    header("Location: login.php");
};
?>
<!DOCTYPE <!DOCTYPE html>
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
<?php
$event_title = $_SESSION['event_title'] = $_POST['event_title'];
$event_date = $_SESSION['event_date'] = $_POST['event_date'];
$c_header = $_SESSION['c_header'] = $_POST['c_header'];
$event_details = $_SESSION['event_details'] = $_POST['event_details'];

if(isset($_POST['chip_text_1']))
$chip_text_1 = $_SESSION['chip_text_1'] = $_POST['chip_text_1'];
if(isset($_POST['chip_text_2']))
$chip_text_2 = $_SESSION['chip_text_2'] = $_POST['chip_text_2'];
if(isset($_POST['chip_text_3']))
$chip_text_3 = $_SESSION['chip_text_3'] = $_POST['chip_text_3'];
if(isset($_POST['chip_text_4']))
$chip_text_4 = $_SESSION['chip_text_4'] = $_POST['chip_text_4'];

if(($_FILES['poster']['size']) > 1){
$poster = $_FILES['poster'];
$poster_ext =  explode('.', $poster['name'])[1];
$poster_uniqid = uniqid().".".$poster_ext;
$_SESSION['poster_uniqid'] = $poster_uniqid;
$poster_dir = "posters/".$poster_uniqid;
// $image = imagecreatefromjpeg($poster['tmp_name']);
// imagejpeg($image, $poster_dir, '65');
compress_image($poster['tmp_name'], $poster_dir, $poster_ext, '60');
// move_uploaded_file($poster['tmp_name'], $poster_dir);
}
else $_SESSION['poster_uniqid'] = uniqid(); //helps in toggling in text or poster view

function compress_image($source_url, $destination_url, $extension,  $quality) {
        if($extension == 'jpeg' || $extension == 'jpg')
        {
            $image = imagecreatefromjpeg($source_url);
            imagejpeg($image, $destination_url, $quality);
        }
        else
        move_uploaded_file($source_url, $destination_url);
    }

?>
<body>

    <?php include "includes/topbar.php"; ?>
    <?php include "includes/mobile_sidenav.php"; ?>

    

                <div class="center">
                    <div class="container" style="text-align: left;">
                        <form action="scripts/publish_prc.php" method="POST">
                            <?php if($_FILES['poster']['size'] > 1) echo "<div class='card medium'>
                                <div class='card-image waves-effect waves-block waves-light'>
                                    <img class='activator' src='".$poster_dir."'>";
                                    else echo "<div class='card small'>
                                <div class='card-image waves-effect waves-block waves-light'>"; ?>
                                </div>
                                <div class="card-content">
                                    <span class="card-title activator grey-text text-darken-4">
                                        <?php echo $event_title; ?>
                                        <br />
                                        <?php echo $event_date; ?>
                                        <i class="material-icons right">more_vert</i></span>
                                    <p><a href="#">
                                            <?php echo $c_header; ?></a></p>
                                </div>
                                <div class="card-reveal">
                                    <span class="card-title grey-text text-darken-4">
                                        <?php echo $event_title; ?><i class="material-icons right">close</i></span>
                                    <p>
                                        <?php echo $event_details; ?>
                                    </p>
                                    <p>
                                        <?php   if(isset($chip_text_1))
                                                    echo "<div class='chip'>&deg;"
                                                            .$chip_text_1.
                                                        "</div>";
                                                        if(isset($chip_text_2))
                                                    echo "<div class='chip'>&deg;"
                                                            .$chip_text_2.
                                                        "</div>";
                                                        if(isset($chip_text_3))
                                                    echo "<div class='chip'>&deg;"
                                                            .$chip_text_3.
                                                        "</div>";
                                                        if(isset($chip_text_4))
                                                    echo "<div class='chip'>&deg;"
                                                            .$chip_text_4.
                                                        "</div>";
                                            ?>
                                    </p>
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