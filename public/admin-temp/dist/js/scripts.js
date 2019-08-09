$(document).ready(function () {
	$("#compose-textarea").wysihtml5();
	$(".select2").select2();

	$('#datepicker').datepicker({
		autoclose: true,
		format:'dd/mm/yy'
	});
	 
});
