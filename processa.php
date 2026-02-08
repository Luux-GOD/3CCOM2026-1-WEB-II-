<?php

$arquivo = 'users.json';


$json_atual = file_get_contents($arquivo);
$usuarios = json_decode($json_atual, true); 
if (!$usuarios) { $usuarios = []; }


$ultimo_id = 0;
foreach ($usuarios as $u) {
    if ($u['id'] > $ultimo_id) { $ultimo_id = $u['id']; }
}
$novo_id = $ultimo_id + 1;

$novo = [
    "id" => $novo_id,
    "username" => $_POST['username'],
    "email" => $_POST['email'],
    "password" => $_POST['password'],
    "name" => [
        "firstname" => $_POST['firstname'],
        "lastname" => $_POST['lastname']
    ]
];

$usuarios[] = $novo;
file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT));

echo "Foi Salvo graças a Deus!  " . $novo_id;
?>