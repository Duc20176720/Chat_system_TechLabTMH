<h1 style='color:red;'><b>Login user</b></h1>
<form action="" method="POST">
    <p require style='color:green'>E-mail:</p>
    <input type='email' name='e-mail' value="<?php if(isset($email_user)) echo $email_user; ?>"></input>
    <p require style='color:green'>Password:</p>
    <input type='password' name='password'></input>
    <input type='submit' value='login'></input>
    <br>
    <?php 
        if($this->Session->read('login_fail'))
        echo $this->Session->read('login_fail');
    ?>
</form>