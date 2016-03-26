var SpoilerAnim = {
	
	parent: "ul",
	selector: "li",
	elements: null,

	initiate: function() {

		SpoilerAnim.elements = $(SpoilerAnim.parent + " " + SpoilerAnim.selector);

		$("ul").mousemove(function(ev) {
			SpoilerAnim.setTransform(ev.clientY / $("ul").height());
		});
	},

	slideUp: function() {
		for (var i = 0; i <= 10; i++) {
			SpoilerAnim.setTransform(i/10);
			SpoilerAnim.sleep(100);
		}
	},

	slideDown: function() {
		for (var i = 10; i >= 0; i--) {
			SpoilerAnim.setTransform(i/10);
			SpoilerAnim.sleep(100);
		}
	},

	setTransform: function(progress) {
		var heightCache = 0;
		$.each(SpoilerAnim.elements, function(index, current) {
			heightCache -= current.offsetHeight - current.offsetHeight * Math.cos( progress * Math.PI / 2);
			console.log(heightCache);
			if(index % 2 == 0)
				var rotation = -90 * progress + 90;
			else
				var rotation = 90 * progress - 90;
			var translate = -1 * heightCache;
			var transform = "rotateX(" + rotation + "deg)";
			$(current).css({
				transform : transform,
				top: translate + "px"
			});
		});
	},

	sleep: function(ms) {
		ms += new Date().getTime();
		while (new Date() < ms){}
	} 
}