<?php
    header('Content-Type: application/json');
    require("connection.php");
    if(isset($_GET["getChart"])){
        if($_GET["getChart"] == "job_pie"){
            $fetch_pieChart = $link->query("SELECT job_category AS 'position', count(job_category) AS 'amount' FROM careers group BY job_category ORDER BY job_category");
            if($fetch_pieChart->num_rows > 0){
                $pieChart = array();
                while($row = $fetch_pieChart->fetch_assoc()){
                    array_push($pieChart, $row);
                }
                echo json_encode($pieChart);
            }
        }
        else if($_GET["getChart"] == "job_column"){
            $fetch_columnChart = $link->query("SELECT DISTINCT company_name AS 'company', count(job_category) AS 'job_amount' FROM careers c, company_info i WHERE c.company_id = i.company_id group BY company_name ORDER BY company_name");
            if($fetch_columnChart->num_rows > 0){
                $columnChart = array();
                while($row = $fetch_columnChart->fetch_assoc()){
                    array_push($columnChart, $row);
                }
                echo json_encode($columnChart);
            }
        }
        else{
            header("Location: index.php");
            exit;
        }
    }
    else{
        header("Location: index.php");
        exit;
    }
?>