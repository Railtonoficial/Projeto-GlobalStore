# Usar a imagem base do PHP com FPM
FROM php:8.3-fpm

# Instalar dependências e extensões necessárias
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql mysqli

# Configurar OPcache para ambiente de desenvolvimento
RUN echo "zend_extension=opcache.so" >> /usr/local/etc/php/php.ini \
    && echo "opcache.enable=0" >> /usr/local/etc/php/php.ini \
    && echo "opcache.validate_timestamps=1" >> /usr/local/etc/php/php.ini \
    && echo "opcache.revalidate_freq=0" >> /usr/local/etc/php/php.ini

# Instalar o Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Configurar diretório de trabalho
WORKDIR /var/www/html

# Copiar o código para o container
COPY . .

# Ajustar permissões do diretório raiz e da pasta public/assets
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chown -R www-data:www-data /var/www/html/public/assets \
    && chmod -R 775 /var/www/html/public/assets

# Expor a porta do PHP-FPM
EXPOSE 9000

# Comando padrão do container
CMD ["php-fpm"]
