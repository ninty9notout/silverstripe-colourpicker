(function($) {
	$.entwine('ss', function($) {
		$('.colourpickerinput').entwine({
			onmatch: function(e) {
				$(this).minicolors();
			}
		});
	});
})(jQuery);