<?php

function redirecionar($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}