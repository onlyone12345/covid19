<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Covid-19 Lamsel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="assets/custom.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="assets/chart/chart.min.css" />
    <script src="assets/bootstrap/js/jquery-3.4.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/chart/chart.bundle.min.js"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="assets/img/logo-lamsel.png" height="30" alt="Malas Ngoding">
                Covid LamSel
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tentang-corona.html">Apa Itu Corona</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sebaran Corona</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="mobilitas-penduduk.html">Mobilitas Penduduk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="faq.html">FAQ</a>
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

    <div class="container">
        <div class="card" height="500px" style="height: 1000px">
            <div class="card-body" >
                <h3 align="center"><b>Mobilitas Penduduk Lampung Selatan</b></h3>
                <!-- <p align="center">Data Pertanggal 07 April 2020</p>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" width="2%">#</th>
                                <th scope="col" rowspan="2">Kecamatan</th>
                                <th class="text-center" scope="col" colspan="3">Penduduk Datang Domestik</th>
                                <th class="text-center" scope="col" colspan="3">Penduduk Datang LN</th>
                                <th class="text-center" scope="col" rowspan="2">Keterangan <br> ODP Setelah 14 Hari</th>
                            </tr>
                            <tr>
                                <th scope="col">OTG</th>
                                <th scope="col">ODP</th>
                                <th scope="col">Keluar</th>
                                <th scope="col">OTG</th>
                                <th scope="col">ODP</th>
                                <th scope="col">Keluar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Natar</td>
                                <td>735</td>
                                <td>38</td>
                                <td>-</td>
                                <td>10</td>
                                <td>2</td>
                                <td>-</td>
                                <td class="text-center">81 Orang</td>

                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jati Agung</td>
                                <td>529</td>
                                <td>17</td>
                                <td>-</td>
                                <td>0</td>
                                <td>1</td>
                                <td>-</td>
                                <td class="text-center">87 Orang</td>

                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Tanjung Bintang</td>
                                <td>472</td>
                                <td>11</td>
                                <td>-</td>
                                <td>5</td>
                                <td>0</td>
                                <td>-</td>
                                <td class="text-center">59 Orang</td>

                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Tanjung Sari</td>
                                <td>251</td>
                                <td>1</td>
                                <td>-</td>
                                <td>0</td>
                                <td>0</td>
                                <td>-</td>
                                <td class="text-center">14 Orang</td>

                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>Katibung</td>
                                <td>581</td>
                                <td>11</td>
                                <td>-</td>
                                <td>2</td>
                                <td>0</td>
                                <td>-</td>
                                <td class="text-center">19 Orang</td>

                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>Merbau Mataram</td>
                                <td>489</td>
                                <td>2</td>
                                <td>-</td>
                                <td>6</td>
                                <td>0</td>
                                <td>-</td>
                                <td class="text-center">8 Orang</td>

                            </tr>
                            <tr>
                                <th scope="row">7</th>
                                <td>Way Sulan</td>
                                <td>467</td>
                                <td>4</td>
                                <td>-</td>
                                <td>5</td>
                                <td>0</td>
                                <td>-</td>
                                <td class="text-center">9 Orang</td>

                            </tr>
                            <tr>
                                <th scope="row">8</th>
                                <td>Sidomulyo</td>
                                <td>666</td>
                                <td>31</td>
                                <td>-</td>
                                <td>0</td>
                                <td>0</td>
                                <td>-</td>
                                <td class="text-center">178 Orang</td>

                            </tr>
                            <tr>
                                <th scope="row">9</th>
                                <td>Candipuro</td>
                                <td>879</td>
                                <td>8</td>
                                <td>-</td>
                                <td>3</td>
                                <td>1</td>
                                <td>-</td>
                                <td class="text-center">35 Orang</td>

                            </tr>
                            <tr>
                                <th scope="row">10</th>
                                <td>Way Panji</td>
                                <td>240</td>
                                <td>1</td>
                                <td>-</td>
                                <td>0</td>
                                <td>0</td>
                                <td>-</td>
                                <td class="text-center">18 Orang</td>

                            </tr>

                            <tr>
                                <th scope="row">11</th>
                                <td>Kalianda</td>
                                <td>997</td>
                                <td>0</td>
                                <td>-</td>
                                <td>10</td>
                                <td>0</td>
                                <td>-</td>
                                <td class="text-center">21 Orang</td>

                            </tr>
                            <tr>
                                <th scope="row">12</th>
                                <td>Penengahan</td>
                                <td>572</td>
                                <td>17</td>
                                <td>-</td>
                                <td>1</td>
                                <td>1</td>
                                <td>-</td>
                                <td class="text-center">70 Orang</td>

                            </tr>
                            <tr>
                                <th scope="row">13</th>
                                <td>Palas</td>
                                <td>574</td>
                                <td>0</td>
                                <td>-</td>
                                <td>7</td>
                                <td>0</td>
                                <td>-</td>
                                <td class="text-center">53 Orang</td>

                            </tr>
                            <tr>
                                <th scope="row">14</th>
                                <td>Ketapang</td>
                                <td>642</td>
                                <td>5</td>
                                <td>-</td>
                                <td>1</td>
                                <td>0</td>
                                <td>-</td>
                                <td class="text-center">97 Orang</td>

                            </tr>
                            <tr>
                                <th scope="row">15</th>
                                <td>Seragi</td>
                                <td>724</td>
                                <td>2</td>
                                <td>-</td>
                                <td>0</td>
                                <td>0</td>
                                <td>-</td>
                                <td class="text-center">155 Orang</td>

                            </tr>
                            <tr>
                                <th scope="row">16</th>
                                <td>Rajabasa</td>
                                <td>377</td>
                                <td>4</td>
                                <td>-</td>
                                <td>8</td>
                                <td>0</td>
                                <td>-</td>
                                <td class="text-center">9 Orang</td>

                            </tr>
                            <tr>
                                <th scope="row">17</th>
                                <td>Bakauheni</td>
                                <td>173</td>
                                <td>0</td>
                                <td>-</td>
                                <td>0</td>
                                <td>0</td>
                                <td>-</td>
                                <td class="text-center">0 Orang</td>

                            </tr>
                        </tbody>
                    </table>
                </div> -->
            </div>
        </div>
    </div>
    <br>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container">
            <div class="footer">© 2020 Copyright:
                <a href="https://lampungselatankab.go.id/"> Diskominfo Lampung Selatan</a>
            </div>
        </div>
    </nav>
</body>

</html>