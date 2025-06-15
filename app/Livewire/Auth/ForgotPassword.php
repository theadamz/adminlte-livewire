<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.guest')]
#[Title('Forgot Password')]
class ForgotPassword extends Component
{
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email', Rule::exists('users', 'email')->where(function ($query) {
                $query->where('is_active', true);
            })],
        ]);

        Password::sendResetLink($this->only('email'));

        $this->dispatch('notify', message: __('A reset link will be sent if the account exists.'), title: "Success", type: "success");

        $this->reset();
    }
}
