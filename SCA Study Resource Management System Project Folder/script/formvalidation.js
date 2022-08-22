  $.validator.addMethod('filesize', function (value, element, param) {
    return this.optional(element) || (element.files[0].size <= param)
}, 'File size must be less than 1MB');


   $(document).ready(function() {
      $("#regform").validate({

      	rules: {
      		firstname: "required",
      		lastname: "required",
          filetile: "required",
          year: "required",
          examtitle: "required",
      		email: {
      			required: true,
      			email: true
      		},
      		password: {
      			required: true,
      			minlength: 5
      		},
      		password_again: {
      		  required: true,
     	 		   equalTo: "#password"
    		},
    		phonenumber: {
    			required: true,
    			minlength: 10,
    			maxlength: 10
    		},
    		imageupload: {
    			required: true,
    			extension: "png|jpg|jpeg",
          filesize: 1048576,
    		},
        pdfupload:{
          required: true,
          extension: "pdf|txt|zip|docx|doc|ppt|pptx"
        },
        fid: "required",
        sid: "required",
    		branch: "required",
    		semester: "required",
        subcode: "required",
        filetitle: "required",
        rollno: {
          required: true,
          maxlength: 7,
          minlength: 7,
        },
        subject: "required",
        subname: "required",
        faculty: "required"
      	},

      	    // Specify validation error messages
    messages: {
      firstname: "Please enter your firstname",
      lastname: "Please enter your lastname",
      subject: "Please select a Subject",
      examtitle: "Please select an Exam",
      year: "Please select an Year",
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      imageupload: {
      	required: "Please upload an image",
      	extension: "Invalid image file supported (png | jpg | jpeg)",
      },
      pdfupload: {
        required: "Please upload a File",
        extension: "Invalid PDF type supported only (.pdf|txt|zip|docx|doc|ppt|pptx)"
      },
      email: "Please enter a valid email address",
      password_again: "Please Re-Enter valid password",
      phonenumber: "Please enter a valid Phone Number",
      branch: "Please select a branch",
      semester: "Please select a semester",
      fid: "Please select an Faculty ID",
      subcode: "Please enter a Subject Code",
      sid: "Please select a valid Subject ID",
      filetitle: "Please Enter a File Title",
      rollno: "Please Enter a Valid RollNo",
      subname: "Please Enter a Subject Name",
      faculty: "Please select a Faculty"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }

      });
   });