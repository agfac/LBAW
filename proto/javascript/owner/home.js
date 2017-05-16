$(document).ready(function() {
    
    $("#reportrange").on("apply.daterangepicker",function(a,b){

    	var firstDate = b.startDate.format("YYYY-MM-DD");
    	var lastDate = b.endDate.format("YYYY-MM-DD");

    })
});