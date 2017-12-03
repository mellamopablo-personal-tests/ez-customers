Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/xenial64"

  config.vm.network "forwarded_port", guest: 80, host: 3000
  config.vm.network "forwarded_port", guest: 3306, host: 33060

  config.vm.synced_folder ".", "/var/www/html"

  config.vm.provision "shell", inline: <<-SHELL
  	# Configurar los repositorios
  	apt-get update
  	apt-get install -y python-software-properties
    add-apt-repository ppa:ondrej/php
    add-apt-repository ppa:ondrej/apache2
    apt-get update

    # Instalar el software
    debconf-set-selections <<< 'mysql-server mysql-server/root_password password root'
    debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password root'

    apt-get install -y apache2 mysql-server php7.2 php7.2-mysql libapache2-mod-php7.2 zip unzip php7.2-zip php7.2-mbstring

    wget https://raw.githubusercontent.com/composer/getcomposer.org/eb2dd7a54a41891e27ab30e59b79782648380e89/web/installer -O - -q | php -- --quiet
    mv composer.phar /usr/local/bin/composer

    # Suprimir la warning de Apache del ServerName:
    echo "ServerName 127.0.0.1" >> /etc/apache2/apache2.conf

    # Hacer que Apache encuentre los index.php
    sed -i -e 's/DirectoryIndex index.html index.cgi index.pl index.php index.xhtml index.htm/DirectoryIndex index.php index.html index.cgi index.pl index.php index.xhtml index.htm/g' /etc/apache2/mods-enabled/dir.conf

    # Habilitar módulos de apache
    a2enmod rewrite

    echo "<Directory "/var/www/html">" >> /etc/apache2/sites-available/000-default.conf
    echo "    AllowOverride All" >> /etc/apache2/sites-available/000-default.conf
    echo "</Directory>" >> /etc/apache2/sites-available/000-default.conf

    # Habilitar extensiones de PHP
    sed -i -e 's/;extension=mbstring/extension=mbstring/g' /etc/php/7.2/cli/php.ini
    sed -i -e 's/;extension=mbstring/extension=mbstring/g' /etc/php/7.2/apache2/php.ini

    # Mostrar errores de PHP
    sed -i -e 's/display_errors = Off/display_errors = On/g' /etc/php/7.2/apache2/php.ini
    sed -i -e 's/display_startup_errors = Off/display_startup_errors = On/g' /etc/php/7.2/apache2/php.ini

    systemctl restart apache2

    # Habilitar conexiones a MySQL desde fuera de la VM
    sed -i -e 's/skip-external-locking/# skip-external-locking/g' /etc/mysql/mysql.conf.d/mysqld.cnf
    sed -i -e 's/bind-address/# bind-address/g' /etc/mysql/mysql.conf.d/mysqld.cnf
    systemctl restart mysql
    mysql -u root -proot -e "update mysql.user set Host = '%' where User = 'root'; flush privileges;"

    # Crear la estructura de la base de datos
    mysql -u root -proot < /var/www/html/src/database.sql

    # Instalar dependencias
    cd /var/www/html
    composer install

    # Definir variables de entorno
    if [ ! -f .env ]; then
        cp .env.example .env
    fi

    echo "The VM was loaded successfully! Access your site at localhost:3000"
  SHELL
end
