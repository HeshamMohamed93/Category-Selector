<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Category Selector

Welcome to **Category Selector**! This Laravel project is designed to [auto generate category selector based on parent category selected dynamically].

## Getting Started

To get started with **Category Selector**, follow these instructions.

### Prerequisites

- PHP >= 8.0
- Composer
- MySQL database
- Node.js and NPM (optional, required for frontend assets)

### Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/HeshamMohamed93/Category-Selector.git
   cd Category-Selector

2. **Install PHP dependencies:**

   ```bash
   composer install
3. **Copy the environment file:**

    ```bash
    cp .env.example .env

4. **Generate an application key:**

   ```bash
   php artisan key:generate
   

5. **Configure the database:**

```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
```
6. **Run the migrations and seeders:**
    ```bash
    php artisan migrate
    php artisan db:seed
   
7. **Compile frontend assets:**
   ```bash
   npm install && npm run dev

8. **Run the development server:**
   ```bash
   php artisan serve
   
   

