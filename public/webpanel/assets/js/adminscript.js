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
               url: "http://127.0.0.1:8000/webadmin/ajax",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   search: name,
                   _token: token
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#display").html(html).show();
               }
           });
       }
   });
   
   
    $("#searchpedi").keyup(function() {
       //Assigning search box value to javascript variable named as "name".
       var name = $('#searchpedi').val();
       var token = $('#csrf').val();
       //Validating, if "name" is empty.
       if (name == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#displaypedi").html("Search Item Not Found");
       }
       //If name is not empty.
       else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "http://127.0.0.1:8000/webadmin/pedi",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   search: name,
                   _token: token
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#displaypedi").html(html).show();
               }
           });
       }
   });
	
	
	$("#sblog").keyup(function() {
       //Assigning search box value to javascript variable named as "name".
       var name = $('#sblog').val();
       var token = $('#csrf').val();
       //Validating, if "name" is empty.
       if (name == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#displayblog").html("Search Item Not Found");
       }
       //If name is not empty.
       else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "http://127.0.0.1:8000/webadmin/blog",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   search: name,
                   _token: token  
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#displayblog").html(html).show();
               }
           });
       }
   });
	
	
		$("#sbreeder").keyup(function() {
       //Assigning search box value to javascript variable named as "name".
       var name = $('#sbreeder').val();
       var token = $('#csrf').val();
       //Validating, if "name" is empty.
       if (name == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#displaybreeder").html("Search Item Not Found");
       }
       //If name is not empty.
       else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "http://127.0.0.1:8000/webadmin/breeder",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   search: name,
                   _token: token
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#displaybreeder").html(html).show();
               }
           });
       }
   });
	
	
	$("#sowner").keyup(function() {
       //Assigning search box value to javascript variable named as "name".
       var name = $('#sowner').val();
       var token = $('#csrf').val();
       //Validating, if "name" is empty.
       if (name == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#displayowner").html("Search Item Not Found");
       }
       //If name is not empty.
       else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "http://127.0.0.1:8000/webadmin/owner",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   search: name,
                   _token: token
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#displayowner").html(html).show();
               }
           });
       }
   });
	
	
	
	$("#searchpic").keyup(function() {
       //Assigning search box value to javascript variable named as "name".
       var name = $('#searchpic').val();
       var token = $('#csrf').val();
       //Validating, if "name" is empty.
       if (name == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#displaypic").html("Search Item Not Found");
       }
       //If name is not empty.
       else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "http://127.0.0.1:8000/webadmin/images",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   search: name,
                   _token: token
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#displaypic").html(html).show();
               }
           });
       }
   });
	
	$("#searchvideo").keyup(function() {
       //Assigning search box value to javascript variable named as "name".
       var name = $('#searchvideo').val();
       var token = $('#csrf').val();
       //Validating, if "name" is empty.
       if (name == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#displayvideo").html("Search Item Not Found");
       }
       //If name is not empty.
       else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "http://127.0.0.1:8000/webadmin/videos",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   search: name,
                   _token: token
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#displayvideo").html(html).show();
               }
           });
       }
   });
	
	$("#stitle").keyup(function() {
       //Assigning search box value to javascript variable named as "name".
       var name = $('#stitle').val();
       var token = $('#csrf').val();
       //Validating, if "name" is empty.
       if (name == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#displaytitle").html("Search Item Not Found");
       }
       //If name is not empty.
       else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "http://127.0.0.1:8000/webadmin/title",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   search: name,
                   _token: token
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#displaytitle").html(html).show();
               }
           });
       }
   });
	
	
	$("#ships").keyup(function() {
       //Assigning search box value to javascript variable named as "name".
       var name = $('#ships').val();
       var token = $('#csrf').val();
       //Validating, if "name" is empty.
       if (name == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#displayhips").html("Search Item Not Found");
       }
       //If name is not empty.
       else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "http://127.0.0.1:8000/webadmin/hips",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   search: name,
                   _token: token
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#displayhips").html(html).show();
               }
           });
       }
   });
	
	$("#selbow").keyup(function() {
       //Assigning search box value to javascript variable named as "name".
       var name = $('#selbow').val();
       var token = $('#csrf').val();
       //Validating, if "name" is empty.
       if (name == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#displayelbow").html("Search Item Not Found");
       }
       //If name is not empty.
       else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "http://127.0.0.1:8000/webadmin/elbow",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   search: name,
                   _token: token
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#displayelbow").html(html).show();
               }
           });
       }
   });
	
	$("#scat").keyup(function() {
       //Assigning search box value to javascript variable named as "name".
       var name = $('#scat').val();
       var token = $('#csrf').val();
       //Validating, if "name" is empty.
       if (name == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#displaycat").html("Search Item Not Found");
       }
       //If name is not empty.
       else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "http://127.0.0.1:8000/webadmin/cat",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   search: name,
                   _token: token
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#displaycat").html(html).show();
               }
           });
       }
   });
	
	$("#skoer").keyup(function() {
       //Assigning search box value to javascript variable named as "name".
       var name = $('#skoer').val();
       var token = $('#csrf').val();
       //Validating, if "name" is empty.
       if (name == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#displaykoer").html("Search Item Not Found");
       }
       //If name is not empty.
       else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "http://127.0.0.1:8000/webadmin/koer",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   search: name,
                   _token: token
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#displaykoer").html(html).show();
               }
           });
       }
   });
	
	$("#sregistry").keyup(function() {
       //Assigning search box value to javascript variable named as "name".
       var name = $('#sregistry').val();
       var token = $('#csrf').val();
       //Validating, if "name" is empty.
       if (name == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#displayregistry").html("Search Item Not Found");
       }
       //If name is not empty.
       else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "http://127.0.0.1:8000/webadmin/registry",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   search: name,
                   _token: token
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //displayregistry result to "display" div in "search.php" file.
                   $("#displayregistry").html(html).show();
               }
           });
       }
   });
	
	
	
	$("#reg1").keyup(function() {
       //Assigning search box value to javascript variable named as "name".
       var name = $('#reg1').val();
       var token = $('#csrf').val();
       //Validating, if "name" is empty.
       if (name == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#displayrag").html("Enter regcode");
       }
       //If name is not empty.
       else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "http://127.0.0.1:8000/webadmin/reg1",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   search: name,
                   _token: token
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#displayrag").html(html).show();
               }
           });
       }
   });
	
	
	$("#sblogcat").keyup(function() {
       //Assigning search box value to javascript variable named as "name".
       var name = $('#sblogcat').val();
       var token = $('#csrf').val();
       //Validating, if "name" is empty.
       if (name == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#displayblogcat").html("Search Item Not Found");
       }
       //If name is not empty.
       else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "http://127.0.0.1:8000/webadmin/blogcat",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   search: name,
                   _token: token
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#displayblogcat").html(html).show();
               }
           });
       }
   });
	
	
	
});