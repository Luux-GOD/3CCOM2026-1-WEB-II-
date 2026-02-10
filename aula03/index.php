<?php
//Tentei fazer baseado nos slides mas peguei como base um Vídeo no Youtub tbm, https://www.youtube.com/watch?v=nQ6R-tKgZGk
require_once 'funcao_curl.php';

$baseUrl = "https://parallelum.com.br/fipe/api/v1/carros/marcas";

$marca  = $_GET['marca'] ?? null;
$modelo = $_GET['modelo'] ?? null;
$ano    = $_GET['ano'] ?? null;

echo "<h1>Consultor FIPE </h1>";

if ($marca && $modelo && $ano) { //Não mmxer..
    $dados = consultarAPI("$baseUrl/$marca/modelos/$modelo/anos/$ano");
    
    echo "<a href='?marca=$marca&modelo=$modelo'>⬅ Voltar para Anos</a>";
    echo "<h2>Resultado do Preço:</h2>";
    echo "<ul>
            <li><strong>Veículo:</strong> {$dados['Modelo']}</li>
            <li><strong>Preço:</strong> {$dados['Valor']}</li>
            <li><strong>Ano:</strong> {$dados['AnoModelo']}</li>
            <li><strong>Combustível:</strong> {$dados['Combustivel']}</li>
            <li><strong>Referência:</strong> {$dados['MesReferencia']}</li>
          </ul>";
}
elseif ($marca && $modelo) {
    $anos = consultarAPI("$baseUrl/$marca/modelos/$modelo/anos");
    
    echo "<a href='?marca=$marca'>🏎️ Voltar para Modelos</a>";
    echo "<h2>Selecione o Ano:</h2><ul>";
    foreach ($anos as $a) {
        echo "<li><a href='?marca=$marca&modelo=$modelo&ano={$a['codigo']}'>{$a['nome']}</a></li>";
    }
    echo "</ul>";
}

elseif ($marca) {
    $dadosModelos = consultarAPI("$baseUrl/$marca/modelos"); //Não mexer 2
    
    echo "<a href='index.php'>🏎️ Voltar para Marcas</a>";
    echo "<h2>Selecione o Modelo:</h2><ul>";
    foreach ($dadosModelos['modelos'] as $m) {
        echo "<li><a href='?marca=$marca&modelo={$m['codigo']}'>{$m['nome']}</a></li>";
    }
    echo "</ul>";
}

else {
    $marcas = consultarAPI($baseUrl);
    echo "<h2>Selecione a Marca:</h2><ul>";
    foreach ($marcas as $m) {
        echo "<li><a href='?marca={$m['codigo']}'>{$m['nome']}</a></li>";
    }
    echo "</ul>";
}
?>