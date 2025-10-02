<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Profile</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #f46abaff 0%, #f885c8ff 100%);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }
    .profile-card {
      backdrop-filter: blur(10px);
      border-radius: 25px;
      padding: 40px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
      text-align: center;
      max-width: 400px;
      width: 100%;
    }
    .profile-img {
      width: 150px;
      height: 150px;
      object-fit: cover;
      border-radius: 50%;
      border: 3px solid #333;
    }
    .info {
      margin-top: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 15px;
    }
    .text-card {
      background: #ffc8eaff;
      border-radius: 15px;
      padding: 10px 20px;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
      text-align: center;
      width: 80%;
      font-size: 18px;
    }
  </style>
</head>
<body>
  <div class="profile-card">
    <img src="https://i.pinimg.com/736x/75/b6/3a/75b63a7f3e44b847f9e1b67cfe94770f.jpg" alt="Foto Profil" class="profile-img">

    <div class="info">
      <div class="text-card">
        <div><strong>Nama:</strong> {{ $nama }}</div>
      </div>
      <div class="text-card">
        <div><strong>NPM:</strong> {{ $npm }}</div>
      </div>
      <div class="text-card">
        <div><strong>Kelas:</strong> {{ $kelas }}</div>
      </div>
    </div>
  </div>
</body>
</html>