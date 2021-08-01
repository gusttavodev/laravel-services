<?php

namespace App\Models\Order;

use App\Models\User\User;
use App\Models\User\WppUser;
use App\Models\Product\Product;
use App\Models\Order\OrderProduct;
use App\Models\Product\Additional;
use App\Models\Establishment\Address;
use Illuminate\Database\Eloquent\Model;
use App\Models\Establishment\Establishment;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    const MONEY   = 0;
    const CREDIT_CARD = 1;
    const DEBIT_CARD = 3;

    const PAYMENT_MODES = [
        self::MONEY   => 'Dinheiro',
        self::CREDIT_CARD => 'Cartão de Crédito',
        self::DEBIT_CARD => 'Cartão de Débito'
    ];

    const ON_ESTABLISHMENT   = 0;
    const ON_MY_ADDRESS = 1;

    const DELIVERY_MODES = [
        self::ON_ESTABLISHMENT   => 'Retirar No Local',
        self::ON_MY_ADDRESS => 'Receber No Meu Endereço'
    ];

    const CREATED   = 0;
    const ACCEPTED = 1;
    const STARTED = 2;
    const DELIVERY = 3;
    const COMPLETED = 4;

    const STATUSES = [
        self::CREATED   => 'Pedido Criado',
        self::ACCEPTED => 'Pedido Aceito',
        self::STARTED => 'Pedido Em Preparo',
        self::DELIVERY => 'Pedido Saiu Para Entrega',
        self::COMPLETED => 'Peido Completo',
    ];

    protected $fillable = [
        'contact_phone',
        'contact_name',
        'need_change',
        'change_price',
        'total_price',
        'tracking_link',
        'payment_mode',
        'status',
        'delivery_mode'
    ];

    public function establishment()
    {
        return $this->belongsTo(Establishment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function wppUser()
    {
        return $this->belongsTo(WppUser::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products')->withPivot('quantity', 'unity_price');
    }

    public function additionals()
    {
        return $this->belongsToMany(Additional::class, 'order_product_additionals')->withPivot('quantity', 'unity_price');
    }

    public function getAdditionalsTotalPriceAttribute()
    {
        return $this->additionals->sum(function ($additional) {
            return $additional->pivot->unity_price * $additional->pivot->quantity;
        });
    }

    public function getProductsTotalPriceAttribute()
    {
        return $this->products->sum(function ($product) {
            return $product->pivot->unity_price * $product->pivot->quantity;
        });
    }
}
