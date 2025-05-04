FROM alpine
# Upgrade existing packages in the base image
RUN apk --no-cache upgrade
# Install apache from packages with out caching install files
RUN apk add --no-cache apache2 php php-apache2 php-session php-openssl php-json
CMD ["-D","FOREGROUND"]

# Labs
RUN rm /var/www/localhost/htdocs/index.html

# Lab1
RUN mkdir /var/www/localhost/htdocs/Lab1
COPY Labs/Lab1/ /var/www/localhost/htdocs/Lab1
RUN chmod 666 /var/www/localhost/htdocs/Lab1/tareas.txt

# Lab2
RUN mkdir /var/www/localhost/htdocs/Lab2
COPY Labs/Lab2/ /var/www/localhost/htdocs/Lab2
RUN chmod 666 /var/www/localhost/htdocs/Lab2/mensajes.txt

#Lab3
RUN mkdir /var/www/localhost/htdocs/Lab3
COPY Labs/Lab3/ /var/www/localhost/htdocs/Lab3
RUN chmod 666 /var/www/localhost/htdocs/Lab3/mensajes.txt

# Srart httpd when container runs
ENTRYPOINT ["/usr/sbin/httpd"]
