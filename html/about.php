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
					<p>This site has been created on the back of recent publications in media and news outlets of potential energy restrictions and load shedding in the winter of 2022. The <a href="https://www.gov.uk/government/publications/electricity-supply-emergency-code" target="_blank">PDF</a> published by the government is where this data has been parsed from, however it can be a little confusing to read. Therefore this intention of this site is to allow users to interactively select their Load Block, the current Level of Disconnection, and this site will display when to expect disconnections.</p>
					<p>As this data is parsed from a third party source, <strong>it is provided without any warranty whatsoever, as is</strong>, and you are encouraged to <a href="https://www.gov.uk/government/publications/electricity-supply-emergency-code" target="_blank">read the original PDF</a> to gain insight into the authoritative data, and contact your electricity supplier if you have any questions or concerns. This site is not affiliated with HM Goverment or any Governmental Body, and has been created purely for educational purposes only.</p>
					<p><strong>N.B. Level of Disconnections are cummulative. Meaning that if the Level of Disconnection currently in force is 4, all disconnections in levels 1, 2, 3 AND 4 apply.</strong></p>
					<div class="alert alert-success" align="center">
						<strong>Current UK Level of Disconnection: 0 - Emergency Code Not In Effect</strong>
					</div>
				</div>
			</div>
			<?php include_once(__DIR__ . "/includes/footer.php"); ?>
		</div>
		<?php include_once(__DIR__ . "/includes/corejs.php"); ?>
	</body>
</html>
