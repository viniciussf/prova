<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Simple Login with CodeIgniter</title>
   <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <style>
        form {  
          width:100px;
          height:100px;
          position:absolute;
          top:25%;
          left:39%;
        }
    </style>
 </head>
 <body>

   <?php echo validation_errors(); ?>
   <?php $attributes = array('class' => 'pure-form pure-form-stacked', 'id' => 'myform');
     echo form_open('verifylogin',$attributes); ?>
    <fieldset>
        <legend>Login</legend>

        <label for="username">Login</label>
        <input id="username" name="username" type="text" placeholder="login">

        <label for="password">Password</label>
        <input id="password" name="password"type="password" placeholder="Password">


        <button type="submit" value ="login" class="pure-button pure-button-primary">Sign in</button>
    </fieldset>
  </form>
 </body>
</html>