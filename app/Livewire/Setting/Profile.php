<?php

namespace App\Livewire\Setting;

use App\Helpers\GeneralHelper;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class Profile extends Component
{
    public array $timezones = [];
    public string $name = '';
    public string $email = '';
    public string $timezone = '';
    public ?DateTime $last_login_at = null;
    public ?DateTime $last_update_at = null;
    public ?DateTime $last_change_password_at = null;

    protected function rules(): array
    {
        $password = !app()->isProduction() ? Password::min(8) : Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised();

        return [
            'email' => ['required', 'email', 'min:3', 'max:255', Rule::unique('users', 'email')],
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'password' => ['required', 'min:8', 'max:100', 'confirmed', $password],
        ];
    }

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->timezones = GeneralHelper::getTimezone();

        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->timezone = Auth::user()->timezone ?? config('app.timezone');
        $this->last_login_at = Auth::user()->last_login_at ?? null;
        $this->last_update_at = Auth::user()->updated_at === Auth::user()->created_at ? null : Auth::user()->updated_at;
        $this->last_change_password_at = Auth::user()->last_change_password_at ?? null;
    }
}
