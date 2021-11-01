<?php
//simplepage redirect
function redirect($page){
    header('location: ' . URLROOT . '/' . $page);
}

?>