FROM node:20 as build

WORKDIR /app

COPY package.json package-lock.json ./
RUN npm install

COPY . .

# Compile Vite (avec style.css importé dans app.css)
RUN npm run build


FROM php:8.2-cli

# Dépendances système
RUN apt-get update && apt-get install -y unzip zip git curl libzip-dev && \
    docker-php-ext-install zip pdo pdo_mysql

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Dossier de travail
WORKDIR /var/www

# Copie code source
COPY . .

# Copie le build Vite compilé dans le public
COPY --from=build /app/public/build /var/www/public/build

# Install PHP deps après le frontend (évite conflits de lock)
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Artisan clean
RUN php artisan config:clear && \
    php artisan view:clear && \
    php artisan route:clear

# Droits
RUN chmod -R 775 storage bootstrap/cache

EXPOSE 8080
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
