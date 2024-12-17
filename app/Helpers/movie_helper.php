<?php

if (!function_exists('getClassByRate')) {
    // Fungsi untuk menentukan kelas berdasarkan rating
    function getClassByRate($vote)
    {
        if ($vote >= 8) {
            return 'green';
        } elseif ($vote >= 5) {
            return 'orange';
        } else {
            return 'red';
        }
    }
}