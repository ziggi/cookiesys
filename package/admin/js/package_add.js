$(function(){
	$('#btnUpload').on('click', function() {
		$('#inputFile').click();
	});
	
	$('#inputForm').on('change', function() {
		$('#inputFile').ajaxForm({
			beforeSend: function() {
				$('.progress').css('display', 'block');
				updatePercentValue(0);
			},
			uploadProgress: function(event, position, total, percentComplete) {
				updatePercentValue(percentComplete);
			},
		    success: function() {
		    	updatePercentValue(100);
		    },
			complete: function(xhr) {
				addImagesFromArray(xhr.responseText);
			}
		}).submit();
	});
});