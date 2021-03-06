<div class="sfooter">
	<div class="sfooter-content">
		<header>
			<!-- navbar --->
			<nav class="navbar navbar-default navbar-inverse">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
								  data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" routerLink="">Cannaduceus</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">
							<li><a routerLink="">Home</a></li>
							<li><a routerLink="/strain">Strain</a></li>
							<li><a routerLink="/dispensary">Dispensary</a></li>
							<li><a routerLink="/signup">SignUp</a></li>
							<li><a routerLink="/signin">Signin</a></li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
		</header>
		<!-- Portfolio Item Heading -->

		<main>
			<router-outlet></router-outlet>
		</main>
	</div>

	<!-- footer inverse --->
	<footer class="footer navbar-inverse">
		<div class="container">
			<div class="row" id="footerText">
				<!-- logo on its own row -->
				<div class="col-xs-12 col-lg-3">
					<img src="../app/images/cannaduceus-sm-logo.png" alt="logo" class="img-responsive">
				</div>
				<!-- contact section in footer-->
				<div class="col-xs-12 col-lg-3">
					<h4> Contact Us</h4>
					<p>Email: Admin@Cannaduceus.com</p>
					<p>Phone: 1(800)555-5555</p>
					<a href="#">Privacy Policy</a>
					<a href="#"> Terms of Use</a>
				</div>
				<div class="col-xs-12 col-lg-3">
					<strong>Company</strong>
					<p>About Us</p>
					<p>Careers</p>
					<h4>Connect with Cannaduceus</h4>
					<a class="btn btn-social-icon btn-twitter">
						<span class="fa fa-twitter"> Twitter</span>
					</a>
					<a class="btn btn-social-icon btn-facebook">
						<span class="fa fa-facebook"> Facebook</span>
					</a>
					<a class="btn btn-social-icon btn-instagram">
						<span class="fa fa-instagram"> Instagram</span>
					</a>
					<!-- for additional info if needed-->
				</div>

			</div>
		</div>
	</footer>
</div>

