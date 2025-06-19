FROM php:8.2-cli

# Installer les dépendances système nécessaires à Laravel + Node
RUN apt-get update && \
    apt-get install -y unzip zip git curl libzip-dev \
    nodejs npm && \
    docker-php-ext-install zip pdo pdo_mysql

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définir le répertoire de travail
WORKDIR /var/www

# Copier tous les fichiers
COPY . .

# Installer les dépendances PHP
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Installer les dépendances JS pour Vite
RUN npm install

# Compiler les assets avec Vite
RUN npm run build

# Effacer le cache de config Laravel (évite erreur manifest manquant)
RUN php artisan config:clear

# Donner les bons droits d'accès
RUN chmod -R 775 storage bootstrap/cache

# Exposer le port utilisé par Laravel
EXPOSE 8080

# Commande de démarrage
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
