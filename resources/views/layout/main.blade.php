<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from educhamp.themetrades.com/demo/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:08:15 GMT -->
<head>

	<!-- META ============================================= -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	
	<!-- DESCRIPTION -->
	<meta name="description" content="Hotel Room Booking SYstem" />
	
	<!-- OG -->
	<meta property="og:title" content="" />
	<meta property="og:description" content="Hotel Room Booking SYstem" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- FAVICONS ICON ============================================= -->
	<link rel="icon" href="../error-404.html" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png" />
	
	<!-- PAGE TITLE HERE ============================================= -->
	<title>Hotel Management system Admin</title>
	
	<!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" type="text/css" href="assets/css/assets.css">
	<link rel="stylesheet" type="text/css" href="assets/vendors/calendar/fullcalendar.css">
	<link rel="stylesheet" type="text/css" href="assets/css/typography.css">
	<link rel="stylesheet" type="text/css" href="assets/css/shortcodes/shortcodes.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/dashboard.css">
	<link class="skin" rel="stylesheet" type="text/css" href="assets/css/color/color-1.css">
	<style type="text/css">
		.modal1{
			position: fixed;
		    top: 0;
		    width: 100%;
		    height: 100vh;
		    display: flex;
		    justify-content: center;
		    align-items: center;
		    background-color: #17171736;
		}
		.modal2{
		    right: 0px;
		    position: fixed;
		    width: 50%;
		}
		  .inmodal1{
		  	width: 50%;
		  }
		  .wrong{
		  	 background-color: #ff9a9a;
		  }
		  .goodgreen{
		  	background-color: #5ef192;
		  }
		  .wrongleft{
		  	border-left: 8px solid red;
		  }
		  .goodleft{
		  	border-left: 8px solid green;
		  }
		  .hidemo{
		  	
		  	display: none;
		  }

		  .showmo{
		  	/*animation: fadeout ease 20s;
			-webkit-animation: fadeout ease 20s;
			-moz-animation: fadeout ease 20s;
			-o-animation: fadeout ease 20s;
			-ms-animation: fadeout ease 20s;*/
		  	display: block;
		  }
		  @keyframes fadeout {
			0% {opacity:0;}
			100% {opacity:1;}
			}

			@-moz-keyframes fadeout {
			0% {opacity:0;}
			100% {opacity:1;}
			}

			@-webkit-keyframes fadeout {
			0% {opacity:0;}
			100% {opacity:1;}
			}

			@-o-keyframes fadeout {
			0% {opacity:0;}
			100% {opacity:1;}
			}

			@-ms-keyframes fadeout {
			0% {opacity:0;}
			100% {opacity:1;}
			}

			@keyframes fadeIn {
			0% {opacity:0;}
			100% {opacity:1;}
			}

			@-moz-keyframes fadeIn {
			0% {opacity:0;}
			100% {opacity:1;}
			}

			@-webkit-keyframes fadeIn {
			0% {opacity:0;}
			100% {opacity:1;}
			}

			@-o-keyframes fadeIn {
			0% {opacity:0;}
			100% {opacity:1;}
			}

			@-ms-keyframes fadeIn {
			0% {opacity:0;}
			100% {opacity:1;}
			}
			.warningborder{
				border:1px solid red;
			}
	</style>
</head>
<body class="ttr-opened-sidebar ttr-pinned-sidebar">
	
	<!-- header start -->
	<header class="ttr-header">
		<div class="ttr-header-wrapper">
			<!--sidebar menu toggler start -->
			<div class="ttr-toggle-sidebar ttr-material-button">
				<i class="ti-close ttr-open-icon"></i>
				<i class="ti-menu ttr-close-icon"></i>
			</div>
			<!--sidebar menu toggler end -->
			<!--logo start -->
			<div class="ttr-logo-box">
				<div>
					<!--
					<a href="index.html" class="ttr-logo">
						<img class="ttr-logo-mobile" alt="" src="assets/images/logo-mobile.png" width="30" height="30">
						<img class="ttr-logo-desktop" alt="" src="assets/images/logo-white.png" width="160" height="27">
					</a>-->
					<h1>Hotel Management System</h1>
				</div>
			</div>
			<!--logo end -->
			<div class="ttr-header-menu">
				
			</div>
			<div class="ttr-search-bar">
				<form class="ttr-search-form">
					<div class="ttr-search-input-wrapper">
						<input type="text" name="qq" placeholder="search something..." class="ttr-search-input">
						<button type="submit" name="search" class="ttr-search-submit"><i class="ti-arrow-right"></i></button>
					</div>
					<span class="ttr-search-close ttr-search-toggle">
						<i class="ti-close"></i>
					</span>
				</form>
			</div>
		</div>
	</header>
	<div class="ttr-sidebar">
		<div class="ttr-sidebar-wrapper content-scroll">
			<div class="ttr-sidebar-logo">
				<a href="/">
					<!--
					<img alt="" src="assets/images/logo.png" width="122" height="27">
				-->
				Visit Website
				</a>
				
				<div class="ttr-sidebar-toggle-button">
					<i class="ti-arrow-left"></i>
				</div>
			</div>
			<nav class="ttr-sidebar-navi">
				<ul>
					<li>
						<a href="index.html" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-home"></i></span>
		                	<span class="ttr-label">Dashborad</span>
		                </a>
		            </li>
					<li>
						<a href="/createRoom" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-plus"></i></span>
		                	<span class="ttr-label">Add Rooms</span>
		                </a>
		            </li>
					<li>
						<a href="courses.html" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-book"></i></span>
		                	<span class="ttr-label">Bookings</span>
		                </a>
		            </li>
		            <li>
						<a href="courses.html" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-user"></i></span>
		                	<span class="ttr-label">Log Out</span>
		                </a>
		            </li>
		            <li class="ttr-seperate"></li>
				</ul>
			</nav>
		</div>
	</div>
	@yield('content')
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/vendors/bootstrap/js/popper.min.js"></script>
	<script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
	<script src="assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
	<script src="assets/vendors/magnific-popup/magnific-popup.js"></script>
	<script src="assets/vendors/counter/waypoints-min.js"></script>
	<script src="assets/vendors/counter/counterup.min.js"></script>
	<script src="assets/vendors/imagesloaded/imagesloaded.js"></script>
	<script src="assets/vendors/masonry/masonry.js"></script>
	<script src="assets/vendors/masonry/filter.js"></script>
	<script src="assets/vendors/owl-carousel/owl.carousel.js"></script>
	<script src='assets/vendors/scroll/scrollbar.min.js'></script>
	<script src="assets/js/functions.js"></script>
	<script src="assets/vendors/chart/chart.min.js"></script>
	<script src="assets/js/admin.js"></script>
	<script src='assets/vendors/calendar/moment.min.js'></script>
	<script src='assets/vendors/calendar/fullcalendar.js'></script>
	<script src='assets/vendors/switcher/switcher.js'></script>
	<script>
	  $(document).ready(function() {

	    $('#calendar').fullCalendar({
	      header: {
	        left: 'prev,next today',
	        center: 'title',
	        right: 'month,agendaWeek,agendaDay,listWeek'
	      },
	      defaultDate: '2019-03-12',
	      navLinks: true, // can click day/week names to navigate views

	      weekNumbers: true,
	      weekNumbersWithinDays: true,
	      weekNumberCalculation: 'ISO',

	      editable: true,
	      eventLimit: true, // allow "more" link when too many events
	      events: [
	        {
	          title: 'All Day Event',
	          start: '2019-03-01'
	        },
	        {
	          title: 'Long Event',
	          start: '2019-03-07',
	          end: '2019-03-10'
	        },
	        {
	          id: 999,
	          title: 'Repeating Event',
	          start: '2019-03-09T16:00:00'
	        },
	        {
	          id: 999,
	          title: 'Repeating Event',
	          start: '2019-03-16T16:00:00'
	        },
	        {
	          title: 'Conference',
	          start: '2019-03-11',
	          end: '2019-03-13'
	        },
	        {
	          title: 'Meeting',
	          start: '2019-03-12T10:30:00',
	          end: '2019-03-12T12:30:00'
	        },
	        {
	          title: 'Lunch',
	          start: '2019-03-12T12:00:00'
	        },
	        {
	          title: 'Meeting',
	          start: '2019-03-12T14:30:00'
	        },
	        {
	          title: 'Happy Hour',
	          start: '2019-03-12T17:30:00'
	        },
	        {
	          title: 'Dinner',
	          start: '2019-03-12T20:00:00'
	        },
	        {
	          title: 'Birthday Party',
	          start: '2019-03-13T07:00:00'
	        },
	        {
	          title: 'Click for Google',
	          url: 'http://google.com/',
	          start: '2019-03-28'
	        }
	      ]
	    });

	  });

	</script>
	@yield('jscontent')
	</body>

	<!-- Mirrored from educhamp.themetrades.com/demo/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:09:05 GMT -->
	</html>