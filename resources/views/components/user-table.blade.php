<div class="user-list-container">
    <!-- Header dengan tombol tambah -->
    <div class="header-section">
        <h1>List User</h1>
        <a href="{{ route('user.create') }}" class="btn btn-primary">
            + Tambah User Baru
        </a>
    </div>

    <!-- Pesan sukses -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel User -->
    <div class="table-wrapper">
        <table class="user-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NPM</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->npm }}</td>
                        <td>
                            <span class="badge-kelas">{{ $user->kelas->nama_kelas ?? '-' }}</span>
                        </td>
                        <td class="action-buttons">
                            <!-- Debug: Tampilkan URL yang di-generate -->
                            <!-- URL Edit: {{ route('user.edit', $user->id) }} -->
                            
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-edit">Edit</a>
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="empty-state">
                            <p>Belum ada data user.</p>
                            <a href="{{ route('user.create') }}">Tambah user pertama</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
    .user-list-container {
        padding: 20px 0;
    }

    .header-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .header-section h1 {
        margin: 0;
        color: #333;
        font-size: 28px;
    }

    .alert {
        padding: 15px 20px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .alert-success {
        background-color: #d4edda;
        border: 1px solid #c3e6cb;
        color: #155724;
    }

    .table-wrapper {
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .user-table {
        width: 100%;
        border-collapse: collapse;
    }

    .user-table thead {
        background-color: #f8f9fa;
    }

    .user-table th {
        padding: 15px;
        text-align: left;
        font-weight: 600;
        color: #495057;
        border-bottom: 2px solid #dee2e6;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .user-table tbody tr {
        border-bottom: 1px solid #dee2e6;
        transition: background-color 0.2s;
    }

    .user-table tbody tr:hover {
        background-color: #f8f9fa;
    }

    .user-table td {
        padding: 15px;
        color: #212529;
    }

    .badge-kelas {
        display: inline-block;
        padding: 5px 12px;
        background-color: #007bff;
        color: white;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 500;
    }

    .action-buttons {
        white-space: nowrap;
    }

    .btn {
        padding: 8px 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.3s;
        display: inline-block;
    }

    .btn-primary {
        background-color: #28a745;
        color: white;
    }

    .btn-primary:hover {
        background-color: #218838;
    }

    .btn-edit {
        background-color: #ffc107;
        color: #212529;
        margin-right: 5px;
    }

    .btn-edit:hover {
        background-color: #e0a800;
    }

    .btn-delete {
        background-color: #dc3545;
        color: white;
    }

    .btn-delete:hover {
        background-color: #c82333;
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #6c757d;
    }

    .empty-state p {
        margin-bottom: 15px;
        font-size: 16px;
    }

    .empty-state a {
        color: #007bff;
        text-decoration: none;
        font-weight: 500;
    }

    .empty-state a:hover {
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        .header-section {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .user-table {
            min-width: 600px;
        }
    }
</style>