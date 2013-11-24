<?php 
	
	require 'database.php';

	if ( !empty($_POST)) {
		// keep track validation errors
        $loginError = null;
        $nameError = null;
        $lastnameError = null;
        $sexError = null;
		$emailError = null;
		$mobileError = null;
        $passwordError = null;
		
		// keep track post values
        $login = $_POST['login'];
		$name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $sex = $_POST['sex'];
        $birthday = $_POST['birthday'];
        $password = $_POST['password'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		
		// validate input
		$valid = true;
        if (empty($login)) {
            $loginError = 'Please enter your Name';
            $valid = false;
        }

        if (empty($name)) {
			$nameError = 'Please enter your Name';
			$valid = false;
		}
        
        if (empty($lastname)) {
			$lastnameError = 'Please enter your Lastname';
			$valid = false;
		}
        
        if (empty($sex)) {
			$sexError = 'Please choose your Gender';
			$valid = false;
		}

        if (empty($password)) {
            $passwordError = 'Please choose your Gender';
            $valid = false;
        }
		
		if (empty($email)) {
			$emailError = 'Please enter Email Address';
			$valid = false;
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$emailError = 'Please enter a valid Email Address';
			$valid = false;
		}
		
		if (empty($mobile)) {
			$mobileError = 'Please enter Mobile Number';
			$valid = false;
		}

        if (empty($password)) {
            $passwordError = 'Please enter Mobile Number';
            $valid = false;
        }
		
		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO customers (login,name,lastname,sex,email,mobile,password) values(?, ?, ?, ?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($login,$name,$lastname,$sex,$email,$mobile,$password));
			Database::disconnect();
			header("Location: index.php");
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Create a Customer</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="create.php" method="post">
                        <div class="control-group <?php echo !empty($loginError)?'error':'';?>">
                            <label class="control-label">Log In</label>
                            <div class="controls">
                                <input name="login" type="text"  placeholder="login" value="<?php echo !empty($login)?$login:'';?>">
                                <?php if (!empty($loginError)): ?>
                                    <span class="help-inline"><?php echo $loginError;?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                    <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
					    <label class="control-label">Name</label>
					    <div class="controls">
					      	<input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
					      	<?php if (!empty($nameError)): ?>
					      		<span class="help-inline"><?php echo $nameError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
                      <div class="control-group <?php echo !empty($lastnameError)?'error':'';?>">
					    <label class="control-label">Lasname</label>
					    <div class="controls">
					      	<input name="lastname" type="text"  placeholder="Lasname" value="<?php echo !empty($lastname)?$lastname:'';?>">
					      	<?php if (!empty($lastnameError)): ?>
					      		<span class="help-inline"><?php echo $lastnameError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
                      <div class="control-group <?php echo !empty($sexError)?'error':'';?>">
					    <label class="control-label">Sex</label>
					    <div class="controls">
					      	<input name="sex" type="radio"   value="Male" /> Male
                            <input name="sex" type="radio"   value="Female" /> Female
					      	<?php if (!empty($sexError)): ?>
					      		<span class="help-inline"><?php echo $sexError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
					    <label class="control-label">Email Address</label>
					    <div class="controls">
					      	<input name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
					      	<?php if (!empty($emailError)): ?>
					      		<span class="help-inline"><?php echo $emailError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($mobileError)?'error':'';?>">
					    <label class="control-label">Mobile Number</label>
					    <div class="controls">
					      	<input name="mobile" type="text"  placeholder="Mobile Number" value="<?php echo !empty($mobile)?$mobile:'';?>">
					      	<?php if (!empty($mobileError)): ?>
					      		<span class="help-inline"><?php echo $mobileError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
                        <div class="control-group <?php echo !empty($passwordError)?'error':'';?>">
                            <label class="control-label">Password</label>
                            <div class="controls">
                                <input name="password" type="password" placeholder="Password" value="<?php echo !empty($passwordl)?$password:'';?>">
                                <?php if (!empty($passwordError)): ?>
                                    <span class="help-inline"><?php echo $passwordError;?></span>
                                <?php endif;?>
                            </div>
                        </div>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Create</button>
						  <a class="btn" href="index.php">Back</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>