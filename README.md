# 🏠 Home Service Platform (Laravel 12 + Filament v4)

[![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?logo=laravel&logoColor=white)](https://laravel.com)
[![Filament](https://img.shields.io/badge/Filament-v3-16A34A)](https://filamentphp.com)
[![PHP](https://img.shields.io/badge/PHP-%5E8.1-777BB4?logo=php&logoColor=white)]()
[![License](https://img.shields.io/badge/License-MIT-blue.svg)]()
[![Status](https://img.shields.io/badge/Status-Active-success)]()

A clean, role‑based platform that connects **service providers** with **users**.  
Built with **Laravel 12** and **Filament v4** for a powerful, modern admin experience.

> **TL;DR (بالمصري):** البروفايدر بيسجل ويدخل يضيف خدمته. اليوزر يتفرّج ويكلم البروفايدر.  
> في ميزة **Premium** (قدّام شوية) علشان البروفايدر يقدر يضيف أكتر من خدمة لو اشترك.

---

## 📚 Table of Contents
- [Overview](#-overview)
- [Core Features](#-core-features)
- [Roles & Permissions](#-roles--permissions)
- [Data Model](#-data-model)
- [Tech Stack](#-tech-stack)
- [Getting Started](#-getting-started)
- [Usage Guide](#-usage-guide)
- [Admin (Filament)](#-admin-filament)
- [API Endpoints (Optional)](#-api-endpoints-optional)
- [Roadmap / Future Work](#-roadmap--future-work)
- [Project Structure](#-project-structure)
- [Contributing](#-contributing)
- [Security](#-security)
- [License](#-license)
- [Author](#-author)

---

## 🚀 Overview
This is a **Home Services** platform where:
- **Providers** authenticate and create their **provider profile**, then **add services**.
- **Users** can **browse** services and **contact providers** (e.g., WhatsApp).
- **Admin** manages everything from a **Filament v4** dashboard.

> Current scope: Provider login is implemented; **User login is not required** for browsing/contacts.  
> A **Premium** subscription button exists (UI only for now) to allow adding multiple services in the future.

---

## ✨ Core Features
- 🔐 **Authentication**
  - **Provider login** to add/manage services.
  - Role-based authorization (**admin**, **provider**, **user**).

- 👨‍🔧 **Provider Management**
  - Create/Edit Provider profile linked to a user with role `provider`.
  - Add one or more services (multi-service via **Premium** in roadmap).

- 🛠 **Service Management**
  - CRUD on `services` including: `name`, `description`, `price`, `image`.

- 🖥 **Admin Dashboard (Filament v3)**
  - Manage **Users**, **Providers**, **Services** with clean resources.

- 📞 **User Interaction**
  - Public pages to **view** services and **contact** providers directly.

- 💎 **Premium (Planned)**
  - Subscription flow to unlock **multiple services per provider**.

---

## 🛡 Roles & Permissions
Basic roles:
- `admin` → Full access via Filament dashboard.
- `provider` → Can create provider profile and manage own services.
- `user` → Browse services and contact providers (no login required by default).

> Use your preferred package/policy setup. Example: Gate/Policy checks on `Service` and `Provider` models.

---

## 🧱 Data Model
Core tables (simplified):

```
users
- id, name, email, password, role, phone, created_at, updated_at

providers
- id, user_id (FK -> users.id)
- bio, image, created_at, updated_at

services
- id, provider_id (FK -> providers.id)
- name, description, price, image, created_at, updated_at
```

Relations:
- `User (role=provider)` 1 ── 1 `Provider`
- `Provider` 1 ── n `Service`

> Enforce ownership (e.g., a provider can only CRUD their own services).

---

## 🧰 Tech Stack
- **Backend:** Laravel 12 (PHP ^8.1)
- **Admin Panel:** Filament v4
- **Database:** MySQL or MariaDB
- **Views:** Blade (Bootstrap/Tailwind – your choice)
- **Auth:** Laravel Breeze/Fortify/Default Guards (as implemented)
- **Media:** Local storage (configurable to S3 later)

---

## 🟢 Getting Started

### 1) Clone
```bash
git clone https://github.com/<your-username>/home-service.git
cd home-service
```

### 2) Install Dependencies
```bash
composer install
npm install && npm run dev
```

### 3) Environment
```bash
cp .env.example .env
php artisan key:generate
```

Update your `.env`:
```
APP_NAME="Home Service"
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=home_service
DB_USERNAME=root
DB_PASSWORD=

FILESYSTEM_DISK=public
```

### 4) Migrate (and optionally seed)
```bash
php artisan migrate
# php artisan db:seed  # if you add seeders
```

### 5) Storage Symlink (for images)
```bash
php artisan storage:link
```

### 6) Run
```bash
php artisan serve
```

---

## 🧭 Usage Guide

### Roles
- **Admin**: access Filament dashboard to manage users/providers/services.
- **Provider**: login → create provider profile → add service(s).
- **User**: browse providers/services and contact via WhatsApp/call.

### Provider Flow Summary
1. Register/Login as provider (role = `provider`).
2. Complete provider profile.
3. Add a service (name, description, price, image).
4. (Future) Upgrade to **Premium** to add multiple services.

### Example WhatsApp Link
```html
<a href="https://wa.me/{{ $provider->phone }}" target="_blank" class="btn btn-outline-success w-100">
    <i class="bi bi-whatsapp"></i> Contact on WhatsApp
</a>
```

> Make sure `phone` is in international format without leading `+` or zeros (e.g., `2011XXXXXXX`).

---

## 🧑‍💼 Admin (Filament)

- **Resources**: `UserResource`, `ProviderResource`, `ServiceResource`.
- **Policies**: Guard provider actions to their own records.
- **Navigation**: Group resources and add quick actions/widgets as needed.
- **Branding**: Customize Filament theme, colors, and login branding.

> Filament v4 docs: https://filamentphp.com/docs

---

## 🔌 API Endpoints (Optional)
If you expose an API (for mobile later), suggested endpoints:

```
GET   /api/services                # list services
GET   /api/services/{id}           # show service
GET   /api/providers               # list providers
GET   /api/providers/{id}          # show provider

POST  /api/provider/services       # create (auth: provider)
PUT   /api/provider/services/{id}  # update own service (auth: provider)
DELETE/api/provider/services/{id}  # delete own service (auth: provider)
```

> Secure with **Laravel Sanctum** if needed.

---

## 🗺 Roadmap / Future Work
- 💳 **Premium Subscription** (Fawry/Stripe) → Allow multiple services per provider.
- ⭐ **Ratings & Reviews** for providers.
- 📅 **Bookings & Scheduling** with availability.
- 🔔 **Notifications** (email/in-app) for new requests/bookings.
- 🖼 **Gallery** for provider portfolios.
- 🌐 **Localization (ar/en)** and SEO improvements.

---

## 🧱 Project Structure
```
app/
  Http/Controllers/
  Models/ (User.php, Provider.php, Service.php)
  Policies/
  Providers/
  Filament/ (Resources, Pages, Widgets)

database/
  migrations/
  seeders/

public/
resources/
  views/ (Blade templates)
routes/
  web.php
  api.php

storage/
```

---

## 🤝 Contributing
Pull Requests are welcome. For major changes, please open an issue to discuss what you would like to change.

**Coding style guides**
- Follow PSR-12 for PHP.
- Use Eloquent relationships & policies for authorization.
- Keep controllers thin; push logic to services/policies as needed.

---

## 🔐 Security
If you discover a security vulnerability, please open a private issue or contact the maintainer directly.

---

## 📄 License
This project is open-sourced under the **MIT license**.

---

## 👤 Author
**Mostafa ElKholy**  
- Email: mostafaelkholy4321@gmail.com  
- GitHub: https://github.com/mostafaelkholy50  
- Portfolio: https://mostafa-elkholy.vercel.app
