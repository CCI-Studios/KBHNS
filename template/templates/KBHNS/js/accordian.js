(function() {
	
	$('dl.accordian').each(function() {
		$(this).on('click', 'dt', function() {
			$(this)
				.next()
					.slideDown(300)
					.siblings('dd')
					.slideUp(300);
		});
		$(this).find('dd').addClass('hidden');
	});
	
})();