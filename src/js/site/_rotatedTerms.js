(function() {

	var terms = $("#rotatedTerms li");
	if (terms.length) {

		function rotateTerm() {
			var ct = $("#rotateText").data("term") || 0;
			$("#rotateText").data("term",
            ct == terms.length - 1 ? 0 : ct + 1).text(terms.eq([ct]).text()).fadeIn().delay(1200).fadeOut(500, rotateTerm);
			
		}
		$(rotateTerm);
	}
})();