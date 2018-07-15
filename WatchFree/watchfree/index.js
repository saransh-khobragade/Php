$(document).ready(function(){

$('#search_box').keyup(function(){
	
	var value=$(this).val();
	
	if(value!=''){
		$.post('crawler5.php',{value:value},function(data){
			
			$('#search_result').html(data);
		});
		
	}
	})

$('#search_button').click(function(){
	
	var value=$('#search_box').val();
	
	if(value!=''){
		$.post('crawler4.php',{value:value},function(data){
			
			$('#linkbox').html(data);
		});
		
	}
	})
});

$('#search_button').click(function(){
    $('#search_box').animate({top:'10px'});
	$('#search_button').animate({top:'15px'});
	$('#search_result').hide();

}); 