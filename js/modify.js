$(function() {
	$(".edit-btn").click(function() {
		var id = this.id;
		$('body').modalmanager("#responsive");
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