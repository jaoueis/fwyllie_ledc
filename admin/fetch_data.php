<?php
    header('Content-Type: application/json');
    require("connection.php");
    if (isset($_GET["data"])) {
        if ($_GET["data"] == "career") {
            $fetch_career = "SELECT * FROM careers c INNER JOIN company_info i ON i.company_id = c.company_id";
            $career_array   = array();
            $career       = mysqli_query($link, $fetch_career);
            if ($career) {
                while ($row = $career->fetch_assoc()) {
                    array_push($career_array, $row);
                }
                echo json_encode($career_array);
            }
        } else if ($_GET["data"] == "lifestyle") {
            $fetch_lifestyle = "SELECT * FROM lifestyle";
            $lifestyle_array  = array();
            $lifestyle        = mysqli_query($link, $fetch_lifestyle);
            if ($lifestyle) {
                while ($row = $lifestyle->fetch_assoc()) {
                    array_push($lifestyle_array, $row);
                }
                echo json_encode($lifestyle_array);
            }
        } else{
            header("Location: ../index.php");
            exit;
        }
    }
    else{
        header("Location: ../index.php");
        exit;
    }
?>