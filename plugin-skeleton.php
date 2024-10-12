<?php
/**
 * Plugin Name: Select to tweet
 * Plugin URI: hhttps://github.com/IppoTeck/select-to-tweet
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
	}

	public function enqueue_scripts() {
		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'JS/main.js', array('jquery'), $this->version, true);
	}

}


$select_to_tweet = new SelectToTweet();