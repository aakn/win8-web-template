$(function() {
	$(".edit-btn").click(function() {
		var id = this.id;
		$.post("../php/get-item.php",
		{ 
			itemid : id
		},
		function(data,status) {
			console.log(data);
			var json = JSON.parse(data); 
			console.log(json);
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