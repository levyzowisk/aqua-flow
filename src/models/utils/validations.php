<?php 
    function required($text) {
        return trim($text) !== "";
    }

    function maxLength($value, $length, $minLength = 4) {
        return strlen($value) <= $length && strlen($value) >= $minLength;
    }

    function applyHash($text) {
        return password_hash($text, PASSWORD_DEFAULT);
    }

    function checkCPF($cpf) {
        return preg_match('/^\d{3}\.\d{3}\.\d{3}-\d{2}$/', $cpf); 
    }

    function checkNumber($n) {
        return floatval($n) >= 0;
    }
?>