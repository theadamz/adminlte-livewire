<div class="vh-100 bg-light">
    <div class="d-flex flex-column h-100 justify-content-center align-items-center">
        <div class="w-50">
            <div class="card card-outline">
                <div class="card-header text-center">
                    <h5>Register</h5>
                    <div class="d-flex flex-column text-muted text-secondary mt-1 text-xs">
                        Please enter your credentials
                    </div>
                </div>
                <div class="card-body">
                    <form wire:submit="register">
                        <div class="form-group fv-row">
                            <label class="form-label font-weight-normal mb-1">Email <span class="text-danger">*</span></label>
                            <input type="email" wire:model="email" id="email" name="email" placeholder="Email"
                                   value="{{ old('email') ?? '' }}" maxlength="255"
                                   class="form-control font-weight-normal @error('email') is-invalid @enderror"
                                   autocomplete="off" autofocus />
                            @error('email')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group fv-row">
                            <label class="form-label font-weight-normal mb-1">Name <span class="text-danger">*</span></label>
                            <input type="text" wire:model="name" id="name" name="name" placeholder="Name"
                                   value="{{ old('name') ?? '' }}" maxlength="255"
                                   class="form-control font-weight-normal @error('name') is-invalid @enderror"
                                   autocomplete="off" />
                            @error('name')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group fv-row">
                            <label class="form-label font-weight-normal mb-1">Password <span class="text-danger">*</span></label>
                            <div class="input-group" x-data="{ showPassword: false }">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary input-group-text rounded-left" id="showPassword" for="password" @click="showPassword = !showPassword">
                                        <i class="fas fa-eye" x-show="!showPassword"></i>
                                        <i class="fas fa-eye-slash" x-show="showPassword"></i>
                                    </button>
                                </div>
                                <input :type="showPassword ? 'text' : 'password'" wire:model="password" id="password" name="password" placeholder="Password"
                                       value="{{ old('password') ?? '' }}" maxlength="255"
                                       class="form-control font-weight-normal @error('password') is-invalid @enderror"
                                       autocomplete="off" />
                                @error('password')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group fv-row mb-5">
                            <label class="form-label font-weight-normal mb-1">Confirm Password <span class="text-danger">*</span></label>
                            <div class="input-group" x-data="{ showPassword: false }">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary input-group-text rounded-left" id="showConfirmPassword" for="password_confirmation" @click="showPassword = !showPassword">
                                        <i class="fas fa-eye" x-show="!showPassword"></i>
                                        <i class="fas fa-eye-slash" x-show="showPassword"></i>
                                    </button>
                                </div>
                                <input :type="showPassword ? 'text' : 'password'" wire:model="password_confirmation" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password"
                                       value="{{ old('password_confirmation') ?? '' }}" maxlength="255"
                                       class="form-control font-weight-normal @error('password_confirmation') is-invalid @enderror"
                                       autocomplete="off" />
                                @error('password_confirmation')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group fv-row">
                            <label class="form-label font-weight-normal mb-1">Timezone <span class="text-danger">*</span></label>
                            <select wire:model="timezone" class="form-control font-weight-normal form-select2" id="timezone" name="timezone" data-allow-clear="false">
                                @foreach ($timezones as $timezone)
                                    <option value="{{ $timezone['value'] }}">{{ $timezone['text'] }}</option>
                                @endforeach
                            </select>
                            @error('timezone')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-outline-success btn-block font-weight-bold" id="register" name="register">
                                <span class="indicator-label"><i class="fas fa-edit mr-2"></i> Register</span>
                                <span class="indicator-progress d-none">
                                    <span class="spinner-border spinner-border-sm"></span>
                                </span>
                            </button>
                        </div>
                    </form>
                    <p class="mb-0">
                        <a href="{{ route('login') }}" class="text-sm" wire:navigate>Login</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@script
    <script type="text/javascript">
        console.log('Register Component Loaded');
        /*  $(document).ready(function() {
             $('#timezone').select2({
                 theme: 'bootstrap4',
                 placeholder: 'Select Timezone',
                 allowClear: true,
                 width: '100%'
             });
         }); */
    </script>
@endscript
