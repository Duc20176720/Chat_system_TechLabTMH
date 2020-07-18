<h1 style='color:red;'><b>Regist user</b></h1>
<form action="" method="POST">
    <p style='color:green'>Name:</p>
    <input require type='text' name='name' value="<?php if(isset($name_exist)) echo $name_exist['tUser']['name']; ?>"></input>
    <p style='color:green'>E-mail:</p>
    <input require type='text' name='e-mail'></input>
    <p style='color:green'>Password:</p>
    <input require type='password' name='password'></input>
    <input type='submit' value='REGIST'></input>
    <br>
    <?php 
        if($this->Session->read('error'))
        echo $this->Session->read('error');
        if($this->Session->read('true'))
        echo $this->Session->read('true');
    ?>
</form>