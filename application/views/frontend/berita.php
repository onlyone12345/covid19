<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div class="card">
				<div class="card-body">
					<h3 align="center">Seputar Corona di Lampung Selatan</h3>
					<br>

					<?php foreach ($berita as $row) : ?>

					<div class="row berita">
						<div class="col-md-4 gambar-berita">
							<img src="<?php echo $row['gambar'] ?>" alt="">
						</div>
						<div class="col-md-8">
							<h4 class="judul-berita">
								<a href="<?php echo site_url('news/view/').$row['slug'] ?>">
									<?php echo $row['judul_berita'] ?></a>
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
							
				<div class="row">
					<div class="col">
						<!--Tampilkan pagination-->
						<?php echo $pagination; ?>
					</div>
				</div>
                
			</div>
		</div>

		<div class="col-md-3">
			<div class="card">
				<div class="card-body">
                    Berita Terkini
                    <br>
                    <ul>
                        <?php foreach($list_news as $row) : ?>
                        <li>
                            <a href="<?php echo site_url('news/view/').$row['slug'] ?>">
									<?php echo $row['judul_berita'] ?></a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
				</div>
			</div>
		</div>
	</div>
</div>
