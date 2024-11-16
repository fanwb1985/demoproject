FROM mattrayner/lamp:latest-1604-php7

MAINTAINER coder1 coder1@example.com

RUN apt-get update

RUN apt-get autoclean

RUN apt-get install -y iputils-ping

ADD phpproject /app

ADD phpproject/php.ini /etc/php/8.0/apache2/php.ini

ADD phpproject/create_mysql_users.sh  /create_mysql_users.sh 
RUN chmod +x /create_mysql_users.sh
