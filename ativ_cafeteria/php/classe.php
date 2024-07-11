<?php

class Cafeteria{

//função para cadastrar pedido:
    public function registrar($codigo,$qtnExpresso,$qtnCapuccino,$qtnSalgado, $qtnDoce){
        global $pdo;

          $sql = "INSERT INTO tb_pedido(Codigo, Quant_expresso, Quant_capuccino, Quant_salgado, Quant_doce) VALUES (:c,:e,:ca,:s,:d)";
          $sql = $pdo->prepare($sql);
          $sql->bindValue(":c", $codigo);
          $sql->bindValue(":e", $qtnExpresso);
          $sql->bindValue(":ca", $qtnCapuccino);
          $sql->bindValue(":s", $qtnSalgado);
          $sql->bindValue(":d", $qtnDoce);
          $sql->execute();

         if($sql->rowCount() > 0){
             
             return true;
         }else{
             return false;
         }
   }
// função para buscar preço do expresso:
public function PrecoExpresso(){
    global $pdo;
  
  $sql = $pdo->query("SELECT * FROM tb_produto WHERE Nome = 'Expresso'");
  $sql->execute();

  if($sql->rowCount() >0){
      $dado = $sql->fetch();

      $_SESSION["Nome"] = $dado["Nome"];
      $_SESSION["PrecoExpresso"] = $dado["Preco"];
      return true;
  }else{
      return false;
  }
  
}
// função buscar preço do Capuccino:
public function PrecoCapuccino(){ 
  global $pdo;

  $sql = $pdo->query("SELECT * FROM tb_produto WHERE Nome = 'Capuccino'");
  $sql->execute();

  if($sql->rowCount() >0){
    $dado = $sql->fetch();

    $_SESSION["Nome"] = $dado["Nome"];
    $_SESSION["PrecoCapuccino"] = $dado["Preco"];
    return true;
  }else{
    return false;
 }
}
// função para buscar preço do Salgado:
public function PrecoSalgado(){
  global $pdo;

  $sql = $pdo->query("SELECT * FROM tb_produto WHERE Nome = 'Salgado'");
  $sql->execute();

  if($sql->rowCount() >0){
    $dado = $sql->fetch();

    $_SESSION["Nome"] = $dado["Nome"];
    $_SESSION["PrecoSalgado"] = $dado["Preco"];
    return true;
  }else{
    return false;
  }
}
// função para buscar preço do Doce:
public function PrecoDoce(){
  global $pdo;

  $sql = $pdo->query("SELECT * FROM tb_produto WHERE Nome = 'Doce'");
  $sql->execute();

  if($sql->rowCount() >0){
    $dado = $sql->fetch();

    $_SESSION["Nome"] = $dado["Nome"];
    $_SESSION["PrecoDoce"] = $dado["Preco"];
    return true;
  }else{
    return false;
  }
}
// função para inserir o total do pedido:
 public function alterar($total,$codigo){
      global $pdo;
      $sql = "UPDATE tb_pedido set Total_pagar = :t WHERE Codigo = :c";
      $sql = $pdo->prepare($sql);
      $sql->bindValue(':t', $total);
      $sql->bindValue(':c', $codigo);
     $sql->execute();
     if($sql->rowCount() >0){
      return true;
     }else{
       return false;
     }
    }
}
?>