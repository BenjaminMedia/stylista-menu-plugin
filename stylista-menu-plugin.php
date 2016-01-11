<?php /**
 * Stylista header plugin
 *
 * @package Stylista Norway Menu Plugin
 * @author  Peytz & Co
 *
 * Plugin Name:       Stylista.no Menu
 * Plugin URI:        https://github.com/BenjaminMedia/stylista-menu-plugin
 * Description:       A plugin to include the stylista.no menu.
 * Version:           3.0.0
 * Author:            Peytz & Co + Bonnier Interactive
 * Author URI:        http://peytz.dk/medarbejdere/
 * GitHub Plugin URI: https://github.com/BenjaminMedia/stylista-menu-plugin
 */

function stylista_css() {
  wp_enqueue_style( 'stylista-menu-plugin', plugin_dir_url( __FILE__ ) . 'assets/css/stylista-menu-plugin.css', array(), '3.0.0', 'all' );
  wp_enqueue_script( 'stylista-menu-plugin', plugin_dir_url( __FILE__ ) . 'assets/js/stylista-menu-plugin.js', array(), '3.0.0', 'all' );
};
add_action('wp_enqueue_scripts', 'stylista_css');

function stylista_wp_head() {
  ob_start('stylista_insert_header');
}
add_action('wp_head', 'stylista_wp_head');

function stylista_insert_header($buffer) {
  $logo = plugin_dir_url( __FILE__ ) . 'assets/images/logo.png';

  $blogNavigation = '';
  $bloggers = array(
    array(
      'name' => 'Giggles & Dimples',
      'link' => 'http://gigglesndimples.com/'
    ),
    array(
        'name' => 'Ingrid Holm',
        'link' => 'http://ingridholm.no/'
    ),
    array(
        'name' => 'NetteNestea',
        'link' => 'http://ingridholm.no/'
    ),
    array(
        'name' => 'by Benedicthe',
        'link' => 'http://stylista.no/blog/bybenedicthe/'
    ),
    array(
        'name' => 'Cath in the City',
        'link' => 'http://www.cathinthecity.com/'
    ),
    array(
        'name' => 'Eirin Kristiansen',
        'link' => 'http://www.eirinkristiansen.no/'
    ),
    array(
        'name' => 'Marie Wolla',
        'link' => 'http://www.mariewolla.no/'
    ),
    array(
        'name' => 'Anniken Jørgensen',
        'link' => 'http://www.annijor.no/'
    ),
  );

  foreach($bloggers as $blog){
    $blogNavigation .= "<li><a href='".$blog['link']."'><span class='blogger'>".$blog['name']."</span></a></li>";
  }

  $header = <<< EOT
    <div id="stylista-header-wrap">
      <div class="stylista-header">
        <div class="stylista-nav-wrapper">
          <button type="button" aria-hidden="true" class="stylista-hamburger">&#x2261;</button>
          <a href="http://stylista.no" class="stylista-logo"><img src="$logo" /></a>

          <ul class="stylista-menu stylista-main-menu">
            <li class="first leaf level-1"><a href="http://stylista.no/trender-og-guider">Trender &amp; Guider</a></li>
            <li class="expanded js-expand shop-submenu level-1"><a href="http://stylista.no/shop">Shop</a></li>
            <li class="expanded js-expand shop-submenu level-1"><a href="http://stylista.no/bloggers">Bloggere</a></li>
            <li class="expanded js-expand shop-submenu level-1"><a href="http://stylista.no/stylistatv">StylistaTV</a></li>
          </ul>
        </div>
      </div>

      <div class="stylista-bloggerbar">
        <ul>
          $blogNavigation
        </ul>
      </div>
    </div>
EOT;

  return preg_replace("/<body(.*?)>/", "<body$1>" . $header, $buffer);
}

function stylista_close_buffer() {
  ob_end_flush();
}
add_action('wp_footer', 'stylista_close_buffer');
