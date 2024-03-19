FROM php:8.1-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libmemcached-dev \
    libz-dev \
    libpq-dev \
    libpng-dev \
    libonig-dev \
    libfreetype6-dev \
    libjpeg-dev \
    libwebp-dev \
    libxpm-dev \
    libjpeg62-turbo-dev \
    libxml2-dev \
    zip \
    unzip \
    libboost-dev \
    libprotobuf-dev \
    openssl  \
    protobuf-compiler

# Get sources and put them in proper place
RUN mkdir -p /usr/src/php/ext && \
    mkdir /tmp/mysql_xdevapi && \
    cd /tmp && \
    pecl download mysql_xdevapi && \
    tar xf mysql_xdevapi-*.tgz -C mysql_xdevapi --strip-components 1 && \
    mv ./mysql_xdevapi /usr/src/php/ext/ && \
    rm /tmp/mysql_xdevapi-*.tgz

RUN docker-php-ext-configure gd --prefix=/usr --with-jpeg  --with-webp --with-xpm --with-freetype
RUN docker-php-ext-install -j$(nproc) gd

# Install PHP extensions
RUN docker-php-ext-install mysql_xdevapi pdo_mysql mbstring exif pcntl bcmath ctype
    #dom fileinfo hash session tokenizer xml

RUN cp /usr/local/etc/php/php.ini-production /usr/local/etc/php.ini
RUN sed -i -e "s/^ *memory_limit.*/memory_limit = 4G/g" /usr/local/etc/php.ini

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]