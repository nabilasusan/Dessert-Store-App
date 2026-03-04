<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>{{ config('app.name','Dessert Store') }}</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

<style>
:root{
  --primary:#2563eb;
  --dark:#0f172a;
  --muted:#64748b;
  --bg:#f8fafc;
}

body{
  font-family: 'Inter', 'Segoe UI', sans-serif;
  background: var(--bg);
  color: var(--dark);
}

.navbar{
  background:#ffffff;
  padding:18px 0;
  border-bottom:1px solid #eef2f7;
}

.brand-badge{
  width:42px;
  height:42px;
  display:grid;
  place-items:center;
  border-radius:14px;
  background:var(--primary);
  color:#fff;
  font-size:18px;
}

.navbar .btn{
  border-radius:12px;
  padding:.55rem 1.2rem;
  font-weight:500;
}

.btn-primary{
  background:var(--primary);
  border:none;
}

.btn-primary:hover{
  background:#1d4ed8;
}

.hero{
  padding:110px 0 90px;
}

.hero-title{
  font-weight:800;
  font-size:3rem;
  line-height:1.2;
}

.hero-title span{
  color:var(--primary);
}

.hero-sub{
  color:var(--muted);
  font-size:1.1rem;
  max-width:480px;
}

.hero-buttons .btn{
  border-radius:14px;
  padding:.8rem 1.4rem;
}

.mochi-img{
  width:100%;
  max-width:500px;
  border-radius:26px;
  box-shadow:0 30px 60px rgba(0,0,0,.12);
  transition:.4s ease;
}

.mochi-img:hover{
  transform:translateY(-6px);
}

.feature-section{
  margin-top:80px;
}

.feature-box{
  background:#ffffff;
  border-radius:20px;
  padding:30px;
  text-align:center;
  transition:.3s;
  border:1px solid #eef2f7;
}

.feature-box:hover{
  transform:translateY(-6px);
  box-shadow:0 20px 40px rgba(0,0,0,.06);
}

.feature-icon{
  font-size:28px;
  margin-bottom:15px;
  color:var(--primary);
}

footer{
  margin-top:90px;
  padding:30px 0;
  background:#ffffff;
  border-top:1px solid #eef2f7;
  color:var(--muted);
  font-size:.9rem;
}
</style>
</head>

<body>

<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="#">
      <span class="brand-badge">🍡</span>
      {{ config('app.name','Dessert Store') }}
    </a>

    <div class="ms-auto">
      <a href="{{ route('login') }}" class="btn btn-outline-dark me-2">
        Login
      </a>
      <a href="{{ route('register') }}" class="btn btn-primary">
        Register
      </a>
    </div>
  </div>
</nav>

<section class="hero">
  <div class="container">
    <div class="row align-items-center">

      <!-- TEXT -->
      <div class="col-lg-6">
        <h1 class="hero-title mb-4">
          Nikmati <span>Mochi Premium</span><br>
          dengan Rasa Terbaik
        </h1>

        <p class="hero-sub mb-4">
          Jelajahi koleksi dessert mochi lembut dengan cita rasa autentik,
          dibuat dari bahan berkualitas untuk pengalaman manis yang tak terlupakan.
        </p>

        <div class="hero-buttons">
          <a href="{{ route('desserts.index') }}" class="btn btn-primary me-2">
            Lihat Menu
          </a>
          <a href="{{ route('login') }}" class="btn btn-outline-secondary">
            Masuk Sekarang
          </a>
        </div>
      </div>

      <!-- IMAGE -->
      <div class="col-lg-6 text-center mt-5 mt-lg-0">
        <img 
          src="https://images.unsplash.com/photo-1617196038435-9f60bfae3d9c?auto=format&fit=crop&w=900&q=80"
          alt="Mochi Dessert"
          class="mochi-img"
        >
      </div>

    </div>
  </div>
</section>

<!-- FEATURES -->
<section class="feature-section">
  <div class="container">
    <div class="row g-4">

      <div class="col-md-4">
        <div class="feature-box">
          <div class="feature-icon">
            <i class="bi bi-heart"></i>
          </div>
          <h5 class="fw-semibold">Favorit Mudah</h5>
          <p class="text-muted small">
            Simpan menu favoritmu dan temukan kembali dengan cepat.
          </p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="feature-box">
          <div class="feature-icon">
            <i class="bi bi-search"></i>
          </div>
          <h5 class="fw-semibold">Pencarian Cepat</h5>
          <p class="text-muted small">
            Temukan varian mochi hanya dalam hitungan detik.
          </p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="feature-box">
          <div class="feature-icon">
            <i class="bi bi-shield-check"></i>
          </div>
          <h5 class="fw-semibold">Aman & Terpercaya</h5>
          <p class="text-muted small">
            Data akun dan aktivitasmu terlindungi dengan sistem keamanan terbaik.
          </p>
        </div>
      </div>

    </div>
  </div>
</section>

<footer class="text-center">
  © {{ date('Y') }} {{ config('app.name','Dessert Store') }} — All rights reserved.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>