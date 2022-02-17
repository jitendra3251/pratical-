<!DOCTYPE html>    
<html>    
<head>    
    <title>Login Form</title>    
</head>    

<body>  
      <div class="row">
           <h2>New User Login</h2>
	   </div>
 <div class="row">
        <div class="well col-md-5 center login-box">
            <div class="alert alert-info">
                Please login with your Email and Password.
            </div>
            <form class="form-horizontal" action="<?php echo base_url('User-Login'); ?>" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Email" name="email">                        
                    </div><span class="text-danger"><?php echo form_error('email'); ?></span>

                    <div class="input-group">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div><span class="text-danger"><?php echo form_error('password'); ?></span>

                    <p class="center col-md-5">
                        <button type="submit" name="insert" value="Login" class="btn btn-primary">Login</button>
                        <?php  
                        echo '<label class="text-danger">'.$this->session->flashdata("error").'</label>';
                        ?>  
                    </p>
            </form>
       </div>
    </div>
</body>
</html>
