FROM php:8.1-fpm

# Copy composer.lock and composer.json

COPY composer.json /var/www/

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libxml2-dev \
    libpng-dev \
    libzip-dev \
    libonig-dev \
    libwebp-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-configure gd  --with-freetype --with-jpeg --with-webp
RUN docker-php-ext-install gd
RUN docker-php-ext-install sockets
RUN docker-php-ext-install dom
RUN docker-php-ext-install xml
RUN docker-php-ext-enable sockets
RUN docker-php-ext-install soap
RUN pecl install redis && \
	docker-php-ext-enable redis
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql




# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
COPY . /var/www

# Copy existing application directory permissions
COPY --chown=www:www . /var/www

# Change current user to www
USER www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
EXPOSE 3307
EXPOSE 3306
EXPOSE 6379
CMD ["php-fpm"]
