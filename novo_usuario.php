<html lang="pt-br">
<head>
<meta charset="utf-8" />
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<title> Cadastro de Usuário </title>
</head>
<body>
<div align="center">
<form method="POST" action="cadastro.php">
<label>Login:</label><input type="text" name="login" id="login" placeholder="Novo login" >
<br>
<label>Senha:</label>
<input type="password" name="senha" id="senha" placeholder="Nova senha">
<br>
<input type="submit" value="Cadastrar" id="cadastrar" name="cadastrar" class="btn btn-danger btn-md">
</form>
</div>
</body>
</html>