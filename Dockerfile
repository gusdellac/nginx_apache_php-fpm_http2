# Dockerfile
FROM php:8.3-fpm

# Instalar Apache y dependencias
RUN apt-get update && apt-get install -y apache2 libapache2-mod-fcgid \
    && rm -rf /var/lib/apt/lists/*

# Habilitar módulos necesarios
RUN a2enmod proxy_fcgi setenvif rewrite headers ssl

# Configuración Apache para usar PHP-FPM
COPY ./apache.conf /etc/apache2/sites-available/000-default.conf

# Exponer puerto (solo interno)
EXPOSE 80

CMD service apache2 start && php-fpm