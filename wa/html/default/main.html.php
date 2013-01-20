<?php namespace wa;


function GetRenderTime() {
	return '1.111';
}


if(!defined('PORTAL_INDEX_FILE')){if(headers_sent()){echo '<header><meta http-equiv="refresh" content="0;url=../"></header>';}else{header('HTTP/1.0 301 Moved Permanently'); header('Location: ../');} die("<font size=+2>Access Denied!!</font>");}
class html_main extends \psm\html_File {


	/**
	 * html header
	 *
	 * @internal {site title}
	 * @internal {css}
	 * @internal {add to header}
	 * @return string
	 */
	protected function _head() {
\psm\Portal::getPortal()->getEngine()->addCss('
html,
body {
//	margin-top: -10px;
	height: 100%;
}
#push,
footer {
	height: 60px;
}
footer .container {
	width: 100%;
	height: 60px;
	border-top-width: 1px;
	border-top-style: solid;
	border-top-color: #cccccc;
	background-color: #f5f5f5;
}
footer .container table {
	width: 100%;
	border-width: 0px;
}
.footer-td-1,
.footer-td-2,
.footer-td-3 {
	width: 33%;
	padding-top: 5px;
}
.footer-td-1 {
	vertical-align: top;
	padding-left: 10px;
	font-size: xx-small;
}
.footer-td-1 {
	text-align: left;
}
.footer-td-2 {
	text-align: center;
}
.footer-td-3 {
	text-align: right;
	padding-right: 10px;
}
@media (max-width: 767px) {
	footer {
		margin-left: -20px;
		margin-right: -20px;
		padding-left: 20px;
		padding-right: 20px;
	}
}
#wrap {
	min-height: 100%;
	height: auto !important;
	height: 100%;
	/* Negative indent footer by its height */
	margin: 0 auto -61px;
}
#wrap .container {
	padding-top: 60px;
}
');
		// css
		$this->addFileCSS(
//			'{path=theme}main.css',
			'{path=static}bootstrap/Cerulean/bootstrap.min.css'
//			'{path=static}bootstrap/css/bootstrap-responsive.min.css'
//			'{path=theme}table_jui.css',
//			'{path=static}jquery/jquery-ui-1.8.19.custom.css'
		);
		// javascript
		$this->addFileJS(
//			'{path=static}js/jquery-1.7.2.min.js',
//			'{path=static}js/jquery.dataTables-1.9.0.min.js',
//			'{path=static}js/inputfunc.js'
		);
		return
'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>{site title}</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link rel="icon" type="image/x-icon" href="{path=static}favicon.ico" />

{header content}

</head>
<body>
';
	}
//	<script type="text/javascript"><!--//
//	function toggle(id) {
//		var e = document.getElementById(id);
//		if(e.style.display == \'block\')
//			e.style.display = \'none\';
//			else
//			e.style.display = \'block\';
//	}
//	//--></script>


	protected function _body() {
		return '
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="brand" href="">WebAuction<sup>Plus</sup></a>
			<ul class="nav">'.
				self::_nav_button('home',		'Home',			'./?page=home',			'icon-home').
				self::_nav_divider().
				self::_nav_button('myauctions',	"My Auctions",	'./?page=myauctions',	'icon-shopping-cart').
				self::_nav_divider().
				self::_nav_button('mailbox',	'My Mailbox',	'./?page=mailbox',		'icon-envelope').
			'</ul>
			<ul class="nav pull-right">
				<li><a href=""><i class="icon-off icon-white"></i> Logout</a></li>
			</ul>
		</div>
	</div>
</div>

<div id="wrap">
	<div class="container">

{page content}

	</div>
	<div id="push"></div>
</div>
';
	}
	// nav bar
	private static function _nav_button($pageName, $pageTitle, $url, $icon='') {
		$page = \psm\Portal::getPortal()->getPage();
		return '<li'.($pageName==$page ? ' class="active"' : '').'><a href="'.$url.'">'.
			(empty($icon) ? '' : '<i class="'.$icon.' icon-white"></i> ').
			$pageTitle.'</a></li>'.NEWLINE;
	}
	private static function _nav_divider() {
		return '<li class="divider-vertical"></li>'.NEWLINE;
	}


	protected function _footer() {
$num_queries=3;
		return '
<footer>
	<div class="container">
		<table>
			<tr>
				<td class="footer-td-1">'.
					'Rendered page in '.GetRenderTime().' Seconds<br />'.
					'with '.((int)@$num_queries).' Queries&nbsp;</b>'.
				'</td>
				<td class="footer-td-2">'.
					'<p><a href="http://dev.bukkit.org/server-mods/webauctionplus/" target="_blank" style="color: #333333;">'.
						'<u>WebAuctionPlus</u> '.WA_VERSION.'</a><br /><span style="font-size: smaller;">By lorenzop</span></p>'.
				'</td>
				<td class="footer-td-3">'.
					'<a href="http://twitter.github.com/bootstrap/" target="_blank">'.
						'<img src="{path=static}bootstrap-logo-128.png" alt="Powered by Twitter Bootstrap" style="width: 32px; height: 32px;" /></a>'.
					'&nbsp;&nbsp;'.
					'<a href="http://validator.w3.org/#validate_by_input" target="_blank">'.
						'<img src="{path=static}valid-xhtml10.png" alt="Valid XHTML 1.0 Transitional" style="width: 88px; height: 31px;" /></a>'.
				'</td>
			</tr>
		</table>
	</div>
</footer>
';
	}


//		<div id="footer-border"></div>
//		<div id="footer-inner">
//			<span class="alignleft">
//			Copyright © 2012 <strong><a href="/shop">EliteCrafters</a></strong>
//			</span>
//			<span class="alignright"><a href="#" class="scrollup">BACK TO TOP ↑</a></span>
//
//{footer content}
//
//  < !-- Paste advert code here -- >
//
//  < !-- ====================== -- >
//  <p style="margin-bottom: 10px; font-size: large; color: #FFFFFF;">&nbsp;<a href="http://dev.bukkit.org/server-mods/webauctionplus/" target="_blank" style="color: #FFFFFF;"><u>WebAuctionPlus</u> 1.1.7</a> By lorenzop&nbsp;<br><span style="font-size: medium;">&nbsp;Based on WebAuction By Exote&nbsp;</span></p>
//  <p style="margin-bottom: 10px; font-size: smaller; color: #FFFFFF;"><b>&nbsp;Rendered page in 0.051 Seconds with 0 Queries&nbsp;</b></p>
//  <p style="font-size: smaller; color: #FFFFFF;"><a href="http://validator.w3.org/#validate_by_input" target="_blank"><img src="static//valid-xhtml10.png" alt="Valid XHTML 1.0 Transitional" width="88" height="31" style="border-width: 0px;"></a></p>
//		</div>
//		< !-- END #FOOTER-INNER -- >
//	</footer>
//-->
//;
//	}


}
?>