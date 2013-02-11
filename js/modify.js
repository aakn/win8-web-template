$(function() {
	
	$(".delete-btn").click(function() {
		var id = this.id;
		console.log(id);
		$.post("../php/delete.php",
		{ 
			itemid : id
		},
		function(data,status) {
			if(data=="done") {
				$("#rowid-"+id).hide();
			}
		});
	});

	var result;
	var rowid;
	$(".edit-btn").click(function() {
		var id = this.id;
		rowid = id;
		$.post("../php/get-item.php",
		{ 
			itemid : id
		},
		function(data,status) {
			result = JSON.parse(data); 
			console.log(result);
			$.each(result, function(key,value) {
				$("#"+key).val(value);
			});
		});
	});

	$("#save-changes-btn").click(function () {
		var items = new Object();
		var i=0;
		var trcode = "";
		$.each(result, function(key,value) {
			items[key] = $("#"+key).val();
			trcode = trcode + "<td>" + items[key] + "</td>";
		});

		trcode = trcode + "<td><button class='btn btn-inverse edit-btn' data-toggle='modal' href='#edit-modal' id='"+rowid+"' >Edit</button>"+
									"<button class='btn btn-danger delete-btn'  id='"+rowid+"' >Delete</button>"+
								"</td>";

		$.post("../php/update-item.php", items,
		function(data,status) {
			$("#edit-modal").modal('hide');
			$("#rowid-"+rowid).html(trcode);
		});
	});
});