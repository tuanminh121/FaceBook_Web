<?php
if(!isset($_SESSION['isLoginOk'])) {
    header('Location: login.php');
}
function defaultImage($link) {
    return $link != null ? $link : 'assets/images/content-img.jpeg';
}

$userId = $_SESSION['isLoginOk'];
?>