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
					<hr />
					<h4 class="display-6">What's the Electricity Supply Emergency Code? (ESEC)</h4>
					<p>To quote from the Government definition, "If a prolonged electricity shortage affects a specific region, or the whole country, electricity rationing may be necessary. The Electricity Supply Emergency Code (ESEC) outlines the process for ensuring fair distribution nationally while still protecting those who require special treatment, using a process known as 'rota disconnections'.".</p>
					<h4 class="display-6">So what's special about this site?</h4>
					<p>As is usually the case, sometimes Government documents can be challenging to interpret, so this site provides a degree of simplification, and interactivity, that the original PDF doesn't provide. In the event of national power rationing, here you can find out when you may likely be affected by planned disconnections. All data on this website is from publicly available government data, <strong>and this site is provided as is, without any warranty whatsoever</strong>. You are encouraged to <a href="https://www.gov.uk/government/publications/electricity-supply-emergency-code" target="_blank">read the original PDF</a> to gain insight into the authoritative data, and contact your electricity supplier if you have any questions or concerns. This site is not affiliated with HM Goverment or any Governmental Body, and has been created purely for educational purposes.</p>
				</div>
			</div>
		</div>
		<div class="container mt-1">
			<div id="region_loadBlockSelector">
				<div class="row mt-1 mb-1 text-center">
					<div class="col-lg">
						<h4>Please select your Load Block (You can find this on a recent electricity bill)</h4>
					</div>
				</div>
				<div class="row mt-1 mb-1">
					<div class="col-lg"><h1 class="text-center text-size-6em"><a href="#" class="loadBlockSelector" onclick="doCheck('A');">A</a></h1></div>
					<div class="col-lg"><h1 class="text-center text-size-6em"><a href="#" class="loadBlockSelector" onclick="doCheck('B');">B</a></h1></div>
					<div class="col-lg"><h1 class="text-center text-size-6em"><a href="#" class="loadBlockSelector" onclick="doCheck('C');">C</a></h1></div>
					<div class="col-lg"><h1 class="text-center text-size-6em"><a href="#" class="loadBlockSelector" onclick="doCheck('D');">D</a></h1></div>
					<div class="col-lg"><h1 class="text-center text-size-6em"><a href="#" class="loadBlockSelector" onclick="doCheck('E');">E</a></h1></div>
					<div class="col-lg"><h1 class="text-center text-size-6em"><a href="#" class="loadBlockSelector" onclick="doCheck('G');">G</a></h1></div>
				</div>
				<div class="row mt-1 mb-1">
					<div class="col-lg"><h1 class="text-center text-size-6em"><a href="#" class="loadBlockSelector" onclick="doCheck('H');">H</a></h1></div>
					<div class="col-lg"><h1 class="text-center text-size-6em"><a href="#" class="loadBlockSelector" onclick="doCheck('J');">J</a></h1></div>
					<div class="col-lg"><h1 class="text-center text-size-6em"><a href="#" class="loadBlockSelector" onclick="doCheck('K');">K</a></h1></div>
					<div class="col-lg"><h1 class="text-center text-size-6em"><a href="#" class="loadBlockSelector" onclick="doCheck('L');">L</a></h1></div>
					<div class="col-lg"><h1 class="text-center text-size-6em"><a href="#" class="loadBlockSelector" onclick="doCheck('M');">M</a></h1></div>
					<div class="col-lg"><h1 class="text-center text-size-6em"><a href="#" class="loadBlockSelector" onclick="doCheck('N');">N</a></h1></div>
				</div>
				<div class="row mt-1 mb-1">
					<div class="col-lg"><h1 class="text-center text-size-6em"><a href="#" class="loadBlockSelector" onclick="doCheck('P');">P</a></h1></div>
					<div class="col-lg"><h1 class="text-center text-size-6em"><a href="#" class="loadBlockSelector" onclick="doCheck('Q');">Q</a></h1></div>
					<div class="col-lg"><h1 class="text-center text-size-6em"><a href="#" class="loadBlockSelector" onclick="doCheck('R');">R</a></h1></div>
					<div class="col-lg"><h1 class="text-center text-size-6em"><a href="#" class="loadBlockSelector" onclick="doCheck('S');">S</a></h1></div>
					<div class="col-lg"><h1 class="text-center text-size-6em"><a href="#" class="loadBlockSelector" onclick="doCheck('T');">T</a></h1></div>
					<div class="col-lg"><h1 class="text-center text-size-6em"><a href="#" class="loadBlockSelector" onclick="doCheck('U');">U</a></h1></div>
				</div>
			</div>
			<div id="region_blackoutData" style="display: none;">
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
						<div class="text-center">
							<button type="button" id="bigResetButton" class="btn btn-danger" style="display: none;" onclick="doReset();"><i class="fas fa-fw fa-sync"></i> Reset page</button>
						</div>
					</div>
				</div>
				<hr />
				<div id="anonymousStatistics_incomplete">
					<div class="row mt-1">
						<div class="col-lg-4 offset-lg-2 col-sm-12 col-xs-12">
							<label for="uk_county">What county are you located in? (optional)</label>
							<select class="form-control mb-2" id="uk_county" name="uk_county">
								<option value="" selected="selected" disabled="disabled">This is totally optional...</option>
								<option value="Aberdeen City">Aberdeen City</option>
								<option value="Aberdeenshire">Aberdeenshire</option>
								<option value="Anglesey">Anglesey</option>
								<option value="Angus">Angus</option>
								<option value="Antrim">Antrim</option>
								<option value="Argyll and Bute">Argyll and Bute</option>
								<option value="Armagh">Armagh</option>
								<option value="Bedfordshire">Bedfordshire</option>
								<option value="Breconshire">Breconshire</option>
								<option value="Buckinghamshire">Buckinghamshire</option>
								<option value="Caernarvonshire">Caernarvonshire</option>
								<option value="Cambridgeshire">Cambridgeshire</option>
								<option value="Cardiganshire">Cardiganshire</option>
								<option value="Carmarthenshire">Carmarthenshire</option>
								<option value="Cheshire East">Cheshire East</option>
								<option value="Cheshire West and Chester">Cheshire West and Chester</option>
								<option value="City of Edinburgh">City of Edinburgh</option>
								<option value="Clackmannanshire">Clackmannanshire</option>
								<option value="Cleveland">Cleveland</option>
								<option value="Cornwall">Cornwall</option>
								<option value="Cumbria">Cumbria</option>
								<option value="Denbighshire">Denbighshire</option>
								<option value="Derbyshire">Derbyshire</option>
								<option value="Derry and Londonderry">Derry and Londonderry</option>
								<option value="Devon">Devon</option>
								<option value="Dorset">Dorset</option>
								<option value="Down">Down</option>
								<option value="Dumfries and Galloway">Dumfries and Galloway</option>
								<option value="Dundee City">Dundee City</option>
								<option value="Durham">Durham</option>
								<option value="East Ayrshire">East Ayrshire</option>
								<option value="East Dunbartonshire">East Dunbartonshire</option>
								<option value="East Lothian">East Lothian</option>
								<option value="East Renfrewshire">East Renfrewshire</option>
								<option value="East Sussex">East Sussex</option>
								<option value="Eilean Siar">Eilean Siar</option>
								<option value="Essex">Essex</option>
								<option value="Falkirk">Falkirk</option>
								<option value="Fermanagh">Fermanagh</option>
								<option value="Fife">Fife</option>
								<option value="Flintshire">Flintshire</option>
								<option value="Glamorgan">Glamorgan</option>
								<option value="Glasgow City">Glasgow City</option>
								<option value="Gloucestershire">Gloucestershire</option>
								<option value="Greater London">Greater London</option>
								<option value="Greater Manchester">Greater Manchester</option>
								<option value="Hampshire">Hampshire</option>
								<option value="Hertfordshire">Hertfordshire</option>
								<option value="Highland">Highland</option>
								<option value="Inverclyde">Inverclyde</option>
								<option value="Kent">Kent</option>
								<option value="Lancashire">Lancashire</option>
								<option value="Leicestershire">Leicestershire</option>
								<option value="Lincolnshire">Lincolnshire</option>
								<option value="Merionethshire">Merionethshire</option>
								<option value="Merseyside">Merseyside</option>
								<option value="Midlothian">Midlothian</option>
								<option value="Monmouthshire">Monmouthshire</option>
								<option value="Montgomeryshire">Montgomeryshire</option>
								<option value="Moray">Moray</option>
								<option value="Norfolk">Norfolk</option>
								<option value="North Ayrshire">North Ayrshire</option>
								<option value="North Lanarkshire">North Lanarkshire</option>
								<option value="North Yorkshire">North Yorkshire</option>
								<option value="Northamptonshire">Northamptonshire</option>
								<option value="Northumberland">Northumberland</option>
								<option value="Nottinghamshire">Nottinghamshire</option>
								<option value="Orkney Islands">Orkney Islands</option>
								<option value="Oxfordshire">Oxfordshire</option>
								<option value="Pembrokeshire">Pembrokeshire</option>
								<option value="Perth and Kinross">Perth and Kinross</option>
								<option value="Radnorshire">Radnorshire</option>
								<option value="Renfrewshire">Renfrewshire</option>
								<option value="Scottish Borders">Scottish Borders</option>
								<option value="Shetland Islands">Shetland Islands</option>
								<option value="Shropshire">Shropshire</option>
								<option value="Somerset">Somerset</option>
								<option value="South Ayrshire">South Ayrshire</option>
								<option value="South Lanarkshire">South Lanarkshire</option>
								<option value="South Yorkshire">South Yorkshire</option>
								<option value="Staffordshire">Staffordshire</option>
								<option value="Stirling">Stirling</option>
								<option value="Suffolk">Suffolk</option>
								<option value="Surrey">Surrey</option>
								<option value="Tyne and Wear">Tyne and Wear</option>
								<option value="Tyrone">Tyrone</option>
								<option value="Warwickshire">Warwickshire</option>
								<option value="West Berkshire">West Berkshire</option>
								<option value="West Dunbartonshire">West Dunbartonshire</option>
								<option value="West Lothian">West Lothian</option>
								<option value="West Midlands">West Midlands</option>
								<option value="West Sussex">West Sussex</option>
								<option value="West Yorkshire">West Yorkshire</option>
								<option value="Wiltshire">Wiltshire</option>
								<option value="Worcestershire">Worcestershire</option>
							</select>
						</div>
						<div class="col-lg-4 col-sm-12 col-xs-12">
							<label>&nbsp;</label>
							<button type="button" id="submitStatistics" class="btn btn-outline-success form-control" onclick="submitAnonymousStatistics();"><i class="fas fa-fw fa-upload"></i> Send Statistics</button>
						</div>
						<div class="col-lg-12 col-sm-12 col-xs-12">
							<p><small>Anonymous Statistics: As this site is completely free, open source and supplied for the <a href="https://www.youtube.com/watch?v=uYTeTK57sCQ" target="_blank">greater good</a>, if you would like to supply your county too, we can build a picture of where this tool is being used and build a heatmap of where higher areas of concern are. It's completely optional and completely anonymous of course. The information we gather will only be used on this site. Nowhere else.</small></p>
						</div>
					</div>
				</div>
				<div id="anonymousStatistics_complete" style="display: none;">
					<div class="row mt-1">
						<div class="col-lg-6 offset-lg-3 col-md-6 offset-md-3 col-sm-12 col-xs-12 text-center">
							<h2>Thank you</h2>
							<p>We recorded your recent anonymous statistic submission. It's greatly appreciated and will help us build up a map of where this tool is being used, and what regions in the UK are checking more regularly.</p>
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
