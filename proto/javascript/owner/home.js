$(document).ready(function() {
    
    $("#reportrange").on("apply.daterangepicker",function(a,b){

    	var firstDate = b.startDate.format("YYYY-MM-DD");
    	var lastDate = b.endDate.format("YYYY-MM-DD");
    	$('.top5orders').empty();

    	$.getJSON("../../api/owner/home.php", {firstDate: firstDate, lastDate: lastDate}, function(data){
    		console.log(data);
            if(data.length === 0 || data == "NULL"){
                $('.top5orders').append('<li class="media event"><div class="media-body"><a class="title">Sem encomendas entre as datas selecionadas</a></div></li>');
            }else{
                for (var i in data){
                    $('.top5orders').append('<li class="media event"><a class="pull-left border-aero profile_thumb"><i class="fa fa-user aero"></i></a><div class="media-body"><a class="title">'+data[i].nomecliente+'</a><p><strong>'+data[i].total+'€. </strong> Pagos na encomenda </p><p> <small>'+data[i].nrEncomendasHoje+' Encomenda(s) hoje</small></p></div></li>');
                }
            }
        });
    })
});