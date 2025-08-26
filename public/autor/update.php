<?php

include '../db.php';

$id_autor = $_GET['id'];

$sql = "SELECT * FROM autores WHERE id_autor='$id_autor'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $name = $_POST['nome'];
    $nacionalidade = $_POST['nacionalidade'];
    $ano_nascimento = $_POST['ano_nascimento'];

    $sql = "UPDATE autores SET nome='$name', nacionalidade='$nacionalidade', ano_nascimento='$ano_nascimento' WHERE id_autor='$id_autor'";

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
    <title>Atualizar Autor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid p-1 ms-5 me-5">
            <a class="navbar-brand fs-2" href="#">Atualizar Autor</a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row ms-5 mt-5 me-5">

            <form action="" method="POST">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $row['nome']; ?>" aria-describedby="Nome" placeholder="Nome" required>
                </div>

                <div class="mb-3">
                    <label for="nacionalidade" class="form-label">Nacionalidade</label>
                    <input type="text" class="form-control" id="nacionalidade" name="nacionalidade" value="<?php echo $row['nacionalidade']; ?>" placeholder="Nacionalidade" required>
                </div>

                <div class="mb-3">
                    <label for="ano_nascimento" class="form-label">Ano de Nascimento</label>
                    <input type="number" class="form-control" id="ano_nascimento" name="ano_nascimento" value="<?php echo $row['ano_nascimento']; ?>" placeholder="Ano de Nascimento" required>
                </div>

                <button type="submit" class="btn btn-primary">Atualizar</button>
                <input type="button" value="Cancelar" onclick="window.location.href='read.php'" class="btn btn-primary">
            </form>
        </div>

    </div>