<?php
/**
 * Only printr for the given array if in a development environment
 *
 * @param array $arg
 *
 * @return void
 */
function debug(...$args) {
	if (is_user_logged_in() and $args) {
		echo '<div class="relative">';
		echo '<pre style="color: red;">';
		foreach ($args as $arg) {
			print_r($arg);
		}
		echo '</pre>';
		echo '</div>';
	}
}

/**
 * Echo arguments only if in a development environment
 * @param mixed $args
 *
 * @return void
 */
function console_log(...$args) {
	if (is_user_logged_in()) {
		$num_args = func_num_args();
		for ($i = 0; $i < $num_args; $i++) {
			echo "<script>console.log('{$args[$i]}');</script>";
		}
	}
}