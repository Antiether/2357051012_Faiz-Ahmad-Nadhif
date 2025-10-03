<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct(){
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }
    public function create(){
        $kelasModel = new Kelas();
        $kelas = $kelasModel->getKelas();
        $data = [
            'title' => 'Create User',
            'kelas' => $kelas
        ];

        return view('create_user', $data);
    }

    public function index(){
    $data = [
        'title' => 'List User',
        'users' => UserModel::with('kelas')->get(),
    ];

    return view('list_user', $data);
    }


    public function store(Request $request){
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'npm' => 'required|string|max:255|unique:user,npm',
        'kelas_id' => 'required|exists:kelas,id',
    ]);

    $this->userModel->create($validatedData);

    return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

}