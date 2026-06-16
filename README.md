# OnlMart - Online Shopping Platform

OnlMart is a general-purpose, single-vendor e-commerce web application targeting customers within Nepal.

## Features

- User registration and login
- Product browsing by category with search and filters
- Shopping cart and wishlist management
- Checkout with eSewa and Cash on Delivery (COD) payment options
- Order history and tracking
- Product reviews and ratings
- Admin dashboard for product/order management

## Requirements

- PHP 8.2+
- MySQL 8.0+
- Composer
- XAMPP (for Windows development)

## Installation

### 1. Clone the Repository
```bash
git clone <your-repo-url>
cd OnlMart
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Database Setup

Create a MySQL database named `onlmart`:
```sql
CREATE DATABASE onlmart CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Or using XAMPP MySQL command line:
```bash
C:\xampp\mysql\bin\mysql.exe -u root -p -e "CREATE DATABASE onlmart CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

### 4. Configure Environment
Copy `.env.example` to `.env` (if not exists) and update database credentials:
```bash
# For MySQL (default)
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=onlmart
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Run Migrations
```bash
php artisan migrate
```

### 6. Seed Database (Optional)
```bash
php artisan db:seed
```

### 7. Create Admin User
Create an admin account via tinker:
```bash
php artisan tinker
>>> \App\Models\User::create(['name'=>'Admin','email'=>'admin@onlmart.com','password'=>bcrypt('password'),'role'=>'admin']);
```

### 8. Storage Link (for product images)
```bash
php artisan storage:link
```

## Running the Application

Start the development server:
```bash
php artisan serve
```

Or configure XAMPP Apache virtual host to point to the `public` directory.

Visit: http://localhost:8000 or http://localhost/onlmart

## eSewa Sandbox Configuration

The application uses eSewa sandbox credentials by default:
- **Merchant ID**: EPAYTEST
- **Test Mode**: Enabled

For production, update `.env`:
```
ESEWA_MERCHANT_ID=your_live_merchant_id
ESEWA_SUCCESS_URL=https://yourdomain.com/payment/esewa/success
ESEWA_FAILURE_URL=https://yourdomain.com/payment/esewa/failure
ESEWA_TEST_MODE=false
```

## Project Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── AuthController.php
│   │   ├── ProductController.php
│   │   ├── CartController.php
│   │   └── AdminController.php
├── Models/
│   ├── User.php
│   ├── Product.php
│   ├── Category.php
│   ├── Order.php
│   ├── OrderItem.php
│   ├── Review.php
│   ├── Wishlist.php
│   └── Coupon.php
resources/
└── views/
    ├── layouts/
    ├── products/
    ├── cart/
    ├── checkout/
    ├── auth/
    └── admin/
```

## License

MIT License