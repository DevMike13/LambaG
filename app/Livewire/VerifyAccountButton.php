<?php

namespace App\Livewire;

use Livewire\Component;

class VerifyAccountButton extends Component
{
    public function gotoVerifyPage(){
        return redirect()->route('verify.account');
    }
    
    public function render()
    {
        return view('livewire.verify-account-button');
    }
}
