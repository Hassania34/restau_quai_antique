Restaurant Quai Antique Symfony
===

@Autor : Hassania34

# Pré requis

* Php : 8.2.1
* Symfony : 5.4

# Commande utile

## Démarer le serveur

```
symfony server:start
```

* Page d'acueil :  https://127.0.0.1:8000/
* Page de connexion : https://127.0.0.1:8000/connexion


# Liste des commandes 

## Administration de la base de données

### Manipulation du schéma de base de données

#### Création d'entité
```
php bin/console make:entity 
## ou 
symfony console m:e
```

#### Demender l'écriture en base de données

```
php bin/console make:migration
```

```
php bin/console doctrine:migrations:migrate
```

### Visualisation des données

```
php bin/console dbal:run-sql 'SELECT * FROM utilisateur'
```

## Gestion de l'administration avec le module easyadmin-bundle

Sources : https://symfony.com/bundles/EasyAdminBundle/current/dashboards.html

```
# Instalation du module easyadmin-bundle
composer require easycorp/easyadmin-bundle
```

```
# Admin crud sur les entités
php bin/console make:admin:crud 
```

```
# Génération du dashboard admin
symfony console make:admin:dashboard
```

#Installation de heroku
 ```composer create-project symfony/website-skeleton symfony-heroku/ 
 ```