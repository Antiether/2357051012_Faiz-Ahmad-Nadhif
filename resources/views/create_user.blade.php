@extends('layouts.app')
@section('contents')
<div>
    <h1>Buat Pengguna Baru</h1>
    <form action="{{ route('user.store') }}" method="POST" id="createUserForm">
        @csrf

        <label for="nama">Nama:</label><br>

        <input type="text" id="nama" name="nama" required><br><br>

        <label for="npm">NPM:</label><br>

        <input type="text" id="npm" name="npm" required><br><br>

        <label for="kelas">Kelas:</label><br>

        <select name="kelas_id" id="kelas_id" required>
            @foreach ($kelas as $kelasItem)
                <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
            @endforeach
        </select><br><br>

        <button type="submit" id="submitBtn">Submit</button>
    </form>
</div>

<script>
    document.getElementById('createUserForm').addEventListener('submit', function() {
        document.getElementById('submitBtn').disabled = true;
        document.getElementById('submitBtn').textContent = 'Submitting...';
    });
</script>

@endsection
