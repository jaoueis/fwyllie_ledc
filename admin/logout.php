<?php
session_start();
require("connection.php");
$currentTime = date('Y-m-d H:i:s');
$updateTime = $link->query("UPDATE admin_group SET login_date = '$currentTime' WHERE user_id = '$_SESSION[user_id]'");
if (isset($_SESSION["user_id"])) {
    unset($_SESSION["user_id"]);
}
if (isset($_SESSION["user_name"])) {
    unset($_SESSION["user_name"]);
}

header("Location: login.php");
exit;