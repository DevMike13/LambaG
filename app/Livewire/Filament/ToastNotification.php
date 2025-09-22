<?php

namespace App\Livewire\Filament;

use Livewire\Component;

class ToastNotification extends Component
{
    public $show = false;
    public $message = '';
    public $type = 'success';

    protected $listeners = ['showToast'];

    public function showToast($payload = [])
    {
        $this->message = $payload['message'] ?? 'Notification';
        $this->type = $payload['type'] ?? 'success';
        $this->show = true;

        $this->dispatch('hide-toast', browser: true);
    }


    public function render()
    {
        return view('livewire.filament.toast-notification');
    }
}
