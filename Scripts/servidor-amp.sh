#!/bin/bash

# Atualiza o repositório
sudo apt update

# Instala o cUrl
sudo apt install curl -y

# Instala o apache
sudo apt install apache2 -y

# Instala o mysql e o workbench
sudo apt install mysql-server -y
sudo apt install mysql-workbench

# Instala o php e seus pacotes
sudo apt install php7.2 -y
sudo apt install php7.2-mysql -y
sudo apt install php7.2-curl -y
sudo apt install php7.2-xml -y
sudo apt install phpmyadmin

# Ativa o modo de reescrita de url
sudo a2enmod rewrite

# Reinicia o apache para aplicar as mudanças
sudo systemctl restart apache2

# Baixa o composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Permissão total para a pasta dos projetos php
sudo chmod -R 777 /var/www/html/

echo "Servidor AMP instalado!"
notify-send -i emblem-default -u normal "Servidor AMP instalado!"
