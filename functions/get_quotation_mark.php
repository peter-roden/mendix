<?php
/**
 * @param {string} $id
 */
function get_quotation_mark( string $id = 'close' ) : string
{
    switch ($id) {
		case 'open':
			return 	pll__('“');//german „
        case 'close':
        default:
			return 	pll__( '”' );//german “
    }
}
