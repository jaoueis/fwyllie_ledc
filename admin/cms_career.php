<?php
session_start();
require("session.php");
require("connection.php");

if (isset($_POST["updateCareer"])) {
    if (!empty(trim($_POST["career"])) && !empty(trim($_POST["company"])) && !empty(trim($_POST["category"])) && !empty(trim($_POST["title"])) && !empty(trim($_POST["content"]))) {
        $careerId     = $_POST["career"];
        $companyName  = $_POST["company"];
        $category     = $_POST["category"];
        $title        = $_POST["title"];
        $content      = $_POST["content"];
        $checkCompany = $link->query("SELECT company_id FROM company_info WHERE company_name = '$companyName'");
        if ($checkCompany->num_rows > 0) {
            $company    = mysqli_fetch_array($checkCompany);
            $editCareer = $link->query("UPDATE careers SET company_id = '$company[company_id]', job_category='$category', job_title='$title', job_desc='$content' WHERE career_id = '$careerId'");
            if ($editCareer) {
                $successmessage = "Update career information successful.";
            } else {
                $errormessage = "Failed to update career.";
            }
        } else {
            $errormessage = "Sorry, the company doesn't exist.";
        }
    } else {
        $errormessage = "Please fill in all required fields.";
    }
}

if (isset($_POST["newCareer"])) {
    if (!empty(trim($_POST["company"])) && !empty(trim($_POST["title"])) && !empty(trim($_POST["content"])) && !empty(trim($_POST["category"]))) {
        $companyName  = $_POST["company"];
        $title        = $_POST["title"];
        $content      = $_POST["content"];
        $category     = $_POST["category"];
        $checkCompany = $link->query("SELECT company_id FROM company_info WHERE company_name = '$companyName'");
        if ($checkCompany->num_rows > 0) {
            $company = mysqli_fetch_array($checkCompany);

            $addCareer = $link->query("INSERT INTO careers (company_id, job_title, job_desc, job_category) VALUES ('$company[company_id]', '$title', '$content', '$category')");
            if ($addCareer) {
                $successmessage = "Create career information successful.";
            } else {
                $errormessage = "Failed to create career.";
            }
        } else {
            $errormessage = "Sorry, the company doesn't exist.";
        }
    } else {
        $errormessage = "Please fill in all required fields.";
    }
}

$fetch_careers = "SELECT * FROM careers c INNER JOIN company_info i ON i.company_id = c.company_id";
$careers       = mysqli_query($link, $fetch_careers);
if ($careers) {
    $career_table = "<table class='table table-sm cmsTables'><thead><tr class='bg-primary'><th>ID</th><th>Company</th><th>Job Category</th><th>Title</th><th>Content</th><th></th><th></th></tr></thead><tbody><br>";
    while ($row = mysqli_fetch_array($careers)) {
        $career_table .= "<tr><td>" . $row["career_id"] .
                         "</td><td>" . $row["company_name"] .
                         "</td><td>" . $row["job_category"] .
                         "</td><td>" . $row["job_title"] .
                         "</td><td>" . $row["job_desc"] .
                         "</td><td><a class='btn btn-sm btn-info selectCareer' href='#' id='" . $row["career_id"] . "'>Select</a>" .
                         "</td><td><a class='btn btn-sm btn-danger' href='caller.php?caller_id=deleteCareer&id=" . $row["career_id"] . "'>Remove</a></td></tr>";
    }
    $career_table .= "</tbody></table>";
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Careers</title>
<link href="https://fonts.googleapis.com/css?family=Didact+Gothic|Rozha+One" rel="stylesheet">
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="../css/font-awesome.min.css">
<link rel="stylesheet" href="../css/cms.css">
</head>
<body>
<div class="cmsPanel">
    <h2>Careers Management</h2>
    <?php if (!empty($career_table))
        echo $career_table; ?>
    <hr>
    <form action="cms_career.php" method="post">
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="careerId">Career ID:</label>
                <input type="text" class="form-control" name="career" id="careerId" readonly />
            </div>
            <div class="form-group col-md-3">
                <label for="companyId">Company Name:</label>
                <input type="text" class="form-control" name="company" id="companyId" />
            </div>
            <div class="form-group col-md-3">
                <label for="jobCategory">Job Category:</label>
                <input type="text" class="form-control" name="category" id="jobCategory" />
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="jobTitle">Job Title:</label>
                <input type="text" class="form-control" name="title" id="jobTitle" />
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="jobIntro">Introduction:</label>
                <textarea class="form-control" name="content" id="jobIntro" rows="6"></textarea>
            </div>
        </div>
        <?php if (!empty($errormessage)) {
            echo "<p class='errorMsg'>" . $errormessage . "</p>";
        } ?>
        <?php if (!empty($successmessage)) {
            echo "<p class='successMsg'>" . $successmessage . "</p>";
        } ?>
        <input type="submit" name="updateCareer" value="UPDATE">
        <input type="submit" name="newCareer" value="CREATE">
        <a href="index.php" class="backBtn">BACK</a>
    </form>
</div>
<script src="../js/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="../js/cms.js"></script>
</body>
</html>