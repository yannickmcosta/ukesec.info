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
		<link rel="stylesheet" href="<?php echo APP_HTTP_SCHEME; ?><?php echo APP_URL_SLASH;?>assets/css/yehzuna.jquery.schedule.min.css" />
	</head>
	<body>
		<?php include_once(__DIR__ . "/includes/navigation.php"); ?>
		<div class="container mt-5 mb-2">
			<div class="row">
				<div class="col-md">
					<h3 class="display-5">UK Electricity Supply Emergency Code</h3>
					<p>In the event of national power rationing, find out when you may likely be affected by planned disconnections.</p>
					<p><small>You can find your "Load Block" on your electricity bill, usually the starting letter of your reference or account number. The Current Level of Disconnection is shown on this page and is preset, you can change this if you like to find out what a different level would look like. N.B. Level of Disconnections are cummulative. Meaning that if the Level of Disconnection currently in force is 4, all disconnections in levels 1, 2, 3 AND 4 apply.</small></p>

				</div>
			</div>
		</div>
		<div class="container mt-1">
			<hr/>
			<div class="row mt-1">
				<div class="col-lg-6 col-sm-12 col-xs-12">
					<label for="load_block">What Load Block are you in?</label>
					<select class="form-control mb-2" id="load_block" name="load_block" required="required" onchange="doCalcCheck();">
						<option value="" selected="selected" disabled="disabled">Please Select...</option>
						<option value="A">A</option>
						<option value="B">B</option>
						<option value="C">C</option>
						<option value="D">D</option>
						<option value="E">E</option>
						<option value="G">G</option>
						<option value="H">H</option>
						<option value="J">J</option>
						<option value="K">K</option>
						<option value="L">L</option>
						<option value="M">M</option>
						<option value="N">N</option>
						<option value="P">P</option>
						<option value="Q">Q</option>
						<option value="R">R</option>
						<option value="S">S</option>
						<option value="T">T</option>
						<option value="U">U</option>
					</select>
				</div>
				<div class="col-lg-6 col-sm-12 col-xs-12">
					<label for="level_of_disconnection">What Level of Disconnection do you want to check?</label>
					<select class="form-control mb-2" id="level_of_disconnection" name="level_of_disconnection" required="required" onchange="doCalcCheck();">
						<option value="" disabled="disabled" selected="selected">Please Select...</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
					</select>
</div>
			</div>
			<div id="accordion">
				<div class="card">
					<div class="card-header" id="headingOne">
						<h5 class="mb-0">
							<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								Scheduled Disconnections - Table
							</button>
						</h5>
					</div>
					<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
						<div class="card-body">
							<div class="row mt-8">
								<div class="col-lg">
									<div class="table-responsive">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>Day Of Week</th>
													<th>Start Time</th>
													<th>End Time</th>
													<th>Load Block</th>
													<th>Level of Disconnection</th>
												</tr>
											</thead>
											<tbody id="blackout_data">
												<tr>
													<td colspan="5" align="center">No data to display, fill out the above form to begin.</td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<th>Day Of Week</th>
													<th>Start Time</th>
													<th>End Time</th>
													<th>Load Block</th>
													<th>Level of Disconnection</th>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header" id="headingTwo">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								Scheduled Disconnections - Week View
							</button>
						</h5>
					</div>
					<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
						<div class="card-body">
							<div class="row mt-4">
								<div class="col-lg">
									<div id="schedule"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include_once(__DIR__ . "/includes/footer.php"); ?>
		</div>
		<?php include_once(__DIR__ . "/includes/corejs.php"); ?>
		<?php include_once(__DIR__ . "/includes/customjs.php"); ?>
	</body>
</html>
