<?php

namespace App\Helpers;

class Pagination
{
    public static function generate(object $datas, ?string $params = null): ?string
    {
        if (count($datas->data) < 1) return null;
        // generate pagination
        // active
        $active = isset($datas->links[$datas->current_page])  ? ($datas->links[$datas->current_page]->url ? '<li class="page-item active" title="Go to page ' . $datas->links[$datas->current_page]->label . '" aria-current="page">
            <a href="#" class="page-link">' . $datas->links[$datas->current_page]->label . '</a>
        </li>' : '') : '';

        $active_set = isset($datas->links[$datas->current_page]) ? ($datas->links[$datas->current_page]->url ? $datas->current_page : null) : null;

        // previous
        $previous = $datas->current_page != 1 ? '
            <li class="page-item" title="Go to page ' . $datas->links[0]->label . '" aria-current="page">
                <a href="' . $datas->links[0]->url . ($params ? '&' . $params : '') . '" class="page-link">&laquo;</a>
            </li>
        ' : '';

        // next
        $next = !($datas->current_page >= $datas->last_page) ? '
            <li class="page-item" title="Go to page ' . $datas->links[$datas->last_page + 1]->label . '" aria-current="page">
                <a href="' . $datas->links[$datas->last_page + 1]->url . ($params ? '&' . $params : '') . '" class="page-link">' . $datas->links[$datas->last_page + 1]->label . '</a>
            </li>
        ' : '';

        // first
        $first = !$datas->links[1]->active ? '
            <li class="page-item" title="Go to page ' . $datas->links[1]->label . '" aria-current="page">
                <a href="' . $datas->links[1]->url . ($params ? '&' . $params : '') . '" class="page-link">' . $datas->links[1]->label . '</a>
            </li>
        ' : '';

        $last = !$datas->links[$datas->last_page]->active ? '
            <li class="page-item" title="Go to page ' . $datas->links[$datas->last_page]->label . '" aria-current="page">
                <a href="' . $datas->links[$datas->last_page]->url . ($params ? '&' . $params : '') . '" class="page-link">' . $datas->links[$datas->last_page]->label . '</a>
            </li>
        ' : '';

        // $side_active = 4;
        // $active_before = '';
        // $active_before_count = 1;
        // $active_before_max = 2;

        $active_after = '';
        $active_after_count = 1;
        $active_after_max = 3;

        if ($active_set >= 1) {
            foreach ($datas->links as $k => $link) {
                if (
                    // lebih dari nomor aktif
                    ($k > $active_set) &&
                    // kurang dari dua angka di untuk next dan angka terakhir
                    ($k <= $datas->last_page - 1) &&
                    // kurang dari max
                    ($active_after_count <= $active_after_max)
                ) {
                    $active_after .= '<li class="page-item" title="Go to page ' . $link->label . '" aria-current="page">
                        <a href="' . $link->url . ($params ? '&' . $params : '') . '" class="page-link">' . $link->label . '</a>
                    </li>';
                    $active_after_count++;
                }
            }
        }

        return $previous . $first . $active . $active_after .  $last . $next;
    }
}
