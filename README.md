# 🎮 LEXIGAME

**LEXIGAME** is a full-stack e-commerce web application built with **React** and **Laravel**, with a **MySQL** database and a fully containerized development environment using **Docker Compose**.

The application provides separate experiences for **clients, vendors, and administrators**, with authentication, product management, shopping cart, orders, payments, deliveries, reviews, returns, and dedicated dashboards.

---

## ✨ Features

### 👤 Authentication & Users

* User registration and login
* Authentication with Laravel Sanctum
* Logout and authenticated user profile
* Role-based access control
* Support for three main roles:

  * Client
  * Vendor
  * Administrator

### 🛍️ Customer Experience

* Browse products
* View product details
* Browse product categories
* Product reviews
* Shopping cart
* Cart synchronization
* Checkout
* Order management
* Payment management
* Delivery information
* Return requests

### 🏪 Vendor Features

* Vendor dashboard
* Product creation
* Product modification
* Product deletion requests
* Product management
* Vendor orders
* Vendor return requests
* Category management

### 🛠️ Administration

* Admin dashboard
* User management
* Product approval and rejection
* Product deletion approval
* Return request approval/rejection
* Review management
* Category management

---

## 🧱 Architecture

```text
                        ┌─────────────────────┐
                        │      React          │
                        │     Frontend        │
                        │      Vite           │
                        └──────────┬──────────┘
                                   │
                              Axios / HTTP
                                   │
                                   ▼
                        ┌─────────────────────┐
                        │      Laravel        │
                        │       API           │
                        │  Sanctum Auth       │
                        └──────────┬──────────┘
                                   │
                                   │ Eloquent / PDO
                                   ▼
                        ┌─────────────────────┐
                        │       MySQL         │
                        │      Database       │
                        └─────────────────────┘
```

The application is split into three Docker services:

```text
LEXIGAME
│
├── frontend  → React + Vite
│
├── backend   → Laravel API
│
└── db        → MySQL 8
```

Docker Compose exposes the Laravel backend on port `8000`, the React/Vite frontend on port `5173`, and MySQL on host port `3307`.

---

## 🚀 Tech Stack

### Frontend

* React 19
* Vite
* React Router
* Redux Toolkit
* React Redux
* Axios
* Lucide React
* ESLint
* JavaScript / JSX

The frontend dependencies and scripts are defined in `frontend/package.json`.

### Backend

* PHP 8.3
* Laravel 12
* Laravel Sanctum
* Composer
* Eloquent ORM
* REST API

The backend uses Laravel 12 and Sanctum for API authentication.

### Database

* MySQL 8

The Docker configuration creates a `lexigame` database and persists its data through a Docker volume.

### DevOps

* Docker
* Docker Compose
* Git
* GitHub

---

## 📁 Project Structure

```text
LEXIGAME/
│
├── backend/
│   ├── app/
│   │   ├── Http/
│   │   ├── Models/
│   │   └── ...
│   ├── database/
│   │   ├── migrations/
│   │   └── seeders/
│   ├── routes/
│   │   ├── api.php
│   │   ├── console.php
│   │   └── web.php
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
│   ├── public/
│   ├── Dockerfile
│   ├── package.json
│   └── vite.config.js
│
└── docker-compose.yml
```

---

## 🔌 API

The Laravel backend exposes REST API endpoints for the main application resources.

### Public endpoints

```text
POST /api/register
POST /api/login

GET /api/produits
GET /api/produits/{id}
GET /api/produits/{id}/avis
GET /api/categories
```

### Authentication

Authenticated users can access:

```text
POST /api/logout
GET  /api/me
```

Authentication is handled using **Laravel Sanctum**.

### Main resources

The API provides endpoints for:

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

Access to specific operations is controlled according to the user's role.

For example:

```text
Admin
 ├── User management
 ├── Product approval
 ├── Product deletion approval
 ├── Return approval/rejection
 └── Review management

Vendor
 ├── Product management
 ├── Categories
 ├── Orders
 └── Returns

Client
 ├── Cart
 ├── Orders
 ├── Reviews
 └── Returns
```

The role-based API structure is implemented in `backend/routes/api.php`.

---

## 🖥️ Frontend Routes

The React application currently contains routes for:

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

The application uses **React Router** for client-side navigation.

---

## 🐳 Running with Docker

### Requirements

Make sure you have installed:

* Docker
* Docker Compose
* Git

### 1. Clone the repository

```bash
git clone https://github.com/Joseph-Nostra/LEXIGAME.git
cd LEXIGAME
```

### 2. Start the containers

```bash
docker compose up --build
```

This will build and start:

```text
frontend → http://localhost:5173
backend  → http://localhost:8000
mysql    → localhost:3307
```

The ports and services are defined in `docker-compose.yml`.

### 3. Run in detached mode

```bash
docker compose up -d --build
```

### 4. Stop the application

```bash
docker compose down
```

### 5. Stop and remove the database volume

⚠️ This removes the persisted MySQL data:

```bash
docker compose down -v
```

---

## ⚙️ Environment Configuration

The Laravel backend contains an `.env.example` file.

Create your local environment file:

```bash
cd backend
cp .env.example .env
```

Then configure the application according to your environment.

For the Docker setup, the database service uses:

```env
DB_HOST=db
DB_DATABASE=lexigame
DB_USERNAME=root
DB_PASSWORD=root
```

These values correspond to the MySQL service defined in `docker-compose.yml`.

Generate the Laravel application key:

```bash
php artisan key:generate
```

> **Note:** Never commit your real `.env` file or sensitive credentials to GitHub.

---

## 🗄️ Database

LEXIGAME uses **MySQL 8** in Docker.

The database is configured as:

```text
Database: lexigame
Username: root
Password: root
Host: db
Port inside Docker: 3306
Port from host: 3307
```

Docker Compose stores MySQL data in the `db_data` volume so that database data can persist between container restarts.

Laravel migrations can be executed with:

```bash
docker compose exec backend php artisan migrate
```

---

## 🧪 Testing

The Laravel backend includes PHPUnit configuration and Laravel's testing tools.

Run the backend test suite with:

```bash
docker compose exec backend php artisan test
```

The Composer configuration also defines a `test` script for Laravel tests.

---

## 🧹 Code Quality

The frontend provides an ESLint configuration and linting script:

```bash
cd frontend
npm run lint
```

Build the production frontend:

```bash
npm run build
```

Preview the production build:

```bash
npm run preview
```

These scripts are defined in the frontend `package.json`.

---

## 📌 Project Status

**Status:** Active development

The project currently contains the main e-commerce architecture with:

* React frontend
* Laravel REST API
* MySQL database
* Authentication
* Role-based access
* Client, vendor and admin dashboards
* Product and category management
* Cart and checkout
* Orders
* Payments
* Deliveries
* Reviews
* Returns
* Dockerized development environment

---

## 🔮 Possible Improvements

Future improvements may include:

* Online payment gateway integration
* Improved API validation and security
* Automated frontend tests
* Expanded backend test coverage
* Advanced product search and filtering
* Order tracking
* Improved admin analytics
* Production-oriented Docker configuration
* CI/CD with GitHub Actions
* Production deployment documentation

---

## 👨‍💻 Author

**Youssef Zhar**

GitHub: [@Joseph-Nostra](https://github.com/Joseph-Nostra)

---

## 📄 License

This project is developed as a personal/educational portfolio project.

The Laravel backend itself is based on the Laravel framework and its project configuration specifies the MIT license.
