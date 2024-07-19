# Utiliser une image de base officielle de PHP avec Alpine Linux
FROM dunglas/frankenphp:alpine

# Definition d'une variable d'environnement pour le port

RUN apk add --no-cache bash
RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.alpine.sh' | bash
RUN apk add symfony-cli

RUN install-php-extensions pdo_pgsql intl zip opcache

# Définir le répertoire de travail dans le conteneur
WORKDIR /app
#Donne toutes les autorisations
ENV COMPOSER_ALLOW_SUPERUSER=1

# Copier tous les fichiers de l'application dans le répertoire de travail
# --link permet de vérifier
COPY --link . .

RUN symfony composer install
# bypass le https
ENV SERVER_NAME=:80