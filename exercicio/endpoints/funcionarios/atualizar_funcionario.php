<?php
    include '../../conexao.php';
    include '../../cors.php';

    if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    
        $data = file_get_contents("php://input");

        $requestData = json_decode($data);

        $sql = "UPDATE funcionarios SET Nome='$requestData->Nome', Cargo='$requestData->Cargo', DataNasc='$requestData->dataNasc', Salario='$requestData->Salario', Endereco='$requestData->Endereco', Cidade='$requestData->Cidade', CEP='$requestData->CEP', Pais='$requestData->Pais', Fone='$requestData->Fone' WHERE CodFun='$requestData->CodFun'";

        $result = $connection->query($sql);

        if ($result === true) {
            echo "Dados inseridos com sucesso!";
        } else {
            echo "Erro ao inserir dados: " . $connection->error;
        }

        echo json_encode($result);
    }

?>