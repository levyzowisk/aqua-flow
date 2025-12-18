<?php 

function conexao() {
    return new PDO("mysql:host=localhost;dbname=db_aquaflow", "root", "1234");
}