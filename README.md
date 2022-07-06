# projet-raspberry-meteo

Ce projet a pour but de mettre en place une sonde atmosphérique qui récupère des données de pression et de température sur une Raspberry Pi 3. Ces mesures sont prises grâce à un capteur de type bmc180 de chez Bosch Sensortech branché via le bus i2c de la carte.
Nous récoltons toutes les mesures pour les mettre dans une base de données SQL en utilisant Sqlite3, présente sur la carte. Ces mesures sont téléchargeables et consultables via une interface web, cependant uniquement accessible via un tunnel SSH.
Nous pouvons aussi modifier les fichiers de configuration via cette interface web. Cependant, uniquement l'intervalle entre deux mesures du capteur peut être modifié.
Ce projet fait appel à des outils comme Buildroot ou encore Busybox.

# Aperçu du schéma général de fonctionnement



![architecture_generale-2](https://user-images.githubusercontent.com/55884531/177583272-842780f9-480a-4bd0-a38d-94c47355fd8c.png)


# Configuration Buildroot

Pour que le projet aboutisse, il a fallu installer les modules suivants dans Buildroot:
 - Dropbear pour la connection SSH
 - Lighttpd pour le serveur web
 - PHP pour le serveur web
 - Sqlite3 pour la base de données
 - module wifi
 - nano comme éditeur de texte (optionnel)
