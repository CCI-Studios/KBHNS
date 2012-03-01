(function() {
	
	$('dl.accordian').each(function() {
		$(this).on('click', 'dt', function() {
			$(this)
				.next()
					.slideDown(200)
					.siblings('dd')
					.slideUp(200);
		});
		$(this).find('dd').addClass('hidden');
	});
	
})();