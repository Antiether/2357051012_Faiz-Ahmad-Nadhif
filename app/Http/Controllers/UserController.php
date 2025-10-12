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

    public function index(){
        $data = [
            'title' => 'List User',
            'users' => UserModel::with('kelas')->get(),
        ];

        return view('list_user', $data);
    }

    public function create(){
        $kelas = $this->kelasModel->getKelas();
        $data = [
            'title' => 'Create User',
            'kelas' => $kelas
        ];

        return view('create_user', $data);
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

    // Tampilkan form edit
    public function edit($id)
    {
        $user = UserModel::findOrFail($id);
        $kelas = $this->kelasModel->getKelas();

        $data = [
            'title' => 'Edit User',
            'user' => $user,
            'kelas' => $kelas,
        ];

        return view('edit_user', $data);
    }

    // Proses update data
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $user = UserModel::findOrFail($id);
        $user->update($validatedData);

        return redirect()->route('user.index')->with('success', 'Data user berhasil diperbarui!');
    }

    // Hapus data
    public function destroy($id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Data user berhasil dihapus!');
    }
}
