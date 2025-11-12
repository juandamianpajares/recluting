<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BITNET Trainee Bootcamp</title>
  <link href="/css/app.css" rel="stylesheet">
</head>
<body class="bg-gray-50 text-gray-900">

  <header class="bg-gray-900 text-white p-6">
    <div class="container mx-auto flex justify-between items-center">
      <h1 class="text-2xl font-bold">🚀 BITNET Trainee</h1>
      <nav>
        <a href="#bootcamp" class="px-3 hover:text-yellow-400">Programa</a>
        <a href="#register" class="px-3 hover:text-yellow-400">Inscribirme</a>
        <a href="/login" class="px-3 hover:text-yellow-400">Panel</a>
      </nav>
    </div>
  </header>

  <section class="bg-gradient-to-r from-yellow-400 to-orange-500 text-white py-20 text-center">
    <h2 class="text-4xl font-extrabold mb-4">Conviértete en Desarrollador Laravel en 15 Días</h2>
    <p class="text-lg mb-6">Entrenamiento intensivo con proyectos reales, documentación profesional y código sin bugs.</p>
    <a href="#register" class="bg-white text-orange-600 font-bold px-6 py-3 rounded-xl hover:bg-gray-100">Inscribirme ahora</a>
  </section>

  <section id="bootcamp" class="py-16 container mx-auto text-center">
    <h3 class="text-3xl font-bold mb-8">📅 Cronograma</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="bg-white p-6 rounded-xl shadow">
        <h4 class="font-semibold mb-2">Semana 1</h4>
        <p>Entorno Laravel + Docker + GitHub. CRUD + rutas + controladores.</p>
      </div>
      <div class="bg-white p-6 rounded-xl shadow">
        <h4 class="font-semibold mb-2">Semana 2</h4>
        <p>Proyecto CRM real, validación de formularios, seeders y documentación.</p>
      </div>
      <div class="bg-white p-6 rounded-xl shadow">
        <h4 class="font-semibold mb-2">Semana 3</h4>
        <p>Deploy con CI/CD, métricas y certificación final.</p>
      </div>
    </div>
  </section>

  <section id="register" class="bg-gray-100 py-16">
    <div class="container mx-auto max-w-lg text-center">
      <h3 class="text-3xl font-bold mb-6">📝 Inscripción al Bootcamp</h3>
      @if(session('success'))<div class="mb-4 text-green-600">{{ session('success') }}</div>@endif
      <form action="{{ route('trainees.store') }}" method="POST" class="bg-white shadow-lg p-8 rounded-xl space-y-4">
        @csrf
        <input type="text" name="name" placeholder="Nombre completo" class="w-full border rounded-lg p-3" required>
        <input type="email" name="email" placeholder="Correo electrónico" class="w-full border rounded-lg p-3" required>
        <input type="text" name="github" placeholder="Perfil de GitHub" class="w-full border rounded-lg p-3">
        <textarea name="motivation" placeholder="¿Por qué querés unirte?" class="w-full border rounded-lg p-3"></textarea>
        <button type="submit" class="bg-orange-500 text-white px-6 py-3 rounded-lg hover:bg-orange-600 w-full">Enviar solicitud</button>
      </form>
    </div>
  </section>

  <footer class="bg-gray-900 text-white text-center p-6 mt-10">
    <p>© {{ date('Y') }} BITNET Trainee — Formación con propósito.</p>
  </footer>

</body>
</html>
