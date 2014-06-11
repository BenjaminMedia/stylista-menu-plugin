<?php /**
 * Stylista header plugin
 *
 * @package Stylista Norway Menu Plugin
 * @author	Peytz & Co
 *
 * Plugin Name:			 Stylista.no Menu
 * Plugin URI:				https://github.com/Peytz-WordPress/stylista-header
 * Description:			 A plugin to include the stylista.no menu.
 * Version:					 1.0
 * Author:						Duddi Mai Daugaard and James Bonham/Peytz & Co
 * Author URI:				http://peytz.dk/medarbejdere/
 * GitHub Plugin URI: https://github.com/Peytz-WordPress/stylista-header
 */

function stylista_css() {
	echo <<< EOT

	<style type="text/css">

	@font-face {
		font-family: 'ProximaNova-Bold';
EOT;
	echo "src: url('" . plugins_url( 'webfonts/27179A_6_0.eot' , __FILE__ ) . "');";
	echo "src: url('". plugins_url( 'webfonts/27179A_6_0.eot?#iefix' , __FILE__ ) . "') format('embedded-opentype'),url('" . plugins_url( 'webfonts/27179A_6_0.woff' , __FILE__ ) . "') format('woff'),url('" .	plugins_url( 'webfonts/27179A_6_0.ttf' , __FILE__ ) . "') format('truetype')";
	echo <<< EOT
	}

	.stylista-header {
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		-o-box-sizing: border-box;
		box-sizing: border-box;
		color: white;
		font-family: verdana;
		background: #333;
		width: 100%;
		position: relative;
		top: 0;
		left: 0;
		color: #fff;
		font-family: 'ProximaNova-Regular', 'Helvetica Neue', Arial, Helvetica, sans-serif;
		font-size: 14px;
	}

	.stylista-nav-wrapper {
		margin: 0 auto;
		max-width: 1160px;
		height: 60px;
		overflow: hidden;
	}

	.stylista-test-content {
		margin: 0 auto;
		max-width: 1160px;
		background: blue;
		min-height: 300px;
		color: #fff;
		padding: 54px;
	}


	ul.stylista-menu {
		list-style: none;
		padding: 0;
		margin: 0 0 0 125px;
	}

	ul.stylista-menu li {
		float: left;
		border-right: 1px solid #545454;
	}

	ul.stylista-menu li a {
		color: #DEDEDE;
		display: block;
		font-family: "ProximaNova-Bold","Helvetica Neue",Arial,Helvetica,sans-serif;
		padding: 21px 17px 22px;
		text-transform: uppercase;
		white-space: nowrap;
		text-decoration: none;
	}

	ul.stylista-menu li a:focus,
	ul.stylista-menu li a:hover {
		background: #2b2b2b;
		color: #DEDEDE;
	}

	.stylista-logo {
		position: absolute;
	}

	ul.stylista-menu.stylista-user-menu {
		float: right;
	}

	ul.stylista-menu.stylista-user-menu .leaf {
		border: medium none;
	}

	ul.stylista-menu.stylista-user-menu .leaf.first a {
		background: none repeat scroll 0 0 transparent;
		border: 3px solid #5BA697;
		color: white;
		cursor: pointer;
		font-family: "ProximaNova-Bold","Helvetica Neue",Arial,Helvetica,sans-serif;
		font-size: 0.923em;
		height: auto;
		line-height: 1;
		margin-right: 10px;
		margin-top: 10px;
		padding: 10px;
		position: relative;
		text-transform: uppercase;
	}
	.stylista-bloggerbar {
		margin: 0 auto;
		max-width: 1160px;
		background: #F6F6F6;
		height: 61px;
		padding: 10px 0 0 134px;
		margin-bottom: 20px;
		list-style: none;
	}

	.stylista-bloggerbar ul {
		list-style: none;
		margin: 0;
		padding: 0;
	}

	.stylista-bloggerbar ul li {
		float: left;
		margin-right: 24px;
	}

	.stylista-bloggerbar ul li.last {
		margin-right: 0px;
	}


	.stylista-bloggerbar ul li span{
		color: #333;
		text-transform: uppercase;
		position: relative;
		top: 16px;
		margin-left: 10px;
		font-size: 12px;
	}

	.stylista-bloggerbar ul li img.profile {
		width: 45px;
		height: 45px;
		border-radius: 50%;
		float: left;
	}
	</style>
EOT;
};
add_action('wp_head', 'stylista_css');

function stylista_html() {
echo <<< EOT

<div id="stylista-header-wrap">
	<div class="stylista-header">
		<div class="stylista-nav-wrapper">
EOT;
			echo '<a href="http://stylista.no"><img class="logo" src="' . plugins_url( 'logo.png' , __FILE__ ) . '" /></a>';
echo <<< EOT

			<ul class="stylista-menu stylista-main-menu">
				<li class="first leaf level-1"><a href="http://stylista.no/trender-og-guider">Trender &amp; Guider</a></li>
				<li class="leaf level-1"><a href="http://stylista.no/lookbooks">Lookbooks</a></li>
				<li class="expanded js-expand shop-submenu level-1"><a href="http://stylista.no/shop">Shop</a></li>
				<li class="expanded js-expand shop-submenu level-1"><a href="http://stylista.no/streetstyle">Streetstyle</a></li>
			</ul>

			<ul class="stylista-menu stylista-user-menu">
				<li class="first leaf level-1"><a href="http://stylista.no/user/register">Opret profil</a></li>
				<li class="last leaf level-1"><a href="http://stylista.no/user/login">Log ind</a></li>
			</ul>

		</div>
	</div>
	<div class="stylista-bloggerbar">
		<ul>
EOT;
			echo '<li><a href="http://stylista.no/blog/ulrikke-lund"><span class="blogger">Ulrikke Lund</span><img class="profile" src="' . plugins_url( 'ulrikke.jpg' , __FILE__ ) . '" /></a></li>';
			echo '<li><a href="http://stylista.no/blog/ingrid-holm"><span class="blogger">Ingrid Holm</span><img class="profile" src="' . plugins_url( 'ingrid.jpg' , __FILE__ ) . '" /></a></li>';
			echo '<li><a href="http://stylista.no/blog/nettenestea"><span class="blogger">NetteNestea</span><img class="profile" src="' . plugins_url( 'nettenestea.jpg' , __FILE__ ) . '" /></a></li>';
			echo '<li><a href="http://stylista.no/blog/bybenedicthe"><span class="blogger">By_Benedicthe</span><img class="profile" src="' . plugins_url( 'bybenedicthe.jpg' , __FILE__ ) . '" /></a></li>';
			echo '<li><a href="http://stylista.no/blog/cathinthecity"><span class="blogger">CathInTheCity</span><img class="profile" src="' . plugins_url( 'cathinthecity.jpg' , __FILE__ ) . '" /></a></li>';
			echo '<li class="last"><a href="http://stylista.no/blog/a-portable-package"><span class="blogger">A Portable Package</span><img class="profile" src="' . plugins_url( 'aportablepackage.jpg' , __FILE__ ) . '" /></a></li>';
echo <<< EOT
		</ul>
	</div>
</div>

	<script type="text/javascript">

	if (typeof jQuery == 'undefined') {
		var thediv = document.getElementById('stylista-header-wrap');
		document.body.insertAdjacentHTML('afterbegin', thediv.innerHTML);
		thediv.remove();
	} else {
		jQuery(document).ready( function($) {
			$('#stylista-header').prependTo('body');
		});
	}
	</script>
EOT;
}
add_action('wp_footer', 'stylista_html');
?>
