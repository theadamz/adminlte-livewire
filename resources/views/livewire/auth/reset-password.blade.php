<div class="vh-100 bg-light">
    <div class="d-flex flex-column h-100 justify-content-center align-items-center">
        <div class="w-25">
            <div class="card card-outline">
                <div class="card-header text-center">
                    <h5>Reset Password</h5>
                    <div class="d-flex flex-column text-muted text-secondary mt-1 text-xs">
                        Please enter your new password
                    </div>
                </div>
                <div class="card-body">
                    <form wire:submit='resetPassword' id="formResetPassword" name="formResetPassword">
                        <div class="form-group fv-row">
                            <label class="form-label font-weight-normal mb-1">Password <span class="text-danger">*</span></label>
                            <div class="input-group" x-data="{ showPassword: false }">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary input-group-text rounded-left" id="showPassword" for="password" @click="showPassword = !showPassword">
                                        <i class="fas fa-eye" x-show="!showPassword"></i>
                                        <i class="fas fa-eye-slash" x-show="showPassword"></i>
                                    </button>
                                </div>
                                <input :type="showPassword ? 'text' : 'password'" wire:model="password" id="password" name="password" placeholder="Password" maxlength="100"
                                       class="form-control font-weight-normal form-maxlength @error('password') is-invalid @enderror"
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
                                <input :type="showPassword ? 'text' : 'password'" wire:model="password_confirmation" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" maxlength="100"
                                       class="form-control font-weight-normal form-maxlength @error('password_confirmation') is-invalid @enderror"
                                       autocomplete="off" />
                                @error('password_confirmation')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-success btn-block font-weight-bold" id="save" name="save">
                                <span class="indicator-label" wire:loading.class="d-none"> Save</span>
                                <span class="indicator-progress d-none" wire:loading.class.remove='d-none'>
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
