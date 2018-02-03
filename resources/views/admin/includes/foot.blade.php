<script type="text/javascript">
		function associate_errors(errors, $form)
		{	 
		    //remove existing error classes and error messages from form groups
		    $form.find('.form-group').removeClass('has-error').find('.help-text').text('');
		   
		    $.each(errors, function(value, index){
		        //find each form group, which is given a unique id based on the form field's name  add the error class and set the error text
		        $('#'+value).parent().addClass('has-error').find('.help-text').text(index.join(', '));
		    });
		}
	sendMailToAppointments();
	setInterval(function() {
            // code to be repeated
            sendMailToAppointments()
      }, 300000); // every 5 minutes

	function sendMailToAppointments() { 
	  $.ajax({
	   type: "GET",
	   url: "send_mail_to_appointments", 
	   success: function(msg){
	   	console.log(msg);
	   }
	 });
	}
	</script>
</body>

</html>
