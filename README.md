# 🎮 LEXIGAME

**LEXIGAME** is a full-stack e-commerce web application built with **React**, **Laravel**, and **MySQL**.

The project provides role-based experiences for **clients, vendors, and administrators**, including authentication, product management, shopping cart, orders, payments, deliveries, reviews, returns, and dedicated dashboards.

The application uses **Docker Compose** for its development environment and **GitHub Actions** for continuous integration.

---

## ✨ Features

### 🔐 Authentication & Authorization

* User registration and login
* Authentication with Laravel Sanctum
* Logout and authenticated user profile
* Role-based access control
* Client, Vendor, and Administrator roles

### 🛍️ Customer

* Browse products and categories
* View product details
* Product reviews
* Shopping cart
* Checkout
* Order management
* Payment information
* Delivery information
* Return requests

### 🏪 Vendor

* Vendor dashboard
* Product creation and modification
* Product management
* Product deletion requests
* Vendor order management
* Vendor return requests
* Category management

### 🛠️ Administration

* Admin dashboard
* User management
* Product approval and rejection
* Product deletion approval
* Return request management
* Review management
* Category management

---

## 🧱 Architecture

```text
┌──────────────────────────┐
│      React Frontend      │
│          Vite            │
│ React Router / Redux     │
└────────────┬─────────────┘
             │
             │ Axios / HTTP
             ▼
┌──────────────────────────┐
│       Laravel API        │
│                          │
│ Sanctum / REST API       │
│ Eloquent ORM             │
└────────────┬─────────────┘
             │
             │ PDO / Eloquent
             ▼
┌──────────────────────────┐
│         MySQL 8          │
│        Database          │
└──────────────────────────┘
```

The application is organized into three Docker services:

```text
LEXIGAME/
│
├── frontend  → React + Vite
├── backend   → Laravel API
└── db        → MySQL 8
```

### Docker Ports

| Service  |   Port |
| -------- | -----: |
| Frontend | `5173` |
| Backend  | `8000` |
| MySQL    | `3307` |

---

## 🛠️ Tech Stack

### Frontend

* React 19
* Vite
* React Router
* Redux Toolkit
* React Redux
* Axios
* Lucide React
* JavaScript / JSX
* ESLint

### Backend

* PHP 8.3
* Laravel 12
* Laravel Sanctum
* Composer
* Eloquent ORM
* REST API

### Database

* MySQL 8

### DevOps & Tools

* Docker
* Docker Compose
* Git
* GitHub
* GitHub Actions

---

## 📁 Project Structure

```text
LEXIGAME/
│
├── .github/
│   └── workflows/
│       └── ci.yml
│
├── backend/
│   ├── app/
│   │   ├── Http/
│   │   └── Models/
│   │
│   ├── database/
│   │   ├── migrations/
│   │   └── seeders/
│   │
│   ├── routes/
│   │   ├── api.php
│   │   ├── console.php
│   │   └── web.php
│   │
│   ├── tests/
│   ├── public/
│   ├── resources/
│   ├── storage/
│   ├── Dockerfile
│   ├── composer.json
│   └── .env.example
│
├── frontend/
│   ├── src/
│   │   ├── axios/
│   │   ├── assets/
│   │   ├── components/
│   │   ├── pages/
│   │   ├── store/
│   │   ├── App.jsx
│   │   └── main.jsx
│   │
│   ├── public/
│   ├── Dockerfile
│   ├── package.json
│   └── vite.config.js
│
├── docker-compose.yml
└── README.md
```

---

## 🔌 API

The Laravel backend exposes a REST API for the main application resources.

### Authentication

```text
POST /api/register
POST /api/login
POST /api/logout
GET  /api/me
```

Authentication is handled using **Laravel Sanctum**.

### Products & Categories

```text
GET /api/produits
GET /api/produits/{id}
GET /api/produits/{id}/avis
GET /api/categories
```

### Main Resources

```text
Users
Products
Categories
Cart
Cart Items
Orders
Order Items
Payments
Deliveries
Reviews
Returns
```

Protected operations are controlled according to the authenticated user's role.

The API routes are defined in:

```text
backend/routes/api.php
```

---

## 🖥️ Frontend Routes

The React application contains routes for the main e-commerce features:

```text
/
├── /shop
├── /product/:id
├── /cart
├── /checkout
├── /order-success/:id
│
├── /login
├── /register
│
├── /dashboard
├── /vendor/dashboard
├── /admin/dashboard
│
├── /admin/add-product
├── /admin/add-category
└── /vendor/edit-product/:id
```

Client-side navigation is handled with **React Router**.

---

## 🐳 Running with Docker

### Requirements

Make sure you have:

* Git
* Docker Desktop
* Docker Compose

PHP, Composer, Node.js, and MySQL do not need to be installed separately when using the Docker development environment.

### 1. Clone the repository

```bash
git clone https://github.com/Joseph-Nostra/LEXIGAME.git
cd LEXIGAME
```

### 2. Configure Laravel

Create the local environment file:

```bash
cd backend
cp .env.example .env
```

For the Docker environment, configure the database connection:

```env
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=lexigame
DB_USERNAME=root
DB_PASSWORD=root
```

Return to the project root:

```bash
cd ..
```

### 3. Start the containers

```bash
docker compose up -d --build
```

Check the running services:

```bash
docker compose ps
```

### 4. Generate the Laravel application key

```bash
docker compose exec backend php artisan key:generate
```

### 5. Run database migrations

```bash
docker compose exec backend php artisan migrate
```

### 6. Access the application

```text
Frontend → http://localhost:5173
Backend  → http://localhost:8000
MySQL    → localhost:3307
```

### Stop the application

```bash
docker compose down
```

To remove the containers and database volume:

```bash
docker compose down -v
```

> ⚠️ Removing the volume deletes the persisted MySQL data.

---

## ⚙️ Environment Configuration

The backend uses Laravel's `.env` configuration.

The `.env` file is intentionally excluded from Git.

For Docker, the main database variables are:

```env
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=lexigame
DB_USERNAME=root
DB_PASSWORD=root
```

> These credentials are intended for the local development environment only.

Never commit real credentials, API keys, tokens, or production secrets to GitHub.

---

## 🗄️ Database

LEXIGAME uses **MySQL 8** through Docker Compose.

```text
Database: lexigame
Username: root
Password: root
Docker Host: db
Docker Port: 3306
Host Port: 3307
```

Database persistence is handled through the Docker volume:

```text
db_data
```

Run Laravel migrations with:

```bash
docker compose exec backend php artisan migrate
```

---

## 🧪 Testing

The Laravel backend includes automated tests using Laravel's testing tools.

Run the test suite:

```bash
docker compose exec backend php artisan test
```

---

## 🧹 Code Quality

The frontend uses ESLint.

Run linting:

```bash
cd frontend
npm install
npm run lint
```

Build the frontend:

```bash
npm run build
```

Preview the production build:

```bash
npm run preview
```

---

## 🔄 Continuous Integration

LEXIGAME uses **GitHub Actions** to validate changes automatically.

The CI workflow is located at:

```text
.github/workflows/ci.yml
```

### Frontend checks

```text
npm ci
npm run lint
npm run build
```

### Backend checks

```text
Composer dependencies
        ↓
Laravel environment
        ↓
Laravel tests
```

The CI workflow runs on pushes to the configured branches and on pull requests targeting `main`.

---

## 📌 Project Status

**Status: Active Development**

The current project includes:

* React frontend
* Laravel REST API
* MySQL database
* Laravel Sanctum authentication
* Role-based authorization
* Client dashboard
* Vendor dashboard
* Admin dashboard
* Product management
* Category management
* Shopping cart
* Checkout
* Orders
* Payment management
* Delivery management
* Reviews
* Returns
* Docker development environment
* GitHub Actions CI

---

## 🔮 Future Improvements

Potential improvements include:

* Online payment gateway integration
* Advanced product search and filtering
* Improved API validation and security
* Automated frontend tests
* Expanded backend test coverage
* Order tracking
* Advanced admin analytics
* Production-oriented Docker configuration
* Production deployment

---

## 👨‍💻 Author

**Youssef Zhar**

GitHub: **@Joseph-Nostra**

---

## 📄 License

This repository is developed as a personal and educational portfolio project.

The project uses open-source dependencies whose respective licenses apply.
