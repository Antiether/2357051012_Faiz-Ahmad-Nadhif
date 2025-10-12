@extends('layouts.app')

@section('title', 'Buat Pengguna Baru')

@section('content')
<div class="form-container">
    <!-- Header -->
    <div class="form-header">
        <h1>Buat Pengguna Baru</h1>
        <a href="{{ route('user.index') }}" class="btn btn-secondary">
            ← Kembali ke List
        </a>
    </div>

    <!-- Form Card -->
    <div class="form-card">
        <form action="{{ route('user.store') }}" method="POST" id="createUserForm">
            @csrf
            
            <div class="form-group">
                <label for="nama">Nama <span class="required">*</span></label>
                <input 
                    type="text" 
                    id="nama" 
                    name="nama" 
                    class="form-control @error('nama') is-invalid @enderror" 
                    value="{{ old('nama') }}"
                    placeholder="Masukkan nama lengkap"
                    required>
                @error('nama')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="npm">NPM <span class="required">*</span></label>
                <input 
                    type="text" 
                    id="npm" 
                    name="npm" 
                    class="form-control @error('npm') is-invalid @enderror" 
                    value="{{ old('npm') }}"
                    placeholder="Masukkan NPM"
                    required>
                @error('npm')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="kelas_id">Kelas <span class="required">*</span></label>
                <select 
                    name="kelas_id" 
                    id="kelas_id" 
                    class="form-control @error('kelas_id') is-invalid @enderror" 
                    required>
                    <option value="">-- Pilih Kelas --</option>
                    @foreach ($kelas as $kelasItem)
                        <option value="{{ $kelasItem->id }}" {{ old('kelas_id') == $kelasItem->id ? 'selected' : '' }}>
                            Kelas {{ $kelasItem->nama_kelas }}
                        </option>
                    @endforeach
                </select>
                @error('kelas_id')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-primary" id="submitBtn">
                    <span class="btn-text">Simpan User</span>
                    <span class="btn-loading" style="display: none;">Menyimpan...</span>
                </button>
                <a href="{{ route('user.index') }}" class="btn btn-cancel">Batal</a>
            </div>
        </form>
    </div>
</div>

<style>
    .form-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px 0;
    }

    .form-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .form-header h1 {
        margin: 0;
        color: #333;
        font-size: 28px;
    }

    .form-card {
        background: white;
        border-radius: 8px;
        padding: 30px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #495057;
        font-size: 14px;
    }

    .required {
        color: #dc3545;
    }

    .form-control {
        width: 100%;
        padding: 10px 15px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        font-size: 14px;
        transition: border-color 0.3s, box-shadow 0.3s;
        box-sizing: border-box;
        position: relative;
        z-index: 1;
    }

    .form-control:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 0 3px rgba(0,123,255,0.1);
    }

    .form-control.is-invalid {
        border-color: #dc3545;
    }

    .form-control.is-invalid:focus {
        box-shadow: 0 0 0 3px rgba(220,53,69,0.1);
    }

    select.form-control {
        cursor: pointer;
        background-color: white;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23333' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 15px center;
        padding-right: 40px;
    }

    .error-message {
        color: #dc3545;
        font-size: 13px;
        margin-top: 5px;
    }

    .form-actions {
        display: flex;
        gap: 10px;
        margin-top: 30px;
    }

    .btn {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.3s;
        display: inline-block;
        text-align: center;
    }

    .btn-primary {
        background-color: #28a745;
        color: white;
        flex: 1;
    }

    .btn-primary:hover:not(:disabled) {
        background-color: #218838;
    }

    .btn-primary:disabled {
        background-color: #6c757d;
        cursor: not-allowed;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    .btn-cancel {
        background-color: #f8f9fa;
        color: #495057;
        border: 1px solid #ced4da;
    }

    .btn-cancel:hover {
        background-color: #e9ecef;
    }

    @media (max-width: 768px) {
        .form-container {
            padding: 10px;
        }

        .form-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .form-card {
            padding: 20px;
        }

        .form-actions {
            flex-direction: column;
        }
    }
</style>

<script>
document.getElementById('createUserForm').addEventListener('submit', function() {
    const submitBtn = document.getElementById('submitBtn');
    submitBtn.disabled = true;
    submitBtn.querySelector('.btn-text').style.display = 'none';
    submitBtn.querySelector('.btn-loading').style.display = 'inline';
});
</script>
@endsection