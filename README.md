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

# Images URL
- http://localhost:8000/imagecache/medium/productPicture/JBBv848R52rLhcwp1kZDzJbMo7WH6rrjq5KoA7DV.jpg
- http://localhost:8000/storage/images/productPicture/JBBv848R52rLhcwp1kZDzJbMo7WH6rrjq5KoA7DV.jpg


# Descrição
    É um sistema de ecommerce onde um user registra Categorias -> Produtos -> Adicionais (Exemplo Açai -> Creme de Açai -> (Leite Condensado, Nutella, Granola))
    Esse mesmo user cria um Estabelecimento que vai ter informações sobre a loja dele
    Cada loja tem uma pagina publica com suas informações, onde são renderizados os Produtos.

# TODO(A parte de order ainda não está complete)
    - Na order preciso salvar os produtos da order e seus adicionais

