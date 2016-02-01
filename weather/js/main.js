$('#register').on('click', function(e){
	e.preventDefault();
	var url = this.href;

	$('#login-modal').remove();
	$('#login-modal').load(url + ' #login-modal').hide().fadeIn('slow'); 
});