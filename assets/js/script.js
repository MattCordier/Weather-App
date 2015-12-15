
    $(document).ready(function(){
		$("#style").on("change", search);
    	$("#destination").on("change", search);

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

        function webSearch(){
            $('#srch-term').keyup(function(){
            var searchField = $('#srch-term').val();
            console.log(searchField);
            });
        }




            // if (searchField != -1){
            //     posts = [];
            //     var regex = new RegExp(searchField, "i");

            //     $.getJSON('assets/js/entries.json', function(data){
            //         $(data.entries).each(function(index, value){
            //             if ((value.date.search(regex) != -1) || (value.title.search(regex) != -1) || (value.text.search(regex) != -1)){
            //                 var p = '<small class="date">' + value.date + '</small> ';
            //                 p += '<h3 class="blog-title">' + value.title + '</h3>';
            //                 p += '<div class="blog-div">' +'<p class="blog-p">' + value.text + '</p>' + '</div>' + '<hr class="blog-hr">';
                 
            //                 posts.push(p);
            //             }//if statement
            //             request_page(posts, 1);
            //         });//each function
            //     });//getJSON
            // }
    //     }


    // }); 


