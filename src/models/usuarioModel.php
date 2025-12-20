<?php 
require_once 'conexao.php';

function usuarioExiste($email) {
    $query = conexao()->prepare("SELECT * FROM usuario WHERE email = :email");
    
    $query->execute([
        ':email' => $email
    ]);

    return $query->rowCount() > 0;
}

function buscarUsuarioPorId($id) {
    $query = conexao()->prepare("SELECT * FROM usuario WHERE id = :id");

    $query->execute([
        ":id" => $id
    ]);

    return $query->rowCount() > 0;
}

function criarUsuario($email, $password) {
    $query = conexao()->prepare("INSERT INTO usuario (email, password)
        VALUES(:email, :password)
        ");

    $query->execute([
        ":email" => $email,
        ":password" => $password
    ]);
}

function listarUsuarios() {
    $query = conexao()->prepare( "SELECT * FROM usuario");

    $query->execute();

    return $query->fetchAll();
}

function deletarUsuario($id) {
    $query = conexao()->prepare("DELETE FROM usuario WHERE id = :id");
    $query->execute([
        "id" => $id
    ]);
}

function atualizarUsuario($id, $email, $password) {
    $query = conexao()->prepare("UPDATE usuario SET email = :email, password = :password
        WHERE id = :id
    ");

    $query->execute([
        ":id" => $id,
        ":email" => $email,
        ":password" => $password
    ]);
}
?>