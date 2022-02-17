<!DOCTYPE html>    
<html>    
<head>    
    <title>Reg Form</title>    
</head>    
<body>    
    <center><h1> User Registration</h1></center>    
    <hr>    
    <form method="" action="" name="reg_form" onsubmit="return validate()">    
        <table>    
            <tr>    
                <td><label>UserName: </label></td>    
                <td>    
                    <input type="text" name="Username" placeholder="User Name">    
                </td>    
            </tr>    
            <tr>    
                <td><label>Password: </label></td>    
                <td>    
                    <input type=password" name="password" placeholder="password">    
                </td>    
            </tr>    
        
            <tr>    
                <td><label>Email Id: </label></td>    
                <td>    
                    <input type="text" name="email" placeholder="example@gmail.com">    
                </td>    
            </tr>    
            <tr>    
                <td>    
                    <input type="submit" name="submit" value="Submit">    
                    <input type="reset" name="reset" value="Reset">    
                </td>    
            </tr>             
        </table>    
    </form>    

	<script>  
    function validate() {  
        var Username = document.reg_form.Username;  
        var password = document.reg_form.password;  
        if (Username.value.length <= 0) {  
            alert("Username is required");  
            Username.focus();  
            return false;  
        }  
        if (password.value.length <= 0) {  
            alert("password is required");  
            password.focus();  
            return false;  
        }  

</script>   
</body>    
</html>     