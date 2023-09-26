<?php

return [
    'data_rows'  => [
        'avatar'           => 'Avatar',
        'body'             => 'Body',
        'category'         => 'Category',
        'id'               => 'ID',
        'slug'             => 'Slug',
        'order'            => 'Order',
        'title'            => 'Title',
        'updated_at'       => 'Updated At',
        'created_at'       => 'Created At',
        'fd24_id'          => 'Frontdesk24 Id',
        'description'      => 'Description',
        'picture'          => 'Picture',
        'pictures'         => 'Pictures',
        'category_id'      => 'Category Id',
        'room_type_id'     => 'Room type Id',
        'type'             => 'Type',
        'name'             => 'Name',
        'last_name'        => 'Last name',
        'date_of_birth'    => 'Date of birth',
        'email'            => 'Email',
        'phone'            => 'Phone',
        'contact_id'       => 'Contact',
        'contact'          => 'Contact',
        'paysystem_id'     => 'Payment method',
        'paysystem'        => 'Payment method',
        'rooms'            => 'Rooms',
        'date_in'          => 'Date in',
        'time_in'          => 'Time in',
        'date_out'         => 'Date out',
        'time_out'         => 'Time out',
        'text'             => 'Text',
        'features'         => 'Features',
        'rooms_beds'       => 'Beds',
    ],
    'data_types' => [
        'category' => [
            'singular' => 'Category',
            'plural'   => 'Categories',
        ],
        'paysystem' => [
            'singular' => 'Method',
            'plural'   => 'Methods',
        ],
        'menu'     => [
            'singular' => 'Menu',
            'plural'   => 'Menus',
        ],
        'room'     => [
            'singular' => 'Room',
            'plural'   => 'Rooms',
        ],
        'room_type'     => [
            'singular' => 'Type',
            'plural'   => 'Types',
        ],
        'feature'     => [
            'singular' => 'Feature',
            'plural'   => 'Features',
        ],
        'contact'     => [
            'singular' => 'Contact',
            'plural'   => 'Contacts',
        ],
        'booking'     => [
            'singular' => 'Booking',
            'plural'   => 'Bookings',
        ],
        'localization'     => [
            'singular' => 'Translation',
            'plural'   => 'Translations',
        ],
        'locale'       => [
            'singular' => 'Locale',
            'plural'   => 'Locales',
        ],
    ],
    'menu_items' => [
        'categories'   => 'Categories',
        'paysystems'    => 'Payment methods',
        'rooms'        => 'Rooms',
        'dictionaries' => 'Dictionaries',
        'features'     => 'Features',
        'types'        => 'Room types',
        'contacts'     => 'Contacts',
        'bookings'     => 'Bookings',
        'translations' => 'Translations',
        'locales'      => 'Locales',
    ],
    'data' => [
        'categories' => [
            'capsules' => [
                'title' => 'Capsules',
            ],
            'rooms' => [
                'title' => 'Rooms',
            ],
        ],
        'room_types' => [
            'upper' => [
                'title' => 'Upper',
            ],
            'lower' => [
                'title' => 'Lower',
            ],
            'paysystems' => [
                'terminal' => [
                    'title' => 'Payment by card',
                ],
            ],
        ],
        'features' => [
            'beverages' => [
                'title' => 'Beverages',
                'image' => 'features/beverages.png',
            ],
            'conditioner' => [
                'title' => 'Conditioner',
                'image' => 'features/conditioner.png',
            ],
            'refrigerator' => [
                'title' => 'Refrigerator',
                'image' => 'features/refrigerator.png',
            ],
            'wifi' => [
                'title' => 'wi-fi',
                'image' => 'features/wifi.png',
            ],
        ],
    ],
    'settings' => [
        'admin' => [
            'description' => 'Welcome.'
        ]
    ]
];
