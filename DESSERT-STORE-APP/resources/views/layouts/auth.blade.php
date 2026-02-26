<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Auth') - Dessert Store</title>

  {{-- Bootstrap 5 --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <style>
    body{
      min-height: 100vh;
      background: radial-gradient(1200px 600px at 10% 10%, rgba(255, 99, 132, .18), transparent 60%),
                  radial-gradient(900px 500px at 90% 20%, rgba(13, 110, 253, .12), transparent 55%),
                  linear-gradient(180deg, #f8fafc, #eef2ff);
    }
    .auth-wrap{
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 28px 16px;
    }
    .auth-card{
      width: 100%;
      max-width: 980px;
      border: 0;
      border-radius: 18px;
      overflow: hidden;
      box-shadow: 0 20px 60px rgba(15, 23, 42, .12);
      background: #fff;
    }
    .auth-left{
      background: linear-gradient(135deg, #ff4d6d, #ff7a00);
      color: #fff;
      padding: 36px;
      position: relative;
    }
    .auth-left::after{
      content:"";
      position:absolute;
      inset:-80px -80px auto auto;
      width: 240px;
      height: 240px;
      border-radius: 999px;
      background: rgba(255,255,255,.18);
      filter: blur(2px);
    }
    .brand{
      display:flex;
      align-items:center;
      gap:10px;
      font-weight:800;
      letter-spacing:.2px;
      font-size: 18px;
    }
    .brand i{ font-size: 22px; }
    .auth-left h1{
      font-size: 32px;
      font-weight: 800;
      margin-top: 22px;
      line-height: 1.15;
    }
    .auth-left p{ opacity:.92; margin-top: 10px; }
    .auth-badges{
      display:flex; gap:10px; flex-wrap:wrap;
      margin-top: 18px;
    }
    .auth-badges span{
      background: rgba(255,255,255,.18);
      border: 1px solid rgba(255,255,255,.22);
      padding: 8px 10px;
      border-radius: 999px;
      font-size: 12px;
    }

    .auth-right{ padding: 36px; }
    .form-title{
      font-weight: 800;
      margin: 0;
      font-size: 22px;
      color: #0f172a;
    }
    .form-sub{
      margin: 6px 0 22px 0;
      color:#64748b;
      font-size: 14px;
    }

    .form-control{
      border-radius: 12px;
      padding: 12px 14px;
      border: 1px solid #e2e8f0;
    }
    .form-control:focus{
      border-color: rgba(255, 77, 109, .55);
      box-shadow: 0 0 0 .2rem rgba(255, 77, 109, .15);
    }
    .btn-primary{
      background: #ff4d6d;
      border-color: #ff4d6d;
      border-radius: 12px;
      padding: 12px 14px;
      font-weight: 700;
    }
    .btn-primary:hover{
      background:#ff335a;
      border-color:#ff335a;
    }

    @media (max-width: 991px){
      .auth-left{ padding: 26px; }
      .auth-right{ padding: 26px; }
      .auth-left h1{ font-size: 26px; }
    }
  </style>
</head>

<body>
  <div class="auth-wrap">
    <div class="card auth-card">
      <div class="row g-0">
        {{-- Left --}}
        <div class="col-lg-5 auth-left">
          <div class="brand">
            <i class="bi bi-cup-straw"></i>
            <span>Dessert Store</span>
          </div>

          <h1>@yield('auth_heading', 'Kelola Dessert dengan mudah.')</h1>
          <p>@yield('auth_desc', 'Login untuk mengatur menu, kategori, dan favorit pelanggan.')</p>

          <div class="auth-badges">
            <span><i class="bi bi-lightning-charge"></i> Cepat</span>
            <span><i class="bi bi-shield-check"></i> Aman</span>
            <span><i class="bi bi-grid"></i> Rapi</span>
          </div>
        </div>

        {{-- Right --}}
        <div class="col-lg-7 auth-right">
          @if(session('status'))
            <div class="alert alert-success mb-3">{{ session('status') }}</div>
          @endif

          @if($errors->any())
            <div class="alert alert-danger mb-3">
              {{ $errors->first() }}
            </div>
          @endif

          @yield('content')
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>