<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 300px;
        }
        .form-container h2 {
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input {
            width: calc(100% - 10px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        .form-group input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        .form-group input[type="submit"]:hover {
            background-color: #45a049;
        }
        .text-danger{
            color: red;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Customer Login</h2>
        <form id="cust_login_form_id">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
                <span id="email-error" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                <span id="password-error" class="text-danger"></span>
            </div>
            <div class="form-group">
                <input type="submit" value="Login"/>
            </div>
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $('#cust_login_form_id').on('submit',function(e){
       e.preventDefault();
       $.ajax({
            url:"{{route('customer.cust-login')}}",
            method:'POST',
            data:$(this).serialize(),
            success:function(response) {
              alert("Account login successfully!");
              location.href="{{url('customer-dashboard')}}";
            },
            error:function(response){
               var errors = response.responseJSON.errors; 
               if(errors.password){
                $('#password-error').text(errors.password)
               } 
               if(errors.email){
                $('#email-error').text(errors.email)
               } 
            }
          });
    })
</script>
</html>
