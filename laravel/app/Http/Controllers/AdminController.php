<?php

namespace App\Http\Controllers;

class AdminController {
    public function panel() {
        return view('pages.admin.panel');
    }
}