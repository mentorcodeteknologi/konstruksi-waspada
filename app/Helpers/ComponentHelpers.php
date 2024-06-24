<?php

namespace App\Helpers;

class ComponentHelpers
{
    public static function generate_table($headers, $data, $group, $key_field = 'id', $image_field = 'avatar', $action_buttons = true)
    {
        $table = '<div class="card card-body">';
        $table .= '<div class="table-responsive">';
        $table .= '<table class="table search-table align-middle text-nowrap">';
        $table .= '<thead class="header-item">';

        // Generate table headers
        foreach ($headers as $header) {
            $table .= '<th>' . $header . '</th>';
        }
        $table .= '<th>Action</th>';
        $table .= '</thead>';
        $table .= '<tbody>';

        // Generate table rows
        $unique = null;
        foreach ($data as $row) {
            // Ensure the key field exists in the row
            if (!isset($row[$key_field])) {
                continue; // Skip this row if the key field is not set
            }
            $unique = $row[$key_field];
            if ($key_field == 'id') {
                $unique = base64_encode($unique);
            }
            $table .= '<tr class="search-items">';
            foreach ($headers as $field => $header) {
                if ($field == $image_field) {
                    $table .= '<td>
                                    <div class="d-flex align-items-center">
                                        <img src="' . base_url('assets/new_frontend') . '/images/profile/user-1.jpg" alt="avatar" class="rounded-circle" width="35" />
                                        <div class="ms-3">
                                            <div class="user-meta-info">
                                                <h6 class="user-name mb-0" data-name="' . $row['nama'] . '">' . $row['nama'] . '</h6>
                                                <span class="user-work fs-3" data-occupation="' . $row['role'] . '">' . $row['role'] . '</span>
                                            </div>
                                        </div>
                                    </div>
                                  </td>';
                } else {
                    $table .= '<td><span class="usr-' . $field . '" data-' . $field . '="' . $row[$field] . '">' . $row[$field] . '</span></td>';
                }
            }
            $table .= '<td>
                            <div class="action-btn">
                                ';
            if ($action_buttons) {
                $table .= '<a href="/backend/' . $group . '/update/' . $unique . '" class="text-info edit">
                                        <i class="ti ti-eye fs-5"></i>
                                    </a>';
            }
            if ($key_field == 'id') {
                $table .= '<a href="/backend/' . $group . '/delete/' . $unique . '" class="text-dark delete ms-2" onclick="return confirm("Ingin menghapus data?")">
                            <i class="ti ti-trash fs-5"></i>
                           </a>';
            }
            $table .= '</div>
                        </td>';
            $table .= '</tr>';
        }

        $table .= '</tbody>';
        $table .= '</table>';
        $table .= '</div>';
        $table .= '</div>';

        return $table;
    }
}
