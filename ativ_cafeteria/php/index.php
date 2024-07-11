<?php
  include('conexaoBD.php');
  include('classe.php');
  $p = new Cafeteria;
  $p->PrecoExpresso();
  $p->PrecoCapuccino();
  $p->PrecoSalgado();
  $p->PrecoDoce();
  ?>
<html >
    <head>
    <meta charshet="utf-8"/>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="../css/estilo.css" rel="stylesheet" type="text/css">
    </head>
<body>
    <div id="logo">
      <tr class="logo"><th><img src="../img/logo2.png"/></th><th><strong>Cafeteria IFSP</strong></th>
    </div>
    <br><br>
    <div class="container">
    <form action="" method="POST">
    <section>
        <label>Número do pedido:</label>
        <input type="text" name="codigo"></input><br><br>
        <table class="table"><tr><th scope="col">Produto</th><th scope="col">Preço (R$)</th><th scope="col">Quantidade</th></tr><br>
        <tr><th scope="col"><label>Expresso</label></th>
        <th scope="col"><input type="text" name="expresso" value="<?php echo $_SESSION['PrecoExpresso']?>"></input></th>
        <th scope="col"><input type="text" name="qtnExpresso"></input><th></tr>
        <tr><th scope="col"><label>Capuccino</label></th>
        <th scope="col"><input type="text" name="capuccino" value="<?php echo $_SESSION['PrecoCapuccino']?>"></input></th>
        <th scope="col"><input type="text" name="qtnCapuccino"></input></th></tr>
        <tr><th scope="col"><label>Salgado</label></th>
        <th scope="col"><input type="text" name="salgado" value="<?php echo $_SESSION['PrecoSalgado']?>"></input></th>
        <th scope="col"><input type="text" name="qtnSalgado"></input></th></tr>
        <tr><th scope="col"><label>Doce</label></th>
        <th scope="col"><input type="text" name="doce" value="<?php echo $_SESSION['PrecoDoce']?>"></input></th>
        <th scope="col"><input type="text" name="qtnDoce"></input></th></tr>
        
    <?php
       if(isset($_POST['codigo']) && isset($_POST['qtnExpresso']) && isset($_POST['qtnCapuccino']) &&
       isset($_POST['qtnSalgado']) && isset($_POST['qtnDoce'])){
           
           $codigo = $_POST['codigo'];
           $qtnExpresso = $_POST['qtnExpresso'];
           $qtnCapuccino = $_POST['qtnCapuccino'];
           $qtnSalgado = $_POST['qtnSalgado'];
           $qtnDoce = $_POST['qtnDoce'];


           if($p->registrar($codigo,$qtnExpresso,$qtnCapuccino,$qtnSalgado, $qtnDoce)){
               $precoExp = $_SESSION['PrecoExpresso'];
               $precoCap = $_SESSION['PrecoCapuccino'];
               $precoSalg = $_SESSION['PrecoSalgado'];
               $precoDoce = $_SESSION['PrecoDoce'];

               $total = ($precoExp * $qtnExpresso) + ($precoCap * $qtnCapuccino) + ($precoSalg * $qtnSalgado) + ($precoDoce *$qtnDoce);
               $p->alterar($total,$codigo);
       }
    }
    ?> 
<tr><th scope="col"><label>Total a pagar (R$):</label></th>
<th scope="col"><input type="text" name="total" value="<?php echo $total;?>"></input></th></tr></table>
        <input class="btn btn-primary btn-lg" type="reset" value="Limpar"></input>
        <input class="btn btn-primary btn-lg" type="submit" value="Finalizar"></input>
    </section>
    </form>
</div>
</body>
</button>
