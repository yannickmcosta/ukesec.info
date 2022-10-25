<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-6 bg-white border-bottom box-shadow">
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
		<a class="navbar-brand" href="<?php echo APP_HTTP_SCHEME; ?><?php echo APP_URL_SLASH; ?>">UKESEC.info</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<ul class="navbar-nav mr-auto">
				<?php if ($_SERVER['REQUEST_URI'] == "/") { ?>
					<li class="nav-item active">
						<a class="nav-link" href="<?php echo APP_HTTP_SCHEME; ?><?php echo APP_URL_SLASH; ?>">Home <span class="sr-only">(current)</span></a>
					</li>
				<?php } else { ?>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo APP_HTTP_SCHEME; ?><?php echo APP_URL_SLASH; ?>">Home</a>
					</li>
				<?php } ?>
				<!-- Nav Item Separator -->
				<?php if ($_SERVER['REQUEST_URI'] == "/about") { ?>
					<li class="nav-item active">
						<a class="nav-link" href="<?php echo APP_HTTP_SCHEME; ?><?php echo APP_URL_SLASH; ?>about">About <span class="sr-only">(current)</span></a>
					</li>
				<?php } else { ?>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo APP_HTTP_SCHEME; ?><?php echo APP_URL_SLASH; ?>about">About</a>
					</li>
				<?php } ?>
				<!-- Nav Item Separator -->
				<?php if ($_SERVER['REQUEST_URI'] == "/calculator") { ?>
					<li class="nav-item active">
						<a class="nav-link" href="<?php echo APP_HTTP_SCHEME; ?><?php echo APP_URL_SLASH; ?>calculator-schedule">Calculator <span class="sr-only">(current)</span></a>
					</li>
				<?php } else { ?>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo APP_HTTP_SCHEME; ?><?php echo APP_URL_SLASH; ?>calculator-schedule">Calculator</a>
					</li>
				<?php } ?>
			</ul>
		</div>
		<div class="pull-right">
			<span class="badge badge-success">Current UK Level of Disconnection: <?php echo CURRENT_LOD; ?></span>
		</div>
	</nav>
</div>