
    $(document).ready(function(){
		$("#style").on("change", hikeSearch);
    	$("#destination").on("change", hikeSearch);

    	function hikeSearch(){
    		var destination = $("#destination").val();
    		var style = $("#style").val();
    		$.get("get_trip.php?style=" + style + "&destination=" + destination, function(data){
    			if(data !== null && data.length > 5){
    				$('#trips').html(data);
    			} else {
					$('#trips').html("We don't have any trips like that available at this time.");
    			}
    			
    		}); 
    	}
    	hikeSearch();
        var delay = (function(){
        var timer = 0;
        return function(callback, ms){
        clearTimeout (timer);
        timer = setTimeout(callback, ms);
        };
        })();
        $('#srch-term').keyup(function(){
            delay(function(){
            console.log('Time elapsed!');
            }, 1000 );
            var searchField = $('#srch-term').val();
            console.log(searchField);
        })
        

    });            