$(function() {
	$(".edit-btn").click(function() {
		var id = this.id;
		$.post("../php/get-item.php",
		{ 
			itemid : id
		},
		function(data,status) {
			//console.log(data);
			var result = JSON.parse(data); 
			console.log(result);

			$.each(result, function(key,value) {
				$("#"+key).val(value);
				console.log(key+" "+value);
			});
		});

		//$('#edit-modal').modal();
	});
	$(".delete-btn").click(function() {
		var id = this.id;
		console.log(id);
		$.post("../php/delete.php",
		{ 
			itemid : id
		},
		function(data,status) {
			//console.log(data);
			if(data=="done") {

			}
		});
	});
});