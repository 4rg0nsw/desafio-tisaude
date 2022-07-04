<?php 

if (!function_exists('formatValueMoneyToDatabase')) {
    function formatValueMoneyToDatabase($value) {
        $valueToDatabase = str_replace(".", "", $value);
        return str_replace(",", ".", $valueToDatabase);
    }
}

if (!function_exists('formatValueMoneyFromDatabase')) {
    function formatValueMoneyFromDatabase($value) {
        return str_replace(",", "", $value);
    }
}

if (!function_exists('formatMoney')) {
    function formatMoney($value) {
        return number_format($value, 2, ',', '.');
    }
}

