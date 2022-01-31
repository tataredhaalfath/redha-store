<?php

if ($isi == "belanja/list" || $isi == "belanja/checkout" || $isi == "registrasi/list") {

    require_once('head.php');
    require_once('content.php');
    require_once('footer.php');
} else {
    require_once('head.php');
    require_once('nav.php');
    require_once('content.php');
    require_once('footer.php');
}
