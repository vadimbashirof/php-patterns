ARG phpversion

FROM php:$phpversion-fpm

# Xdebug
RUN pecl install xdebug \
	&& docker-php-ext-enable xdebug

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
