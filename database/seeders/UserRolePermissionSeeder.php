<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // role
        $admin = Role::create(['name' => 'admin']);
        $member = Role::create(['name' => 'member']);

        // permission
        $admin_p = [
            ['name' => 'user', 'guard_name' => 'web'],
            ['name' => 'user.excel', 'guard_name' => 'web'],
            ['name' => 'user.store', 'guard_name' => 'web'],
            ['name' => 'user.delete', 'guard_name' => 'web'],
            ['name' => 'user.update', 'guard_name' => 'web'],
            ['name' => 'address.province', 'guard_name' => 'web'],
            ['name' => 'address.province.select2', 'guard_name' => 'web'],
            ['name' => 'address.province.store', 'guard_name' => 'web'],
            ['name' => 'address.province.delete', 'guard_name' => 'web'],
            ['name' => 'address.province.update', 'guard_name' => 'web'],
            ['name' => 'address.regencie', 'guard_name' => 'web'],
            ['name' => 'address.regencie.select2', 'guard_name' => 'web'],
            ['name' => 'address.regencie.store', 'guard_name' => 'web'],
            ['name' => 'address.regencie.delete', 'guard_name' => 'web'],
            ['name' => 'address.regencie.update', 'guard_name' => 'web'],
            ['name' => 'address.district', 'guard_name' => 'web'],
            ['name' => 'address.district.select2', 'guard_name' => 'web'],
            ['name' => 'address.district.store', 'guard_name' => 'web'],
            ['name' => 'address.district.delete', 'guard_name' => 'web'],
            ['name' => 'address.district.update', 'guard_name' => 'web'],
            ['name' => 'address.village', 'guard_name' => 'web'],
            ['name' => 'address.village.select2', 'guard_name' => 'web'],
            ['name' => 'address.village.store', 'guard_name' => 'web'],
            ['name' => 'address.village.delete', 'guard_name' => 'web'],
            ['name' => 'address.village.update', 'guard_name' => 'web'],
            ['name' => 'artikel.data', 'guard_name' => 'web'],
            ['name' => 'artikel.data.add', 'guard_name' => 'web'],
            ['name' => 'artikel.data.edit', 'guard_name' => 'web'],
            ['name' => 'artikel.data.delete', 'guard_name' => 'web'],
            ['name' => 'artikel.data.insert', 'guard_name' => 'web'],
            ['name' => 'artikel.data.update', 'guard_name' => 'web'],
            ['name' => 'artikel.kategori', 'guard_name' => 'web'],
            ['name' => 'artikel.kategori.select2', 'guard_name' => 'web'],
            ['name' => 'artikel.kategori.insert', 'guard_name' => 'web'],
            ['name' => 'artikel.kategori.delete', 'guard_name' => 'web'],
            ['name' => 'artikel.kategori.update', 'guard_name' => 'web'],
            ['name' => 'artikel.tag', 'guard_name' => 'web'],
            ['name' => 'artikel.tag.select2', 'guard_name' => 'web'],
            ['name' => 'artikel.tag.insert', 'guard_name' => 'web'],
            ['name' => 'artikel.tag.delete', 'guard_name' => 'web'],
            ['name' => 'artikel.tag.update', 'guard_name' => 'web'],
            ['name' => 'pengurus.periode', 'guard_name' => 'web'],
            ['name' => 'pengurus.periode.add', 'guard_name' => 'web'],
            ['name' => 'pengurus.periode.edit', 'guard_name' => 'web'],
            ['name' => 'pengurus.periode.active', 'guard_name' => 'web'],
            ['name' => 'pengurus.periode.member', 'guard_name' => 'web'],
            ['name' => 'pengurus.periode.detail', 'guard_name' => 'web'],
            ['name' => 'pengurus.periode.delete', 'guard_name' => 'web'],
            ['name' => 'pengurus.periode.insert', 'guard_name' => 'web'],
            ['name' => 'pengurus.periode.update', 'guard_name' => 'web'],
            ['name' => 'pengurus.jabatan.parent', 'guard_name' => 'web'],
            ['name' => 'pengurus.jabatan.select2', 'guard_name' => 'web'],
            ['name' => 'pengurus.jabatan.update', 'guard_name' => 'web'],
            ['name' => 'pengurus.jabatan', 'guard_name' => 'web'],
            ['name' => 'pengurus.jabatan.insert', 'guard_name' => 'web'],
            ['name' => 'pengurus.jabatan.delete', 'guard_name' => 'web'],
            ['name' => 'pengurus.jabatan.member.select2', 'guard_name' => 'web'],
            ['name' => 'pengurus.jabatan.member', 'guard_name' => 'web'],
            ['name' => 'pengurus.jabatan.member.update', 'guard_name' => 'web'],
            ['name' => 'galeri', 'guard_name' => 'web'],
            ['name' => 'galeri.select2', 'guard_name' => 'web'],
            ['name' => 'galeri.insert', 'guard_name' => 'web'],
            ['name' => 'galeri.delete', 'guard_name' => 'web'],
            ['name' => 'galeri.update', 'guard_name' => 'web'],
            ['name' => 'social_media', 'guard_name' => 'web'],
            ['name' => 'social_media.insert', 'guard_name' => 'web'],
            ['name' => 'social_media.delete', 'guard_name' => 'web'],
            ['name' => 'social_media.update', 'guard_name' => 'web'],
            ['name' => 'contact', 'guard_name' => 'web'],
            ['name' => 'contact.insert', 'guard_name' => 'web'],
            ['name' => 'contact.delete', 'guard_name' => 'web'],
            ['name' => 'contact.update', 'guard_name' => 'web'],
            ['name' => 'footer_instagram', 'guard_name' => 'web'],
            ['name' => 'footer_instagram.insert', 'guard_name' => 'web'],
            ['name' => 'footer_instagram.delete', 'guard_name' => 'web'],
            ['name' => 'footer_instagram.update', 'guard_name' => 'web'],
            ['name' => 'profile.pendidikan_jenis', 'guard_name' => 'web'],
            ['name' => 'profile.pendidikan_jenis.insert', 'guard_name' => 'web'],
            ['name' => 'profile.pendidikan_jenis.delete', 'guard_name' => 'web'],
            ['name' => 'profile.pendidikan_jenis.update', 'guard_name' => 'web'],
            ['name' => 'profile.kontak_tipe', 'guard_name' => 'web'],
            ['name' => 'profile.kontak_tipe.insert', 'guard_name' => 'web'],
            ['name' => 'profile.kontak_tipe.delete', 'guard_name' => 'web'],
            ['name' => 'profile.kontak_tipe.update', 'guard_name' => 'web'],
            ['name' => 'username_validation', 'guard_name' => 'web'],
            ['name' => 'username_validation.select2', 'guard_name' => 'web'],
            ['name' => 'username_validation.save', 'guard_name' => 'web'],
            ['name' => 'pendaftaran', 'guard_name' => 'web'],
            ['name' => 'pendaftaran.get_one', 'guard_name' => 'web'],
            ['name' => 'pendaftaran.insert', 'guard_name' => 'web'],
            ['name' => 'pendaftaran.delete', 'guard_name' => 'web'],
            ['name' => 'pendaftaran.update', 'guard_name' => 'web'],
            ['name' => 'pendaftaran.sensus', 'guard_name' => 'web'],
            ['name' => 'pendaftaran.sensus.excel', 'guard_name' => 'web'],
            ['name' => 'pendaftaran.sensus.status', 'guard_name' => 'web'],
        ];

        $member_p = [
            ['name' => 'dashboard', 'guard_name' => 'web'],
            ['name' => 'profile', 'guard_name' => 'web'],
            ['name' => 'profile.save_basic', 'guard_name' => 'web'],
            ['name' => 'profile.save_address', 'guard_name' => 'web'],
            ['name' => 'profile.save_detail', 'guard_name' => 'web'],
            ['name' => 'profile.kontak', 'guard_name' => 'web'],
            ['name' => 'profile.kontak_insert', 'guard_name' => 'web'],
            ['name' => 'profile.kontak_update', 'guard_name' => 'web'],
            ['name' => 'profile.kontak_delete', 'guard_name' => 'web'],
            ['name' => 'profile.hobby_select2', 'guard_name' => 'web'],
            ['name' => 'profile.hobby_save', 'guard_name' => 'web'],
            ['name' => 'profile.profesi_select2', 'guard_name' => 'web'],
            ['name' => 'profile.pendidikan', 'guard_name' => 'web'],
            ['name' => 'profile.pendidikan_select2', 'guard_name' => 'web'],
            ['name' => 'profile.pendidikan_insert', 'guard_name' => 'web'],
            ['name' => 'profile.pendidikan_update', 'guard_name' => 'web'],
            ['name' => 'profile.pendidikan_delete', 'guard_name' => 'web'],
            ['name' => 'profile.pengalaman_organisasi', 'guard_name' => 'web'],
            ['name' => 'profile.pengalaman_organisasi_select2', 'guard_name' => 'web'],
            ['name' => 'profile.pengalaman_organisasi_insert', 'guard_name' => 'web'],
            ['name' => 'profile.pengalaman_organisasi_update', 'guard_name' => 'web'],
            ['name' => 'profile.pengalaman_organisasi_delete', 'guard_name' => 'web'],
            ['name' => 'profile.pengalaman_lain', 'guard_name' => 'web'],
            ['name' => 'profile.pengalaman_lain_insert', 'guard_name' => 'web'],
            ['name' => 'profile.pengalaman_lain_update', 'guard_name' => 'web'],
            ['name' => 'profile.pengalaman_lain_delete', 'guard_name' => 'web'],
            ['name' => 'password', 'guard_name' => 'web'],
            ['name' => 'password.save', 'guard_name' => 'web'],
        ];

        foreach ($admin_p as $v) {
            $p = Permission::create($v);
            $admin->givePermissionTo($p);
        }

        foreach ($member_p as $v) {
            $p = Permission::create($v);
            $member->givePermissionTo($p);
            $admin->givePermissionTo($p);
        }
    }
}
