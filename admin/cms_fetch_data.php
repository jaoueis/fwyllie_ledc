<?php
header('Content-Type: application/json');
session_start();
require("session.php");
require("connection.php");
if (isset($_GET["content"])) {
    if ($_GET["content"] == "career") {
        if (isset($_GET["getData"])) {
            $id            = $_GET["getData"];
            $fetch_career = "SELECT * FROM careers c INNER JOIN company_info i ON i.company_id = c.company_id WHERE career_id = '$id'";
            $careers       = mysqli_query($link, $fetch_career);
            if ($careers) {
                $row = mysqli_fetch_array($careers);
                echo json_encode($row);
            }
        } else {
            header("Location: index.php");
            exit;
        }
    }
    if ($_GET["content"] == "lifestyle") {
        if (isset($_GET["getData"])) {
            $id            = $_GET["getData"];
            $fetch_lifestyle = "SELECT * FROM lifestyle WHERE lifestyle_id = '$id'";
            $lifestyle    = mysqli_query($link, $fetch_lifestyle);
            if ($lifestyle) {
                $row = mysqli_fetch_array($lifestyle);
                echo json_encode($row);
            }
        } else {
            header("Location: index.php");
            exit;
        }
    }
    if ($_GET["content"] == "company") {
        if (isset($_GET["getData"])) {
            $id            = $_GET["getData"];
            $fetch_company = "SELECT * FROM company_info WHERE company_id = '$id'";
            $company    = mysqli_query($link, $fetch_company);
            if ($company) {
                $row = mysqli_fetch_array($company);
                echo json_encode($row);
            }
        } else {
            header("Location: index.php");
            exit;
        }
    }
} else {
    header("Location: index.php");
    exit;
}