(function() {
    /**
     * example found from 
     * https://community.tiny.cloud/communityQuestion?id=90661000000MrVuAAK
     * and has example for multi level dropdown
     */
    tinymce.PluginManager.add('menubutton_mendix_utilities', function(editor) {
		editor.addButton('menubutton_mendix_utilities', {
			type: 'menubutton',
			text: 'Mendix Utilities',
			icon: false,
			menu: [
				{
					text: 'Preformatted Code Wrapper',
					onclick: function() {
						editor.insertContent('<pre><code>Switch to "Text" tab and paste code here</code></pre>');
					}
				},
				{
					text: 'Vidyard Shortcode',
					onclick: function() {
						editor.insertContent('[vidyard display=true videoID=X]');
					}
				}
			]
		});
	});
})();