    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-10 banner">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="<?php echo site_url() ?>assets/frontend/img/slide-1.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="<?php echo site_url() ?>assets/frontend/img/slide-2.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="<?php echo site_url() ?>assets/frontend/img/slide-3.jpg" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>    
            </div>
            <br>
            <div class="col-md-12 col-lg-2">
                <div class="card text-white bg-danger card-call-center">
                    <div class="card-header text-center">
                        <b><i class="fa fa-phone"></i> Call-Center</b>
                    </div>
                    <div class="card-body text-center">
                        Iwan Gunawan :<br>
                        <a class="phone-call-center" href="tel:0821-8308-6304">0821-8308-6304</a> <br><br>

                        dr. Diah Anjani : <br>
                        <a class="phone-call-center" href="tel:0812-9016-2038">0812-9016-2038</a> <br><br>

                        Kristi : <br>
                        <a class="phone-call-center" href="tel:0813-6969-8439">0813-6969-8439</a>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    <br>
    <br>
    <div class="container">
        <h3 align="center">Jumlah Kasus Corona di Lampung Selatan</h3>
        <div class="text-center"> <i>Data Pertanggal 9 April 2020</i></div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="small-box odp">
                            <div class="judul-box">ODP</div>
                            <div class="isi-box">
                                149
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="small-box pdp">
                            <div class="judul-box">PDP</div>
                            <div class="isi-box">
                                3
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="small-box otg">
                            <div class="judul-box">OTG</div>
                            <div class="isi-box">
                                11
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="small-box pos">
                            <div class="judul-box">POSITIF</div>
                            <div class="isi-box">
                                1
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" align="center">
                        Sebaran Corona Lampung Selatan
                    </div>
                    <div class="card-body">
                        <div id='map' style='width: 100%; height: 400px;'></div>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header" align="center">
                <h3> Statistik Corona Lampung Selatan</h3>
            </div>
            <div class="card-body">
                <h4 class="text-center"><i>--Data Belum Tersedia--</i></h4>
                <canvas id="myChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 align="center">Seputar Corona di Lampung Selatan</h3>
                <br>
                
                <?php foreach ($berita as $row) :

                ?>

                <div class="row berita">
                    <div class="col-md-4 gambar-berita">
                        <img src="<?php echo $row['gambar'] ?>" alt="">
                    </div>
                    <div class="col-md-8">
                        <h4 class="judul-berita">
                           <a href="<?php echo site_url('news/view/').$row['slug'] ?>"> <?php echo $row['judul_berita'] ?></a>
                        </h4>
                        <p class="isi-berita">
                            <?php echo limit_text($row['isi_berita'], 50) ?>
                        </p>
                        <div class="row attribut-berita">
                            <div class="col-md-6 tanggal-upload">
                                @ <?php echo $row['waktu_rilis']; ?>
                            </div>
                            <div class="col-md-6 read-more">
                                <a href="<?php echo site_url('news/view/').$row['slug'] ?>">Read More >></a> 
                            </div>
                        </div>
                    </div>
                </div>

                <?php  endforeach; ?>
                
            </div>
        </div>
    </div>
    <br>




<script>
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni'],
        datasets: [{
            label: 'ODP ',
            data: [0, 0, 0, 0, 0, 0],
            backgroundColor: [
                'rgba(54, 184, 54, 0.2)'
            ],
            borderColor: [
                'rgba(54, 184, 54, 1)'
            ],
            borderWidth: 2
        },
        {
            label: 'PDP ',
            data: [0, 0, 0, 0, 0, 0],
            backgroundColor: [
                'rgba(214, 214, 35, 0.2)'
            ],
            borderColor: [
                'rgba(214, 214, 35, 1)'
            ],
            borderWidth: 2
        },
        {
            label: 'POSITIF ',
            data: [0, 0, 0, 0, 0, 0],
            backgroundColor: [
                'rgba(194, 39, 39, 0.2)'
            ],
            borderColor: [
                'rgba(194, 39, 39, 1)'
            ],
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

//mapbox
mapboxgl.accessToken = 'pk.eyJ1Ijoib25seWZpcmRhdXMiLCJhIjoiY2s4cjhkY3NrMDcxcTNwcno2YXpkd2NtZiJ9.BKu54FXqLvXFT3P0fKhhog';
var map = new mapboxgl.Map({
container: 'map',
center: [105.50, -5.60], // starting position [lng, lat]
zoom: 9, // starting zoom
style: 'mapbox://styles/mapbox/streets-v11'
});

</script>