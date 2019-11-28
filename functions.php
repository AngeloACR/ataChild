<?php

function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles', 11 );


function loginRedirect( $url, $request, $user ){
	if( $user && is_object( $user ) && is_a( $user, 'WP_User' ) ) {
		if( $user->has_cap( 'administrator') or $user->has_cap( 'author')) {
			$url = admin_url();
		} else {
			$url = home_url('/index.php/course');
		}
	}
return $url;
}

add_filter('login_redirect', 'loginRedirect', 10, 3 );

add_action('wp_logout','logoutRedirect');
function logoutRedirect(){
	wp_redirect( home_url() );
	exit();
}

function theWall() {
?>
	<script language="JavaScript">
	//////////F12 disable code////////////////////////
	
		document.addEventListener('contextmenu', event => event.preventDefault());
		document.onkeypress = function (e) {
			e = (e || window.event);
			if (e.keyCode == 123) {
			   //alert('No F-12');
				return false;
			}
			if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
			return false;
			}
			if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
			return false;
			}
			if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)){
			return false;
			}
			if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
			return false;
			}			
		}
		document.onmousedown = function (e) {
			e = (e || window.event);
			if (e.keyCode == 123) {
				//alert('No F-keys');
				return false;
			}
			if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
			return false;
			}
			if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
			return false;
			}
			if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)){
			return false;
			}
			if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
			return false;
			}
		}
	document.onkeydown = function (e) {
			e = (e || window.event);
			if (e.keyCode == 123) {
				//alert('No F-keys');
				return false;
			}
			if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
				return false;
			}
			if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
				return false;
			}
			if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)){
				return false;
			}
			if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
				return false;
			}			
		}
	/////////////////////end///////////////////////
	</script>


<?php
}
add_action( 'wp_footer', 'theWall' );

include_once('atashorts.php');
