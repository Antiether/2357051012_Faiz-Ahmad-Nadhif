<div style="margin-top: 20px;">
    <h1 style="color: #007bff; text-align: center;">Daftar Pengguna</h1>
    <div style="text-align: right; margin-bottom: 10px;">
        <a href="{{ route('user.create') }}" style="background-color: #007bff; color: white; padding: 8px 12px; text-decoration: none; border-radius: 4px;">Tambah User</a>
    </div>
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <thead>
            <tr style="background-color: #007bff; color: white;">
                <th style="padding: 10px; border: 1px solid #ddd;">ID</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Nama</th>
                <th style="padding: 10px; border: 1px solid #ddd;">NPM</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Kelas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $index => $user)
                <tr @if($index % 2 == 0) style="background-color: #f9f9f9;" @else style="background-color: white;" @endif>
                    <td style="padding: 10px; border: 1px solid #ddd; text-align: center;">{{$user->id}}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{$user->nama}}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{$user->npm}}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{$user->nama_kelas}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
