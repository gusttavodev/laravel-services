## AUTH

    https://laravel.com/docs/8.x/starter-kits#laravel-breeze

## PERMISSIONS

    https://spatie.be/docs/laravel-permission/v3/installation-laravel

## Artisan

    php artisan make:controller EstablishmentController --resource --model=Establishment
    php artisan make:controller PhotoController --api
    php artisan make:model Address --migration

# Factory

    Category::factory(1)->make(['user_id' => 1])
# Commandos
    Cria Factory InvoiceFactory na pasta Invoice
    php artisan make:factory Invoice\\InvoiceFactory
    
# Colocar Soft Delete em Products and categories

Falhando OS TESTES
CSRF token mismatch.


# Taks
    Adicionar telefone no user para uma possivel confirmação de compra do cliente via WPP
