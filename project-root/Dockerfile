FROM php:8.2-apache

# Enable required apache and PHP modules
RUN a2enmod rewrite
RUN docker-php-ext-install pdo pdo_mysql

# Set working directory
WORKDIR /var/www/html

# Copy all files from current project-root folder
COPY . /var/www/html/

# Set Apache DocumentRoot to public folder
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf \
    && sed -ri -e 's!/var/www/!/var/www/html/public/!g' /etc/apache2/apache2.conf

# Allow .htaccess inside public folder
RUN echo "<Directory /var/www/html/public>
    AllowOverride All
    Require all granted
</Directory>" >> /etc/apache2/apache2.conf

EXPOSE 80

CMD ["apache2-foreground"]
