<?php 
    function required($text) {
        return trim($text) !== "";
    }

    function maxLength($value, $length) {
        return strlen($value) <= $length && strlen($value) >= 4;
    }

    function applyHash($text) {
        return hash("sha256", $text);
    }
?>