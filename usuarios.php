<?php 

include("conexao.php"); 

$sql = "SELECT * FROM usuarios"; 
$resultado = $conn->query($sql); ?> 

<!DOCTYPE html> 
<html lang="pt-br"> 
    
<head> 
    <meta charset="UTF-8"> 
    <title>Usuários</title> 
    <link rel="stylesheet" href="style.css"> 
</head> 

<body> 
    <div class="container"> 
        <h1>Usuários</h1> 
        <form action="cadastrar_usuario.php" method="POST"> 
            <input type="text" name="nome" placeholder="Nome" required> 
            <input type="email" name="email" placeholder="E-mail" required> 
            <button type="submit">Cadastrar</button> 
        </form> 
        <h2>Usuários cadastrados</h2> 
        <table> 
            <tr> 
                <th>ID</th> 
                <th>Nome</th> 
                <th>E-mail</th> 
                <th>Pratos</th> 
            </tr> 
            <?php while ($usuario = $resultado->fetch_assoc()) { ?> 
                <tr> 
                    <td><?= $usuario["id"] ?></td> 
                    <td><?= $usuario["nome"] ?></td> 
                    <td><?= $usuario["email"] ?></td> 
                    <td> <a href="pratos_usuario.php?id=<?= $usuario["id"] ?>"> Ver pratos </a> </td> 
                </tr> 
            <?php } ?> 
        </table> 
        <br> 
        <a href="index.php">Voltar</a> 
    </div> 
</body> 
</html> 