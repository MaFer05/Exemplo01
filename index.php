<?php
require_once 'vendor/autoload.php';
use Exemplo01\Livro;

$livros = [];
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach(json_decode($_POST['Livros']) as $l) {
        array_push($livros, new Livro($l->titulo, $l->genero));
    }
    array_push($livros, new Livro($_POST['titulo'], $_POST['genero']));
}

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Biblioteca</title>
    </head>
    <body>
        <h1>Livros</h1>
        <form action="index.php" method="post">
            <input type="hidden" name="livros" value='<?= json_encode($livros) ?>' />
            <label for="titulo">Título</label>
            <input type="text" name="titulo" />
            <label for="genero">Genero</label>
            <input type="text" name="genero" />
            <button type="submit">Salvar</button>
        </form>
        <hr />
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Gênero</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($livros as $l): ?>
                    <tr>
                        <td><?= $l->getTitulo() ?></td>
                        <td><?= $l->getGenero() ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </body>
</html>