window.addEvent('domready', function () {
	$$('.tab-container').each(function (container) {
		$nav = new Element('ul', {
			'class': 'tabs'
		});
		$panels = new Element('div', { 'class': 'clearfix' });
		$modules = container.getElements('.moduletable').dispose();

		// grab all h3s, add to nav bar
		$modules.getElements('> h3').each(function (h3) {
			(new Element('li', {
				text: h3.get('html'),
				'class': h3.getParent('.moduletable, .module').getProperty('class')[0].replace('moduletable', '').replace('module', '')
			})).inject($nav);
			
		});
		$nav.getElement('li').addClass('active');

		// grab all content, add to panels
		$modules.getElements('> div').each(function (content) {
			(new Element('div', {
				html: content.get('html'),
				'class': 'panel ' + content.getParent('.moduletable, .module').getProperty('class')[0].replace('moduletable', '').replace('module', '')
			})).inject($panels);
		});
		$panels.getElement('div').addClass('active');
		$panels.setStyle('width', $panels.getChildren().length*100 + '%');
		$panels.get('tween').options.unit = '%';

		$nav.getElements('li').addEvent('click', function (event) {
			menu = $nav.getElements('li');
			menu.removeClass('active');
			event.target.addClass('active');
			index = menu.indexOf(event.target);

			$panels.tween('left', -100*index);
		});

		$nav.inject(container);
		$panels.inject(container);

	});
});