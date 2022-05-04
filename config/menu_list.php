<?php
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
            ['title' => 'Pendidikan Jenis', 'route' => 'admin.profile.pendidikan_jenis'],
            ['title' => 'Kontak Tipe', 'route' => 'admin.profile.kontak_tipe'],
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
    [
        'name' => 'pendaftaran',
    ],
    ['title' => 'Sosial Media', 'icon' => 'fe fe-aperture', 'route' => 'admin.social_media'],
    ['title' => 'Kontak', 'icon' => 'fe fe-phone', 'route' => 'admin.contact'],
    ['title' => 'Footer Instagram', 'icon' => 'fe fe-image', 'route' => 'admin.footer_instagram'],
    ['title' => 'Username Role', 'icon' => 'fe fe-check', 'route' => 'admin.username_validation'],
];

// set member menu
$member  = [
    ['title' => 'Dashboard', 'route' => 'member.dashboard', 'icon' => 'fe fe-home'],
    ['title' => 'Profile', 'route' => 'member.profile', 'icon' => 'fe fe-user'],
    ['title' => 'Ganti Password', 'icon' => 'fe fe-lock', 'route' => 'member.password'],
];

// set frontend menu
$frontend  = [
    ['title' => 'Home', 'route' => 'home'],
    [
        'title' => 'Tentang Kami',
        'children' => [
            ['title' => 'Sejarah'],
            ['title' => 'Struktur Kepengurusan', 'route' => 'about.kepengurusan.struktur'],
            ['title' => 'Periode Kepengurusan'],
            ['title' => 'Anggaran Dasar Anggaran Rumah Tangga'],
        ]
    ],
    [
        'name' => 'bidang',
    ],
    ['title' => 'Anggota', 'route' => 'anggota'],
    ['title' => 'Galeri', 'route' => 'galeri'],
    ['title' => 'Pendaftaran', 'route' => 'pendaftaran'],
    ['title' => 'Kontak', 'route' => 'kontak'],
];

$member = array_merge($member, [['title' => 'Home Menu', 'separator' => true]], $frontend);

return [
    'admin' => array_merge($admin, [['title' => 'Member Menu', 'separator' => true]], $member),
    'member' => $member,
    'frontend' => $frontend,
];
