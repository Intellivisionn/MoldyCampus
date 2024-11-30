<?php

namespace App\Livewire\Pages\Admin;

use Livewire\Component;
use App\Models\Course; // Make sure you have a Course model
use Livewire\WithFileUploads;

class ManageAdmins extends Component
{
    
    public function render()
    {
        return view('livewire.pages.admin.manage_admins');
    }
}

