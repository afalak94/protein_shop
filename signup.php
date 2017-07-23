<?php

include_once 'header.php';

?>

  <div class="container" style="padding-top: 50px;">
  	<div class="row">
  		<h2>Registration Form</h2> 
          
  <form class="form-horizontal" action="includes/signup.inc.php" method="POST">
    <fieldset>
  
    <!-- Form Name -->
    <legend>No pain - No gain</legend>
    
    <!-- first name-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">First Name</label>  
      <div class="col-md-4">
      <input id="textinput" name="first" placeholder="Insert your First Name" class="form-control   input-md"  required="" type="text">
      <span class="help-block"> </span>
      </div>
    </div>
    
    <!-- last name-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Last Name</label>  
      <div class="col-md-4">
      <input id="textinput" name="last" placeholder="Insert your Last Name" class="form-control input-md "  required="" type="text">
      <span class="help-block"> </span>  
      </div>
    </div>
    
    <!-- email-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Email</label>  
      <div class="col-md-4">
      <input id="textinput" name="email" placeholder="Insert your Email" class="form-control input-md"    required="" type="text">
      <span class="help-block"> </span>  
      </div>
    </div>
    
    <!-- uid-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Username</label>  
      <div class="col-md-4">
      <input id="textinput" name="uid" placeholder="Choose your username, npr. Bajo" class="form-control input-md"    required="" type="text">
      <span class="help-block"> </span>  
      </div>
    </div>
    
    <!-- password-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Password</label>  
      <div class="col-md-4">
      <input id="textinput" name="pwd" placeholder="Choose your password" class="form-control input-md "  required="" type="text">
      <span class="help-block"> </span>
      </div>
    </div>
    
    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="singlebutton"> </label>
      <div class="col-md-4">
        <button id="singlebutton" name="submit" class="btn btn-primary" type="submit">Sign up</button>
      </div>
    </div>
    
    </fieldset>
  </form>
    
  </div>
</div>
</body>
</html>