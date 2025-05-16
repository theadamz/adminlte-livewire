<?php

namespace App\Livewire\Auth;

use App\Helpers\GeneralHelper;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.guest')]
#[Title('Register')]
class Register extends Component
{
    protected array $timezones = [];
    public string $email, $name, $password, $password_confirmation, $timezone;

    protected function rules(): array
    {
        $password = !app()->isProduction() ? Password::min(6) : Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised();

        return [
            'email' => ['required', 'email', 'min:3', 'max:255', Rule::unique('users', 'email')],
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'password' => ['required', 'min:8', 'max:100', 'confirmed', $password],
        ];
    }

    public function register(): void
    {
        $this->validate();
        $this->resetValidation();

        debug($this->all());
    }

    public function mount(): void
    {
        $this->timezones = GeneralHelper::getTimezone();
        $this->timezone = config('setting.local.timezone');
    }

    public function boot(): void
    {
        // js
        GeneralHelper::addAdditionalJS([
            'resources/js/modules/auth/register.js'
        ]);
    }

    public function render()
    {
        return view('livewire.auth.register', [
            'timezones' => $this->timezones,
        ]);
    }

    public function rendered(): void
    {
        $this->dispatch('initialize-js-component');
    }
}
