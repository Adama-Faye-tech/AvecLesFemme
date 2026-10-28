# Avec les femmes

Application Symfony de gestion de groupements et de leurs exercices.

## Architecture

- `src/Controller` : contrôleurs HTTP
- `src/Entity` et `src/Repository` : modèle Doctrine et accès aux données
- `src/DataFixtures` : données de démonstration
- `src/Enum` et `src/Trait` : types et comportements partagés
- `templates` : vues Twig, avec `base.html.twig` comme layout commun
- `assets` : JavaScript et feuilles de style AssetMapper
- `migrations` : migrations Doctrine

Le projet utilise PHP 8.2 ou supérieur, Symfony 7.4 et Doctrine ORM 3.7.

## Développement

```powershell
composer install
php bin/console about
symfony serve
```

Configurer `DATABASE_URL` dans `.env.local` pour la base locale. Ne pas placer
de mot de passe réel dans `.env`, qui est suivi par Git.

Avant toute migration, contrôler son état. `doctrine:migrations:diff` crée un
nouveau fichier dans `migrations/` ; examiner ce fichier et lancer un dry-run
avant toute application :

```powershell
php bin/console doctrine:migrations:status
php bin/console doctrine:migrations:diff
php bin/console doctrine:migrations:migrate --dry-run
```

La commande `doctrine:fixtures:load` purge la base par défaut. Ne l’utiliser que
sur une base de développement dont les données peuvent être remplacées.

## Vérifications

```powershell
php bin/console lint:container
php bin/console lint:twig templates/
php bin/console doctrine:schema:validate --skip-sync
php bin/phpunit
```
