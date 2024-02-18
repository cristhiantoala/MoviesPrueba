# Usar la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instalar extensiones de PHP
RUN docker-php-ext-install pdo pdo_mysql

# Habilitar el módulo de Apache mod_rewrite
RUN a2enmod rewrite

# Copiar los archivos de la aplicación al directorio de trabajo predeterminado en el contenedor
COPY . /var/www/html

# Asignar permisos al directorio de la aplicación
RUN chown -R www-data:www-data /var/www/html

# Exponer el puerto 80
EXPOSE 80