  $.validator.addMethod('filesize', function (value, element, param) {
    return this.optional(element) || (element.files[0].size <= param)
}, 'File size must be less than 1MB');


   $(document).ready(function() {
      $("#regform").validate({

      	rules: {
      		firstname: "required",
      		lastname: "required",
          filetile: "required",
      		email: {
      			required: true,
      			email: true
      		},
    		mobnumber: {
    			required: true,
    			minlength: 10,
    			maxlength: 10
    		},
    		imageupload: {
    			extension: "png|jpg|jpeg",
          filesize: 1048576,
    		}
    },
      	    // Specify validation error messages
    messages: {
      firstname: "Please enter your firstname",
      lastname: "Please enter your lastname",
      imageupload: {
      	extension: "Invalid image file supported (png | jpg | jpeg)",
      },
      email: "Please enter a valid email address",
      mobnumber: "Please enter a valid Phone Number"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
      
      $('#pdone').click(function(){
        $('.phide').show();
        $('.pshow').hide();
        $(this).hide();
        $('#pedit').show();
      });
    }

   });
});