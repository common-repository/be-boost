<?php
/*
 * @link             
 * @since             1.0.0
 * @package           Be shop theme helper plugin 
 *
 * @wordpress-plugin
 * Plugin Name:       Be Boost
 * Plugin URI:        https://wpthemespace.com
 * Description:       The plugin for share porducts
 * Version:           1.0.9
 * Author:            Noor alam
 * Author URI:        
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       be-boost
 * Domain Path:       /languages
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}


/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
final class beBoost
{

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const version = '1.0.9';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '5.6';


	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var beBoost The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return beBoost An instance of the class.
	 */
	public static function instance()
	{

		if (is_null(self::$_instance)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct()
	{
		$this->define_constants();
		add_action('init', [$this, 'i18n']);
		add_action('plugins_loaded', [$this, 'init']);
	}



	public function define_constants()
	{
		define('BE_BOOST_VERSION', self::version);
		define('BE_BOOST_FILE', __FILE__);
		define('BE_BOOST_DIR', plugin_dir_path(__FILE__));
		define('BE_BOOST_URL', plugins_url('', BE_BOOST_FILE));
		define('BE_BOOST_ASSETS', BE_BOOST_URL . '/assets/');
	}



	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 *
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function i18n()
	{

		load_plugin_textdomain('be-boost');
	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init()
	{

		require_once('includes/share-icons.php');
		require_once('includes/improt-code.php');

		// Check for required PHP version
		if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
			add_action('admin_notices', [$this, 'admin_notice_minimum_php_version']);
			return;
		}

		add_action('wp_enqueue_scripts', [$this, 'be_boost_style_script']);
		global $pagenow;

		if (in_array($pagenow, array('post-new.php', 'post.php', 'themes.php'))) {
			add_action('admin_enqueue_scripts', [$this, 'be_boost_admin_style_script']);
		}
	}




	/**
	 * Add style and scripts
	 *
	 * Add the plugin style and scripts for this
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function be_boost_style_script()
	{
		wp_enqueue_style('beBoost-fonts', plugins_url('/assets/css/custom-fonts.css', __FILE__), array(), '1.0.4', 'all');
		wp_enqueue_style('beboost-main', plugins_url('/assets/css/beboost-style.css', __FILE__), array(), '1.0.4', 'all');
	}

	/**
	 * Add style and scripts for admin
	 *
	 * @since 1.0.1
	 *
	 * @access public
	 */
	public function be_boost_admin_style_script()
	{
		wp_enqueue_style('beBoost-adminstyle', plugins_url('/assets/css/beboost-admin.css', __FILE__), array(), '1.0.4', 'all');
	}






	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version()
	{

		if (isset($_GET['activate'])) unset($_GET['activate']);

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'magical-blocks'),
			'<strong>' . esc_html__('Magical Blocks', 'magical-blocks') . '</strong>',
			'<strong>' . esc_html__('PHP', 'magical-blocks') . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', wp_kses_post($message));
	}
}

beBoost::instance();
