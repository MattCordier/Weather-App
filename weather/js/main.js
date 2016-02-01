$('#register').on('click', function(e){
	e.preventDefault();
	var url = this.href;
	console.log(this.href);

	$('#login-modal').remove();
	$('#login-modal').load(url + ' html').hide().fadeIn('slow'); 
});