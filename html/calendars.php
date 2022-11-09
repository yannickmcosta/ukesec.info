<?php
	require(__DIR__ . "/config/config.php");
?>
<!doctype html>
<html lang="en">
	<head>
		<?php include_once(__DIR__ . "/includes/head.php"); ?>
		<title>UK Electricity Supply Emergency Code</title>
		<meta property="og:title" content="UK Electricity Supply Emergency Code" />
		<meta property="og:description" content="An interactive website based on the data supplied in the Department for Business, Energy and Industrial Strategy Electricity Supply Emergency Code - This site is not affiliated with HM Goverment or any Governmental Body, and has been created purely for educational purposes only." />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="https://ukesec.info" />
		<meta property="og:image" content="" />
		<meta name="twitter:card" content="summary" />
	    <meta name="twitter:title" content="UK Electricity Supply Emergency Code" />
	    <meta name="twitter:description" content="An interactive website based on the data supplied in the Department for Business, Energy and Industrial Strategy Electricity Supply Emergency Code - This site is not affiliated with HM Goverment or any Governmental Body, and has been created purely for educational purposes only." />
	    <meta name="twitter:url" content="https://ukesec.info/" />
	</head>
	<body>
		<?php include_once(__DIR__ . "/includes/navigation.php"); ?>
		<div class="container mt-5 mb-2">
			<div class="row">
				<div class="col-md">
					<h3 class="display-5">UK Electricity Supply Emergency Code</h3>
					<p>Calendar Subscription Endpoint - Still under development</p>
				</div>
			</div>
		</div>
		<div class="container mt-1">
			<div class="row mt-1 mb-1 text-center">
				<div class="col-lg">
					<h4>Please select your Load Block (You can find this on a recent electricity bill)</h4>
				</div>
			</div>
			<div class="row mt-1 mb-1">
				<div class="col-lg"><h1 class="text-center text-size-6em"><a href="webcal://<?php echo APP_URL_SLASH; ?>calendar/A" class="calendarLoadBlockSelector">A</a></h1></div>
				<div class="col-lg"><h1 class="text-center text-size-6em"><a href="webcal://<?php echo APP_URL_SLASH; ?>calendar/B" class="calendarLoadBlockSelector">B</a></h1></div>
				<div class="col-lg"><h1 class="text-center text-size-6em"><a href="webcal://<?php echo APP_URL_SLASH; ?>calendar/C" class="calendarLoadBlockSelector">C</a></h1></div>
				<div class="col-lg"><h1 class="text-center text-size-6em"><a href="webcal://<?php echo APP_URL_SLASH; ?>calendar/D" class="calendarLoadBlockSelector">D</a></h1></div>
				<div class="col-lg"><h1 class="text-center text-size-6em"><a href="webcal://<?php echo APP_URL_SLASH; ?>calendar/E" class="calendarLoadBlockSelector">E</a></h1></div>
				<div class="col-lg"><h1 class="text-center text-size-6em"><a href="webcal://<?php echo APP_URL_SLASH; ?>calendar/G" class="calendarLoadBlockSelector">G</a></h1></div>
			</div>
			<div class="row mt-1 mb-1">
				<div class="col-lg"><h1 class="text-center text-size-6em"><a href="webcal://<?php echo APP_URL_SLASH; ?>calendar/H" class="calendarLoadBlockSelector">H</a></h1></div>
				<div class="col-lg"><h1 class="text-center text-size-6em"><a href="webcal://<?php echo APP_URL_SLASH; ?>calendar/J" class="calendarLoadBlockSelector">J</a></h1></div>
				<div class="col-lg"><h1 class="text-center text-size-6em"><a href="webcal://<?php echo APP_URL_SLASH; ?>calendar/K" class="calendarLoadBlockSelector">K</a></h1></div>
				<div class="col-lg"><h1 class="text-center text-size-6em"><a href="webcal://<?php echo APP_URL_SLASH; ?>calendar/L" class="calendarLoadBlockSelector">L</a></h1></div>
				<div class="col-lg"><h1 class="text-center text-size-6em"><a href="webcal://<?php echo APP_URL_SLASH; ?>calendar/M" class="calendarLoadBlockSelector">M</a></h1></div>
				<div class="col-lg"><h1 class="text-center text-size-6em"><a href="webcal://<?php echo APP_URL_SLASH; ?>calendar/N" class="calendarLoadBlockSelector">N</a></h1></div>
			</div>
			<div class="row mt-1 mb-1">
				<div class="col-lg"><h1 class="text-center text-size-6em"><a href="webcal://<?php echo APP_URL_SLASH; ?>calendar/P" class="calendarLoadBlockSelector">P</a></h1></div>
				<div class="col-lg"><h1 class="text-center text-size-6em"><a href="webcal://<?php echo APP_URL_SLASH; ?>calendar/Q" class="calendarLoadBlockSelector">Q</a></h1></div>
				<div class="col-lg"><h1 class="text-center text-size-6em"><a href="webcal://<?php echo APP_URL_SLASH; ?>calendar/R" class="calendarLoadBlockSelector">R</a></h1></div>
				<div class="col-lg"><h1 class="text-center text-size-6em"><a href="webcal://<?php echo APP_URL_SLASH; ?>calendar/S" class="calendarLoadBlockSelector">S</a></h1></div>
				<div class="col-lg"><h1 class="text-center text-size-6em"><a href="webcal://<?php echo APP_URL_SLASH; ?>calendar/T" class="calendarLoadBlockSelector">T</a></h1></div>
				<div class="col-lg"><h1 class="text-center text-size-6em"><a href="webcal://<?php echo APP_URL_SLASH; ?>calendar/U" class="calendarLoadBlockSelector">U</a></h1></div>
			</div>
			<?php include_once(__DIR__ . "/includes/footer.php"); ?>
		</div>
		<?php include_once(__DIR__ . "/includes/corejs.php"); ?>
		<?php include_once(__DIR__ . "/includes/customjs.php"); ?>
	</body>
</html>
