/**
 * by Helton MALAMBANE
 */
if (typeof jQuery === 'undefined'){
	throw new Error('jquery-rate-picker requires jQuery');
}
(function ($){
	"use strict";
	$.ratePicker = function (target, options){
		if (typeof options === 'undefined') options = {};
		options.max = typeof options.max === 'undefined' ? 5 : options.max;
		options.rgbOn = typeof options.rgbOn === 'undefined' ? "#f1c40f" : options.rgbOn;
		options.rgbOff = typeof options.rgbOff === 'undefined' ? "#ecf0f1" : options.rgbOff;
		options.rgbSelection = typeof options.rgbSelection === 'undefined' ? "#ffcf10" : options.rgbSelection;
		options.cursor = typeof options.cursor === 'undefined' ? "pointer" : options.cursor;
		options.indicator = typeof options.indicator === 'undefined' ? "fa fa-star" : "fa "+options.indicator;

		var stars = typeof $(target).data('stars') == 'undefined' ? 0 : $(target).data('stars');

		$(target).css('cursor', options.cursor);
		$(target).append($("<input>", {type : "hidden", name : target.replace("#", ""), value : stars}));

		// $(target).append($("<i>", {class : options.indicator, style : "color: transparent;"}));
		for (var i = 1; i <= options.max; i++){
			$(target).append($("<i>", {class : options.indicator, style : "color:" + (i <= stars ? options.rgbOn : options.rgbOff)}));
		}
		// $(target).append($("<i>", {class : options.indicator, style : "color: transparent;"}));

		$.each($(target + " > i"), function (index, item){
			$(item).click(function (){
				$("[name=" + target.replace("#", "") + "]").val(index);
				for (var i = 1; i <= options.max; i++){
					$($(target + "> i")[i]).css("color", i <= index ? options.rgbOn : options.rgbOff);
				}
				if (!(options.rate === 'undefined')){
					options.rate(index > options.max ? options.max : index);
                    stars = index;
				}
			});
			$(item).mouseover(function (){
				for (var i = 1; i <= options.max; i++){
					$($(target + " > i")[i]).css("color", i <= index ? options.rgbSelection : options.rgbOff);
				}
			});
            $(item).mouseleave(function(){
                $("[name=" + target.replace("#", "") + "]").val(index);
                for (var i = 1; i <= options.max; i++){
                    $($(target + "> i")[i]).css("color", i <= stars ? options.rgbOn : options.rgbOff);
                }
            });
		});
	};
})(jQuery);
