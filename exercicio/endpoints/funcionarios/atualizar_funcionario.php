<?php
    include '../../conexao.php';
    include '../../cors.php'

    $data = file_get_contents("php://input");

    $requestData = json_decode($data);

    $sql = "UPDATE`Funcionarios SET `Nome`= '$requestData->Nome', `Cargo` = '$requestData->Cargo', `Endereco` = '$requestData->Endereco', `Cidade` = '$requestData->Cidade', `CEP` = '$requestData->CEP', `Pais` = '$requestData->Pais', `Telefone` = '$requestData->Fone' WHERE CodCli = '$requestData->CodFun'";

    $result = $connection->query($sql);

    if ($result === true) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados: " . $connection->error;
    }

    echo json_encode($response);

?>