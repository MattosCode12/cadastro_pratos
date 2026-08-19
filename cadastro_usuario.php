<? 

php include("conexao.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") 

{ $nome = $_POST["nome"]; 
$email = $_POST["email"]; 

    if (empty($nome) || empty($email)) 
    { echo "Preencha todos os campos!"; 

    } else { 
    
    $sql = "INSERT INTO usuarios (nome, email) VALUES (?, ?)"; 
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("ss", $nome, $email); 
    $stmt->execute(); 
    
    header("Location: usuarios.php"); 
    exit(); 
    } 
   } 
?>