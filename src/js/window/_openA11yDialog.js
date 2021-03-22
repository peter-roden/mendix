/**
 * @param {String} id
 */
window.openA11yDialog = function (id) {
	var dialog = $(id);

	if (dialog.hasClass('reveal')) {
		dialog.foundation('open');
	} else {
		if (!$.magnificPopup) {
			window.alert('Thank you for submitting!');
		} else {
			var siblings = dialog.siblings();
			$.magnificPopup.open({
				items: {
					src: dialog,
				},
				type: 'inline',
				callbacks: {
					beforeOpen: function () {},
					open: function () {
						dialog.removeAttr('aria-hidden');
						siblings.attr('aria-hidden', true);
					},
					close: function (item) {
						dialog.attr('aria-hidden', true);
						siblings.removeAttr('aria-hidden');
					},
				},
			});
		}
	}
};
