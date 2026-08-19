<?php 

include("conexao.php"); 

$id = $_GET["id"]; $sql = "SELECT pratos.*, usuarios.nome AS usuario 
                        FROM pratos 
                        INNER JOIN usuarios
                         ON pratos.usuario_id = usuarios.id WHERE usuarios.id = ?"; 
                         
$stmt = $conn->prepare($sql); 
$stmt->bind_param("i", $id); 
$stmt->execute(); $resultado = $stmt->get_result(); 
?> 

<!DOCTYPE html> 
<html lang="pt-br"> 
    
    <head> 
        <meta charset="UTF-8"> 
        <title>Pratos do Usuário</title> 
        <link rel="stylesheet" href="style.css"> 
    </head> 
    
    <body> 
        <div class="container"> 
            <h1>Pratos cadastrados pelo usuário</h1> 
            <table> 
                
            <tr> 
                <th>Nome</th> 
                <th>Descrição</th> 
                <th>Preço</th> 
                <th>Categoria</th> 
            </tr> 
            
            <?php while ($prato = $resultado->fetch_assoc()) { ?> 
            
            <tr> 
                <td><?= $prato["nome"] ?></td> 
                <td><?= $prato["descricao"] ?></td> 
                <td>R$ <?= $prato["preco"] ?></td> 
                <td><?= $prato["categoria"] ?></td> 
            </tr> 
            <?php } ?> 
        
        </table> 
        <br> 
        <a href="usuarios.php">Voltar</a> 
    </div> 
</body> 
</html>