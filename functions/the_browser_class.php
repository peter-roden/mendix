<?php 

/**
 * get_browser_class
 *
 * @return void
 */
function get_browser_class() {
  // the list of WordPress global browser checks
  // https://codex.wordpress.org/Global_Variables#Browser_Detection_Booleans
  $browsers = ['is_iphone', 'is_chrome', 'is_safari', 'is_NS4', 'is_opera', 'is_macIE', 'is_winIE', 'is_gecko', 'is_lynx', 'is_IE', 'is_edge'];
  // check the globals to see if the browser is in there and return a string with the match
  $browserClass = join(' ', array_filter($browsers, function ($browser) {
      return $GLOBALS[$browser];
  }));
  
  return $browserClass;
}