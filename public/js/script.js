//Getting value from "ajax.php".
function fill(Value) {
   //Assigning value to "search" div in "search.php" file.
   $('#search').val(Value);
   //Hiding "display" div in "search.php" file.
   $('#display').hide();
}
$(document).ready(function() {
   //On pressing a key on "Search box" in "search.php" file. This function will be called.
   $("#search").keyup(function() {
       //Assigning search box value to javascript variable named as "name".
       var name = $('#search').val();
       var cate = $('#cars').val();
       var token = $('#csrf').val();
       
       //Validating, if "name" is empty.
       if (name == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#display").html("Search Item Not Found");
       }
       //If name is not empty.
       else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "http://127.0.0.1:8000/ajax",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   search: name,  categ: cate, _token: token
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#display").html(html).show();
               }
           });
       }
   });
   
   
   $("#mating_regcode").keyup(function() { 
       //Assigning search box value to javascript variable named as "name".
       var name = $('#mating_regcode').val();
	   var pedgen = $('#pedgen').val();
     var token = $('#csrf').val();
     // alert(pedgen);
       //Validating, if "name" is empty.
       if (name == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#displayAuto").html("Search Item Not Found");
       }
       //If name is not empty.
       else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "http://127.0.0.1:8000/search",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   search: name,  pedgen: pedgen, _token: token
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#displayAuto").html(html).show();
               }
           });
       }
   });
   
   
   
   $("#newslettersbs").click(function() { 
	 var token = $('#csrf').val();
	 var email = $('#subsemail').val();
		if(email == '')
		{
			//alert('Please enter email id.');	
			$('#subsemail').focus();
			$("#displayAutoEmail").html("Enter valid email id.");
		}else{
			
				 $.ajax({
               //AJAX type is "Post".
				   type: "POST",
				   //Data will be sent to "ajax.php".
				   url: "http://127.0.0.1:8000/newsletter",
				   //Data, that will be sent to "ajax.php".
				   data: {
					   //Assigning value of "name" into "search" variable.
					   search: email, _token: token
				   },
				   //If result found, this funtion will be called.
				   success: function(html) {
					   //Assigning result to "display" div in "search.php" file.
					   $("#displayAutoEmail").html(html).show();
				   }
			   });
			
		}
								  
	}); 
   
    $("#koer_readmore").click(function() {  
	var name = $('#pgd_regcode').val();	
	var shortval = $('#shortval').val();
	var token = $('#csrf').val();	   
	//alert(name);
												  
		if (name == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#displayKoerReadMore").html("Search Item Not Found");
       }
       //If name is not empty.
       else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "http://127.0.0.1:8000/pedikoer",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   search: name, shortval:shortval, _token: token
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#displayKoerReadMore").html(html).show();
               }
           });
       }
	
	});
   
   
});