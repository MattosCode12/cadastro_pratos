<?php 

include("conexao.php"); 
$usuarios = $conn->query("SELECT * FROM usuarios"); ?> 

<!DOCTYPE html> 
<html lang="pt-br"> 
    
    <head> 
        <meta charset="UTF-8"> 
        <title>Cadastrar Prato</title> 
        <link rel="stylesheet" href="style.css"> 
    </head> 
    
    <body> 
        <div class="container"> 
            <h1>Cadastrar Prato</h1> 
            <form method="POST"> 
                <input type="text" name="nome" placeholder="Nome do prato" required> 
                <textarea name="descricao" placeholder="Descrição" required></textarea> 
                <input type="number" step="0.01" name="preco" placeholder="Preço" required> 
                <input type="text" name="categoria" placeholder="Categoria" required> 
                <select name="usuario_id" required> 
                    <option value="">Selecione o usuário</option> 
                    <?php while ($usuario = $usuarios->fetch_assoc()) { ?> 
                        <option value="<?= $usuario["id"] ?>"> <?= $usuario["nome"] ?> </option> 
                    <?php } ?> 
                </select> 
                <button type="submit" name="cadastrar"> Cadastrar </button> 
            </form> 
            <br> 
            <a href="pratos.php">Voltar</a> 
        </div> 
    </body> 
</html> 

<?php if (isset($_POST["cadastrar"])) { 
    $nome = $_POST["nome"]; 
    $descricao = $_POST["descricao"]; 
    $preco = $_POST["preco"]; 
    $categoria = $_POST["categoria"]; 
    $usuario_id = $_POST["usuario_id"]; 

    if ( empty($nome) || empty($descricao) || empty($preco) || empty($categoria) || empty($usuario_id) ) { 
        echo "Preencha todos os campos!"; 
    } else { 
        $sql = "INSERT INTO pratos (nome, descricao, preco, categoria, usuario_id) VALUES (?, ?, ?, ?, ?)"; 
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param( "ssdsi", $nome, $descricao, $preco, $categoria, $usuario_id ); 
        $stmt->execute(); 
        header("Location: pratos.php"); 
        exit(); 
    } 