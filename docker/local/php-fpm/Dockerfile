FROM public.ecr.aws/docker/library/php:8.3.1-fpm
SHELL ["/bin/bash", "-oeux", "pipefail", "-c"]

ENV PROJECT_DIR='/ws-laravel'
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV COMPOSER_HOME=/composer
ARG BUILD_ENV=local
ARG DOMAIN_ROOT
ARG DB_DATABASE
ARG EX2_API_HOST=ex2.sre.bizmates.jp

ENV PHP_UID=1000
ENV PHP_GID=1000
ENV DOCKER_USER='www-data'

ENV APP_URL=https://${DOMAIN_ROOT}
ENV APP_ENV=${BUILD_ENV}

WORKDIR ${PROJECT_DIR}

RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer
RUN apt-get update \
&& apt-get install -y \
git \
zip \
unzip \
vim gcc make autoconf

RUN apt-get update \
    && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo_mysql pdo_pgsql

COPY ["./docker/${BUILD_ENV}/php-fpm/config/php-fpm.conf", "/usr/local/etc/php-fpm.conf"]
COPY ["./docker/${BUILD_ENV}/php-fpm/config/php.ini", "/usr/local/etc/php/php.ini"]
COPY ["./docker/${BUILD_ENV}/php-fpm/scripts/docker-entrypoint.sh", "/"]
RUN chmod +x /docker-entrypoint.sh

COPY ["./src/", "./"]

RUN composer install

EXPOSE 9000

ENTRYPOINT ["/docker-entrypoint.sh"]