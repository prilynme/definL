<?php

namespace App\Defin;

use Carbon\Carbon;

class Tanggal
{
    public static function sekarang($timezone = null)
    {
        $tz = $timezone ?? 'Asia/Jakarta';

        return Carbon::now($tz);
    }

    public static function urai($waktu, $timezone = null)
    {
        $tz = $timezone ?? 'Asia/Jakarta';

        return Carbon::parse($waktu)->setTimezone($tz);
    }

    public static function waktuBerlalu(
        $waktuAwal,
        $waktuAkhir = null,
        bool $tampilkanSatuan = true,
        ?string $timezone = null
    ): string {
        $tz = $timezone ?? 'Asia/Jakarta';
        $awal = Carbon::parse($waktuAwal)->setTimezone($tz);
        $akhir = $waktuAkhir ? Carbon::parse($waktuAkhir)->setTimezone($tz) : Carbon::now($tz);

        $diffInSeconds = round($awal->floatDiffInSeconds($akhir));
        if ($diffInSeconds < 60) {
            return $tampilkanSatuan ? "$diffInSeconds Detik" : "$diffInSeconds";
        }

        $diffInMinutes = round($awal->floatDiffInMinutes($akhir));
        if ($diffInMinutes < 60) {
            return $tampilkanSatuan ? "$diffInMinutes Menit" : "$diffInMinutes";
        }

        $diffInHours = round($awal->floatDiffInHours($akhir));
        if ($diffInHours < 24) {
            return $tampilkanSatuan ? "$diffInHours Jam" : "$diffInHours";
        }

        $diffInDays = round($awal->floatDiffInDays($akhir));
        if ($diffInDays < 7) {
            return $tampilkanSatuan ? "$diffInDays Hari" : "$diffInDays";
        }

        $diffInWeeks = round($awal->floatDiffInWeeks($akhir));
        if ($diffInWeeks < 4) {
            return $tampilkanSatuan ? "$diffInWeeks Minggu" : "$diffInWeeks";
        }

        $diffInMonths = round($awal->floatDiffInMonths($akhir));
        if ($diffInMonths < 12) {
            return $tampilkanSatuan ? "$diffInMonths Bulan" : "$diffInMonths";
        }

        $diffInYears = round($awal->floatDiffInYears($akhir));
        return $tampilkanSatuan ? "$diffInYears Tahun" : "$diffInYears";
    }
}
