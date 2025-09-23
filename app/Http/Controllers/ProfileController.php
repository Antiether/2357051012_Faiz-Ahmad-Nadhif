<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile($nama = "Faiz Ahmad Nadhif", $npm = "2357051012", $kelas = "A"){
        $data = [
            'nama' => $nama,
            'npm' => $npm,
            'kelas' => $kelas,
        ];    
        return view('profile', $data);
    }    
}