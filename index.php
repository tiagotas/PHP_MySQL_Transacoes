<?php
try {

    $dsn = "mysql:host=localhost:3307;dbname=mydb";
    $conexao = new PDO($dsn, 'root', 'etecjau');

    $conexao->beginTransaction();

    $sql = "INSERT INTO pessoa (nome) VALUES ('Biancola II - a missao'); ";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    $ultima_pessooa = $conexao->lastInsertId();

    $sql = "INSERT INTO endereco (id_pessoa, logradouro) VALUES (?, 'Rua dos Itapuís'); ";
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(1, $ultima_pessooa);
    $stmt->execute();

    $ultimo_endereco = $conexao->lastInsertId();

    $conexao->commit();

    echo "Deu certo. ID Inserida = ";

}  catch(Exception $ex) {

    echo $ex->getMessage();
}
