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
					<p>In the event of national power rationing, find out when you may likely be affected by planned disconnections.</p>
					<p>All data on this website is from publicly available government data, <strong>and this site is provided as is, without any warranty whatsoever</strong>. You are encouraged to <a href="https://www.gov.uk/government/publications/electricity-supply-emergency-code" target="_blank">read the original PDF</a> to gain insight into the authoritative data, and contact your electricity supplier if you have any questions or concerns. This site is not affiliated with HM Goverment or any Governmental Body, and has been created purely for educational purposes.</p>
					<div class="alert alert-success" align="center">
						<strong><i class="fas fa-fw fa-check-circle"></i> Current UK Level of Disconnection: 0 - Emergency Code Not In Effect</strong><br />
						<small>N.B. Level of Disconnections are cummulative. Meaning that if the Level of Disconnection currently in force is 4, all disconnections in levels 1, 2, 3 AND 4 apply.</small>
					</div>
				</div>
			</div>
		</div>
		<div class="container mt-1">
			<hr/>
			<div class="row mt-1">
				<div class="col-lg-4 col-sm-12 col-xs-12">
					<label for="load_block">What Load Block are you in?</label>
					<select class="form-control mb-2" id="load_block" name="load_block" required="required" onchange="doCheck();">
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
				<div class="col-lg-4 col-sm-12 col-xs-12">
					<label for="level_of_disconnection">What Level of Disconnection do you want to check?</label>
					<select class="form-control mb-2" id="level_of_disconnection" name="level_of_disconnection" required="required" onchange="doCheck();">
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
				<div class="col-lg-4 col-sm-12 col-xs-12">
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
						<option value="Cheshire">Cheshire</option>
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
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<p><small>You can find your "Load Block" on your electricity bill, usually the starting letter of your reference or account number. The Current Level of Disconnection is shown on this page and is preset, you can change this if you like to find out what a different level would look like. If you would like to supply your county too, we can build a picture of where this tool is being used and build a heatmap of where higher areas of concern are. It's completely optional and anonymous of course.</small></p>
				</div>
			</div>
			<hr class="mb-4"/>
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
			<?php include_once(__DIR__ . "/includes/footer.php"); ?>
		</div>
		<?php include_once(__DIR__ . "/includes/corejs.php"); ?>
		<script>
			let jsonData = null;
			let timePeriods = null;

			let daysOfWeek = ["", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];

			$.getJSON("assets/files/disconnection_rota.min.json", function(data){
				jsonData = data;
			});

			$.getJSON("assets/files/time_periods.min.json", function(data){
				timePeriods = data;
			});

			function doCheck() {
				let dataString = "";

				let lb		=	$("#load_block").val();
				let lod		=	$("#level_of_disconnection").val();

				if (lod == 18) {
					dataString += '<tr><td colspan="5" align="center"><strong><i class="fas fa-fw fa-exclamation-triangle text-warning"></i> At Disconnection Level 18, power is cut to all load blocks, at all times of day <i class="fas fa-fw fa-exclamation-triangle text-warning"></i></strong></td></tr>';
				} else {
					for (let i = 0; i < jsonData.length; ++i) {
						if (jsonData[i].lb == lb) {
							if (jsonData[i].lod <= lod) {
								dataString += "<tr>";
								dataString += "<td>" + daysOfWeek[jsonData[i].dow] + "</td>";
								dataString += "<td>" + timePeriods[jsonData[i].pid].st + "</td>";
								dataString += "<td>" + timePeriods[jsonData[i].pid].et + "</td>";
								dataString += "<td>" + lb + "</td>";
								dataString += "<td>" + jsonData[i].lod + "</td>";
								dataString += "</tr>";
							}
						}
					}
				}
				$("#blackout_data").html(dataString);
			}
		</script>
	</body>
</html>
