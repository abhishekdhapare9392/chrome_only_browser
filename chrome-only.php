<?php
/**
 * @package Chrome_Only_browser
 * @version 1.0
 */
/*
Plugin Name: Chrome Only Browser
Plugin URI: http://wordpress.org/plugins/chrome-only/
Description: This plugin show warning message if other than Google Chrome browser is used while browsing website.
Author: Sharad Shinde & Abhishek Dhapare
Version: 1.0
Author URI: www.abhishekdhapare.com
*/

function chrome_only() {
	
	echo '
	<script>
	var isChrome = !!window.chrome && !!window.chrome.webstore;
	
	if(isChrome) {
	    document.getElementsByClassName("browser-msg")[0].style.display = "none";
	}
	if (navigator.userAgent.toLowerCase().indexOf("chrome") > -1) {
            document.getElementsByClassName("browser-msg")[0].style.display = "none";
    }
	</script>';
	return false;
}

function chrome_only_msg() {
    echo "<div class='browser-msg'>Your web browser is not supported.
   Please switch to Google Chrome for more security, comfort and best experience on this website.</div>";
	$msg = chrome_only();
	echo $msg;
}


add_action( 'admin_notices', 'chrome_only_msg' );

function chrome_only_css() {
	echo '
	<style type="text/css">
	.browser-msg {
        background: #dd3a61;
        color: #fff;
        padding: 10px;
        width: 100%;
        margin: 0;
        text-align: center;
    }
	</style>
	';
}

// Short Code For Text
add_shortcode('chrome_only', 'chrome_only_msg');

add_action( 'wp_head', 'chrome_only_css' );
?>