# 🎮 LEXIGAME — Backend

Backend de l'application **LEXIGAME**, développé avec **Laravel**.

Le backend fournit l'API nécessaire au fonctionnement de l'application et assure notamment la gestion de la logique métier, des données, de l'authentification et de la communication avec la base de données.

---

## 📌 Présentation

**LEXIGAME** est une application web interactive orientée jeux et apprentissage.

Le backend constitue la partie serveur de l'application. Il est responsable de :

* 🔌 Fournir les API REST
* 🧠 Gérer la logique métier
* 🗄️ Gérer les données de l'application
* 🔐 Gérer l'authentification et les utilisateurs
* 🔄 Communiquer avec la base de données
* 🛡️ Valider et traiter les requêtes envoyées par le frontend

Le frontend React communique avec ce backend via des requêtes HTTP.

---

## 🚀 Technologies utilisées

### Backend

* **PHP**
* **Laravel**
* **Laravel Eloquent ORM**
* **Laravel Migrations**
* **Laravel API**

### Base de données

Le projet utilise une base de données relationnelle compatible avec Laravel.

La connexion à la base de données est configurée dans le fichier `.env`.

### Outils

* **Composer**
* **Artisan**
* **Git**
* **GitHub**

---

## 📂 Structure du projet

```text
backend/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Middleware/
│   │   └── Requests/
│   │
│   ├── Models/
│   └── ...
│
├── bootstrap/
│
├── config/
│
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
│
├── public/
│
├── resources/
│
├── routes/
│   ├── api.php
│   └── web.php
│
├── storage/
│
├── tests/
│
├── .env.example
├── artisan
├── composer.json
├── composer.lock
└── README.md
```

> La structure peut évoluer avec l'avancement du projet.

---

## ⚙️ Prérequis

Avant d'installer le backend, assurez-vous d'avoir installé :

* **PHP**
* **Composer**
* **MySQL** ou une base de données compatible
* **Git**

Vérifier PHP :

```bash
php -v
```

Vérifier Composer :

```bash
composer -V
```

Vérifier Laravel/Artisan :

```bash
php artisan --version
```

---

## 📥 Installation

### 1. Cloner le repository

```bash
git clone https://github.com/Joseph-Nostra/LEXIGAME.git
```

### 2. Accéder au backend

```bash
cd LEXIGAME/backend
```

### 3. Installer les dépendances PHP

```bash
composer install
```

---

## 🔐 Configuration de l'environnement

Copier le fichier `.env.example` :

### Windows

```bash
copy .env.example .env
```

### Linux / macOS

```bash
cp .env.example .env
```

Puis générer la clé de l'application :

```bash
php artisan key:generate
```

---

## 🗄️ Configuration de la base de données

Ouvrir le fichier :

```text
.env
```

Puis configurer les paramètres de connexion à la base de données.

Exemple :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lexigame
DB_USERNAME=root
DB_PASSWORD=
```

Adaptez ces valeurs à votre environnement local.

---

## 🏗️ Migrations

Laravel utilise les migrations pour créer et modifier la structure de la base de données.

Pour exécuter les migrations :

```bash
php artisan migrate
```

Pour recréer complètement la base de données :

```bash
php artisan migrate:fresh
```

> `migrate:fresh` supprime les tables existantes avant de les recréer. Utilisez cette commande uniquement dans un environnement de développement lorsque vous pouvez perdre les données existantes.

---

## 🌱 Seeders

Si des seeders sont configurés dans le projet, ils peuvent être exécutés avec :

```bash
php artisan db:seed
```

Ou :

```bash
php artisan migrate:fresh --seed
```

---

## ▶️ Lancer le serveur

Pour démarrer le serveur Laravel :

```bash
php artisan serve
```

Le backend sera généralement accessible à :

```text
http://127.0.0.1:8000
```

---

## 🔌 API

Le backend expose des endpoints permettant au frontend React d'échanger des données avec le serveur.

Architecture générale :

```text
┌──────────────────────┐
│
```
