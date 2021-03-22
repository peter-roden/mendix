<?php 
/**
 * 
 */
function search_key_in_array_order($key, ...$arrays) {
	foreach ($arrays as $array) {
		if (!empty($array[$key])) {
			return $array[$key];
		}
	}
}
