(function() {
	tinymce.PluginManager.add('my_mce_button', function( editor, url ) {
		editor.addButton( 'my_mce_button', {
			text: 'LikeBox',
			icon: false,
			onclick: function() {
				editor.insertContent( '[facebox]');
			}
		});
	});
})();