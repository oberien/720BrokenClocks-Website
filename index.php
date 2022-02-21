<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$grid_clocks_folder = "grid_clocks";
$grid_clocks_image_paths = array_diff(scandir($grid_clocks_folder), array('.DS_Store','..', '.'));
shuffle($grid_clocks_image_paths);

$image_size = 84;

echo "<style>
.grid-container {
    display: grid;
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


</style>";

echo "<div class='grid-container'>";
foreach ($grid_clocks_image_paths as $gc_image){
    $image_path = ("$grid_clocks_folder" . "/" . "$gc_image");
    echo "<img class='grid-clock' src='$image_path' style='width:$image_size'px';height:$image_size'px';'>";
}
echo "</div>";