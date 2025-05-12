<div class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline">
            <div class="card-header text-center">
                <a href="{{ url('/') }}" class="h5">{{ config('setting.general.web_name_short') }}</a>
                <div class="d-flex flex-column text-muted text-secondary mt-1 text-xs">
                    <em>{{ config('setting.general.web_name') }}</em>
                    <em>{{ config('setting.general.web_description') }}</em>
                </div>
            </div>
            <div class="card-body">
                <form wire:submit="login">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-append">
                                <div class="input-group-text rounded-left">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            <input type="text" wire:model="email" placeholder="Email" maxlength="255" value="{{ old('email') ?? '' }}" class="form-control @error('email') is-invalid @enderror" autofocus />
                            @error('email')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="input-group" x-data="{ showPassword: false }">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary input-group-text rounded-left" id="showPassword" for="password" @click="showPassword = !showPassword">
                                    <i class="fas fa-eye" x-show="!showPassword"></i>
                                    <i class="fas fa-eye-slash" x-show="showPassword"></i>
                                </button>
                            </div>
                            <input :type="showPassword ? 'text' : 'password'" wire:model="password" placeholder="Password" maxlength="255" autocomplete="off" value="{{ old('password') ?? '' }}" class="form-control @error('password') is-invalid @enderror" />
                            @error('password')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="form-check">
                            <input type="checkbox" wire:model="remember" class="form-check-input" />
                            <label class="form-check-label text-sm" for="remember">Remember Me</label>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <button type="submit" class="btn btn-outline-primary btn-block font-weight-bold">
                            <span class="indicator-label" wire:loading.class='d-none'><i class="fas fa-sign-in-alt mr-2"></i> Login</span>
                            <span class="indicator-progress d-none" wire:loading.class.remove='d-none'>
                                <span class="spinner-border spinner-border-sm"></span>
                            </span>
                        </button>
                    </div>
                </form>
                @if (Route::has('password.request'))
                    <p class="mb-0">
                        <a href="{{ route('password.request') }}" class="text-sm">Forgot Password?</a>
                    </p>
                @endif
                @if (Route::has('register'))
                    <p class="mb-0">
                        <a wire:navigate href="{{ route('register') }}" class="text-sm">Register</a>
                    </p>
                @endif
            </div>
        </div>
    </div>

    <div class="fixed-bottom d-none d-sm-block border-top bg-light">
        <div class="d-flex flex-row justify-content-between mt-1 px-2 py-2">
            <div class="float-left">
                <div class="d-flex flex-row">
                    <a href="{{ url('/') }}" class="mr-3 font-weight-bold text-sm text-secondary">Home</a>
                    <a href="mailto:theadamz91@gmail.com" class="font-weight-bold text-sm text-secondary">Contact</a>
                </div>
            </div>
            <div class="float-right">
                <div class="font-weight-bold text-sm text-secondary">
                    {!! config('setting.general.copyright') !!}
                </div>
            </div>
        </div>
    </div>
</div>
