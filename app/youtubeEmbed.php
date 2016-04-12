<?php
function youtubeEmbed($url) {
    parse_str($url, $output);
    $movieID = array_values($output)[0];
    return '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/'.$movieID.'" allowfullscreen></iframe>
    </div>';
   
}
