<?php

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];

$id_seguro = htmlspecialchars($id);
$titulo_seguro = htmlspecialchars($titulo);
$preco_seguro = htmlspecialchars($preco);
$desc_seguro = htmlspecialchars($descricao);

echo "ID recebido: " . $id_seguro . "<br>";
echo "Título recebido: " . $titulo_seguro . "<br>";
echo "Preço recebido: " . $preco_seguro . "<br>";
echo "Descrição recebida: " . $desc_seguro;
?>