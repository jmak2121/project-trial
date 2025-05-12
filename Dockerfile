# Use an official PHP image that comes with Apache pre-installed.
FROM php:8.1-apache

# Install PDO and the MySQL driver which lets PHP talk to a MySQL database.
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache's URL rewriting module (helpful for friendly URLs, if needed).
RUN a2enmod rewrite

# Copy all your project files into Apache's document root inside the container.
COPY . /var/www/html/

# Expose port 80 so that external traffic can reach Apache.
EXPOSE 80