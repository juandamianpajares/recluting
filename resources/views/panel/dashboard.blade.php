<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Dashboard</title>
  <link href="/css/app.css" rel="stylesheet">
</head>
<body class="p-6 bg-gray-50">
  <div class="container mx-auto">
    <h1 class="text-2xl font-bold">Bienvenido, {{ $trainee->name }}</h1>
    <p class="mt-2">Progreso: {{ $trainee->progress }}%</p>

    <form method="POST" action="/update-progress">
      <!-- For MVP we leave update via DB or seeder; UI only -->
    </form>

    @if($trainee->progress >= 100)
      <p class="mt-4"><a href="/certificate/{{ $trainee->id }}" class="px-4 py-2 bg-green-600 text-white rounded">Generar Certificado</a></p>
    @endif
  </div>
</body>
</html>
