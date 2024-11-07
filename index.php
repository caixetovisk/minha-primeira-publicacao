<?php
// Conexão com o banco de dados
$conn = new mysqli("localhost", "usuario", "senha", "banco_de_dados");
//fdsa
// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Obtém o nome de usuário da solicitação
$username = $_GET['username'];

// Consulta SQL vulnerável
$sql = "SELECT * FROM usuarios WHERE username = '$username'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Nome: " . $row["nome"]. "<br>";
    }
} else {
    echo "0 resultados";
}

$conn->close();
?>
