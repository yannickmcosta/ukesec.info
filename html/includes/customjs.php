<script src="<?php echo APP_HTTP_SCHEME; ?><?php echo APP_URL_SLASH;?>assets/js/yehzuna.jquery.schedule.min.js"></script>
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

	function doCheck(lb) {
		let dataString = "";

		let lod		=	<?php echo CURRENT_LOD; ?>

		if (lod == 18) {
			dataString += '<tr><td colspan="5" align="center"><strong><i class="fas fa-fw fa-exclamation-triangle text-warning"></i> At Disconnection Level 18, power is cut to all load blocks, at all times of day <i class="fas fa-fw fa-exclamation-triangle text-warning"></i></strong></td></tr>';
		} else if (lod == 0) {
			dataString += '<tr><td colspan="5" align="center"><strong><i class="fas fa-fw fa-check-circle text-success"></i> At Disconnection Level 0, there is no power rationing taking place. Use the calculator to see how different levels of disconnection would affect you.</strong></td></tr>';
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
		$("#region_loadBlockSelector").hide();
		$("#region_blackoutData").show();
		$("#bigResetButton").show();
	}

	function doCalcCheck() {
		let dataString = "";
		let loadShedData = [];

		let lb		=	$("#load_block").val();
		let lod		=	$("#level_of_disconnection").val();

		if (lod == 18) {
			dataString += '<tr><td colspan="5" align="center"><strong><i class="fas fa-fw fa-exclamation-triangle text-warning"></i> At Disconnection Level 18, power is cut to all load blocks, at all times of day <i class="fas fa-fw fa-exclamation-triangle text-warning"></i></strong></td></tr>';
		} else if (lod == 0) {
			dataString += '<tr><td colspan="5" align="center"><strong><i class="fas fa-fw fa-check-circle text-success"></i> At Disconnection Level 0, there is no power rationing taking place. Use the calculator to see how different levels of disconnection would affect you.</strong></td></tr>';
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

						tempdata	=	{'day': (jsonData[i].dow - 1),'periods': [[timePeriods[jsonData[i].pid].st, timePeriods[jsonData[i].pid].et]]};
						loadShedData.push(tempdata);
					}
				}
			}
		}
		$("#blackout_data").html(dataString);
		resetSchedule();
		importSchedule(loadShedData);
	}

	function importSchedule(loadShedData) {
		$('#schedule').jqs('import', loadShedData);
	}

	function resetSchedule() {
		$('#schedule').jqs('reset');
	}

	function createSchedule() {
		$('#schedule').jqs({
			mode: 'read',
			hour: 24,
			days: 7,
			periodDuration: 30,
			periodOptions: true,
			periodColors: [],
			periodTitle: 'Disconnection Event',
			periodBackgroundColor: 'rgba(50, 50, 50, 0.8)',
			periodBorderColor: '#2a3cff',
			periodTextColor: '#fff',
			periodRemoveButton: 'Remove',
			periodDuplicateButton: 'Duplicate',
			periodTitlePlaceholder: 'Title',
			daysList: [
				'Monday',
				'Tuesday',
				'Wednesday',
				'Thursday',
				'Friday',
				'Saturday',
				'Sunday'
			],
			onInit: function () {},
			onAddPeriod: function () {},
			onRemovePeriod: function () {},
			onDuplicatePeriod: function () {},
			onClickPeriod: function () {}
		});
	}

	function doReset() {
		$("#blackout_data").html("");
		$("#region_loadBlockSelector").show();
		$("#region_blackoutData").hide();
		$("#bigResetButton").hide();
	}

	// https://stackoverflow.com/questions/5968196/how-do-i-check-if-a-cookie-exists
	function getCookie(name) {
		var dc = document.cookie;
		var prefix = name + "=";
		var begin = dc.indexOf("; " + prefix);
		if (begin == -1) {
			begin = dc.indexOf(prefix);
			if (begin != 0) return null;
		} else {
			begin += 2;
			var end = document.cookie.indexOf(";", begin);
			if (end == -1) {
			end = dc.length;
			}
		}
		// because unescape has been deprecated, replaced with decodeURI
		//return unescape(dc.substring(begin + prefix.length, end));
		return decodeURI(dc.substring(begin + prefix.length, end));
	} 

	function anonymousStatisticCookieCheck() {
		var myCookie = getCookie("anonymous-stats");
		if (myCookie == null) {
			console.log("Cannot find stat cookie");
		}
		else {
			console.log("Found Stat Cookie! Hiding Submission Form");
			$("#anonymousStatistics_incomplete").hide();
			$("#anonymousStatistics_complete").show();
		}
	}

	$('.loadBlockSelector').click(function(e) {
		e.preventDefault();
	});

	// https://www.w3schools.com/js/js_cookies.asp
	function setCookie(cname, cvalue, exdays) {
		const d = new Date();
		d.setTime(d.getTime() + (exdays*24*60*60*1000));
		let expires = "expires="+ d.toUTCString();
		document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/;SameSite=Strict;Secure;";
	}

	function submitAnonymousStatistics() {
		data	=	{
			"county": $("#uk_county").val()
		};
		$.ajax({
			type: "POST",
			url: "statisticSubmission",
			data: data,
			dataType: 'json',
			success: function(){
				console.log("YARP");
				setCookie("anonymous-stats", 1, 28);
				anonymousStatisticCookieCheck();
			},
			error: function(err){
				console.log(err);
				console.log("NARP");
			}
		});
	}

	$(document).ready(function(){
		anonymousStatisticCookieCheck();
		createSchedule();
	});
</script>