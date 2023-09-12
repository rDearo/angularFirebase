<?php
    include '../../conexao.php';
    include '../../cors.php'

    $data = file_get_contents("php://input");

    $requestData = json_decode($data);

    $sql = "INSERT INTO `Funcionarios`(`CodCli`, `Nome`, `Cargo`, `Endereco`, `Cidade`, `CEP`, `Pais`, `Telefone`) VALUES ('$requestData->CodFun','$requestData->Nome','$requestData->','$requestData->Cargo','$requestData->Endereco','$requestData->Cidade','$requestData->CEP','$requestData->Pais','$requestData->Fone')";

    $result = $connection->query($sql);

    if ($result === true) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados: " . $connection->error;
    }

    echo json_encode($response);

?>