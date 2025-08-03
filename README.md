# Mio Project

Dự án được xây dựng trên nền tảng Laravel 11 với Vite và Tailwind CSS.

## Yêu cầu hệ thống

- PHP >= 8.2
- Composer
- Node.js >= 16
- NPM hoặc Yarn
- MySQL/PostgreSQL/SQLite

## Cài đặt

1. Clone dự án:
```bash
git clone <repository-url>
cd mio
```

2. Cài đặt các dependencies PHP:
```bash
composer install
```

3. Cài đặt các dependencies JavaScript:
```bash
npm install
# hoặc
yarn install
```

4. Cấu hình môi trường:
```bash
cp .env.example .env
php artisan key:generate
```

5. Cấu hình database trong file `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

6. Chạy migrations:
```bash
php artisan migrate
```

## Phát triển

1. Chạy server development:
```bash
# Terminal 1 - Laravel server
php artisan serve

# Terminal 2 - Vite server
npm run dev
# hoặc
yarn dev
```

Hoặc sử dụng lệnh dev tích hợp:
```bash
composer dev
```
Lệnh này sẽ chạy đồng thời:
- Laravel server
- Queue listener
- Log viewer (Pail)
- Vite development server

## Triển khai

1. Build assets cho production:
```bash
npm run build
# hoặc
yarn build
```

2. Tối ưu hóa autoloader:
```bash
composer install --optimize-autoloader --no-dev
```

3. Cache các cấu hình:
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## Tính năng

- Authentication (Laravel Breeze)
- Tailwind CSS cho styling
- Alpine.js cho JavaScript
- Tom Select cho select inputs
- Laravel Breadcrumbs
- Laravel Pail cho log viewer
- Laravel Sail cho Docker development

## Testing

```bash
php artisan test
```

## License

[MIT License](LICENSE)
