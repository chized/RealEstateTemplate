<?php

function limitWords($s, $limit=15) {
    return preg_replace('/((\w+\W*){'.($limit-1).'}(\w+))(.*)/', '${1}', $s);   
}
?>