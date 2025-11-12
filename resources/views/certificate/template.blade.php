<!doctype html>
<html>
<head>
  <style>
    body { font-family: DejaVu Sans, sans-serif; }
    .card { border: 2px solid #222; padding: 40px; text-align: center; }
    .title { font-size: 28px; font-weight: bold; }
    .subtitle { margin-top: 20px; }
  </style>
</head>
<body>
  <div class="card">
    <div class="title">Certificado BITNET Trainee</div>
    <div class="subtitle">Se certifica que</div>
    <h2>{{ $trainee->name }}</h2>
    <p>Ha completado el programa <strong>BITNET Trainee - Laravel 15D</strong></p>
    <p>Código de verificación: <strong>{{ $trainee->certificate_code }}</strong></p>
    <p>Fecha: {{ now()->toDateString() }}</p>
  </div>
</body>
</html>
