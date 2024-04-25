<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
	data-template="vertical-menu-template-free">

<head>
	<meta charset="utf-8" />
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

	<title>Dashboard | Bank Indonesia Hackathon 2024</title>

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="/img/favicon/favicon.png" />

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link
		href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
		rel="stylesheet" />

	<!-- Icons. Uncomment required icon fonts -->
	<link rel="stylesheet" href="/fonts/boxicons.css" />

	<!-- Core CSS -->
	<link rel="stylesheet" href="/css/core.css" class="template-customizer-core-css" />
	<link rel="stylesheet" href="/css/theme-default.css" class="template-customizer-theme-css" />
	<link rel="stylesheet" href="/css/demo.css" />
	<link rel="stylesheet" href="/css/register.css" />

	<!-- Page CSS -->

	<!-- Helpers -->
	<script src="/js/helpers.js"></script>

	<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
	<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
	<script src="js/config.js"></script>
</head>

<body>
	<!-- Layout wrapper -->
	<div class="layout-wrapper layout-content-navbar">
		<div class="layout-container">

			<!-- Sidebar -->
			@include('dashboard.layouts.partials.sidebar');

			<div class="layout-page">

				<!-- Navbar -->
				@include('dashboard.layouts.partials.navbar')

				<!-- Content wrapper -->
				@yield('content')
				<!-- Content wrapper -->

			</div>
		</div>

		<!-- Overlay -->
		<div class="layout-overlay layout-menu-toggle"></div>
	</div>
	<!-- / Layout wrapper -->

	<script>
		function displayCalendar(month, year){
        
			var monthNow = new Date().getMonth();
			var yearNow = new Date().getFullYear();;
			var nextMonth = month+1;
			var prevMonth = month-1;
			var day = 0;
			
			if((month == monthNow)&&(year == yearNow)){
				var day = new Date().getDate();
			}
			
			var htmlContent ="";
			var FebNumberOfDays ="";
			var counter = 1;
			var Nameday = 1;
			
			if (month == 1){
				if ( (year%100!=0) && (year%4==0) || (year%400==0)){
					FebNumberOfDays = 29;
					}else{
					FebNumberOfDays = 28;
				}
			}
			
			var monthNames = ["Januari","Febuari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November", "Desember"];
			var monthNum = ["1","2","3","4","5","6","7","8","9","10","11", "12"];
			var dayNames = ["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"];
			var dayPerMonth = ["31", ""+FebNumberOfDays+"","31","30","31","30","31","31","30","31","30","31"]
			var nextDate = new Date(nextMonth +' 1 ,'+year);
			var weekdays = nextDate.getDay();
			var weekdays2 = weekdays
			var numOfDays = dayPerMonth[month];
											
			while (weekdays>0){
			htmlContent += "<li style='padding:1 0 0;'></li>";
				weekdays--;
			}
			
			while (counter <= numOfDays){
				
				if (weekdays2 > 6){
					weekdays2 = 0;
					htmlContent += "</ul><ul>";
				}
				if (counter == day){
					htmlContent +="<li class='dayNow'>"+counter+"</li>";
					Nameday = counter;
					}else{
					htmlContent +="<li>"+counter+"</li>";
				}
				weekdays2++;
				counter++;
			}
			
			document.getElementById("monthNow").innerHTML= monthNames[month]+" "+ year ;
			document.getElementById("daysNum").innerHTML= "<ul id="+monthNum[month]+" class="+year+">"+htmlContent+"</ul>";
		}
    
    
		(function() {
			var dateNow = new Date();
			var month = dateNow.getMonth();
			var year = dateNow.getFullYear();
			displayCalendar(month,year)
		})(window);
		
		
		document.getElementById("nextMonth").onclick = function(){
			var idmonth = document.getElementById("daysNum");
			var month = idmonth.getElementsByTagName("ul")[0].id;
			var nextYear = idmonth.getElementsByTagName("ul")[0].className;
			var nextMonth = Number(month);
			if(nextMonth == 12){
				nextMonth = 0;
				nextYear = Number(nextYear) + 1
			}
			displayCalendar(nextMonth,nextYear);
		}
		
		
		document.getElementById("prevMonth").onclick = function(){
			var idmonth = document.getElementById("daysNum");
			var month = idmonth.getElementsByTagName("ul")[0].id;
			var prevYear = idmonth.getElementsByTagName("ul")[0].className;
			var prevMonth = Number(month) - 2;
			if(prevMonth < 0 ){
				prevMonth = 11;    
				prevYear = Number(prevYear) - 1
			}
			displayCalendar(prevMonth,prevYear);
		}
	</script>

	<!-- Core JS -->
	<script src="/js/bootstrap.js"></script>
	<!-- Crisp -->
	<script type="text/javascript">
		window.$crisp=[];window.CRISP_WEBSITE_ID="-JzqEmX56venQuQw4YV8";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();
	</script>

	<!-- Place this tag in your head or just before your close body tag. -->
	<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>