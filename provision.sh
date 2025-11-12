#!/bin/bash
set -e
echo "🚀 Iniciando provisión del entorno BITNET..."
cp .env.example .env || true
docker-compose up -d --build
echo "Esperando containers..."
sleep 6
docker-compose exec -T app bash -lc "composer install --no-interaction || true"
docker-compose exec -T app php artisan key:generate || true
docker-compose exec -T app php artisan migrate --force || true
echo "✅ Bootcamp listo en http://localhost:8080 (Mailhog: http://localhost:8025)"
