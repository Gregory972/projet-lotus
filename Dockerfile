FROM php:8.2-cli

# Installer les extensions nécessaires à Laravel
RUN apt-get update && \
    apt-get install -y unzip zip git curl libzip-dev \
    nodejs npm && \
    docker-php-ext-install zip pdo pdo_mysql

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définir le dossier de travail
WORKDIR /var/www

# Copier tous les fichiers du projet
COPY . .

# Installer les dépendances PHP
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Installer les dépendances Node.js pour Vite
RUN npm install

# Builder les assets Vite (génère public/build/manifest.json)
RUN npm run build

# Donner les bons droits à Laravel
RUN chmod -R 775 storage bootstrap/cache

# Exposer le port attendu par Render
EXPOSE 8080

# Lancer Laravel via le serveur intégré
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
