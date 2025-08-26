<?php

include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['nome']);
    $nacionalidade = trim($_POST['nacionalidade']);
    $ano_nascimento = trim($_POST['ano_nascimento']);

    $sql = "INSERT INTO autores (nome, nacionalidade, ano_nascimento) VALUES ('$name', '$nacionalidade', '$ano_nascimento')";


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
    <title>Criar Autor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid p-1 ms-5 me-5">
            <a class="navbar-brand fs-2" href="#">Criar Autor</a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row ms-5 mt-5 me-5">

            <form action="" method="POST">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" aria-describedby="Nome" placeholder="Nome">
                </div>

                <div class="mb-3">
                    <label for="nacionalidade" class="form-label">Nacionalidade</label>
                    <input type="text" class="form-control" id="nacionalidade" name="nacionalidade" placeholder="Nacionalidade" required>
                </div>

                <div class="mb-3">
                    <label for="ano_nascimento" class="form-label">Ano de Nascimento</label>
                    <input type="text" class="form-control" id="ano_nascimento" name="ano_nascimento" placeholder="Ano de Nascimento" required>
                </div>

                <button type="submit" class="btn btn-primary">Criar</button>
            </form>
        </div>

    </div>

</body>