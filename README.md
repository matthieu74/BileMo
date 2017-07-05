# Installation
## 1. Define your parameters
edit this file `app/config/parameters.yml`

## 2. Download vendors
with Composer:

    php composer.phar install

## 3. Create the database:

    php bin/console doctrine:database:create

then create the table :

    php bin/console doctrine:schema:update --dump-sql
    php bin/console doctrine:schema:update --force

fill the data base :

    use the sql script 'bilemo.sql'
## 4. How to generate the client id et private id
    
    php bin/console create:oauth:client --grant-type="password" --grant-type="refresh_token"
    php app/console create:oauth:user --username=123 --password=123 --email=123@123.com --customer=1
    
## 5. How to configure virtual hosts on your localhost
### 1. we will create a virtual host under the name: "bilemo.dev"
- in the repository *C:\Windows\System32\drivers\etc*; open “hosts” file with admin privileges and add the following to its end;
127.0.0.1 *bilemo.dev* 
### 2.  allow virtual hosts in httpd.conf  
- ckick on wamp tray icon and Apache->httpd.conf  
-search for *# Include conf/extra/httpd-vhosts.conf* and comment it out (by deleting the # caracter): *Include conf/extra/httpd-vhosts.conf*  
- then at the bottom of the file add the *snowtricks* project like this:  
```
    <VirtualHost *:80>
	    ServerName bilemo.dev
	    DocumentRoot C:/web/bilemo/web
	    <Directory  "C:/web/bilemo/web/">
    		Options +Indexes +Includes +FollowSymLinks +MultiViews
	    	AllowOverride All
		    Require local
	    </Directory>
    </VirtualHost>
```
- and restart the wamp services
