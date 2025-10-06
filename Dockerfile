# Gunakan image PHP 8.2 dengan Apache
FROM php:8.2-apache

# Install dependensi sistem & ekstensi PHP yang dibutuhkan Laravel
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo pdo_pgsql zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy semua file project ke dalam container
COPY . .

# Install dependensi Laravel
RUN composer install --no-dev --optimize-autoloader

# Set permission folder storage dan bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache

# Generate Laravel key (opsional, bisa juga dari ENV)
# RUN php artisan key:generate

# Expose port 8080 (karena Northflank pakai port ini)
EXPOSE 8080

# Jalankan Laravel pakai artisan serve
CMD php artisan serve --host=0.0.0.0 --port=8080
