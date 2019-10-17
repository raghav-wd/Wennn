<?php
session_start();
if(isset($_SESSION['uniqid'])){
    //access granted only to publishers;
}
else {
    header("Location: login.php");
}
if(isset($_GET['reset'])){
    session_destroy();
    unset($_SESSION['reset']);
    header("Location: publish.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Publish SRM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/framework.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="css/index.css" />
    
</head>
<body>

    <?php include "includes/topbar.php"; ?>

    <?php include "includes/mobile_sidenav.php"; ?>
    
    <div class="center">
        <div class="container" style="text-align: left;">
            <div class="card medium">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="https://c.wallhere.com/photos/f7/59/anime_train_station_power_lines_clouds_traffic_lights_railway_crossing_utility_pole_artwork-260047.jpg!d">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">
                        Event Title : 
                        <br/>
                        Date : 
                        <i class="material-icons right">more_vert</i></span>
                    <p><a href="#">Here goes your Registration Url or Header</a></p>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Event Name<i class="material-icons right">close</i></span>
                    <p>Here is some more information about this product that is only revealed once clicked on.</p>
                </div>
            </div>

            <div class="row">
                <div class="col l12 s12 m5">
                    <form action="preview.php" method="POST" enctype="multipart/form-data">
                        <div class="card-panel yellow lighten-4">
                            <span class="black-text">
                                Event Title: <br />
                                <div class="input-field inline">
                                    <input name="event_title" id="event_title" type="text" class="validate" value="<?php if(isset($_SESSION['event_title'])) echo $_SESSION['event_title']; ?>">
                                </div><br />
                                Date : <br />
                                <input name="event_date" type="text" class="datepicker" value="<?php if(isset($_SESSION['event_date'])) echo $_SESSION['event_date']; ?>">
                                <!-- <div class="input-field inline">
                                    <input name="event_date" id="event_date" type="text" class="validate" placeholder="dd/mm/yy" value=">
                                </div>-->
                                <br/>
                                Registration Link/Header :<br />
                                <div class="input-field inline">
                                    <input name="c_header" id="c_header" type="text" class="validate" value="<?php if(isset($_SESSION['c_header'])) echo $_SESSION['c_header']; ?>">
                                </div><br />
                                Detailed Information :
                                <div class="row">
                                    <div class="col s12 m12 l12">
                                        <form>
                                              <div class="input-field col s12">
                                                  <textarea name="event_details" id="editor1" rows="10" cols="80">
                                                    <?php if(isset($_SESSION['event_details'])) echo $_SESSION['event_details']; ?>
                                                 </textarea>
                                              </div>
                                        </form>
                                    </div>
                                </div>
                                

                                <!--  -->
                                <input type="text" name="event-tags" onkeyup="etag(this)" id="event-tags" placeholder="event-tags" />
                                <div class="chips-container">
                                </div>

                                <script> // creates chip input max-limit 4
                                    var chip_b = document.querySelector(".chips-container");
                                    var i = 1;
                                    
                                    function etag(tag_v) {
                                        var ftag = document.querySelector('#event-tags');
                                        var text = tag_v.value;
                                        var len = text.length;
                                        if (text.charAt(len - 1) == ' ')//checks if last char entered is space and then makes the text
                                        {
                                            chip_b.innerHTML += "<div class='chip'><span class='chip-text'><input type='text' name='chip_text_" + i + "' value='" + text + "' style='width: 55px;border:none;padding-left:6px;font-size: 12px;'/></span><i onclick='dec_close()' class='close'>&times;</i></div>";
                                            tag_v.value = "";
                                            i++;
                                        }
                                    }
                                    function dec_close() {
                                        i--;
                                    }
                                </script>

                                <!-- Switch --><br/>
                                <div class="switch">
                                    <label>
                                    
                                    <input class="nposter" name="nposter" type="checkbox"> <!--need poster?-->
                                    <span class="lever"></span>
                                    Without Poster
                                    </label>
                                </div><br/>

                                <script>document.querySelector('.lever').addEventListener("click", function(){document.querySelector('.file-field').classList.toggle('wen-hide');})</script>
                                    
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>Poster</span>
                                        <input name="poster" type="file">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input placeholder="Upload a poster" name="poster_path" class="file-path validate" type="text">
                                    </div>
                                </div>
                                <div class="center">
                                    <div class="container">
                                        <input type="submit" value="preview">
                                    </div>
                                    <br/>
                                    <form action="publish.php" method="GET">
                                        <input id="reset" class="deep-orange accent-3" type="submit" name="reset" value="Reset">
                                    </form>
                                </div>
                            </span>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <?php include "includes/footer.php"; ?>

    
    <script src="js/index.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
    <script>
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('editor1', {
          uiColor: '#e57373'
        });
    </script>
    <script>


        $(document).ready(function () {
            $('.tabs').tabs();

            $('.sidenav').sidenav();

            $('.datepicker').datepicker({
                    format: 'dd mm yy'
                });

            $('input.autocomplete').autocomplete({
                data: {
                    //CS Fields
                    "Machine Learning": null,
                    "Artificial Intelligence": null,
                    "Web Development": null,
                    "Web Dev": null,
                    "Automotive": null,
                    //Coding Languages
                    "Block Chain": null,
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
                    "Android Studio": null,
                    "Autocad": null,
                    "Blender": null,
                    "Maya": null,
                    "Illustrator": null,
                    "Photoshop": null,
                    "Premier Pro": null,
                    "After Effects": null,

                },
            });
        });


    </script>
</body>
</html>