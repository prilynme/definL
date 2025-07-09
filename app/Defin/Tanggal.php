<?php

namespace App\Defin;

use Carbon\Carbon;

class Tanggal
{
    public static function sekarang($format = 'd/m/Y H:i:s', $timezone = null)
    {
        $tz = $timezone ?? 'Asia/Jakarta';
        return Carbon::now($tz)->format($format);
    }

    public static function urai($waktu, $format = 'd/m/Y H:i:s', $timezone = null)
    {
        $tz = $timezone ?? 'Asia/Jakarta';
        return Carbon::parse($waktu)->setTimezone($tz)->format($format);
    }

    public static function selisih($waktuAwal, $waktuAkhir = null, bool $tampilkanSatuan = true, ?string $timezone = null)
    {
        $tz = $timezone ?? 'Asia/Jakarta';
        $awal = Carbon::parse($waktuAwal)->setTimezone($tz);
        $akhir = $waktuAkhir ? Carbon::parse($waktuAkhir)->setTimezone($tz) : Carbon::now($tz);

        $diffInSeconds = round($awal->floatDiffInSeconds($akhir));
        if ($diffInSeconds < 60) {
            return $tampilkanSatuan ? "$diffInSeconds detik" : "$diffInSeconds";
        }

        $diffInMinutes = round($awal->floatDiffInMinutes($akhir));
        if ($diffInMinutes < 60) {
            return $tampilkanSatuan ? "$diffInMinutes menit" : "$diffInMinutes";
        }

        $diffInHours = round($awal->floatDiffInHours($akhir));
        if ($diffInHours < 24) {
            return $tampilkanSatuan ? "$diffInHours jam" : "$diffInHours";
        }

        $diffInDays = round($awal->floatDiffInDays($akhir));
        if ($diffInDays < 7) {
            return $tampilkanSatuan ? "$diffInDays hari" : "$diffInDays";
        }

        $diffInWeeks = round($awal->floatDiffInWeeks($akhir));
        if ($diffInWeeks < 4) {
            return $tampilkanSatuan ? "$diffInWeeks minggu" : "$diffInWeeks";
        }

        $diffInMonths = round($awal->floatDiffInMonths($akhir));
        if ($diffInMonths < 12) {
            return $tampilkanSatuan ? "$diffInMonths bulan" : "$diffInMonths";
        }

        $diffInYears = round($awal->floatDiffInYears($akhir));
        return $tampilkanSatuan ? "$diffInYears tahun" : "$diffInYears";
    }
}
