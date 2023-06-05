
$(document).ready(function() {
    $("#myForm").validate({
        rules: {
            title: {
              required: true,
              minlength: 3
            },
            image: {
              required: true,
              maxlength:5
            },
            place: {
              required: true,
              maxlength:5
            },
            navigate: {
              required: true,
              maxlength:5
            }
          },
          messages: {
            title: {
              required: "Please enter your name",
              minlength: "Name must be at least 3 characters long"
            },
            image: {
              required: "Please enter your name",
              minlength: "Name must be at least 3 characters long"
            },
            place: {
              required: "Please enter your name",
              minlength: "Name must be at least 3 characters long"
            },
            navigate: {
              required: "Please enter your name",
              minlength: "Name must be at least 3 characters long"
            },
            
          },
          
        submitHandler: function(form) {
            // Disable submit button to prevent multiple submissions
            $("#myForm input[type='submit']").attr("disabled", true);

            // Perform AJAX submission
            $.ajax({
                url: $(form).attr("action"),
                type: "POST",
                data: $(form).serialize(),
                success: function(response) {
                    // Handle successful submission
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.log(error);
                }
            });
        }
    });
});
