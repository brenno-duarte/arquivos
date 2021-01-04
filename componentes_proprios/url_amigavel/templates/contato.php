<?php include_once 'header.php' ?>

<h1>Contato</h1>
<a href="sobre">Sobre</a>

<?php
    $user = new Source\User\User();
    $user->name();
?>

<a href="home">Home</a>

<?php include_once 'footer.php' ?>