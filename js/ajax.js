$(document).ready(function(){
	$("#gender").change(function(){
		var valGender = $("#gender").val();
		$.ajax({
			type:'POST',
			url:'../controller/c_filterIndex.php',
			data:'val='+valGender,
			success:function(data){
				$('#types').html(data);
			},
			error:function(){
				console.log("loi ajax c_filterIndex");
			}
		});
	});
})