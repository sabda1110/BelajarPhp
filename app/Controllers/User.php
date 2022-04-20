<?php

namespace App\Controllers;

class User extends BaseController
{
    public function __construct()
    {

        $this->session = service('session');
        $this->auth = service('authentication');
        helper('sn');
    }

    public function index()
    {

        return view('halamanutama/index');
    }
}
