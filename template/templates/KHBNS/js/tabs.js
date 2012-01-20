window.addEvent('domready', function () {
$$('.tab-container').each(function (container) {
$nav = new Element('ul', {
'class': 'tabs'
});
$panels = new Element('div');
$modules = container.getElements('.moduletable').dispose();

$modules.getElements('> h3').each(function (h3) {
(new Element('li', {
text: h3.get('html')
})).inject($nav);
});
$nav.getElement('li').addClass('active');

$modules.getElements('> div').each(function (content) {
(new Element('div', {
html: content.get('html'),
'class': 'panel'
})).inject($panels);
});
$panels.getElement('div').addClass('active');

$nav.getElements('li').addEvent('click', function (event) {
menu = $nav.getElements('li');
menu.removeClass('active');
event.target.addClass('active');
index = menu.indexOf(event.target);

contents = $panels.getElements('> div');
contents.removeClass('active');
contents[index].addClass('active');
});

$nav.inject(container);
$panels.inject(container);

});
});