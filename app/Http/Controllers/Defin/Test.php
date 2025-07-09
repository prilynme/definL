<?php

namespace App\Http\Controllers\Defin;

use App\Defin\Tanggal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Test extends Controller
{
    public function tanggal(){
        return Tanggal::selisih('2025-07-9', '2025-07-10');
    }
}
