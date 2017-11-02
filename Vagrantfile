# -*- mode: ruby -*-
# vi: set ft=ruby :

VAGRANTFILE_API_VERSION = '2'

@script = <<SCRIPT
# Install dependencies

# Add ppa for latest php version
sudo apt-get install -y python-software-properties
sudo add-apt-repository -y ppa:ondrej/php

apt-get update
apt-get install -y apache2 git curl php php-bcmath php-bz2 php-cli php-curl php-intl php-json php-mbstring php-zip libapache2-mod-php php-dev php-mysql

# Install MySql
debconf-set-selections <<< 'mysql-server mysql-server/root_password password vagrant'
debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password vagrant'
apt-get install -y mysql-server

# Install phpmyadmin
echo "phpmyadmin phpmyadmin/dbconfig-install boolean true" | debconf-set-selections
echo "phpmyadmin phpmyadmin/app-password-confirm password vagrant" | debconf-set-selections
echo "phpmyadmin phpmyadmin/mysql/admin-pass password vagrant" | debconf-set-selections
echo "phpmyadmin phpmyadmin/mysql/app-pass password vagrant" | debconf-set-selections
echo "phpmyadmin phpmyadmin/reconfigure-webserver multiselect apache2" | debconf-set-selections

# Install Developer tools
curl -sL https://deb.nodesource.com/setup_6.x | sudo -E bash -
apt-get install -y phpmyadmin php-xdebug nodejs composer php-pear
pear install PHP_CodeSniffer
npm install -g grunt
npm install -g @angular/cli

# Configure xdebug
echo "
display_errors=1

[xdebug]
xdebug.default_enable=0
xdebug.idekey=PHPSTORM
xdebug.remote_enable=1
xdebug.remote_autostart=0
xdebug.remote_port=9000
xdebug.remote_connect_back=1
xdebug.profiler_enable=1
xdebug.profiler_output_dir=/var/www/profiler" >> /etc/php/7.1/apache2/php.ini

# Configure Apache
echo "<VirtualHost *:80>
	DocumentRoot /var/www/backend/public
	AllowEncodedSlashes On

	<Directory /var/www/backend/public>
    SetEnv APPLICATION_ENV development
		Options +Indexes +FollowSymLinks
		DirectoryIndex index.php index.html
		Order allow,deny
		Allow from all
		AllowOverride All
	</Directory>

	ErrorLog ${APACHE_LOG_DIR}/error.log
	CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>" > /etc/apache2/sites-available/000-default.conf
a2enmod rewrite
service apache2 restart

if [ -e /usr/local/bin/composer ]; then
    /usr/local/bin/composer self-update
else
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
fi

# Reset home directory of vagrant user
if ! grep -q "cd /var/www" /home/vagrant/.profile; then
    echo "cd /var/www" >> /home/vagrant/.profile
fi

echo "** Visit http://localhost:8080 in your browser for to view the application **"
SCRIPT

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = 'bento/ubuntu-16.04'
  config.vm.network "forwarded_port", guest: 80, host: 8080
  config.vm.network "forwarded_port", guest: 3306, host: 3306 
  config.vm.network "forwarded_port", guest: 4200, host: 4242
  config.vm.synced_folder '.', '/var/www'
  config.vm.provision 'shell', inline: @script

  config.vm.provider "virtualbox" do |vb|
    vb.customize ["modifyvm", :id, "--memory", "4096"]
    vb.customize ["modifyvm", :id, "--name", "JTT Project"]
  end
end
