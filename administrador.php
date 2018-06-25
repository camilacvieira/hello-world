<?php
  require 'check_login.php';
  require 'functions.php';
  require 'db_connection.php';
  require 'product_list_model.php';

  $sort_sql = "`id` DESC";
  $products = NULL;
  $search_text = NULL;

  $product_list_model = new product_list_model($db_connection);
  if (isset($_GET['pesquisa']) && !empty(trim($_GET['pesquisa']))) {
    $search_text = trim($_GET['pesquisa']);
    $products = $product_list_model->get_products($sort_sql, NULL, $search_text);
  } else
    $products = $product_list_model->get_default_products($sort_sql, NULL);
?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Farmárcia - Administrador</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9"
    crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/administrador.css">
  <link rel="stylesheet" href="../assets/css/comum.css">
</head>

<body>
  <main class="container">
      <h1>Administrador</h1>
      <form class="form-group pt-2">
      <div class="input-group">
        <input class="form-control" type="search" name="pesquisa" value="<?= $search_text; ?>" placeholder="Procurar produtos">

          <div class="input-group-append">
            <button class="btn btn-danger" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
      </div>
    </form>
    <div class="container text-right">
    
    <a href="novo_usuario.php">
    	<button class="btn btn-danger btn-lg btn-enviar"  type="submit">
          Cadastrar novo usuário
          <i class="fas fa-plus-circle"></i>
        </button>
      </a>
      <a  href="cadastro-produto.php">
        <button class="btn btn-danger btn-lg btn-enviar"  type="submit">
          Adicionar Produto
          <i class="fas fa-plus-circle"></i>
        </button>
      </a>
      <a href="cadastro-categoria.php">
        <button class="btn btn-danger btn-lg btn-enviar" type="submit">
          Adicionar Categoria
          <i class="fas fa-plus-circle"></i>
        </button>
      </a>
    </div>

    <!--<i class="fas fa-edit"></i>  botão de editar-->
    <div class="lista-produtos container col-lg-11 col-md-11">
      <?php if (!empty($products)): ?>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                Selec. Todos
              </th>
              <th scope="col">Nome</th>
              <th scope="col">Descrição</th>
              <th scope="col">Preço</th>
              <th scope="col">Editar</th>
            </tr>
          </thead>
        </table>
          <?php foreach ($products as $product): ?>
              <?php
                $product_id = $product['id'];
                $product_name = $product['nome'];
                $product_price = $product['preco'];
                $product_image = $product['imagem'];
                $product_descricao = $product['descricao']
              ?>
              <!-- Produto -->
              <div class="">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                </div>
                <?php require 'administrador_template.php'; ?>
              </div>
              <!-- Produto -->
          <?php endforeach; ?>
      <?php else: ?>

        <p class="nenhum-produto">Nenhum produto encontrado!</p>

      <?php endif; ?>
    </div>
    <!-- Lista de produtos -->

    <div class="text-right">
      <button class="btn btn-danger btn-lg btn-enviar" type="submit">
        Remover
        <i class="fas fa-trash-alt"></i>
      </button>
    </div>

  </main>
</body>

</html>
