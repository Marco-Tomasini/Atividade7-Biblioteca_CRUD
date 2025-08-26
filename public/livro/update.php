<?php

include '../db.php';

$id_livro = $_GET['id'];

$sql = "SELECT * FROM livros WHERE id_livro='$id_livro'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $titulo = $_POST['titulo'];
    $genero = $_POST['genero'];
    $ano_publicacao = $_POST['ano_publicacao'];
    $id_autor_fk = $_POST['id_autor_fk'];

    $sql = "UPDATE livros SET titulo='$titulo', genero='$genero', ano_publicacao='$ano_publicacao', id_autor_fk='$id_autor_fk' WHERE id_livro='$id_livro'";

    if ($conn->query($sql) === true) {
        echo "Registro atualizado com sucesso!
                <a href='read.php'>Ver registros.</a>
";
    } else {
        echo "Erro " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atualizar Livro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid p-1 ms-5 me-5">
            <a class="navbar-brand fs-2" href="#">Atualizar Livro</a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row ms-5 mt-5 me-5">

            <form action="" method="POST">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $row['titulo']; ?>" aria-describedby="Titulo" placeholder="Título" required>
                </div>

                <div class="mb-3">
                    <label for="genero" class="form-label">Gênero</label>
                    <input type="text" class="form-control" id="genero" name="genero" value="<?php echo $row['genero']; ?>" placeholder="Gênero" required>
                </div>

                <div class="mb-3">
                    <label for="ano_publicacao" class="form-label">Ano de Publicação</label>
                    <input type="text" class="form-control" id="ano_publicacao" name="ano_publicacao" value="<?php echo $row['ano_publicacao']; ?>" placeholder="Ano de Publicação" required>
                </div>

                <div class="mb-3">
                    <label for="id_autor_fk" class="form-label">ID do Autor</label>
                    <input type="text" class="form-control" id="id_autor_fk" name="id_autor_fk" value="<?php echo $row['id_autor_fk']; ?>" placeholder="ID do Autor" required>
                </div>

                <button type="submit" class="btn btn-primary">Atualizar</button>
                <input type="button" value="Cancelar" onclick="window.location.href='read.php'" class="btn btn-primary">
            </form>
        </div>

    </div>