<?php
require 'conexao.php';
$id = $_POST['produto'];
$qtd = $_POST['quantidade'];

$estoqueAtual = mysqli_query($conn,"SELECT quantidade FROM estoque WHERE id ='$id'");//pegar o estoque atual
$estoqueAtual = $estoqueAtual->fetch_array()[0];//transforma em valor real
$estoqueAtual -= $qtd;//retira a qtd a ser comprada
$atualizaEstoque = mysqli_query($conn,"UPDATE estoque SET quantidade='$estoqueAtual' WHERE id='$id'");//mysql atualizando valor no banco

if ($atualizaEstoque)
        $json = ['message' => 'Estoque Atualizado', 'status' => true, 'Estoque Atual' => $estoqueAtual];
else
$json = ['message' => 'ERRO', 'status' => false];
header('Content-Type: application/json; charset=utf-8');
echo json_encode($json);
$conn->close();
?>