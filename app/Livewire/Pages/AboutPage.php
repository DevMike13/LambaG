<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('About Us')]
class AboutPage extends Component
{
    public function render()
    {
        return view('livewire.pages.about-page');
    }
}
