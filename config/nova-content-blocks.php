<?php

return [
    'available_fields' => [
        'headline',
        'text',
        'images',
        'images_caption',
        'button_links',
        'images_position',
    ],

    'layouts' => [
        'text' => [
            'label' => 'text',
            'fields' => ['headline', 'text', 'button_links'],
        ],
        'images' => [
            'label' => 'images',
            'fields' => ['headline', 'images', 'images_caption', 'button_links'],
        ],
        'text_images' => [
            'label' => 'text and images',
            'fields' => ['headline', 'text', 'images', 'images_caption', 'button_links', 'images_position'],
        ],
    ]
];
