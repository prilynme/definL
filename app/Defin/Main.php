<?php

namespace App\Defin;

class Main
{
    public static function hitung(int $harga, float $diskon): int
    {
        return (int) ($harga - ($harga * $diskon));
    }
}