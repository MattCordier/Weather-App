
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

        // var delay = (function(){
        //     var timer = 0;
        //     return function(callback, ms){
        //         clearTimeout(timer);
        //         timer = setTimeout(callback, ms);
        //     };
        // })();

        // function(){
        //     delay(function(){
        //     console.log('Time elapsed!');
        //     }, 1000 );
        $('#srch-term').on("submit", webSearch);

        function webSearch(){
           
            var searchField = $('#srch-term').val();
           
                console.log(searchField);
            
                $.get("search.php?searchField=" + searchField, function(data){
                    if(data !== null){
                        $('#trips').html(data);
                    } else {
                        $('#trips').html("We don't have any trips like that available at this time.");
                    }
                
                });
            
        }

        webSearch();

        

    });            