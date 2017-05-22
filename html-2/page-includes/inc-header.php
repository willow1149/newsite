<?php
function minify_output($buffer)
{
	$search  = array(
		'/\>[^\S ]+/s',
		'/[^\S ]+\</s',
		'/(\s)+/s'
		);
	$replace = array(
		'>',
		'<',
		'\\1'
		);
	if (preg_match("/\<html/i", $buffer) == 1 && preg_match("/\<\/html\>/i", $buffer) == 1) {
		$buffer = preg_replace($search, $replace, $buffer);
	}
	return $buffer;
}
ob_start("minify_output");
?>
<!DOCTYPE html>
<html>
<head>
	<title>HTML 2</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<style>
		.container-fluid{
			max-width: 1600px;
		}
		.main-header{
			position: fixed;
			top: 0;
			z-index: 999;
			max-width: 1600px;
		}
		.main-slider-outer{
			margin-top: 55px;
		}
		/* All Mobile Sizes (devices and browser) */ 
		@media only screen and (max-width: 767px) {
			.main-header{
				width: 100%;
				font-size: 0; 
			}
			.menu-toggle{
				width: 50% !important;
				right: 0px !important;
			}
			.menu-toggle .hamburger{
				width: 20% !important;
				right: 10px !important;
			}
			.menu-toggle .menu-btn-txt{
				right: 65px;
			}
			.main-header #logo{
				width: 50%;
				display: inline-block;
				height: 55px;
				background: #3498DB;
			}
			.main-header #logo .res-img{
				height: 40px;
				width: 99px;
				margin: 7px auto;
			}
			.main-header .main-nav{
				width: 50%;
				float: right;
				height: 55px;
				border: 0px;
				background: #1abc9c; 
			}
			.main-header .main-nav #main-menu{
				position: fixed;
				left: 0;
				right: 0;
				width: 100%;
				top: 55px;
			}
			.main-menu-container {
				display: none;			
			}
		}
		/*Between 1200 and 768 (devices and browsers)*/ 
		@media only screen and (min-width: 768px) and (max-width: 991px) {
			.main-header{
				width: 100%;
			}
			.main-header #logo img{
				width: 90px;
				margin: 0 auto;
			}
			.main-menu-container {
				display: none;
				width: 50%;
				position: absolute;
				top: 55px;
				right: 0;
			}
			.menu-toggle{
				width: 120px !important;
				height: 55px !important;
				top: 0 !important;
				right: 0px !important;
				background-color: green;
			}
			.menu-toggle .hamburger{
				padding: 14px 0 !important;
				right: 7px !important;
				width: 42% !important;
			}
			.menu-toggle .cross{
				position: absolute;
				height: 74%;
				width: 50%;
				padding: 4px 0;
				right: 8px !important;
				top: 10px;
				transform: rotate(45deg);
			}
			.menu-toggle .menu-btn-txt{
				top: 17px !important;
				left: 20px !important;
			}
		}
		.sm {
			position: relative;
			z-index: 9999;
		}

		.sm,
		.sm ul,
		.sm li {
			display: block;
			list-style: none;
			margin: 0;
			padding: 0;
			line-height: normal;
			direction: ltr;
			text-align: left;
			-webkit-tap-highlight-color: rgba(0, 0, 0, 0);
		}

		.sm-rtl,
		.sm-rtl ul,
		.sm-rtl li {
			direction: rtl;
			text-align: right;
		}

		.sm>li>h1,
		.sm>li>h2,
		.sm>li>h3,
		.sm>li>h4,
		.sm>li>h5,
		.sm>li>h6 {
			margin: 0;
			padding: 0;
		}

		.sm ul {
			display: none;
		}

		.sm li,
		.sm a {
			position: relative;
		}

		.sm a {
			display: block;
		}

		.sm a.disabled {
			cursor: not-allowed;
		}

		.sm:after {
			content: "\00a0";
			display: block;
			height: 0;
			font: 0px/0 serif;
			clear: both;
			visibility: hidden;
			overflow: hidden;
		}

		.sm,
		.sm *,
		.sm *:before,
		.sm *:after {
			-moz-box-sizing: border-box;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
		}
		/* hamburger menu */
		.menu-toggle {
			width: 100px;
			height: 38px;
			margin: 0;
			position: absolute;
			cursor: pointer;
			right: 15px;
			top: 8px;
		}
		
		.menu-toggle .menu-btn-txt{
			font-size: 14px;
			position: absolute;
			top: 8px;
		}

		.menu-toggle * {
			/*transition: 0.25s ease-in-out;*/
			box-sizing: border-box;
		}
		.menu-toggle span {
			display: block;
			background: #353535;
		}
		.menu-toggle .hamburger {
			position: absolute;
			height: 100%;
			width: 50%;
			padding: 4px 0;
			right: 0
		}
		.menu-toggle .hamburger span {
			width: 30px;
			height: 2px;
			position: relative;
			top: 0;
			left: 0;
			margin: 6px 10px;
		}
		/*.menu-toggle .hamburger span:nth-child(1) {
			transition-delay: .5s;
		}
		.menu-toggle .hamburger span:nth-child(2) {
			transition-delay: .625s;
		}
		.menu-toggle .hamburger span:nth-child(3) {
			transition-delay: .75s;
		}*/
		.menu-toggle .cross {
			position: absolute;
			height: 100%;
			width: 50%;
			padding: 4px 0;
			right: 0;
			transform: rotate(45deg);
		}
		.menu-toggle .cross span:nth-child(1) {
			height: 0%;
			width: 2px;
			position: absolute;
			top: 4px;
			left: 24px;
			/*transition-delay: 0s;*/
		}
		.menu-toggle .cross span:nth-child(2) {
			width: 0%;
			height: 2px;
			position: absolute;
			left: 10px;
			top: 18px;
			/*transition-delay: .25s;*/
		}
		.menu-toggle.open .hamburger span {
			width: 0%;
		}
		/*.menu-toggle.open .hamburger span:nth-child(1) {
			transition-delay: 0s;
		}
		.menu-toggle.open .hamburger span:nth-child(2) {
			transition-delay: .125s;
		}
		.menu-toggle.open .hamburger span:nth-child(3) {
			transition-delay: .25s;
		}*/
		.menu-toggle.open .cross span:nth-child(1) {
			height: 30px;
			/*transition-delay: .625s;*/
		}
		.menu-toggle.open .cross span:nth-child(2) {
			width: 30px;
			/*transition-delay: .375s;*/
		}
		.sm-simple {
			border: 1px solid #bbbbbb;
			background: white;
			-webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
			-moz-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
			box-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
		}
		.sm-simple a, .sm-simple a:hover, .sm-simple a:focus, .sm-simple a:active {
			padding: 13px 20px;
			/* make room for the toggle button (sub indicator) */
			padding-right: 58px;
			color: #555555;
			font-family: "Lucida Sans Unicode", "Lucida Sans", "Lucida Grande", Arial, sans-serif;
			font-size: 16px;
			font-weight: normal;
			line-height: 17px;
			text-decoration: none;
		}
		.sm-simple a.current {
			background: #555555;
			color: white;
		}
		.sm-simple a.disabled {
			color: #cccccc;
		}
		.sm-simple a span.sub-arrow {
			position: absolute;
			top: 50%;
			margin-top: -17px;
			left: auto;
			right: 4px;
			width: 34px;
			height: 34px;
			overflow: hidden;
			font: bold 14px/34px monospace !important;
			text-align: center;
			text-shadow: none;
			background: rgba(0, 0, 0, 0.08);
		}
		.sm-simple a.highlighted span.sub-arrow:before {
			display: block;
			content: '-';
		}
		.sm-simple li {
			border-top: 1px solid rgba(0, 0, 0, 0.05);
		}
		.sm-simple > li:first-child {
			border-top: 0;
		}
		.sm-simple ul {
			background: rgba(179, 179, 179, 0.1);
		}
		.sm-simple ul a, .sm-simple ul a:hover, .sm-simple ul a:focus, .sm-simple ul a:active {
			font-size: 14px;
			border-left: 8px solid transparent;
		}
		.sm-simple ul ul a,
		.sm-simple ul ul a:hover,
		.sm-simple ul ul a:focus,
		.sm-simple ul ul a:active {
			border-left: 16px solid transparent;
		}
		.sm-simple ul ul ul a,
		.sm-simple ul ul ul a:hover,
		.sm-simple ul ul ul a:focus,
		.sm-simple ul ul ul a:active {
			border-left: 24px solid transparent;
		}
		.sm-simple ul ul ul ul a,
		.sm-simple ul ul ul ul a:hover,
		.sm-simple ul ul ul ul a:focus,
		.sm-simple ul ul ul ul a:active {
			border-left: 32px solid transparent;
		}
		.sm-simple ul ul ul ul ul a,
		.sm-simple ul ul ul ul ul a:hover,
		.sm-simple ul ul ul ul ul a:focus,
		.sm-simple ul ul ul ul ul a:active {
			border-left: 40px solid transparent;
		}

		@media (min-width: 1199px) {
  /* Switch to desktop layout
  -----------------------------------------------
     These transform the menu tree from
     collapsible to desktop (navbar + dropdowns)
     -----------------------------------------------*/
     /* start... (it's not recommended editing these rules) */
     .sm-simple ul {
     	position: absolute;
     	width: 12em;
     }

     .sm-simple li {
     	float: left;
     }

     .sm-simple.sm-rtl li {
     	float: right;
     }

     .sm-simple ul li, .sm-simple.sm-rtl ul li, .sm-simple.sm-vertical li {
     	float: none;
     }

     .sm-simple a {
     	white-space: nowrap;
     }

     .sm-simple ul a, .sm-simple.sm-vertical a {
     	white-space: normal;
     }

     .sm-simple .sm-nowrap > li > a, .sm-simple .sm-nowrap > li > :not(ul) a {
     	white-space: nowrap;
     }

     /* ...end */
     .sm-simple {
     	background: white;
     }
     .sm-simple a, .sm-simple a:hover, .sm-simple a:focus, .sm-simple a:active, .sm-simple a.highlighted {
     	padding: 11px 20px;
     	color: #555555;
     }
     .sm-simple a:hover, .sm-simple a:focus, .sm-simple a:active, .sm-simple a.highlighted {
     	background: #eeeeee;
     }
     .sm-simple a.current {
     	background: #555555;
     	color: white;
     }
     .sm-simple a.disabled {
     	background: white;
     	color: #cccccc;
     }
     .sm-simple a.has-submenu {
     	padding-right: 32px;
     }
     .sm-simple a span.sub-arrow {
     	top: 50%;
     	margin-top: -8px;
     	right: 20px;
     	width: 8px;
     	height: 16px;
     	font: 14px/16px monospace !important;
     	background: transparent;
     }
     .sm-simple a.highlighted span.sub-arrow:before {
     	display: none;
     }
     .sm-simple > li {
     	border-top: 0;
     	border-left: 1px solid #eeeeee;
     }
     .sm-simple > li:first-child {
     	border-left: 0;
     }
     .sm-simple ul {
     	border: 1px solid #bbbbbb;
     	background: white;
     	-webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
     	-moz-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
     	box-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
     }
     .sm-simple ul a {
     	border: 0 !important;
     }
     .sm-simple ul a.has-submenu {
     	padding-right: 20px;
     }
     .sm-simple ul a span.sub-arrow {
     	right: auto;
     	margin-left: -12px;
     }
     .sm-simple ul > li {
     	border-left: 0;
     	border-top: 1px solid #eeeeee;
     }
     .sm-simple ul > li:first-child {
     	border-top: 0;
     }
     .sm-simple span.scroll-up,
     .sm-simple span.scroll-down {
     	position: absolute;
     	display: none;
     	visibility: hidden;
     	overflow: hidden;
     	background: white;
     	height: 20px;
     }
     .sm-simple span.scroll-up-arrow, .sm-simple span.scroll-down-arrow {
     	position: absolute;
     	top: -2px;
     	left: 50%;
     	margin-left: -8px;
     	width: 0;
     	height: 0;
     	overflow: hidden;
     	border-width: 8px;
     	border-style: dashed dashed solid dashed;
     	border-color: transparent transparent #555555 transparent;
     }
     .sm-simple span.scroll-down-arrow {
     	top: 6px;
     	border-style: solid dashed dashed dashed;
     	border-color: #555555 transparent transparent transparent;
     }
     .sm-simple.sm-rtl a.has-submenu {
     	padding-right: 20px;
     	padding-left: 32px;
     }
     .sm-simple.sm-rtl a span.sub-arrow {
     	right: auto;
     	left: 20px;
     }
     .sm-simple.sm-rtl.sm-vertical a.has-submenu {
     	padding: 11px 20px;
     }
     .sm-simple.sm-rtl.sm-vertical a span.sub-arrow {
     	right: 20px;
     	margin-right: -12px;
     }
     .sm-simple.sm-rtl > li:first-child {
     	border-left: 1px solid #eeeeee;
     }
     .sm-simple.sm-rtl > li:last-child {
     	border-left: 0;
     }
     .sm-simple.sm-rtl ul a.has-submenu {
     	padding: 11px 20px;
     }
     .sm-simple.sm-rtl ul a span.sub-arrow {
     	right: 20px;
     	margin-right: -12px;
     }
     .sm-simple.sm-vertical a span.sub-arrow {
     	right: auto;
     	margin-left: -12px;
     }
     .sm-simple.sm-vertical li {
     	border-left: 0;
     	border-top: 1px solid #eeeeee;
     }
     .sm-simple.sm-vertical > li:first-child {
     	border-top: 0;
     }
 }
</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<header>
				<div class="main-header">
					<a href="#" id="logo">
						<img class="img-responsive res-img" src="../images/logo.png" alt="">
					</a>
					<?php require_once('../modules/main-menu.php') ?>
				</div>
				<div class="main-slider-outer">
					<?php require_once('../modules/main-slider.php') ?>
				</div>
			</header>
		</div>