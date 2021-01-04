<?php include_once('header.php'); ?>
<h1>Login</h1>

<form name="login" method="POST" action="/verificar-login">
    
    <?php if($msg): ?>
    <p><?= $msg; ?></p>
    <?php endif; ?>
 
    <input type="text" name="email" placeholder="Email">
    <input type="password" name="senha" placeholder="Senha">
    
    <button type="submit">Acessar</button>
</form>