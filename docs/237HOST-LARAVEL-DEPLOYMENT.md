# 237host / cPanel Laravel Deployment Guide

This guide explains how to deploy the Aetherian Cargo Laravel app on a 237host (or any cPanel/shared PHP) hosting plan.

## Requirements

- PHP 8.1 or higher
- `pdo_sqlite` PHP extension enabled
- `mbstring`, `openssl`, `tokenizer`, `xml`, `ctype`, `json`, `bcmath`, `fileinfo` extensions
- Composer (or the ability to run `composer install` via SSH/cPanel terminal)
- SSH/cPanel File Manager access

## 1. Upload / clone the code

Option A: clone from GitHub using the 237host terminal:

```bash
cd /home/YOUR_USERNAME/public_html
git clone --branch laravel --single-branch https://github.com/Mary-6/Track.git aetherian-cargo
```

Option B: download the ZIP from GitHub and upload it with cPanel File Manager, then extract it.

## 2. Point the domain to the Laravel `public` folder

Laravel's public files live in the `public` directory. Your web server must use that directory as the document root.

- In cPanel, open **Domains** or **Subdomains**.
- For the domain `aetheriancargo.com`, set the **Document Root** to `public_html/aetherian-cargo/public`.
- If your host does not let you change the document root, move the contents of the `public` folder into `public_html` and edit `index.php` so the two `require` paths point to the correct `vendor/autoload.php` and `bootstrap/app.php` files.

## 3. Install PHP dependencies

In the project root, run:

```bash
cd /home/YOUR_USERNAME/public_html/aetherian-cargo
composer install --no-dev --optimize-autoloader
```

If you do not have SSH access, you can run `composer install` locally, zip the `vendor` folder, and upload it.

## 4. Create the environment file

Copy `.env.example` to `.env`:

```bash
cp .env.example .env
```

Edit `.env` and set at least these values:

```ini
APP_NAME="Aetherian Cargo"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://aetheriancargo.com

# Use an absolute path to the SQLite file on the server.
# Replace /home/YOUR_USERNAME with your actual cPanel home directory.
DB_CONNECTION=sqlite
DB_DATABASE=/home/YOUR_USERNAME/public_html/aetherian-cargo/database/database.sqlite

SESSION_LIFETIME=120
```

Generate the application key:

```bash
php artisan key:generate
```

## 5. Create the SQLite database file

```bash
touch /home/YOUR_USERNAME/public_html/aetherian-cargo/database/database.sqlite
```

Make the `database` directory writable by the web server.

## 6. Run migrations and seed the admin user

```bash
php artisan migrate --force
php artisan db:seed --force
```

The default admin login is:

- Email: `admin@aetheriancargo.com`
- Password: `Hillman120`

Change the admin password after the first login.

## 7. Set folder permissions

```bash
chmod -R 755 storage bootstrap/cache
chmod -R 775 database
```

On some hosts the web server runs as a different user; if you see permission errors, try `777` for `storage` and `database` temporarily, then lock it down once it works.

## 8. Clear caches

```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
```

## 9. Optional: configure real email

The default mail settings use a placeholder. To send real emails (password resets, contact forms), edit `.env` with your SMTP credentials:

```ini
MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your-email@example.com
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@aetheriancargo.com
MAIL_FROM_NAME="Aetherian Cargo"
```

Then clear config cache:

```bash
php artisan config:clear
```

## 10. Visit the site

- Public site: `https://aetheriancargo.com`
- Admin login: `https://aetheriancargo.com/login`
- Admin credentials: `admin@aetheriancargo.com` / `Hillman120`

## Troubleshooting

- **404 on all pages**: the web server is not pointing to the `public` folder. Check the document root.
- **500 / storage not writable**: set `storage` and `bootstrap/cache` permissions to `775` or `777`.
- **SQLite file not found**: make sure `DB_DATABASE` in `.env` is an absolute path and the file exists.
- **Vite / CSS not loading**: the compiled assets are already in `public/build`; make sure `public/build` is present and the document root is `public`.
