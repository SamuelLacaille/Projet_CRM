# Projet_CRM

#Installation
- composer install
- npm install
- php bin/console doctrine:database:create
- php bin/console doctrine:migrations:migrate

#Installation Stripe (payment method)
- créer un compte sur https://stripe.com/fr
- composer require stripe/stripe-php
- en local la clé API se trouve dans .env.local
- cette clé est bind dans config/services.yarl


#Lancer le projet
- yarn run encore dev --watch
- symfony server:start
