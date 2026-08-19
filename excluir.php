<?php 

include("conexao.php"); 
$id = $_GET["id"]; $sql = "DELETE FROM pratos WHERE id = ?"; 
$stmt = $conn->prepare($sql); 
$stmt->bind_param("i", $id); $stmt->execute(); 

header("Location: pratos.php"); 
exit(); 
?>