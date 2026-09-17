# 🎮 LEXIGAME — Frontend

**LEXIGAME** est une application web interactive de jeux éducatifs développée avec **React.js** et **Vite**.
L'objectif de l'application est de proposer une expérience ludique permettant aux utilisateurs d'améliorer leur vocabulaire, leur logique et leurs connaissances à travers différents jeux et exercices interactifs.

---

## 📌 Présentation

Le frontend de LEXIGAME est une application **React** permettant de gérer l'interface utilisateur et les différentes interactions avec l'application.

Il communique avec le backend via des **API REST** afin de récupérer et envoyer les données nécessaires au fonctionnement de l'application.

L'interface est conçue pour être :

* 🎮 Interactive
* 📱 Responsive
* ⚡ Rapide
* 🧩 Simple à utiliser
* 🎨 Moderne
* 🔄 Connectée au backend

---

## 🚀 Technologies utilisées

### Frontend

* **React.js**
* **Vite**
* **JavaScript (ES6+)**
* **HTML5**
* **CSS3**

### Outils de développement

* **npm**
* **ESLint**
* **Git**
* **GitHub**

### Communication avec le backend

Le frontend est conçu pour communiquer avec l'API backend de LEXIGAME à travers des requêtes HTTP.

---

## 📂 Structure du projet

```text
frontend/
│
├── public/
│   └── # Assets statiques
│
├── src/
│   ├── assets/
│   │   └── # Images, icônes et autres ressources
│   │
│   ├── components/
│   │   └── # Composants React réutilisables
│   │
│   ├── pages/
│   │   └── # Pages principales de l'application
│   │
│   ├── services/
│   │   └── # Communication avec l'API backend
│   │
│   ├── App.jsx
│   ├── main.jsx
│   └── index.css
│
├── .gitignore
├── eslint.config.js
├── index.html
├── package.json
├── package-lock.json
├── vite.config.js
└── README.md
```

> La structure exacte peut évoluer avec le développement de LEXIGAME.

---

## ⚙️ Installation

### 1. Cloner le repository

```bash
git clone https://github.com/Joseph-Nostra/LEXIGAME.git
```

### 2. Accéder au frontend

```bash
cd LEXIGAME/frontend
```

### 3. Installer les dépendances

```bash
npm install
```

### 4. Lancer le serveur de développement

```bash
npm run dev
```

Vite démarre alors le serveur de développement et fournit une URL locale, généralement :

```text
http://localhost:5173
```

---

## 🛠️ Scripts disponibles

Les scripts principaux sont définis dans `package.json`.

### Développement

```bash
npm run dev
```

Lance le serveur de développement Vite avec le Hot Module Replacement (HMR).

### Build

```bash
npm run build
```

Génère une version optimisée de l'application destinée à la production.

### Preview

```bash
npm run preview
```

Permet de tester localement la version de production générée par Vite.

### Lint

```bash
npm run lint
```

Analyse le code JavaScript/React avec ESLint afin de détecter les problèmes de qualité et de style.

---

## 🔌 Communication avec le Backend

Le frontend de LEXIGAME peut communiquer avec le backend à travers des endpoints HTTP.

Exemple général :

```javascript
fetch("http://localhost:8000/api/...")
```

ou avec une bibliothèque HTTP si elle est utilisée dans le projet :

```javascript
axios.get("/api/...")
```

La configuration des URLs d'API doit être adaptée à l'environnement utilisé :

* Développement
* Test
* Production

---

## 🌱 Variables d'environnement

Les variables d'environnement peuvent être utilisées pour configurer l'URL de l'API backend.

Exemple :

```env
VITE_API_URL=http://localhost:8000/api
```

Dans le code React :

```javascript
const API_URL = import.meta.env.VITE_API_URL;
```

> Ne committez jamais de données sensibles ou de clés privées dans le repository.

---

## 🎯 Fonctionnalités

Le frontend de LEXIGAME est destiné à fournir notamment :

* 🎮 Interface de jeu interactive
* 🧠 Exercices éducatifs
* 📚 Gestion des contenus de jeu
* 👤 Interface utilisateur
* 🏆 Résultats et scores
* 📊 Affichage des performances
* 🔐 Authentification utilisateur lorsque connectée au backend
* 📱 Interface responsive

Les fonctionnalités peuvent évoluer au fur et à mesure du développement du projet.

---

## 🔗 Architecture générale

LEXIGAME est organisé autour d'une architecture frontend/backend :

```text
                    LEXIGAME
                       │
             ┌─────────┴─────────┐
             │                   │
             ▼                   ▼
        FRONTEND              BACKEND
        React/Vite            API REST
             │                   │
             │   HTTP Requests   │
             └─────────►─────────┘
                                  │
                                  ▼
                              DATABASE
```

### Frontend

Responsable de :

* L'interface utilisateur
* La navigation
* Les composants React
* Les interactions utilisateur
* L'affichage des données
* La communication avec l'API

### Backend

Responsable notamment de :

* La logique métier
* Les API
* L'authentification
* La gestion des données
* La communication avec la base de données

---

## 🔄 Workflow de développement

Le workflow recommandé pour contribuer au frontend est :

```text
1. Clone repository
       ↓
2. npm install
       ↓
3. npm run dev
       ↓
4. Développement
       ↓
5. npm run lint
       ↓
6. npm run build
       ↓
7. Git commit
       ↓
8. Git push
```

---

## 🧪 Vérification avant commit

Avant de pousser des modifications :

```bash
npm run lint
```

Puis :

```bash
npm run build
```

Cela permet de vérifier que le code respecte les règles ESLint et que l'application peut être compilée correctement.

---

## 📦 Build de production

Pour générer la version de production :

```bash
npm run build
```

Les fichiers générés sont placés dans :

```text
dist/
```

Le dossier `dist/` peut ensuite être déployé sur une plateforme d'hébergement compatible avec les applications Vite/SPA.

---

## 🌐 Déploiement

Le frontend peut être déployé sur différentes plateformes compatibles avec les applications Vite, par exemple :

* Vercel
* Netlify
* Cloudflare Pages
* GitHub Pages
* Serveur web classique

Lors du déploiement, pensez à configurer correctement l'URL du backend et les éventuelles variables d'environnement.

---

## 🧑‍💻 Développement

Projet développé dans le cadre d'un projet de développement web.

### Auteur

**Joseph-Nostra**

GitHub:

```text
https://github.com/Joseph-Nostra
```

### Repository

```text
https://github.com/Joseph-Nostra/LEXIGAME
```

---

## 📄 Licence

Ce projet est actuellement un projet de développement personnel/étudiant.

La licence pourra être définie ultérieurement selon les besoins du projet.
