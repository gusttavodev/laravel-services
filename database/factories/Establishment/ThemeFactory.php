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
            'name' => $this->faker->name(),

            'colors' => [
                'general_title'          => '#1ca4e6',
                'general_txt'            => '#162FA1',
                'general_bg'             => '#111827',
                'general_icon'           => '#111827',

                'header_title'     => '#6600cc',
                'header_txt'       => '#9f74c9',
                'header_bg'        => '#F3F4F6',
                'header_icon'      => '#50ed17',

                'info_title'          => '#F9FAFB',
                'info_txt'            => '#111827',
                'info_bg'             => '#111827',
                'info_icon'           => '#111827',
                'info_separator'      => '#111827',

                'product_title'                    => '#F9FAFB',
                'product_txt'                      => '#111827',
                'product_bg'                       => '#111827',
                'product_icon'                     => '#111827',
                'product_separator'                => '#111827',

                'footer_title'                     => '#F9FAFB',
                'footer_txt'                       => '#111827',
                'footer_bg'                        => '#111827',
                'footer_icon'                      => '#111827',

                'time_txt'                           => '#F9FAFB',
                'time_bg'                            => '#111827',

                'button_txt'                            => '#111827',
                'button_bg'                             => '#111827',
                'button_hover'                          => '#111827',

                'counter_txt'                              => '#111827',
                'counter_bg'                               => '#111827',

                'price_txt'                              => '#111827',
                'price_bg'                               => '#111827',
            ],
        ];
    }
}
