<?php
function tampilan($halaman, $data = [])
{
    echo view('template/header', $data);
    echo view('template/sidebar');
    echo view('template/topbar');
    echo view($halaman);
    echo view('template/footer');
}
