
<form id="myForm">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name">

    <label for="email">Email:</label>
    <input type="email" id="email" name="email">

    <input type="submit" value="Submit">
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

$(document).ready(function() {
    $('#myForm').validate({
      rules: {
        name: {
          required: true,
          minlength: 2
        },
        email: {
          required: true,
          email: true
        }
      },
      messages: {
        name: {
          required: "Please enter your name",
          minlength: "Your name must be at least 2 characters long"
        },
        email: {
          required: "Please enter your email",
          email: "Please enter a valid email address"
        }
      },
      submitHandler: function(form) {
        // Code to be executed when the form is valid and submitted
        form.submit();
      }
    });
  });

