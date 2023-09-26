<?php

return [
    'data_rows'  => [
        'avatar'           => 'Аватар',
        'description'      => 'Описание',
        'category'         => 'Категория',
        'id'               => 'ID',
        'slug'             => 'Код',
        'order'            => 'Сортировка',
        'title'            => 'Название',
        'updated_at'       => 'Дата изменения',
        'created_at'       => 'Дата создания',
        'fd24_id'          => 'Frontdesk24 код',
        'picture'          => 'Изображение',
        'pictures'         => 'Изображения',
        'category_id'      => 'Категория',
        'room_type_id'     => 'Тип',
        'type'             => 'Тип',
        'name'             => 'Имя',
        'last_name'        => 'Фамилия',
        'date_of_birth'    => 'Дата рождения',
        'email'            => 'Электронная почта',
        'phone'            => 'Номер телефона',
        'contact_id'       => 'Контакт',
        'contact'          => 'Контакт',
        'paysystem_id'     => 'Способ оплаты',
        'paysystem'        => 'Способ оплаты',
        'rooms'            => 'Номера',
        'date_in'          => 'Дата заезда',
        'time_in'          => 'Время заезда',
        'date_out'         => 'Дата выезда',
        'time_out'         => 'Время выезда',
        'text'             => 'Текст',
        'features'         => 'Особенности',
        'rooms_beds'       => 'Спальные места',
    ],
    'data_types' => [
        'category' => [
            'singular' => 'Категория',
            'plural'   => 'Категории',
        ],
        'paysystems' => [
            'singular' => 'Способы',
            'plural'   => 'Способ',
        ],
        'menu'     => [
            'singular' => 'Меню',
            'plural'   => 'Меню',
        ],
        'room'     => [
            'singular' => 'Номер',
            'plural'   => 'Номера',
        ],
        'room_type'     => [
            'singular' => 'Тип',
            'plural'   => 'Типы',
        ],
        'feature'     => [
            'singular' => 'Особенность',
            'plural'   => 'Особенности',
        ],
        'contact'     => [
            'singular' => 'Контакт',
            'plural'   => 'Контакты',
        ],
        'booking'     => [
            'singular' => 'Бронирование',
            'plural'   => 'Бронирования',
        ],
        'translation'     => [
            'singular' => 'Перевод',
            'plural'   => 'Переводы',
        ],
        'locale'     => [
            'singular' => 'Язык',
            'plural'   => 'Языки',
        ],
    ],
    'menu_items' => [
        'categories'   => 'Категории',
        'contacts'     => 'Контакты',
        'paysystems'   => 'Способы оплаты',
        'rooms'        => 'Номера',
        'dictionaries' => 'Справочники',
        'features'     => 'Особенности',
        'types'        => 'Типы номеров',
        'bookings'     => 'Бронирования',
        'localizations'=> 'Перевод',
        'locales'      => 'Языки',
    ],
    'data' => [
        'categories' => [
            'capsules' => [
                'title' => 'Капсулы',
            ],
            'rooms' => [
                'title' => 'Номера',
            ],
        ],
        'room_types' => [
            'upper' => [
                'title' => 'Верхняя',
            ],
            'lower' => [
                'title' => 'Нижняя',
            ],
        ],
        'paysystems' => [
            'terminal' => [
                'title' => 'Оплата картой',
            ],
        ],
        'locales' => [
            'en' => [
                'title' => 'English',
            ],
            'ru' => [
                'title' => 'Русский',
            ],
            'zh' => [
                'title' => '中国人',
            ],
        ],
        'features' => [
            'beverages' => [
                'title' => 'Напитки',
                'image' => 'features/beverages.png',
            ],
            'conditioner' => [
                'title' => 'Кондиционер',
                'image' => 'features/conditioner.png',
            ],
            'refrigerator' => [
                'title' => 'Холодильник',
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
            'description' => 'Добро пожаловать.'
        ]
    ]
];
