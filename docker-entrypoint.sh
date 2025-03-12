#!/bin/bash

# Exit immediately if a command exits with a non-zero status
set -e 

# Ensure the environment file exists
if [ ! -f /var/www/html/.env ]; then
    echo ".env file not found!"
    exit 1
fi

# Set correct permissions
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Wait for MySQL to be ready
until mysql -h "$DB_HOST" -u "$DB_USERNAME" -p"$DB_PASSWORD" "$DB_DATABASE" -e 'select 1' > /dev/null 2>&1; do
    echo "Waiting for MySQL to be ready..."
    sleep 5
done

echo "MySQL is ready. Starting the app..."

# Change directory to the Laravel root
cd /var/www/html

# Ensure storage and cache directories are set up correctly
mkdir -p storage/framework/{sessions,views,cache}
chmod -R 775 storage bootstrap/cache
chmod -R 777 /var/www/html/storage
chown -R www-data:www-data storage bootstrap/cache

# Run Laravel setup commands
composer install --no-interaction --optimize-autoloader
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run database migrations
php artisan migrate --force

# Ensure storage is linked
php artisan storage:link

# Start Apache (since you're using Apache, not PHP-FPM)
exec apache2-foreground
