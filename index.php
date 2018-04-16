<?php
require_once("admin/newsletter.php");
if (isset($_POST['submit'])) {
    $subEmailAdd = trim($_POST['email']);
    if (!empty($subEmailAdd)) {
        $sub     = 0;
        $result  = saveEmailAdd($subEmailAdd, $sub);
        $message = $result;
    }
}

include('sections/header.html');
include('sections/home-banner.html');
include('sections/home-why.html');
include('sections/home-stories.html');
include('sections/home-careers.html');
include('sections/home-lifestyle.html');
include('sections/footer.html');