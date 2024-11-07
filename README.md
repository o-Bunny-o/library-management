
<p align="center">
  <img src="https://github.com/user-attachments/assets/fc2688e0-7950-4724-ab4a-27ff65225816" alt="logo" width="150"/>
</p>

# Rapport de Projet

## Application Web pour la Gestion des Livres d’une Bibliothèque

**Date :** 7 novembre 2024  
**Auteurs :** Akerlie Lafleur & Pamela Ortiz  

---

### Introduction

Ce projet consiste en la création d'une application web pour la gestion des livres d'une bibliothèque. L'objectif principal est de simplifier la gestion des livres en permettant aux utilisateurs d'ajouter, de supprimer, d'afficher et de rechercher des livres de manière intuitive. De plus, l'application inclut une section "Nouveautés" qui présente les livres récemment ajoutés. Le projet a été développé en utilisant le framework Laravel, avec une base de données MySQL et un design réactif via Tailwind CSS.

Le besoin de ce projet s'est manifesté dans de nombreuses bibliothèques où la gestion manuelle des livres devient chronophage et sujette à des erreurs. L'objectif était de simplifier cette gestion avec une solution numérique moderne et accessible.

---

### Architecture du Projet

Le projet suit l'architecture MVC (Modèle-Vue-Contrôleur), qui permet de séparer la logique métier, la présentation et la gestion des données pour une meilleure organisation du code et une évolutivité du projet.

- **Modèle** : Représente les données et interagit directement avec la base de données. Dans ce projet, les modèles `Book` et `Message` gèrent respectivement les livres et les messages de contact des utilisateurs.
- **Vue** : Responsable de l'affichage des données. Les vues dans ce projet sont créées avec le moteur de templates Blade de Laravel et sont stylisées avec Tailwind CSS pour une interface moderne et réactive.
- **Contrôleur** : Relie la vue et le modèle, gérant la récupération des données du modèle et les transmettant à la vue. Par exemple, le `BookController` gère l'ajout, l'affichage et la suppression des livres.

Cette séparation entre le modèle, la vue et le contrôleur a permis de maintenir un code propre et bien organisé, facilitant les futures évolutions de l'application.

---

### Mise en Place de la Base de Données

Une base de données MySQL a été utilisée pour stocker les informations des livres et des messages. La mise en place a commencé par la création de la base de données `library_management` via MySQL, suivie de la configuration du fichier `.env` de Laravel pour établir la connexion. Cette configuration permet à Laravel d'interagir facilement avec la base de données.

Des migrations ont été utilisées pour créer les tables dans la base de données, une fonctionnalité essentielle de Laravel qui permet de versionner les modifications de la base de données. Deux tables principales ont été créées :

- La table `books` pour stocker les informations des livres (titre, auteur, genre, etc.).
- La table `messages` pour gérer les messages envoyés par les utilisateurs via le formulaire de contact.

Cette structure a permis de garantir une organisation cohérente des données et de faciliter leur manipulation tout au long du projet.

---

### Développement des Fonctionnalités

Les fonctionnalités principales ont été développées en utilisant les fonctionnalités de base de Laravel, notamment les contrôleurs, les vues et les modèles.

#### Gestion des Livres (CRUD)

Une des fonctionnalités principales est la gestion des livres. Le `BookController` a été créé pour gérer les opérations suivantes :

- **Affichage de la liste des livres** : Cette fonctionnalité permet de lister tous les livres présents dans la base de données.
- **Ajout d'un livre** : Un formulaire permet l’ajout de nouveaux livres. Le contrôleur gère l'enregistrement de ces livres dans la base de données.
- **Suppression d'un livre** : Chaque livre affiché dans la liste dispose d'un bouton permettant de le supprimer de la base de données.
- **Recherche d'un livre** : Un champ de recherche a été ajouté pour filtrer les livres par titre, auteur ou genre.

La gestion des livres repose sur l'ORM Eloquent de Laravel, qui simplifie l'interaction avec la base de données.

#### Affichage des Nouveautés

Un aspect clé de l’application est la section "Nouveautés", qui met en avant les livres les plus récemment ajoutés à la bibliothèque. Cette fonctionnalité est implémentée dans le contrôleur grâce à une requête Eloquent filtrant les livres ajoutés au cours de l’année en cours.

```php
public function newArrivals() {
    $currentYear = date('Y');
    $recentBooks = Book::whereYear('created_at', '>=', $currentYear)
                        ->orderBy('created_at', 'desc')
                        ->get();
    return view('books.newArrivals', compact('recentBooks'));
}
```
Cette requête permet de trier les livres par date d’ajout, du plus récent au plus ancien, et les résultats sont envoyés à une vue dédiée `books.newArrivals` pour être affichés, permettant ainsi aux utilisateurs de voir rapidement les derniers ajouts.

---

### Gestion des Messages

Le projet inclut également un formulaire de contact pour que les utilisateurs puissent envoyer des messages. Le `MessageController` gère la soumission de ces messages et les stocke dans la table `messages`. Ces messages sont ensuite affichés dans une section dédiée pour permettre aux administrateurs de suivre les retours des utilisateurs.

---

## 5. Étapes pour Démarrer le Projet

Pour exécuter l'application localement, suivez les étapes suivantes :

1. **Cloner le dépôt** :

    ```bash
    git clone https://github.com/o-Bunny-o/library-management.git
    ```

2. **Installer les dépendances** :

    ```bash
    cd library-management
    composer install
    ```

3. **Configurer la base de données** :
   - Créez une base de données MySQL (par exemple, `library_management`) sur votre serveur local ou distant.
   - Modifiez le fichier `.env` à la racine du projet pour configurer la connexion à la base de données. Exemple de configuration :

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=library_management
    DB_USERNAME=root
    DB_PASSWORD=
    ```

4. **Exécuter les migrations** :

    ```bash
    php artisan migrate
    ```

5. **Vider les caches de configuration et de routes** :

    ```bash
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
    ```

6. **Installer les dépendances frontales et construire le CSS** :

    ```bash
    npm install
    npm run build
    ```

7. **Lancer le serveur de développement** :

    ```bash
    php artisan serve
    ```

    Accédez à l'application à l'adresse suivante : `http://localhost:8000`.

---

## 6. Conclusion

Le projet de gestion des livres d'une bibliothèque a été réalisé avec succès en utilisant Laravel, un framework puissant qui facilite le développement rapide d'applications web. L’architecture MVC a permis une bonne organisation de l’application, et les migrations ont assuré une structure cohérente des données. Grâce à Tailwind CSS, l’interface utilisateur est moderne et réactive, offrant une expérience fluide et agréable.

Les fonctionnalités implémentées, telles que l’ajout, la suppression, la recherche et l’affichage des nouveautés, répondent aux besoins essentiels d'une bibliothèque moderne. Le projet est évolutif et peut être amélioré en ajoutant de nouvelles fonctionnalités, comme la mise à jour des informations des livres ou l’authentification des utilisateurs.

En résumé, ce projet constitue une base solide pour une application de gestion de bibliothèque et offre de nombreuses possibilités d'extension et d'amélioration.
---

_De plus, le code est annoté, ce qui vous aidera davantage à comprendre les différentes parties du code que nous avons utilisées._
_Un fichier de sauvegarde SQL est également fourni pour peupler la base de données._

---

### Sources

- [Recherche dans Laravel](https://medium.com/@iqbal.ramadhani55/search-in-laravel-e0e20f329b01)
- [Laravel CRUD avec les Contrôleurs Ressources](https://medium.com/@santoshbusiness108/simple-laravel-crud-with-resource-controllers-95fb9f7ffab1)
- [Guide CRUD Laravel](https://kinsta.com/blog/laravel-crud/)
- [Making a Responsive Website in CSS - SheCodes](https://www.shecodes.io/athena/3044-making-a-responsive-website-in-css#google_vignette)


