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

                        Diah Anjarini : <br>
                        <a class="phone-call-center" href="tel:0812-9016-2038">0812-9016-2038</a> <br><br>

                        Kristi Endrawati: <br>
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
        <div class="text-center"> <i>Data Pertanggal <?php $date = date_create($rilis['tanggal_rilis']); echo date_format($date, "d/m/Y") ?></i></div>
        <br>
        <div class="row">
            <div class="col-md-3">
                <div class="small-box odp">
                    <div class="judul-box">ODP</div>
                    <div class="isi-box">
                        <?php echo $rilis['odp'] ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="small-box pdp">
                    <div class="judul-box">PDP</div>
                    <div class="isi-box">
                        <?php echo $rilis['pdp'] ?>                        
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="small-box otg">
                    <div class="judul-box">OTG</div>
                    <div class="isi-box">
                       <?php echo $rilis['otg'] ?>   
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="small-box pos">
                    <div class="judul-box">POSITIF</div>
                    <div class="isi-box">
                        <?php echo $rilis['positif'] ?>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header" align="center">
                <h3> Detail Data Corona Lampung Selatan</h3>
            </div>
            <div class="card-body">
                <!-- <h4 class="text-center"><i>--Data Belum Tersedia--</i></h4>
                <canvas id="myChart" width="400" height="200"></canvas> -->
                <img src="<?php echo $detail['foto_detail_corona'] ?>" alt="sebaran corona" class="img-fluid" height="auto" width="200%">
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
        labels: ['2 April', '3 April', '4 April', '5 April', '6 April', '7 April', '8 April', '9 April', '10 April', '11 April'],
        datasets: [{
            label: 'ODP ',
            data: [244, 259, 222, 215, 196, 164, 174, 149, 117, 126],
            backgroundColor: [
                'rgba(211, 68, 68, 0.1)'
            ],
            borderColor: [
                'rgba(211, 68, 68, 1)'
            ],
            borderWidth: 2
        },
        {
            label: 'Selesai Dipantau ',
            data: [12, 16, 43, 58, 96, 137, 150, 176, 183, 196],
            backgroundColor: [
                'rgba(95, 95, 95, 0.1)'
            ],
            borderColor: [
                'rgba(95, 95, 95, 1)'
            ],
            borderWidth: 2
        },
        {
            label: 'PDP ',
            data: [1, 1, 1, 1, 1, 2, 3, 3, 3, 3],
            backgroundColor: [
                'rgba(214, 214, 35, 0.1)'
            ],
            borderColor: [
                'rgba(214, 214, 35, 1)'
            ],
            borderWidth: 2
        },
        {
            label: 'OTG ',
            data: [15, 15, 15, 15, 15, 11, 11, 11, 12, 12],
            backgroundColor: [
                'rgba(32, 68, 226, 0.1)'
            ],
            borderColor: [
                'rgba(32, 68, 226, 1)'
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