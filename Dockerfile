# Utilisation de l'image PHP officielle avec Apache
FROM php:7.4-apache

# Install dependencies and PHP extensions
RUN apt-get update && \
    apt-get install -y \
        libpng-dev \
        libjpeg-dev \
        libfreetype6-dev \
        zip \
        unzip \
        git \
        && docker-php-ext-install mysqli pdo pdo_mysql

# Enable necessary Apache modules
RUN a2enmod rewrite

# Set the working directory
WORKDIR /var/www/html

# Copy PHP files
COPY index.php /var/www/html/
COPY delete_query.php /var/www/html/
COPY update_task.php /var/www/html/
COPY conn.php   /var/www/html/
COPY add_query.php /var/www/html/
# Create CSS directory and copy CSS file
RUN mkdir -p /var/www/html/css
COPY bootstrap.css /var/www/html/css/bootstrap.css

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
