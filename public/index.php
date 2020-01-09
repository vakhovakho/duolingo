<?php
    require('../routes.php');
    require('../helpers.php');
    require('../connection.php');
    
    $referer = null;
    if(isset($_SERVER['HTTP_REFERER'])) {
        $refererSegment1 = explode("/", parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH))[1];
        if(!empty($refererSegment1)) {
            $referer = $refererSegment1;
        }
    }

    require('../controllers/' . $file . '.php');
    require('../views/layout.php');
?>

