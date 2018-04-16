<?php
session_start();
require("session.php");
require("connection.php");

if (isset($_POST["updateCompany"])) {
    if (!empty(trim($_POST["id"])) && !empty(trim($_POST["name"])) && !empty(trim($_POST["postcode"])) && !empty(trim($_POST["address"]))) {
        $id         = $_POST["id"];
        $name       = $_POST["name"];
        $postal     = $_POST["postcode"];
        $addr       = $_POST["address"];
        $latitude   = "";
        $longitude  = "";
        $brief      = "";
        if(!empty(trim($_POST["lat"]))){
            $latitude = $_POST["lat"];
        }
        if(!empty(trim($_POST["long"]))){
            $longitude = $_POST["long"];
        }
        if(!empty(trim($_POST["brief"]))){
            $brief = $_POST["brief"];
        }
        $editLifestyle = $link->query("UPDATE company_info SET company_name='$name', company_brief = '$brief', company_latitude = '$latitude', company_longitude = '$longitude', address = '$addr', postal = '$postal' WHERE company_id = '$id'");
        if ($editLifestyle) {
            $successmessage = "Update company information successful.";
        } else {
            $errormessage = "Failed to update company.";
        }
    } else {
        $errormessage = "Please fill in all required fields.";
    }
}

if (isset($_POST["newCompany"])) {
    if (!empty(trim($_POST["name"])) && !empty(trim($_POST["postcode"])) && !empty(trim($_POST["address"]))) {
        $name       = $_POST["name"];
        $postal     = $_POST["postcode"];
        $addr       = $_POST["address"];
        $latitude   = "";
        $longitude  = "";
        $brief      = "";
        if(!empty(trim($_POST["lat"]))){
            $latitude = $_POST["lat"];
        }
        if(!empty(trim($_POST["long"]))){
            $longitude = $_POST["long"];
        }
        if(!empty(trim($_POST["brief"]))){
            $brief = $_POST["brief"];
        }
        $addLifestyle = $link->query("INSERT INTO company_info (company_name, company_brief, company_latitude, company_longitude, address, postal) VALUES ('$name', '$brief', '$latitude', '$longitude', '$addr', '$postal')");
        if ($addLifestyle) {
            $successmessage = "Add new company information successful.";
        } else {
            $errormessage = "Failed to create company.";
        }
    } else {
        $errormessage = "Please fill in all required fields.";
    }
}

$fetch_company = "SELECT * FROM company_info";
$company      = mysqli_query($link, $fetch_company);
if ($company) {
    $company_table = "<table class='table table-sm cmsTables'><thead><tr class='bg-primary'><th>ID</th><th>Name</th><th>Address</th><th>Postal</th><th>Latitude</th><th>Longitude</th><th>Brief</th><th></th><th></th></tr></thead><tbody><br>";
    while ($row = mysqli_fetch_array($company)) {
        $company_table .= "<tr><td>" . $row["company_id"] .
                            "</td><td>" . $row["company_name"] .
                            "</td><td>" . $row["address"] .
                            "</td><td>" . $row["postal"] .
                            "</td><td>" . $row["company_latitude"] .
                            "</td><td>" . $row["company_longitude"] .
                            "</td><td>" . $row["company_brief"] .
                            "</td><td><a class='btn btn-sm btn-info selectCompany' href='#' id='" . $row["company_id"] . "'>Select</a>" .
                            "</td><td><a class='btn btn-sm btn-danger' href='caller.php?caller_id=deleteCompany&id=" . $row["company_id"] . "'>Remove</a></td></tr>";
    }
    $company_table .= "</tbody></table>";
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Company</title>
<link href="https://fonts.googleapis.com/css?family=Didact+Gothic|Rozha+One" rel="stylesheet">
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" href="../css/font-awesome.min.css">
<link rel="stylesheet" href="../css/cms.css">
</head>
<body>
<div class="cmsPanel">
    <h2>Company Management</h2>
    <?php if (!empty($company_table))
        echo $company_table; ?>
    <hr>
    <form action="cms_company.php" method="post">
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="companyId">Company ID:</label>
                <input type="text" class="form-control" name="id" id="companyId" readonly />
            </div>
            <div class="form-group col-md-9">
                <label for="companyName">Name:</label>
                <input type="text" class="form-control" name="name" id="companyName"/>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="postal">Post Code:</label>
                <input type="text" class="form-control" name="postcode" id="postal"/>
            </div>
            <div class="form-group col-md-9">
                <label for="companyAddr">Location:</label>
                <input type="text" class="form-control" name="address" id="companyAddr"/>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="companyAddr">Latitude:</label>
                <input type="text" class="form-control" name="lat" id="companyLat"/>
            </div>
            <div class="form-group col-md-6">
                <label for="postal">Longitude:</label>
                <input type="text" class="form-control" name="long" id="companyLong"/>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="companyBrief">Brief:</label>
                <textarea class="form-control" name="brief" id="companyBrief"></textarea>
            </div>
        </div>
        <?php if (!empty($errormessage)) {
            echo "<p class='errorMsg'>" . $errormessage . "</p>";
        } ?>
        <?php if (!empty($successmessage)) {
            echo "<p class='successMsg'>" . $successmessage . "</p>";
        } ?>
        <input type="submit" name="updateCompany" value="UPDATE">
        <input type="submit" name="newCompany" value="CREATE">
        <a href="index.php" class="backBtn">BACK</a>
    </form>
</div>
<script src="../js/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="../js/cms.js"></script>
</body>
</html>