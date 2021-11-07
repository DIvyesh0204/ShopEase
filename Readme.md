Run the following commands in your terminal to setup the project

_You must have the LAMP installed on your system_

1.  >git clone https://github.com/DIvyesh0204/Shopping-market.git
2.  >cd Shopping-Market
3.  >bash run.sh

    This will install composer,<br>
    then open your virtual host config file<br>
    where you need to copy paste the following code<br>
    and type in the path to your cloned repository's public directory :
        
        <VirtualHost *:80>
            ServerName market.local
            #Enter Path Here
            DocumentRoot /path____________________      
            #Enter Path Here
            <Directory /path____________________ >     
                Options -Indexes -MultiViews
                Allowoverride all
                Require all granted
                <IfModule mod_rewrite.c>
                    RewriteEngine On

                    # Redirect Trailing Slashes If Not A Folder...
                    RewriteCond %{REQUEST_FILENAME} !-d
                    RewriteRule ^(.*)/$ /$1 [L,R=301]

                    # Handle Front Controller...
                    RewriteCond %{REQUEST_FILENAME} !-d
                    RewriteCond %{REQUEST_FILENAME} !-f
                    RewriteRule ^ index.php [L]
                </IfModule>


            </Directory>
            ErrorLog ${APACHE_LOG_DIR}/market.error.log
            LogLevel warn
            CustomLog ${APACHE_LOG_DIR}/market.access.log combined
        </VirtualHost>

    Save and Close this file<br>

Your setup is now complete<br>
Run "market.local/" on your browser to view the project.
