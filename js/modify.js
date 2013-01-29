$(function() {
	$(".edit-btn").click(function() {
		var id = this.id;
	});
	$(".delete-btn").click(function() {
		var id = this.id;
		$.post("../php/delete.php",
		{ 
			id : id
		},
		function(data,status) {
			console.log(data);
		});
	});
});