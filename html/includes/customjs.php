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
	});
</script>