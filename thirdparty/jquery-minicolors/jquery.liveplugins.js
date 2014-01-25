/**
 * this plugin, inspired from jquery.livequery plugin,
 * tries to bind the plugin to the existing elements,
 * as well as the futher/live elements.
 * @usage: $(selector).liveplugin(pluginname, pluginargs);
 * @author: pwwang@pwwang.com
 * @url: http://pwwang.com/2012/06/19/get-your-jquerâ€¦uture-elements/
 */
 
(function($) {
	$.fn.liveplugin = function() {
		if (arguments.length == 0) return;
		// jQuery original methods to "listen"
		var methods = ['append', 'prepend', 'after', 'before', 'wrap', 'attr', 'removeAttr', 'addClass', 'removeClass', 'toggleClass', 'empty', 'remove', 'html'];

		var args = [];
		Array.prototype.push.apply(args, arguments);
		var pn = args.shift();
		var selector = this.selector;
		var runplugin = function() {
			// ensure the plugin is called only once
			$(selector).each(function() {
				if ($(this).data('liveplugin.' + pn)) return;
				$(this).data('liveplugin.' + pn, 1);
				$.fn[pn].apply($(this), args);
			});
		}

		$.each(methods, function(i, n) {
			// in case the fn name does not exist
			if (!$.fn[n]) return;
			// save the original one
			var old = $.fn[n];
			// new with plugin
			$.fn[n] = function() {
				// execute original one
				var r = old.apply(this, arguments);
				// run plugin
				runplugin();
				// return original result
				return r;
			}
		});
		// no dom change call
		runplugin();
		// keep the chain
		return this;
	};
})(jQuery);