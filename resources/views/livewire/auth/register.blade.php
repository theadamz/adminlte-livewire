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
                        <div class="d-none"
                             wire:loading.class.remove="d-none" wire:target="register, store"
                             style="z-index: 2; position: absolute; top: 0; bottom: 0; left: 0; right: 0; display: flex; flex-direction: column; justify-content: center; align-items: center; background-color: rgba(0, 0, 0, 0.05);">
                            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                            <div class="text-md pt-2 d-none" wire:loading.class.remove="d-none" wire:target="register">Checking...</div>
                            <div class="text-md pt-2 d-none" wire:loading.class.remove="d-none" wire:target="store">Registering...</div>
                        </div>
                        <div class="form-group fv-row">
                            <label class="form-label font-weight-normal mb-1">Name <span class="text-danger">*</span></label>
                            <input type="text" wire:model="name" id="name" name="name" placeholder="Name"
                                   value="{{ old('name') ?? '' }}" maxlength="100"
                                   class="form-control font-weight-normal form-maxlength @error('name') is-invalid @enderror"
                                   autocomplete="off" />
                            @error('name')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group fv-row">
                            <label class="form-label font-weight-normal mb-1">Email <span class="text-danger">*</span></label>
                            <input type="email" wire:model="email" id="email" name="email" placeholder="Email"
                                   value="{{ old('email') ?? '' }}" maxlength="255"
                                   class="form-control font-weight-normal form-maxlength @error('email') is-invalid @enderror"
                                   autocomplete="off" autofocus />
                            @error('email')
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
                                       value="{{ old('password') ?? '' }}" maxlength="100"
                                       class="form-control font-weight-normal form-maxlength @error('password') is-invalid @enderror"
                                       autocomplete="off" />
                                @error('password')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group fv-row">
                            <label class="form-label font-weight-normal mb-1">Confirm Password <span class="text-danger">*</span></label>
                            <div class="input-group" x-data="{ showPassword: false }">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary input-group-text rounded-left" id="showConfirmPassword" for="password_confirmation" @click="showPassword = !showPassword">
                                        <i class="fas fa-eye" x-show="!showPassword"></i>
                                        <i class="fas fa-eye-slash" x-show="showPassword"></i>
                                    </button>
                                </div>
                                <input :type="showPassword ? 'text' : 'password'" wire:model="password_confirmation" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password"
                                       value="{{ old('password_confirmation') ?? '' }}" maxlength="100"
                                       class="form-control font-weight-normal form-maxlength @error('password_confirmation') is-invalid @enderror"
                                       autocomplete="off" />
                                @error('password_confirmation')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group fv-row">
                            <label class="form-label font-weight-normal mb-1">Timezone <span class="text-danger">*</span></label>
                            <select wire:model="timezone" class="form-control font-weight-normal form-select2" id="timezone" name="timezone" data-allow-clear="false" wire:ignore>
                                @foreach ($timezones as $timezone)
                                    <option value="{{ $timezone['value'] }}">{{ $timezone['text'] }}</option>
                                @endforeach
                            </select>
                            @error('timezone')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" id="btnRegister" name="btnRegister"
                                    wire:loading.attr="disabled" wire:target="register, store"
                                    class="btn btn-outline-success btn-block font-weight-bold">
                                <span class="indicator-label" wire:loading.class="d-none" wire:target="register, store"><i class="fas fa-edit mr-2"></i> Register</span>
                                <span class="indicator-progress d-none" wire:loading.class.remove="d-none" wire:target="register, store">
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
