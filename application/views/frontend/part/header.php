<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Covid-19 Lamsel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?php echo site_url() ?>assets/frontend/img/favicon.png" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo site_url() ?>assets/frontend/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo site_url() ?>assets/frontend/custom.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo site_url() ?>assets/frontend/chart/chart.min.css" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.css' rel='stylesheet' />
    
    <script src="<?php echo site_url() ?>assets/frontend/bootstrap/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo site_url() ?>assets/frontend/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo site_url() ?>assets/frontend/chart/chart.bundle.min.js"></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.js'></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container">
            <a class="navbar-brand" href="<?php echo site_url() ?>home">
                <img src="<?php echo site_url() ?>assets/frontend/img/logo-lamsel.png" height="30" alt="Logo LamSel">
               Covid LamSel
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?php echo ($active == 'home') ? 'active' : '' ?>">
                        <a class="nav-link" href="<?php echo site_url() ?>home">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item <?php echo ($active == 'tentang-corona') ? 'active' : '' ?>">
                        <a class="nav-link" href="<?php echo site_url() ?>tentang-corona">Apa Itu Corona</a>
                    </li>
                    <li class="nav-item <?php echo ($active == 'sebaran-corona') ? 'active' : '' ?>">
                        <a class="nav-link" href="<?php echo site_url('sebaran-corona') ?>">Sebaran Corona</a>
                    </li>
                   
                    <li class="nav-item <?php echo ($active == 'news') ? 'active' : '' ?>">
                        <a class="nav-link" href="<?php echo site_url('news') ?>">News</a>
                    </li>
                    <li class="nav-item <?php echo ($active == 'faq') ? 'active' : '' ?>">
                        <a class="nav-link" href="<?php echo site_url('faq') ?>">FAQ</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Apa Saja
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Tutorial HTML</a>
                            <a class="dropdown-item" href="#">Tutorial CSS</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Tutorial Bootstrap</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Link Mati</a>
                    </li> -->
                </ul>

            </div>
        </div>
    </nav>
    <br>
    