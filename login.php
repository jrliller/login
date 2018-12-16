<?php
session_start();
if (isset($_POST['email']) && !empty($_POST['email'])) {
		$email = addslashes($_POST['email']);
		$senha = md5(addslashes($_POST['senha']));
		
		$dsn = "mysql:dbname=blog;host=127.0.0.1;charset=utf8";
		$dbuser = "root";
		$dbpass = "";

		try {

			$db = new PDO($dsn, $dbuser, $dbpass);

			$sql = $db->query("SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'");

			if($sql->rowCount() > 0) {

				$data = $sql->fetch();

				//print_r($data);

				$_SESSION['id'] = $data['id'];

				header("Location: index.php");

			}

		} catch(PDOExecption $e) {
			echo "Falha na Conexão ".$e->getMessage();
		}
}

?>


Página de Login
 <hr>  

<form method="POST">
	E-mail:<br>
	<input type="email" name="email">  <br/><br/>

	Senha: <br>
	<input type="password" name="senha"> <br><br>

	<input type="submit" value="Entrar">
</form>