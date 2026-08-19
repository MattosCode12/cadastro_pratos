<?php 

include("conexao.php"); 

$sql = "SELECT pratos.*, usuarios.nome AS usuario 
        FROM pratos 
        INNER JOIN usuarios 
        ON pratos.usuario_id = usuarios.id"; 
        
$resultado = $conn->query($sql); 
?> 

<!DOCTYPE html> 
<html lang="pt-br"> 
    
<head> 
    <meta charset="UTF-8"> 
    <title>Pratos</title> 
    <link rel="stylesheet" href="style.css"> 
</head> 

<body> 
    <div class="container"> 
        <h1>Pratos</h1> 
        <a href="cadastrar_prato.php"> Cadastrar novo prato </a> 
        <br><br> 
        
        <table> 
            
        <tr> 
            <th>Nome</th> 
            <th>Descrição</th> 
            <th>Preço</th> 
            <th>Categoria</th> 
            <th>Cadastrado por</th> 
            <th>Ações</th> 
        </tr> 
        
        <?php while ($prato = $resultado->fetch_assoc()) { ?> 
        <tr> 
            <td><?= $prato["nome"] ?></td> 
            <td><?= $prato["descricao"] ?></td> 
            <td>R$ <?= $prato["preco"] ?></td> 
            <td><?= $prato["categoria"] ?></td> 
            <td><?= $prato["usuario"] ?></td> 
            <td> <a href="editar_prato.php?id=<?= $prato["id"] ?>"> Editar </a> 
            | 
            <a href="excluir_prato.php?id=<?= $prato["id"] ?>"> Excluir </a> 
        </td> 
     </tr> 
<?php } ?> 
    </table> 
        <br> 
        <a href="index.php">Voltar</a> 
    </div> 
    </body> 
    </html>