FROM php:8.3-cli

WORKDIR /app

COPY . .

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

RUN php composer-setup.php

RUN php composer.phar install

EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=8000
