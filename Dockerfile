FROM php:8.2-fpm-alpine

WORKDIR /src

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

COPY . .

RUN composer install
CMD [ "/bin/sh", "php artisan db:wipe"]
CMD ["/bin/sh", "php artisan migrate"]
CMD ["/bin/sh", "php artisan db:seed"]