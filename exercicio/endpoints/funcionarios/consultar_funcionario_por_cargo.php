<?php
    include '../../conexao.php';
    include '../../cors.php'

    $data = file_get_contents("php://input");

    $requestData = json_decode($data);

    $sql = "SELECT * FROM Funcionarios WHERE Cargo='$requestData->Cargo'";

    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $funcionarios = [];
        while($row = $result->fetch_assoc()) {
            array_push($funcionarios, $row);
        }

        $response = [
            'funcionarios' => $funcionarios
        ];

    } else {
        $response = [
            'funcionarios' => 'Nenhum registro encontrado!'
        ];
    }

    echo json_encode($response);
?>