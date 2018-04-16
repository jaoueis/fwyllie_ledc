<?php
session_start();
require("connection.php");
if (isset($_SESSION["user_id"])) {
    if (isset($_GET["caller_id"])) {
        if ($_GET["caller_id"] == "deleteUser" && isset($_GET["id"])) {
            $id        = $_GET["id"];
            $delstring = "DELETE FROM admin_group WHERE user_id = '{$id}'";
            $delquery  = mysqli_query($link, $delstring);
            mysqli_close($link);
            header("Location: index.php");
        } else if ($_GET["caller_id"] == "deleteCareer" && isset($_GET["id"])) {
            $id        = $_GET["id"];
            $delstring = "DELETE FROM careers WHERE career_id = {$id}";
            $delquery  = mysqli_query($link, $delstring);
            mysqli_close($link);
            header("Location: cms_career.php");
        } else if ($_GET["caller_id"] == "deleteLifestyle" && isset($_GET["id"])) {
            $id        = $_GET["id"];
            $delstring = "DELETE FROM lifestyle WHERE lifestyle_id = {$id}";
            $delquery  = mysqli_query($link, $delstring);
            mysqli_close($link);
            header("Location: cms_lifestyle.php");
        } else if ($_GET["caller_id"] == "deleteCompany" && isset($_GET["id"])) {
            $id        = $_GET["id"];
            $delstring = "DELETE FROM company_info WHERE company_id = {$id}";
            $delquery  = mysqli_query($link, $delstring);
            mysqli_close($link);
            header("Location: cms_company.php");
        } else{
            header("Location: index.php");
            exit;
        }
    } else {
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: login.php");
    exit;
}