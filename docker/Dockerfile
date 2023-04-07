FROM php:7.2-alpine

RUN docker-php-ext-install mbstring pdo pdo_mysql

RUN apk add --no-cache \
        curl \
        apache2 \
        apache2-ssl \
        gnupg \
        git \
        imagemagick \
        icu-dev \
        postgresql-dev \
        zlib-dev \
        netcat-openbsd \
        && mkdir /htdocs

RUN docker-php-ext-configure pgsql -with-pgsql=/usr/include/postgresql/
RUN docker-php-ext-install \
    bcmath \
    intl \
    mbstring \
    pcntl \
    pdo_pgsql \
    pgsql \
    shmop \
    zip 


# use development php ini
RUN mv /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini
RUN mv /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini
# set default timezone
RUN sed -ri -e 's!;date.timezone =!date.timezone = "Europe/Paris"!g' /usr/local/etc/php/php.ini


COPY . /srv/app

RUN curl -sS https://getcomposer.org/installer | php   -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /srv/app

RUN chmod -R 777 .


#CMD bash -c "composer install"

CMD php -S 0.0.0.0:80 public/index.php