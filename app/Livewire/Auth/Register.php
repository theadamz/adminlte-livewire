<?php

namespace App\Livewire\Auth;

use App\Helpers\GeneralHelper;
use Illuminate\Support\Facades\Vite;
use Livewire;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.guest')]
#[Title('Register')]
class Register extends Component
{

    public string $email, $name, $password, $password_confirmation, $timezone;
    protected array $timezones = [];

    protected function rules(): array
    {
        return [
            'email' => ['required', 'email', 'min:3', 'max:255'],
            'password' => ['required', 'min:8', 'max:255'],
            'remember' => ['boolean'],
        ];
    }

    public function register(): void
    {
        dd($this->all());
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
            'timezones' => $this->timezones
        ]);
    }
}
