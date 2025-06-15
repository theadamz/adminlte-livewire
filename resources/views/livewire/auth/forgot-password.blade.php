<div class="vh-100 bg-light">
    <div class="d-flex flex-column h-100 justify-content-center align-items-center">
        <div class="w-25">
            <div class="card card-outline">
                <div class="card-header text-center">
                    <h5>Forgot Password</h5>
                    <div class="d-flex flex-column text-muted text-secondary mt-1 text-xs">
                        Please enter your email
                    </div>
                </div>
                <div class="card-body">
                    <form wire:submit="sendPasswordResetLink" id="formForgotPassword" name="formForgotPassword">
                        <div class="form-group fv-row">
                            <label class="form-label font-weight-normal mb-1">Email <span class="text-danger">*</span></label>
                            <input type="text" wire:model="email" placeholder="Email" maxlength="255"
                                   class="form-control font-weight-normal @error('email') is-invalid @enderror" autofocus />
                            @if (!$errors->any())
                                <small class="text-muted">Please check your mail after sucess send link verification</small>
                            @endif
                            @error('email')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-outline-primary btn-block font-weight-bold" id="send" name="send">
                                <span class="indicator-label" wire:loading.class="d-none"><i class="fas fa-paper-plane mr-2"></i> Send</span>
                                <span class="indicator-progress d-none" wire:loading.class.remove='d-none'>
                                    <span class="spinner-border spinner-border-sm"></span>
                                </span>
                            </button>
                        </div>
                    </form>
                    <p class="mb-0">
                        <a wire:navigate href="{{ route('login') }}" class="text-sm">Login</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
