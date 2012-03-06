
window.addEvent('domready', function() {
	$$('dl.accordian').each(function(dl) {
		var dts = dl.getElements('dt'),
			dds = dl.getElements('dd'),
			acc,
			span = new Element('span', { 'class': 'arrow' });
			
		dts.each(function(dt) {
			span.clone().inject(dt);
		});
			
		acc = new Fx.Accordion(dts, dds, {
			display: -1,
			alwaysHide: true,
			duration: 300
		});	
	});
});