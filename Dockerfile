# Étape 1 : Build frontend avec Vite + Tailwind
FROM node:20 as build

WORKDIR /app

COPY package.json package-lock.json ./
RUN npm install

COPY . .

# Build Vite (Tailwind inclus via app.css)
RUN npm run build


# Étape 2 : PHP + Laravel
FROM php:8.2-cli

RUN apt-get update && apt-get install -y unzip zip git curl libzip-dev && \
    docker-php-ext-install zip pdo pdo_mysql

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Dossier de travail Laravel
WORKDIR /var/www

COPY . .

# Copier les assets compilés
COPY --from=build /app/public/build /var/www/public/build

# Installer dépendances PHP
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Artisan caches
RUN php artisan config:clear && \
    php artisan view:clear && \
    php artisan route:clear

# Droits
RUN chmod -R 775 storage bootstrap/cache

EXPOSE 8080
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
