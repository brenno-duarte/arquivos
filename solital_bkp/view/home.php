<?php include_once('header.php'); ?>
<h1>Home</h1>

<a href="/about">About</a>
<a href="/contact">Contact</a>
<a href="/sair">Sair</a>

<table>
    <thead>
        <tr>
            <th>nome imagem</th>
            <th>titulo</th>
            <th>resumo</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($colunas as $k): ?>
            <tr>
                <td><?= $k['titulo'] ?></td>
                <td><?= $k['resumo'] ?></td>
                <td><?= $k['data_not'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
echo $setas; ?>

<form action="/alterar-senha" method="post" style="margin-top: 30px;">
    Senha <input type="text" name="password">
    <button type="submit">Alterar</button>
</form>