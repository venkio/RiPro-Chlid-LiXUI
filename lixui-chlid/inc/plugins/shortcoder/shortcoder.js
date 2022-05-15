/*内容展开*/
jQuery(document).ready(function(jQuery) {
	jQuery('.collapseButton').click(function() {
		jQuery(this).parent().parent().find('.xContent').slideToggle('slow');
	});
});
/*阅读全文*/
jQuery(document).ready(function(jQuery) {
	jQuery('.lxydqw_collapseButton').click(function() {
		jQuery(this).parent().parent().find('.hidecontent').slideToggle('slow');
		$(this).get(0).parentNode.style.display = "none";
	});
});
