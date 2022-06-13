FROM php:8.1-fpm-alpine

# Install dependencies for GD and install GD with support for jpeg, png webp and freetype
# Info about installing GD in PHP https://www.php.net/manual/en/image.installation.php
RUN apk add --no-cache \
        bash

# Algunos alias
RUN echo "PS1='\[\033[01;35m\]WebSalud\[\033[00m\]@\[\033[01;34m\]\w\[\033[00m\]:$ '" >> ~/.bashrc
RUN echo "alias s='cd ..'" >> ~/.bashrc