<?php
/**
 * Plugin Name: Select to tweet
 * Plugin URI:  https://github.com/IppoTeck/select-to-tweet
 * Description: Select to tweet is a simple plugin that allows visitors to select text on your website and tweet it.
 * Version: 1.0.0
 * Author: IppoTeck
 * Author URI: ippoteck.in/
 * License: GPL2
 */

 class SelectToTweet {
	private $plugin_name;
	private $version;

	public function __construct() {
		$this->plugin_name = 'select-to-tweet';
		$this->version = '1.0.0';
		$this->define_hooks();
	}

	private function define_hooks() {
		add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
		add_action('wp_footer', array($this, 'append_tooltip_html')); 

	}

	public function enqueue_scripts() {
		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'src/JS/main.js', array('jquery'), $this->version, true);
		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'src/CSS/main.css', array(), $this->version);
	}

	public function append_tooltip_html() {
		if (!is_admin()) {
			$svg_url = plugin_dir_url(__FILE__) . 'src/images/x.svg';
			
			echo '<div id="tooltip" class="tooltip"><img src="' . esc_url($svg_url) . '" alt="Tweet" /></div>';
		}
	}
	
	

}


$select_to_tweet = new SelectToTweet();