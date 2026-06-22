# Xperts-Assesment
Assesment for mini CRM

## 🚀 Quick Start Guide (Using Laragon)

This project is optimized for deployment on a local **Laragon** development environment. Follow these steps to get the application up and running on your machine.

### Prerequisites
* **Laragon** installed (with PHP >= 8.2 and MySQL enabled)
* **Composer** global installation
* **Node.js & NPM**

---

### Step-by-Step Installation

### 1. Place the Project in Laragon
Clone or move this project folder directly into your root Laragon web directory:
```bash
C:\laragon\www\xperts-assesment

# Install PHP dependencies
composer install

# Install Tailwind/Vite dependencies
npm install

cp .env.example .env
php artisan key:generate
