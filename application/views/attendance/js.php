<script>
$(document).ready(function(){
	
	$('#submit').click(function(){
		// session_name_id , class_name_id
		var x = $('#class_name_id').val();
		var y = $('#section_id').val();
		window.location.href = '<?php echo base_url('attendance/show_list/');?>' + x + '/' + y;
	});	
	
   $('#checkbox1').change(function() {
        if($(this).is(":checked")) {
			
			alert($(this).is(':checked'));
            // $(this).attr("checked", returnVal);
       
	   }
             
    });
	
});



</script>