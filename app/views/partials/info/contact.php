<div class="container">
	<div class="jumbotron text-center">
		<h3>Get in touch! We're here for you...</h3>
	</div>
	<div style="margin:40px 0">
		<div class="row">
			<div class="col-sm-5">
				<div class="panel-body panel">
					<?php $this::display_page_errors(); ?>
					<h4>Share Info With Us Via Email</h4>
					<hr />
					<form method="post" action="<?php print_link("info/contact"); ?>">
						<div class="form-group">
							<input type="text" class="form-control" required id="name" name="name" placeholder="Enter Your name *">
						</div>

						<div class="form-group">
							<input type="email" class="form-control" required id="email" name="email" placeholder="Enter Your email *">
						</div>

						<div class="form-group">
							<textarea class="form-control" id="msg" name="msg" rows="4" required placeholder="Enter your Message *"></textarea>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>

				</div>
			</div>

			<div class="col-sm-7">
				<div class="panel panel-body">
					<h4>Other Ways To Reach Us:</h4>
					<hr />

					<p>
						<b class="chead"><span class="material-icons"></span>Address | Location</b><br />
						<p class="adr clearfix">
							<span class="adr-group">
								<span class="street-address">Jl. Raya Tayu Km.99A Pakis-Tayu-Pati</span><br>
								<span class="postal-code">kode Pos 59155</span><br>
								<span class="country-name">Pati - Jawa Tengah</span>
							</span>
						</p>
					</p>
					<hr />
					<p>
						<b class="chead"><span class="material-icons"></span> Phone</b><br />
						<span class="editContent"> Telp : (0295) 4150645, Fax : (0295) 4546012 </span>
					</p>
					<hr />

					<p>
						<b class="chead"><span class="material-icons"></span> E-mail</b><br />
						<a href="#" class="editContent">sebeningkasih@yahoo.co.id</a><br>
						<a href="#" class="editContent">rsusebeningkasih.com</a>
					</p>
				</div>
			</div>
		</div>
	</div>
	<?php
	if (DEVELOPMENT_MODE) {
	?>
		<small class="text-muted">To edit this file, browse to :- <i>app/view/partials/info/contact.php</i></small>
	<?php
	}
	?>

</div>