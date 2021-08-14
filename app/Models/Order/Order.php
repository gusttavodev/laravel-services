<?php

namespace App\Models\Order;

use App\Models\Establishment\Address;
use App\Models\Establishment\Establishment;
use App\Models\Product\Additional;
use App\Models\Product\Product;
use App\Models\User\User;
use App\Models\User\WppUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public const MONEY       = 0;
    public const CREDIT_CARD = 1;
    public const DEBIT_CARD  = 3;

    public const PAYMENT_MODES = [
        self::MONEY       => 'Dinheiro',
        self::CREDIT_CARD => 'Cartão de Crédito',
        self::DEBIT_CARD  => 'Cartão de Débito',
    ];

    public const ON_ESTABLISHMENT   = 0;
    public const ON_MY_ADDRESS      = 1;

    public const DELIVERY_MODES = [
        self::ON_ESTABLISHMENT   => 'Retirar No Local',
        self::ON_MY_ADDRESS      => 'Receber No Meu Endereço',
    ];

    public const CREATED   = 0;
    public const ACCEPTED  = 1;
    public const STARTED   = 2;
    public const DELIVERY  = 3;
    public const COMPLETED = 4;

    public const STATUSES = [
        self::CREATED   => 'Pedido Criado',
        self::ACCEPTED  => 'Pedido Aceito',
        self::STARTED   => 'Pedido Em Preparo',
        self::DELIVERY  => 'Pedido Saiu Para Entrega',
        self::COMPLETED => 'Peido Completo',
    ];

    public const STATUSES_LIST = [
        self::CREATED   => [
            'label'     => self::STATUSES[self::CREATED],
            'value'     => self::CREATED,
            'completed' => false,
        ],
        self::ACCEPTED   => [
            'label'     => self::STATUSES[self::ACCEPTED],
            'value'     => self::ACCEPTED,
            'completed' => false,
        ],
        self::STARTED   => [
            'label'     => self::STATUSES[self::STARTED],
            'value'     => self::STARTED,
            'completed' => false,
        ],
         self::DELIVERY   => [
            'label'     => self::STATUSES[self::DELIVERY],
            'value'     => self::DELIVERY,
            'completed' => false,
        ],
        self::COMPLETED   => [
            'label'     => self::STATUSES[self::COMPLETED],
            'value'     => self::COMPLETED,
            'completed' => false,
        ],
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
        'delivery_mode',

        'user_id',
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
        return $this->belongsTo(Address::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products')->withPivot('quantity', 'unity_price');
    }

    public function additionals()
    {
        return $this->belongsToMany(Additional::class, 'order_product_additionals')->withPivot('quantity', 'unity_price');
    }

    public function statusChanges()
    {
        return $this->hasMany(OrderStatusChanges::class);
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
