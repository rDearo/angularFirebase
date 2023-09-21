<?php
    include '../../conexao.php';
    include '../../cors.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $data = file_get_contents("php://input");

        $requestData = json_decode($data);

        $sql = "INSERT INTO funcionarios VALUES (0, '$requestData->Sobrenome', '$requestData->Nome','$requestData->Cargo','$requestData->DataNasc','$requestData->Endereco','$requestData->Cidade','$requestData->CEP','$requestData->Pais','$requestData->Fone', '$requestData->Salario')";

        $result = $connection->query($sql);

        if ($result === true) {
            echo "Dados inseridos com sucesso!";
        } else {
            echo "Erro ao inserir dados: " . $connection->error;
        }

        echo json_encode($result);
    }

?>