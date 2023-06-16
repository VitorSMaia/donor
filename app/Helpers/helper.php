<?php
use Carbon\Carbon;

if (!function_exists("format_date")) {
    function format_date($date) {
        return Carbon::parse($date)->format('d/m/Y');
    };
}

if (!function_exists("format_cpf")) {
    function format_cpf($text) {
        return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $text);
    };
}
