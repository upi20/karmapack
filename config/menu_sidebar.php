<?php
// set admin menu
$admin = [
    ['title' => 'Administrator Menu', 'separator' => true],
    ['title' => 'Dashboard', 'route' => 'admin.dashboard', 'icon' => 'fe fe-home'],
    [
        'title' => 'Member',
        'icon' => 'fe fe-users',
        'route' => 'admin.user',
    ],
    [
        'title' => 'Profile Addon', 'icon' => 'fe fe-user-plus',
        'children' => [
            ['title' => 'Sekolah Jenis'],
            ['title' => 'Kontak Tipe'],
        ]
    ],
    [
        'title' => 'Kepengurusan',
        'route' => 'admin.pengurus.periode',
        'icon' => 'fe fe-sliders'
    ],
    [
        'title' => 'Artikel',
        'icon' => 'fe fe-file-text',
        'children' => [
            ['title' => 'Data', 'route' => 'admin.artikel.data'],
            ['title' => 'Kategori', 'route' => 'admin.artikel.kategori'],
            ['title' => 'Tag', 'route' => 'admin.artikel.tag']
        ],
    ],
    [
        'title' => 'Address', 'icon' => 'fe fe-map-pin',
        'children' => [
            ['title' => 'Province', 'route' => 'admin.address.province'],
            ['title' => 'Regencie', 'route' => 'admin.address.regencie'],
            ['title' => 'District', 'route' => 'admin.address.district'],
            ['title' => 'Village', 'route' => 'admin.address.village'],
        ]
    ],

    ['title' => 'Galeri', 'route' => 'admin.galeri', 'icon' => 'fe fe-image'],
    ['title' => 'Member Menu', 'separator' => true],
];

// set member menu
$member  = [
    ['title' => 'Dashboard', 'route' => 'member.dashboard', 'icon' => 'fe fe-home'],
    ['title' => 'Profile', 'route' => 'member.profile', 'icon' => 'fe fe-user'],
    ['title' => 'Ganti Password', 'icon' => 'fe fe-lock'],
];

return [
    'admin' => array_merge($admin, $member),
    'member' => $member
];
