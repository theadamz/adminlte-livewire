<?php

namespace App\Livewire\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Str;

#[Layout('components.layouts.guest')]
#[Title('Login')]
class Login extends Component
{
    public string $email = 'theadamz91@gmail.com';
    public string $password = '12345678';
    public bool $remember = false;

    protected function rules(): array
    {
        return [
            'email' => ['required', 'email', 'min:3', 'max:255'],
            'password' => ['required', 'min:8', 'max:255'],
            'remember' => ['boolean'],
        ];
    }

    public function mount(): void
    {
        // if user already sign in then redirect to their default path
        if (Auth::check()) {
            $this->redirectIntended(default: Session::get('def_route'), navigate: true);
        }
    }

    public function login(): void
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password, 'is_active' => true], $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();

        // get user
        $user = Auth::user();

        // save user info in session
        Session::put('name', $user->name);
        Session::put('email', $user->email);
        Session::put('def_route', $user->def_route);
        Session::put('timezone', $user->timezone);

        // update last login
        $user->update(['last_login_at' => now()]);

        // check if user already verified email
        if (!Auth::user()->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('verification.notice', absolute: false), navigate: true);
        }

        // show loading
        $this->dispatch('loading', message: 'Redirecting...');

        // redirect
        $this->redirectIntended(default: $user->def_route, navigate: true);
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email) . '|' . request()->ip());
    }

    public function render(): View
    {
        return view('livewire.auth.login');
    }
}
