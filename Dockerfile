FROM node:20 as build

WORKDIR /app

COPY package.json package-lock.json ./
RUN npm install

COPY . .
RUN npm run build


FROM php:8.2-cli

RUN apt-get update && apt-get install -y unzip zip git curl libzip-dev && \
    docker-php-ext-install zip pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .
COPY --from=build /app/public/build /var/www/public/build

RUN composer install --no-interaction --prefer-dist --optimize-autoloader
RUN php artisan config:clear && php artisan view:clear && php artisan route:clear

RUN chmod -R 775 storage bootstrap/cache

EXPOSE 8080
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
