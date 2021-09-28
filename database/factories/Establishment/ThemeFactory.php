<?php

namespace Database\Factories\Establishment;

use App\Models\Establishment\Theme;
use Illuminate\Database\Eloquent\Factories\Factory;

class ThemeFactory extends Factory
{
    protected $model = Theme::class;

    public function definition()
    {
        return [
            'name'   => $this->faker->name(),
            'colors' => [
                'info_bg'           => '#111827',
                'time_bg'           => '#6600cc',
                'info_txt'          => '#FFFFFF',
                'price_bg'          => '#6EBD51',
                'time_txt'          => '#F9FAFB',
                'button_bg'         => '#6600cc',
                'footer_bg'         => '#111827',
                'header_bg'         => '#111827',
                'info_icon'         => '#6600cc',
                'price_txt'         => '#F9FAFB',
                'button_txt'        => '#FFFFFF',
                'counter_bg'        => '#6EBD51',
                'footer_txt'        => '#F9FAFB',
                'general_bg'        => '#C8CFDE',
                'header_txt'        => '#9f74c9',
                'info_title'        => '#FFFFFF',
                'product_bg'        => '#111827',
                'counter_txt'       => '#F9FAFB',
                'footer_icon'       => '#6600cc',
                'general_txt'       => '#FFFFFF',
                'header_icon'       => '#6600cc',
                'product_txt'       => '#FFFFFF',
                'button_hover'      => '#9f74c9',
                'footer_title'      => '#6600cc',
                'general_icon'      => '#6600cc',
                'header_title'      => '#FFFFFF',
                'product_icon'      => '#FFFFFF',
                'general_title'     => '#FFFFFF',
                'product_title'     => '#FFFFFF',
                'info_separator'    => '#9f74c9',
                'product_separator' => '#9f74c9',
            ],
        ];
    }
}
