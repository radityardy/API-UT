# Laravel Back-End API

This project is a Laravel-based back-end API for managing products and their categories. It includes authentication and CRUD operations for products and categories.

## Getting Started

### Prerequisites

- PHP >= 7.3
- Composer
- Laravel
- MySQL or any other supported database

### Installation

1. Clone the repository:
   ```sh
   git clone https://github.com/your-username/your-repo-name.git
   cd your-repo-name
   ```

2. Install dependencies:
   ```sh
   composer install
   ```

3. Copy the `.env.example` file to `.env` and configure your environment variables:
   ```sh
   cp .env.example .env
   ```

4. Generate the application key:
   ```sh
   php artisan key:generate
   ```

5. Run the database migrations:
   ```sh
   php artisan migrate
   ```

6. Seed the database (optional):
   ```sh
   php artisan db:seed
   ```

7. Start the development server:
   ```sh
   php artisan serve
   ```

### API Endpoints

#### Authentication

- **Login**
  - **Method:** POST
  - **URL:** `/login`
  - **Body:**
    ```json
    {
      "email": "user@example.com",
      "password": "password"
    }
    ```

- **Register**
  - **Method:** POST
  - **URL:** `/register`
  - **Body:**
    ```json
    {
      "name": "John Doe",
      "email": "john@example.com",
      "password": "password",
      "password_confirmation": "password"
    }
    ```

#### Category Products

- **Get All Category Products**
  - **Method:** GET
  - **URL:** `/category-products`

- **Create a Category Product**
  - **Method:** POST
  - **URL:** `/category-products`
  - **Body:**
    ```json
    {
      "name": "Category Name"
    }
    ```

- **Update a Category Product**
  - **Method:** PUT
  - **URL:** `/category-products/{id}`
  - **Body:**
    ```json
    {
      "name": "Updated Category Name"
    }
    ```

- **Delete a Category Product**
  - **Method:** DELETE
  - **URL:** `/category-products/{id}`

#### Products

- **Get All Products**
  - **Method:** GET
  - **URL:** `/products`

- **Create a Product**
  - **Method:** POST
  - **URL:** `/products`
  - **Body:**
    ```json
    {
      "name": "Product Name",
      "price": 100,
      "description": "Product Description",
      "category_product_id": 1
    }
    ```

- **Get a Product by ID**
  - **Method:** GET
  - **URL:** `/products/{id}`

- **Update a Product**
  - **Method:** PUT
  - **URL:** `/products/{id}`
  - **Body:**
    ```json
    {
      "name": "Updated Product Name",
      "price": 150,
      "description": "Updated Product Description",
      "category_product_id": 1
    }
    ```

- **Delete a Product**
  - **Method:** DELETE
  - **URL:** `/products/{id}`

## Models

### Product

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'category_product_id',
    ];

    public function categoryProduct()
    {
        return $this->belongsTo(CategoryProduct::class);
    }
}
```

### CategoryProduct

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
```

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
