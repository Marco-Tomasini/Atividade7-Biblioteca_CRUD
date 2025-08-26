<?php

include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_livro_fk = trim($_POST['id_livro_fk']);
    $id_leitor_fk = trim($_POST['id_leitor_fk']);
    $data_emprestimo = trim($_POST['data_emprestimo']);
    $data_devolucao = trim($_POST['data_devolucao']);

    if (empty($data_devolucao)) {
        $data_devolucao_sql = "NULL";
    } else {
        $data_devolucao_sql = "'$data_devolucao'";
    }

    $sql = "INSERT INTO emprestimos (id_livro_fk, id_leitor_fk, data_emprestimo, data_devolucao) VALUES ('$id_livro_fk', '$id_leitor_fk', '$data_emprestimo', $data_devolucao_sql)";


    if ($conn->query($sql) === true) {
        echo "Registro criado com sucesso!
                <a href='read.php'>Ver registros.</a>";
    } else {
        echo "Erro: " . $conn->error;
    }

    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Criar Emprestimo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid p-1 ms-5 me-5">
            <a class="navbar-brand fs-2" href="#">Criar Emprestimo</a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row ms-5 mt-5 me-5">

            <form action="" method="POST">
                <div class="mb-3">
                    <label for="id_livro_fk" class="form-label">ID do Livro</label>
                    <input type="text" class="form-control" id="id_livro_fk" name="id_livro_fk" aria-describedby="ID do Livro" placeholder="ID do Livro">
                </div>

                <div class="mb-3">
                    <label for="id_leitor_fk" class="form-label">ID do Leitor</label>
                    <input type="text" class="form-control" id="id_leitor_fk" name="id_leitor_fk" aria-describedby="ID do Leitor" placeholder="ID do Leitor">
                </div>

                <div class="mb-3">
                    <label for="data_emprestimo" class="form-label">Data de Empréstimo</label>
                    <input type="date" class="form-control" id="data_emprestimo" name="data_emprestimo" placeholder="Data de Empréstimo" required>
                </div>

                <div class="mb-3">
                    <label for="data_devolucao" class="form-label">Data de Devolução</label>
                    <input type="date" class="form-control" id="data_devolucao" name="data_devolucao" placeholder="Data de Devolução">
                </div>

                <button type="submit" class="btn btn-primary">Criar</button>
            </form>
        </div>

    </div>

</body>