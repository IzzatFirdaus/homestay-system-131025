<?php

declare(strict_types=1);

namespace App\Livewire\Notifications;

use Livewire\Component;

class Toast extends Component
{
    public bool $show = false;

    public string $message = '';

    public string $type = 'success';

    /** @var array<string, string> */
    protected $listeners = ['notify' => 'showToast'];

    public function showToast(string $message, string $type = 'success'): void
    {
        $this->message = $message;
        $this->type = $type;
        $this->show = true;
    }

    public function render()
    {
        /** @phpstan-ignore-next-line */
        return view('livewire.notifications.toast');
    }
}
