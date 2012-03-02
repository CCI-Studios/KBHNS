
window.addEvent('domready', function() {
	$$('dl.accordian').each(function(dl) {
		var dts = dl.getElements('dt'),
			dds = dl.getElements('dd'),
			acc;
			
		acc = new Fx.Accordion(dts, dds, {
			display: -1,
			alwaysHide: true,
			duration: 300
		});		
	});
});
