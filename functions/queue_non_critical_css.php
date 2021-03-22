<?php
/**
 * Async CSS load technique supplanting the original
 * see https://www.filamentgroup.com/lab/load-css-simpler/ for detaisl
 *
 * @param {String} $href location of non critical  CSS stylesheet
 */
function queue_non_critical_css($href)
{
	echo "<link rel='stylesheet' href='$href' media='print' onload=\"this.media='all'\">";
}
