<?php

namespace App\Livewire\Auth;

use App\Helpers\GeneralHelper;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.guest')]
#[Title('Register')]
class Register extends Component
{
    public array $timezones = [];
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
        $this->resetValidation();
        $this->validate();

        $this->dispatch('confirm', method: "store", message: "Are you sure want continue?", title: "Register New User", type: "question");
        // $this->dispatch('confirm', method: "store", message: "Are you sure want ?", title: "Register New User", type: "question", parameters: ["value param 1", "value param 1", 25000]); // with parameters
        // $this->dispatch('confirm', dispatch: "registering", message: "Are you sure want continue?", title: "Register New User", type: "question"); // dispatch
    }

    #[On('registering')]
    public function store(): void
    {
        // get validated data
        $validated = $this->pull();
        $validated['password'] = Hash::make($validated['password']);

        // save
        $user = new User($validated);
        $user->def_route = '/dashboard';
        $user->save();

        // send email verification
        event(new Registered($user));

        $this->redirect(route('login'), navigate: true);

        $this->dispatch('notify', message: "Verification link sent to " . $validated['email'] . ", please check your mail.", title: "Registration Success", type: "success");
    }

    public function test(string $param1, string $param2, int $param3): void
    {
        debug($param1, $param2, $param3);
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

    public function rendered(): void
    {
        $this->dispatch('init-js-component');
    }
}
