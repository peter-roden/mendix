<?php

/**
 * Truncate a text block to the maximum chararacters and add an ellipsis.
 *
 * @param  string $text Text to truncate
 * @param  int $max_chars optional Character limit for the string
 *
 * @return void
 */
function truncate_text($text, $max_chars = 70) {
    if (strlen($text) > $max_chars) {
        return explode( "\n", wordwrap( $text, $max_chars))[0] . '…';
    }
    return $text;
}
