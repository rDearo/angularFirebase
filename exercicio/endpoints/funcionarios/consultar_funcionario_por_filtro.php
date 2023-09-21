<?php
    include '../../conexao.php';
    include '../../cors.php';

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $data = file_get_contents("php://input");

        $requestData = json_decode($data);

        if($requestData->filtro=='Nome'){
            $sql = "SELECT * FROM Funcionarios WHERE Nome LIKE '%$requestData->texto%'";
        }
        else if($requestData->filtro=='Cargo'){
            $sql = "SELECT * FROM Funcionarios WHERE Cargo LIKE '%$requestData->texto%'";
        }
        else if($requestData->filtro=='Cidade'){
            $sql = "SELECT * FROM Funcionarios WHERE Cidade LIKE '%$requestData->texto%'";
        }
        else if($requestData->filtro=='Fone'){
            $sql = "SELECT * FROM Funcionarios WHERE Fone LIKE '%$requestData->texto%'";
        }

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
    }
    
?>