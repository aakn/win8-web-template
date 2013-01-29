$(function() {
	$(".edit-btn").click(function() {
		var id = this.id;
		var tmpl = [
		// tabindex is required for focus
		'<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">',
			'<div class="modal-header">',
				'<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>',
				'<h3>Edit Data</h3>', 
			'</div>',
			'<div class="modal-body">',
				'<p>Test</p>',
			'</div>',
			'<div class="modal-footer">',
				'<a href="#" data-dismiss="modal" class="btn">Close</a>',
				'<a href="#" class="btn btn-primary">Save changes</a>',
			'</div>',
		'</div>'
		].join('');

		$(tmpl).modal();
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