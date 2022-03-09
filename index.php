<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$grid_clocks_folder = "grid_clocks";
$grid_clocks_image_paths = array_diff(scandir($grid_clocks_folder), array('.DS_Store','..', '.'));
shuffle($grid_clocks_image_paths);

$image_size = 84;

echo "<style>

body {
    background-color: #1c1c1c;
  }
.grid-container {
    display: grid;
    pointer-events: none;
}

@media (max-width: 1920px) {
    .grid-container {
        grid-template-columns: repeat(15, 1fr);
    }
}

@media (max-width: 1300px) {
    .grid-container {
        grid-template-columns: repeat(10, 1fr);
    }
}

@media (max-width: 870px) {
    .grid-container {
        grid-template-columns: repeat(6, 1fr);
    }
}

@media (max-width: 600px) {
    .grid-container {
        grid-template-columns: repeat(5, 1fr);
    }
}

.h".date("hi")."{
    filter: contrast(160%);
    filter: brightness(160%);
}
</style>";

echo date("hi");
echo "<div class='grid-container'>";
foreach ($grid_clocks_image_paths as $gc_image){
    $image_path = ("$grid_clocks_folder" . "/" . "$gc_image");
    $to_replace = array("hour", " ", "-128", ".png");
    $hours_mins = str_replace($to_replace, "", $gc_image);
    $hours_mins = explode("minute", $hours_mins);
    $hours = sprintf("%02d",$hours_mins[0]);
    $mins = sprintf("%02d",$hours_mins[1]);
    $class_name = "h".$hours.$mins;
    echo "<img class=$class_name src='$image_path' style='width:$image_size'px';height:$image_size'px';'>";
}
echo "</div>";
?>
<script>
function printTest(){
 $.ajax({
    console.log(result.abc);
 });
}

$(document).ready(function(){
 setInterval(printTest,5000);
});
</script>