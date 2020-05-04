<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div class="card">
				<div class="card-body">
					<h3 class="judul-detail-berita">
						<?php echo $news['judul_berita']; ?>

					</h3>
					<div class="gambar-detail-berita">
						<img src="<?php echo $news['gambar']; ?>" alt="" class="img-fluid" max-width="100%"
							height="auto">

					</div>
					<br>
					<div class="isi-detail-berita">
						<p>
							<?php echo $news['isi_berita']; ?>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card berita-terkini">
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
