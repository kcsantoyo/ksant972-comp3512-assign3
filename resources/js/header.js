/*
    Simple Search Toolbar
*/
$(document).ready( function() {
    $("#searchBox").hide();
    
    $("#searchIcon").on("click", function() {
        $("#searchIcon").hide();
        $("#searchBox").show();
    });
    
    $("#searchBtn").on("click", function() {
         $("#searchIcon").show(); 
         $("#searchBox").hide();
    });
});