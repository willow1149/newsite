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
			width: 100%;
		}
		/* main menu */
		.main-menu-container {
			display: none;
			position: absolute;
			left: 0;
			right: 0;
			top: 50px;
			z-index: 66;
		}
		/* body */
		.body{
			margin-top: 40px;
		}
		/* sm-simple */
		.sm {
			position: relative;
			z-index: 2;
			float: right;
			min-width: 290px;
			width: 100%;
			font-family: "Arimo", "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif;
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
		.sm ul {
			display: none;
		}
		.sm li,
		.sm a {
			position: relative;
		}
		.sm a {
			display: block;
			.transition(all .3s);
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
		/* -------------- */
		.sm-simple {
			background: white;
		}
		.sm-simple a {
			padding: 14px;
			color: #333;
			font-size: 11px;
			text-transform: uppercase;
			line-height: 17px;
			text-decoration: none;
		}
		.sm-simple.sm-vertical {
			width: 320px;
		}
		.sm-simple .current-menu-item a,
		.sm-simple a:hover,
		.sm-simple a:focus,
		.sm-simple a:active,
		.sm-simple a.highlighted {
			background: #f58220;
			color: white;
		}
		.sm-simple a.disabled {
			color: #333;
		}
		.sm-simple a.has-submenu {
			padding-right: 57px;
		}
		.sm-simple.sm-rtl a.has-submenu {
			padding-right: 14px;
			padding-left: 57px;
		}
		.sm-simple a span.sub-arrow {
			position: absolute;
			top: 50%;
			margin-top: -29px;
			left: auto;
			right: 0px;
			width: 57px;
			height: 57px;
			overflow: hidden;
			font: 700 14px/34px monospace!important;
			text-align: center;
			text-shadow: none;
			line-height: 57px !important;
		}
		.sm-simple.sm-rtl a span.sub-arrow {
			left: 0px;
			right: auto;
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
		@media (min-width: 992px) {
			.sm-simple ul {
				background: #FFF;
				position: absolute;
				width: 290px !important;
				background: white;
			}
			.sm-simple li {
				display: table-cell;
			}
			.sm-simple ul li,
			.sm-simple.sm-rtl ul li,
			.sm-simple.sm-vertical li {
				float: left;
				display: block;
				width: 100%;
			}
			.sm-simple a {
				white-space: nowrap;
				text-align: left;
			}
			.sm-simple.sm-rtl a {
				text-align: right;
			}
			.sm-simple ul a,
			.sm-simple.sm-vertical a {
				white-space: normal;
			}
			.sm-simple .sm-nowrap > li > a,
			.sm-simple .sm-nowrap > li >:not(ul) a {
				white-space: nowrap;
			}
			/* ...end */
			.sm-simple {
				display: table;
				width: 100%;
				max-width: 100% !important;
			}
			.sm-simple a.disabled {
				background: white;
				color: #cccccc;
			}
			.sm-simple a.highlighted span.sub-arrow:before {
				display: none;
			}
			.sm-simple > li {
				border-top: 0;
			}
			.sm-simple > li:first-child {
				border-left: 0;
			}
			.sm-simple ul a.has-submenu {
				padding-right: 20px;
			}
			.sm-simple ul > li {
				border-left: 0;
				border-top: 1px solid #ebebeb;
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
			.sm-simple span.scroll-up-arrow,
			.sm-simple span.scroll-down-arrow {
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
				padding-left: 57px;
			}
			.sm-simple.sm-rtl a span.sub-arrow {
				right: auto;
				left: 0;
			}
			.sm-simple.sm-rtl > li:first-child {
				border-left: 1px solid #ebebeb;
			}
			.sm-simple.sm-rtl > li:last-child {
				border-left: 0;
			}
			.sm-simple.sm-rtl ul a span.sub-arrow {
				left: 0;
			}
			.sm-simple.sm-vertical li {
				border-left: 0;
				border-top: 1px solid #ebebeb;
			}
			.sm-simple.sm-vertical > li:first-child {
				border-top: 0;
			}
		}
		/* hamburger menu */
		.menu-toggle {
			width: 50px;
			height: 38px;
			margin: 0;
			position: absolute;
			cursor: pointer;
			right: 15px;
			top: 0;
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
			width: 100%;
			padding: 4px 0;
		}
		.menu-toggle .hamburger span {
			width: 30px;
			height: 2px;
			position: relative;
			top: 0;
			left: 0;
			margin: 6px 10px;
		}
		.menu-toggle .hamburger span:nth-child(1) {
			/*transition-delay: .5s;*/
		}
		.menu-toggle .hamburger span:nth-child(2) {
			/*transition-delay: .625s*/;
		}
		.menu-toggle .hamburger span:nth-child(3) {
			/*transition-delay: .75s;*/
		}
		.menu-toggle .cross {
			position: absolute;
			height: 100%;
			width: 100%;
			transform: rotate(45deg);
		}
		.menu-toggle .cross span:nth-child(1) {
			height: 0%;
			width: 2px;
			position: absolute;
			top: 4px;
			left: 24px;
			transition-delay: 0s;
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
		.menu-toggle.open .hamburger span:nth-child(1) {
			/*transition-delay: 0s;*/
		}
		.menu-toggle.open .hamburger span:nth-child(2) {
			/*transition-delay: .125s;*/
		}
		.menu-toggle.open .hamburger span:nth-child(3) {
			/*transition-delay: .25s;*/
		}
		.menu-toggle.open .cross span:nth-child(1) {
			height: 30px;
			/*transition-delay: .625s*/;
		}
		.menu-toggle.open .cross span:nth-child(2) {
			width: 30px;
			/*transition-delay: .375s;*/
		}
		/* ––––––––––– media Queries ––––––––––– */
		/* custom, iphone retina */
		@media only screen and (min-width: 320px) {}
		/* extra small devices, phones */
		@media only screen and (min-width: 480px) {}
		/* small devices, tablets */
		@media only screen and (min-width: 768px) {
			/* menu max width */
			.sm{        
				max-width: 320px;
			}
		}
		@media only screen and (max-width: 768px) {
			/* menu max width */
			.main-header #logo{
				width: 50%;
				height: 50px;
				display: inline-block;
				background-color: #01809c;
			}
			.main-header #logo .res-img{
				height: 50px;
				margin: 0 auto; 
			}
		}
		/* medium devices, desktops */
		@media only screen and (min-width: 992px) {
			/* main menu */
			.main-menu-container {
				display: block !important;
				position: relative;
			}
			.mainmenutoggle {
				display: none;
			}
		}
		/* large devices, wide screens */
		@media only screen and (min-width: 1200px) {
			#eme-slider-wrap-full-screen , #eme-slider-wrap-full-screen .item {
				max-height: 662px; /* this should be the desktop image actual height - change accordingly */
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