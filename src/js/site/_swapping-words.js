/**
 * Swap LI elements
 */
$(document).ready(function () {
	$('.swapping-words').each(function () {
		var items = $(this).find('.swapping-words__item');
		var i = 0;

		function swap() {
			items.eq(i % items.length).hide();
			items.eq(++i % items.length).show();
			setTimeout(swap, 1000);
		}

		if (items.length) {
			swap();
		}
	});
});
