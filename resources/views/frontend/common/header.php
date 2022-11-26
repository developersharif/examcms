<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ExamProject</title>

    <!-- Custom fonts for this template-->
    <link href="<?php asset("admin/vendor/fontawesome-free/css/all.min.css"); ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php asset("css/style.css"); ?>">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php asset("admin/css/sb-admin-2.min.css"); ?>" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ExamProject</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="<?php print base_url(); ?>">Home</a>
                    <a class="nav-link" href="<?php print base_url() . 'results'; ?>">Result</a>
                    <a class="nav-link" href="<?php print base_url() . 'profile'; ?>">Profile</a>
                    <a class="nav-link" href="<?php print base_url() . 'logout'; ?>">Logout</a>

                </div>
            </div>
        </div>
    </nav>