$('#register').on('click', function(e){
	e.preventDefault();
	var url = this.href;
	console.log(this.href);

	
	$.ajax({
  		url: url
	}).done(function(data) { // data what is sent back by the php page
  		$('#login-modal').html(data); // display data
	});
	$('#login').on('click', function(){
        $('#login-modal').toggle("slow");
    }); 
});