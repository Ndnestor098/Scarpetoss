# Usa una imagen base de PHP con Composer y extensiones requeridas
FROM php:8.2-fpm-alpine

# Actualiza y se agrega dependencias del sistema
RUN apk --no-cache upgrade && \
    apk --no-cache add bash git sudo openssh libxml2-dev oniguruma-dev autoconf gcc g++ make npm freetype-dev libjpeg-turbo-dev libpng-dev libzip-dev libssh2 libssh2-dev

# Instalar extensiones de PHP necesarias
RUN pecl channel-update pecl.php.net && \
    pecl install pcov swoole redis && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install mbstring xml pcntl gd zip pdo pdo_mysql bcmath soap && \
    docker-php-ext-enable mbstring xml gd zip pcov pcntl bcmath pdo pdo_mysql soap swoole redis

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalar RoadRunner
COPY --from=spiralscout/roadrunner:2.4.2 /usr/bin/rr /usr/bin/rr

# Establece el directorio de trabajo
WORKDIR /var/www

# Copia el código del proyecto al contenedor
COPY . .

# Instalar dependencias de PHP y de Octane/RoadRunner
RUN composer install && \
    composer require laravel/octane spiral/roadrunner

# Configurar entorno
COPY .env.example .env
RUN php artisan octane:install --server="swoole"

# Instalar dependencias de Node y construir assets
RUN npm install && npm run build

RUN php artisan key:generate

RUN php artisan migrate

# Iniziar servidor
CMD ["php", "artisan", "octane:start", "--server=swoole", "--host=0.0.0.0", "--port=7000"]
