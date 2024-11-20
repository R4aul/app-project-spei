# Base PHP 8.2 con extensiones necesarias
FROM php:8.2-fpm

# Directorio de trabajo dentro del contenedor
WORKDIR /var/www/html

# Instalar dependencias del sistema y extensiones de PHP
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libzip-dev zip unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar archivos de la aplicación
COPY . .

# Configurar permisos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Exponer el puerto PHP
EXPOSE 9000

# Comando por defecto
CMD ["php-fpm"]
