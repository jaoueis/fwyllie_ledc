<?php
session_start();
require("session.php");
require("connection.php");

if (isset($_POST["updateLifestyle"])) {
    if (!empty(trim($_POST["id"])) && !empty(trim($_POST["category"])) && !empty(trim($_POST["title"])) && !empty(trim($_POST["content"]))) {
        $id            = $_POST["id"];
        $category      = $_POST["category"];
        $title         = $_POST["title"];
        $content       = $_POST["content"];
        $editLifestyle = $link->query("UPDATE lifestyle SET category='$category', lifestyle_title = '$title', lifestyle_content = '$content' WHERE lifestyle_id = '$id'");
        if ($editLifestyle) {
            $successmessage = "Update lifestyle information successful.";
        } else {
            $errormessage = "Failed to update lifestyle.";
        }
    } else {
        $errormessage = "Please fill in all required fields.";
    }
}

if (isset($_POST["newLifestyle"])) {
    if (!empty(trim($_POST["category"])) && !empty(trim($_POST["title"])) && !empty(trim($_POST["content"]))) {
        $category      = $_POST["category"];
        $title         = $_POST["title"];
        $content       = $_POST["content"];
        $addLifestyle = $link->query("INSERT INTO lifestyle (category, lifestyle_title, lifestyle_content) VALUES ('$category', '$title', '$content')");
        if ($addLifestyle) {
            $successmessage = "Add new lifestyle information successful.";
        } else {
            $errormessage = "Failed to create lifestyle.";
        }
    } else {
        $errormessage = "Please fill in all required fields.";
    }
}

$fetch_lifeStyle = "SELECT * FROM lifestyle";
$lifestyle      = mysqli_query($link, $fetch_lifeStyle);
if ($lifestyle) {
    $lifestyle_table = "<table class='table table-sm cmsTables'><thead><tr class='bg-primary'><th>ID</th><th>Category</th><th>Title</th><th>Content</th><th></th><th></th></tr></thead><tbody>'";
    while ($row = mysqli_fetch_array($lifestyle)) {
        $lifestyle_table .= "<tr><td>" . $row["lifestyle_id"] .
                            "</td><td>" . $row["category"] .
                            "</td><td>" . $row["lifestyle_title"] .
                            "</td><td>" . $row["lifestyle_content"] .
                            "</td><td><a class='btn btn-sm btn-info selectLifestyle' href='#' id='" . $row["lifestyle_id"] . "'>Select</a>" .
                            "</td><td><a class='btn btn-sm btn-danger' href='caller.php?caller_id=deleteLifestyle&id=" . $row["lifestyle_id"] . "'>Remove</a></td></tr>";
    }
    $lifestyle_table .= "</tbody></table>";
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Lifestyle</title>
<link href="https://fonts.googleapis.com/css?family=Didact+Gothic|Rozha+One" rel="stylesheet">
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" href="../css/font-awesome.min.css">
<link rel="stylesheet" href="../css/cms.css">
</head>
<body>
<div class="cmsPanel">
    <h2>Lifestyle Management</h2>
    <?php if (!empty($lifestyle_table))
        echo $lifestyle_table; ?>
    <hr>
    <form action="cms_lifestyle.php" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="lifestyleId">Lifestyle ID:</label>
                <input type="text" class="form-control" name="id" id="lifestyleId" readonly />
            </div>
            <div class="form-group col-md-6">
                <label for="lfCategory">Category:</label>
                <input type="text" class="form-control" name="category" id="lfCategory"/>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="lfTitle">Title:</label>
                <input type="text" class="form-control" name="title" id="lfTitle"/>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="lfContent">Content:</label>
                <textarea class="form-control" name="content" id="lfContent" rows="5"></textarea>
            </div>
        </div>
        <?php if (!empty($errormessage)) {
            echo "<p class='errorMsg'>" . $errormessage . "</p>";
        } ?>
        <?php if (!empty($successmessage)) {
            echo "<p class='successMsg'>" . $successmessage . "</p>";
        } ?>
        <input type="submit" name="updateLifestyle" value="UPDATE">
        <input type="submit" name="newLifestyle" value="CREATE">
        <a href="index.php" class="backBtn">BACK</a>
    </form>
</div>
<script src="../js/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="../js/cms.js"></script>
</body>
</html>