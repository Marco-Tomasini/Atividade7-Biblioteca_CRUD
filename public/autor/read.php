<?php
include '../db.php';

$max = 5; // número de autores por página

// Receber a página via URL, padrão 1
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
if ($pagina < 1) $pagina = 1;

// Calcular o offset
$offset = ($pagina - 1) * $max;


// Total de registros
$totalSql = "SELECT COUNT(*) as total FROM autores";
$totalResult = $conn->query($totalSql);
$totalRow = $totalResult->fetch_assoc();
$totalRegistros = $totalRow['total'];

// Total de páginas
$totalPaginas = ceil($totalRegistros / $max);

// Buscar registros da página atual
$sql = "SELECT * FROM autores ORDER BY id_autor ASC LIMIT $max OFFSET $offset";
$result = $conn->query($sql);
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visualizar Autores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid p-1 ms-5 me-5">
            <a class="navbar-brand fs-2" href="#">Lista de Autores</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <a href="create.php" class="nav-item btn btn-outline-light">Adicionar Autor</a>
            </div>
        </div>
    </nav>


    <div class="container-fluid">
        <div class="row ms-5 mt-5 me-5">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Nacionalidade</th>
                        <th>Ano de Nascimento</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id_autor']; ?></td>
                                <td><?php echo $row['nome']; ?></td>
                                <td><?php echo $row['nacionalidade']; ?></td>
                                <td><?php echo $row['ano_nascimento']; ?></td>

                                <td>
                                    <a href="update.php?id=<?php echo $row['id_autor']; ?>" class="nav-item btn btn-outline-dark">Editar Autor</a> |
                                    <a href="delete.php?id=<?php echo $row['id_autor']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')" class="nav-item btn btn-outline-dark">Excluir Autor</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">Nenhum autor encontrado.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td class="text-center" colspan="5">
                            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                                <a href="?pagina=<?php echo $i; ?>" class="btn btn-primary m-1"><?php echo $i; ?></a>
                            <?php endfor; ?>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>



</body>

</html>