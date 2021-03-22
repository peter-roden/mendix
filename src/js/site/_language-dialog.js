$(document).ready(function() {
    var matte;
    var languageSelect = $('.language-select');
	var languageSelectDialog = $('.language-select__dialog');
	var languageItems = $('.lang-item'); 

    function onIsEscapeKey(e) {
        if (e.keyCode == 27) {
            if (languageSelect.hasClass('active')) {
                closeLanguageDialog(true);
            }
        }
    }

	function openLanguageDialog(e) {
        languageSelect.addClass('active');
        languageSelect.before('<div class="language-select__matte"></div>');
        matte = $('.language-select__matte');
        matte.on('click', closeLanguageDialog);
        languageItems.first().find('a').focus();
        languageSelectDialog.attr('aria-hidden', false);
    }

	function closeLanguageDialog() {
        matte.remove();
        languageSelect.removeClass('active');
        languageSelectDialog.attr('aria-hidden', true);
        $(document).off('keyup', onIsEscapeKey);
    }

	languageItems.on('click', function(e) {
        if (languageSelect.hasClass('active') == false) {
            e.preventDefault();
            openLanguageDialog();
            $(document).on('keyup', onIsEscapeKey);
        }
    });
});