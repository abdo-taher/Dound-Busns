# Dound Busns

A multi-module Laravel 10 platform for sports operations, combining:

- Public website pages and subscriptions
- Admin dashboard (system-wide management)
- Club dashboard (booking operations)
- Vendor dashboard (commerce operations)
- Mobile/API backend with Sanctum authentication

This repository contains backend, dashboard views, API routes, migrations, and seeders.

## Tech Stack

- **Backend:** PHP 8.1+, Laravel 10
- **Auth:** Laravel Sanctum (API)
- **Frontend tooling:** Vite, Tailwind CSS, Alpine.js
- **Database:** MySQL-compatible (via Laravel DB config)
- **Optional integrations:** Twilio SDK, QR code generation

## Core Domains (from codebase)

Main entities under `app/Models` include:

- Users, Admins, Clubs, Vendors
- Bookings, Orders, Carts, Refunds, Payment logs
- Products, Offers, Categories, Promo codes
- Posts, Reviews, Notes, Sliders, Settings
- Subscriptions and packages

Routing is segmented by responsibility:

- `routes/web.php` → website + admin dashboard
- `routes/club.php` → club dashboard
- `routes/vendor.php` → vendor dashboard
- `routes/api.php` → mobile/client API
- `routes/maintenance.php` → maintenance utility routes

## Feature Overview

### API

Key API capabilities in `routes/api.php`:

- User authentication (`register`, `login`, OTP verification, Google login)
- Countries/cities/currencies lookup
- Home content (`slider`, `setting`, terms)
- Product catalog and categories
- Club discovery + time slot generation + bookings + refunds + QR validation
- Cart and order workflows
- Reviews, posts (including reels and hashtags), notes

Authenticated endpoints are protected with `auth:sanctum`.

### Admin Dashboard

Key management areas in `routes/web.php`:

- Users, admins, clubs, vendors (CRUD + import/export + activation)
- Products, categories, offers, promo codes
- Orders and order-item status updates
- Payments to clubs/vendors
- Reports (booking/order)
- Website settings, sliders, posts, support, contacts, championships, partners

### Club Dashboard

`routes/club.php` provides:

- Club authentication and dashboard analytics
- Booking management and refund handling
- Branches and type categories
- Promo code management
- Wallet and payment logs
- Booking/places reports

### Vendor Dashboard

`routes/vendor.php` provides:

- Vendor authentication and dashboard analytics
- Product/category management
- Offer workflows
- Orders and fulfillment status
- Payment logs and wallet
- Reviews and sales reports

## Getting Started

### 1) Requirements

- PHP 8.1+
- Composer 2+
- Node.js 18+ and npm
- MySQL (or compatible DB)

### 2) Install dependencies

```bash
composer install
npm install
```

### 3) Environment setup

Create your `.env` file (if it does not exist) and configure:

- `APP_NAME="Dound Busns"`
- `APP_ENV=local`
- `APP_KEY=` (generate with artisan)
- `APP_URL=http://localhost`
- `DB_*` values
- `SANCTUM_STATEFUL_DOMAINS` as needed

Then run:

```bash
php artisan key:generate
```

### 4) Database setup

```bash
php artisan migrate --seed
```

### 5) Build assets

For development:

```bash
npm run dev
```

For production:

```bash
npm run build
```

### 6) Run the app

```bash
php artisan serve
```

Default local URL: `http://127.0.0.1:8000`

## Useful Commands

```bash
# Clear cached config/routes/views
php artisan optimize:clear

# Run tests
php artisan test

# Regenerate autoload
composer dump-autoload
```

## Project Structure (high-level)

- `app/Http/Controllers` → API and dashboard controllers
- `app/Models` → domain entities
- `database/migrations` → schema
- `database/seeders` → initial data
- `resources/views` → Blade templates
- `routes/*.php` → route segmentation by module

## Deployment Notes

- Set `APP_ENV=production` and `APP_DEBUG=false`
- Cache configs/routes/views after deployment:

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

- Ensure storage symlink exists:

```bash
php artisan storage:link
```

## Security & Operations

- Keep `.env` out of version control
- Rotate API keys and third-party credentials regularly
- Restrict direct access to maintenance utility routes in production
- Use HTTPS and secure cookie/session settings

## License

This project is provided under the MIT License unless your organization policy specifies otherwise.
