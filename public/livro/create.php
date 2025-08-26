<?php

include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = trim($_POST['titulo']);
    $genero = trim($_POST['genero']);
    $ano_publicacao = trim($_POST['ano_publicacao']);
    $id_autor_fk = trim($_POST['id_autor_fk']);

    $sql = "INSERT INTO livros (titulo, genero, ano_publicacao, id_autor_fk) VALUES ('$titulo', '$genero', '$ano_publicacao', '$id_autor_fk')";


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
    <title>Criar Livro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid p-1 ms-5 me-5">
            <a class="navbar-brand fs-2" href="#">Criar Livro</a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row ms-5 mt-5 me-5">

            <form action="" method="POST">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" aria-describedby="Titulo" placeholder="Título" required>
                </div>

                <div class="mb-3">
                    <label for="genero" class="form-label">Gênero</label>
                    <input type="text" class="form-control" id="genero" name="genero" aria-describedby="Genero" placeholder="Gênero" required>
                </div>

                <div class="mb-3">
                    <label for="ano_publicacao" class="form-label">Ano de Publicação</label>
                    <input type="text" class="form-control" id="ano_publicacao" name="ano_publicacao" placeholder="Ano de Publicação" required>
                </div>

                <div class="mb-3">
                    <label for="id_autor_fk" class="form-label">ID do Autor</label>
                    <input type="number" class="form-control" id="id_autor_fk" name="id_autor_fk" placeholder="ID do Autor" required>
                </div>

                <button type="submit" class="btn btn-primary">Criar</button>
            </form>
        </div>

    </div>

</body>