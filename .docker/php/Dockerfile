# Dockerfile personalizado para PHP en el proyecto Symfony
FROM php:8.2-fpm

ENV COMPOSER_ALLOW_SUPERUSER=1

# Instalar las dependencias necesarias para Symfony
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libonig-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Instalar Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    php -r "unlink('composer-setup.php');"

# Instalar PHPUnit globalmente
RUN composer global require phpunit/phpunit --prefer-dist --dev

# Añadir PHPUnit al PATH global
ENV PATH="/root/.composer/vendor/bin:${PATH}"

WORKDIR /var/www/html

# Instalar dependencias de Symfony (sin las de desarrollo)

CMD ["php-fpm"]