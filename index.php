<?php

//Cria uma sessão para saber se existe algum usuario logado:
session_start();  

//Verifica se existe algum dado salvo(uma sessão com a chave 'id' e ela não estiver vazia.)
if(isset($_SESSION['id']) && !empty($_SESSION['id'])) {

	// echo "Área Restrita...";  // O usuario só enxerga esta área se estiver logado.


	header("Location: index2.html");



} else {

//Se não existir a sessão o sistema redireciona o usuario p/ pagina de login, pois ele não está logado.

	header("Location: login.php");
}

?>