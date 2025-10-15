<?php

declare(strict_types=1);

namespace App\Livewire\Notifications;

use Livewire\Component;

class Toast extends Component
{
    public $show = false;

    public $message = '';

    public $type = 'success';

    protected $listeners = ['notify' => 'showToast'];

    public function showToast($message, $type = 'success')
    {
        $this->message = $message;
        $this->type = $type;
        $this->show = true;
    }

    public function render()
    {
        return view('livewire.notifications.toast');
    }
}
