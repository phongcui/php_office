
$(document).ready(function(){
	$('#cancel-button').click(function(){
		window.location = 'index.php';
	});
	
	$('#multy-delete').click(function(){
		$('#main-form').submit();
	});
	
	$('#check-all').change(function(){
		var checkStatus = this.checked;
		$('#main-form').find(':checkbox').each(function(){
			this.checked = checkStatus;
		});
	});
	
	$('.success, .notice, .error').click(function() {
		 $(this).toggle("slow");
	});

	$('#clear').click(function(){
		window.location.href = 'index.php';
	});
	
	
	
	$('#filter-form [name="status"]').change(function(){
		$('#filter-form').submit();
	})
});




