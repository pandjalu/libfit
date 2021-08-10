<?php

return [
    "admin_sidebar" => [
        [
            'title'  => "Dashboard",
            'icon'   => "fas fa-home",
            'active' => "admin.dashboard",
            'href'   => 'admin'
        ],
        [
            'title'  => "Books",
            'icon'   => "fas fa-book",
            'active' => "admin.book.*",
            'href'   => 'admin/book'
        ],
        [
            'title'  => "Members",
            'icon'   => "fas fa-users",
            'active' => "admin.member.*",
            'href'   => 'admin/member'
        ],
        [
            'title'  => "Categories",
            'icon'   => "fas fa-book-open",
            'active' => "admin.category.*",
            'href'   => 'admin/category'
        ],
        [
            'title'  => "Pinjaman Buku",
            'icon'   => "fas fa-book-open",
            'active' => "admin.borrowing.*",
            'href'   => 'admin/borrowing'
        ]
    ],
    "user_sidebar" => [
        [
            'title'  => "Dashboard",
            'icon'   => "fa fa-home",
            'active' => "user.dashboard",
            'href'   => 'user'
        ],
        [
            'title'  => "Books",
            'icon'   => "fas fa-book",
            'active' => "user.book.*",
            'href'   => 'user/book'
        ],
        [
            'title'  => "Pinjaman Buku",
            'icon'   => "fas fa-book-open",
            'active' => "user.borrowing.*",
            'href'   => 'user/borrowing'
        ]
    ]
];

?>
