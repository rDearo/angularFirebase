<?php
    include '../../cors.php';
    include '../../conexao.php';

	if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
        $data = file_get_contents("php://input");

        // Decodifica o JSON para um objeto PHP
        $requestData = json_decode($data);

        // CodFun é o nome da coluna que está sendo enviado pelo cliente
        $sql = "DELETE FROM Funcionarios WHERE CodFun='$requestData->CodFun'";

        if ($connection->query($sql) === true) {
            $response = [
                'mensagem' => 'Registro apagado com sucesso!'
            ];
        } else {
            $response = [
                'mensagem' => $connection->error
            ];
        }
        echo json_encode($response);
    }  
?>  