#!/bin/bash

# Exit immediately if a command exits with a non-zero status
set -e 

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

# Run database migrations
php artisan migrate --force

# Ensure storage is linked
php artisan storage:link

# Start Apache (since you're using Apache, not PHP-FPM)
exec apache2-foreground