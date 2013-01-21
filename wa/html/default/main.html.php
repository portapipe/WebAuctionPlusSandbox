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
//\psm\Portal::getPortal()->getEngine()->addCss('
//');
		// css
		$this->addFileCSS(
			'{path=theme}main.css',
//			'{path=static}jquery/jquery-ui-1.8.19.custom.css'
//			'{path=theme}table_jui.css',
			'{path=static}bootstrap/Cerulean/bootstrap.min.css',
			//'{path=static}bootstrap/css/bootstrap.min.css',
			'{path=static}bootstrap/css/bootstrap-responsive.min.css'
		);
		// javascript
		$this->addFileJS(
//			'{path=static}inputfunc.js'
			'{path=static}jquery/jquery-1.8.3.min.js',
//			'{path=static}jquery/jquery.dataTables-1.9.4.min.js'
			'{path=static}bootstrap/js/bootstrap.js'
		);
		return
'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>{site title}</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="icon" type="image/x-icon" href="{path=static}favicon.ico" />

{header content}

</head>
<body>
';
	}


	protected function _body() {
		return '
<div class="navbar navbar-fixed-top">


<!--
<div class="alert alert-block alert-info" style="margin-bottom: 0px;">
	<a href="#" class="close" data-dismiss="alert">&times;</a>
	<strong>Warning!</strong> Some error!
</div>
<div class="alert alert-block alert-success" style="margin-bottom: 0px;">
	<a href="#" class="close" data-dismiss="alert">&times;</a>
	<strong>Warning!</strong> Some error!
</div>
<div class="alert alert-block alert-warning" style="margin-bottom: 0px;">
	<a href="#" class="close" data-dismiss="alert">&times;</a>
	<strong>Warning!</strong> Some error!
</div>
<div class="alert alert-block alert-error" style="margin-bottom: 0px;">
	<a href="#" class="close" data-dismiss="alert">&times;</a>
	<strong>Warning!</strong> Some error!
</div>
-->


<div class="navbar-inner">
		<div class="container">

			<a class="brand" href="">WebAuction<sup>Plus</sup></a>
			<ul class="nav">'.
				self::_nav_button('home2',		'Home',			'/',			'icon-home').
				self::_nav_divider_vert().
				self::_nav_button('home',	"WebAuctionPlus",	'./?page=',	'icon-shopping-cart').
				self::_nav_divider_vert().
				self::_nav_button('mailbox',	'WeBook',	'./?page=',		'icon-envelope').
			'</ul>

			<ul class="nav pull-right">
				<li class="dropdown">
					'.self::_nav_button_dropdown('username',	'lorenzop',	'#',		'icon-user').'
					<ul class="dropdown-menu">'.
						self::_nav_button('profile',	'My Profile',	'./?page=profile',		'icon-pencil').
						self::_nav_divider().
						self::_nav_button('logout',		'Logout',		'./?page=logout',		'icon-off').
					'</ul>
				</li>
			</ul>

		</div>
	</div>
</div>

<div id="page-wrap">

	<div class="container" id="sub-menu">
		<div class="navbar navbar-inverse">
			<div class="navbar-inner">
				<div class="container">
					<ul class="nav">'.
						self::_nav_button('home',		'Current Auctions',	'./?page=home',		'icon-home').
						self::_nav_divider_vert().
						self::_nav_button('myauctions',	"My Auctions",	'./?page=myauctions',	'icon-shopping-cart').
						self::_nav_divider_vert().
						self::_nav_button('mailbox',	'My Mailbox',	'./?page=mailbox',		'icon-envelope').
					'</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="container">

{page content}

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
	private static function _nav_button_dropdown($pageName, $pageTitle, $url, $icon='') {
		$page = \psm\Portal::getPortal()->getPage();
		return '<a'.($pageName==$page ? ' class="active"' : '').' class="dropdown-toggle" data-toggle="dropdown" href="'.$url.'">'.
			(empty($icon) ? '' : '<i class="'.$icon.' icon-white"></i> ').
			$pageTitle.' <b class="caret"></b></a>'.NEWLINE;
	}
	private static function _nav_divider_vert() {
		return '<li class="divider-vertical"></li>'.NEWLINE;
	}
	private static function _nav_divider() {
		return '<li class="divider"></li>'.NEWLINE;
	}


	protected function _footer() {
$num_queries=3;
		return '
	<div id="footer-push"></div>
</div>
<footer>
	<div class="container">
		<table>
		<tr>
			<td class="footer-td-1">'.
				'Rendered page in '.GetRenderTime().' Seconds<br />'.
				'with '.((int)@$num_queries).' Queries&nbsp;</b>'.
			'</td>
			<td class="footer-td-2">
<!-- Paste advert code here -->

<!-- ====================== -->

{footer content}

				<p><a href="http://dev.bukkit.org/server-mods/webauctionplus/" target="_blank" style="color: #333333;">
				<u>WebAuctionPlus</u> '.WA_VERSION.'</a><br /><span style="font-size: smaller;">By lorenzop</span></p>
			</td>
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


}
?>