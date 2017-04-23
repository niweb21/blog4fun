FROM ubuntu:16.04

ENV LANG C.UTF-8
ENV LANGUAGE C:en
ENV LC_ALL C.UTF-8

# install pacakge
RUN apt-get update \
    && apt-get install -y software-properties-common \
    && add-apt-repository -y ppa:ondrej/php \
    && apt-get update \
    && apt-get install -y \
        apache2 \
        php7.1 \
        libapache2-mod-php7.1 \
        php7.1-mcrypt \
        php7.1-mysql \
        php7.1-apcu \
        php7.1-curl \
        php7.1-intl \
        php7.1-xdebug \
        php7.1-xml \
        php7.1-zip \
        curl
    # && apt-get remove -y --purge software-properties-common \
    # && apt-get clean \
    # && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# enable php modules
RUN a2enmod rewrite
RUN a2enmod expires
RUN a2enmod headers

# Add conf apache2
COPY apache2/sites-available/blog4fun.conf /etc/apache2/sites-available/blog4fun.conf
RUN a2ensite blog4fun
RUN a2dissite 000-default
RUN a2dissite default-ssl

# Add conf php
COPY php/conf.d/custom_php.ini /etc/php/7.1/apache2/conf.d/custom_php.ini
COPY php/conf.d/custom_php.ini /etc/php/7.1/cli/conf.d/custom_php.ini

# User 1000 is www-data
RUN usermod -u 1000 www-data

WORKDIR /var/www/html

EXPOSE 80
CMD ["/usr/sbin/apache2ctl","-DFOREGROUND"]
