FROM php:8.2-cli

# Installe les extensions requises
RUN apt-get update && apt-get install -y unzip zip git curl libzip-dev && docker-php-ext-install zip pdo pdo_mysql

# Installe Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définir le dossier de travail
WORKDIR /var/www

# Copier tout le projet
COPY . .

# Installer les dépendances PHP
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Donner les droits à storage et bootstrap
RUN chmod -R 775 storage bootstrap/cache

# Exposer le port attendu par Render (par défaut : 8080)
EXPOSE 8080

# Lancer Laravel via artisan
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
