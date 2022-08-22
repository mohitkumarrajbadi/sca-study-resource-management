  $.validator.addMethod('filesize', function (value, element, param) {
    return this.optional(element) || (element.files[0].size <= param)
}, 'File size must be less than 1MB');


   $(document).ready(function() {

  function fetch_data()  
      {  
           $.ajax({  
                url:"admin_stud_fetched.php",  
                method:"POST",  
                success:function(data){  
                     $('.show').html(data);  
                }  
           });  
      }  
      fetch_data();  

      function edit_data(id, text, column_name)  
      {  
          $(".cc").click(function()
          {
            $.ajax({  
                url:"admin_edit_stud.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     document.getElementById("msg").innerHTML = data;  
                     fetch_data();
                }  
           });
          });    
      }

      $(document).on('blur', '.firstname', function(){ 
           var id = $(this).data("id1");  
           var firstname = $(this).text();  
           edit_data(id,firstname, "FIRSTNAME");  
      });

      $(document).on('blur', '.lastname', function(){ 
           var id = $(this).data("id2");  
           var lastname = $(this).text();  
           edit_data(id,lastname, "LASTNAME");  
      });

      $(document).on('blur', '.branch', function(){  
           var id = $(this).data("id4");  
           var branch = $(this).val();  
           edit_data(id,branch, "BRANCH");  
      });

      $(document).on('blur', '.semester', function(){  
           var id = $(this).data("id5");  
           var semester = $(this).val();  
           edit_data(id,semester, "SEMESTER");  
      });

      $(document).on('blur', '.email', function(){  
           var id = $(this).data("id6");  
           var email = $(this).text();  
           edit_data(id,email, "EMAIL");  
      }); 

      $(document).on('blur', '.mobnumber', function(){  
           var id = $(this).data("id7");  
           var mobnumber = $(this).text();  
           edit_data(id,mobnumber, "MOBNUMBER");  
      });

      $(document).on('blur', '.password', function(){  
           var id = $(this).data("id8");  
           var password = $(this).text();  
           edit_data(id,password, "PASSWORD");  
      });


      $(document).on('click', '.fbn', function(){ 
           var id=$(this).data("id10");  
           if(confirm("Are you sure you want to remove this user?"))  
           {  
                $.ajax({  
                     url:"admin_stud_delete.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          document.getElementById('msg').innerHTML=data; 
                          fetch_data();  
                     }  
                });  
           }  
      });





$("#regform").validate({
      	rules: {
      		firstname: "required",
      		lastname: "required",
          filetile: "required",
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
      	},

      	    // Specify validation error messages
    messages: {
      firstname: "Please enter your firstname",
      lastname: "Please enter your lastname",
      subject: "Please select a Subject",
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
      rollno: "Please Enter a Valid RollNo"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
          form.submit();
          fetch_data();
        }
      });
   });