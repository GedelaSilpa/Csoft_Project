FROM php:8.2-apache

RUN a2enmod rewrite

RUN apt-get update && apt-get install -y \
    unzip \
    git \
    zip \
    libzip-dev \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_mysql zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --prefer-dist --optimize-autoloader || true

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri "s#DocumentRoot /var/www/html#DocumentRoot ${APACHE_DOCUMENT_ROOT}#g" /etc/apache2/sites-available/000-default.conf \
 && sed -ri "s#/var/www/#${APACHE_DOCUMENT_ROOT}/#g" /etc/apache2/apache2.conf

RUN echo "<Directory ${APACHE_DOCUMENT_ROOT}>\n    AllowOverride All\n</Directory>" >> /etc/apache2/apache2.conf

EXPOSE 80
CMD ["apache2-foreground"]
