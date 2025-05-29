<div class="vh-100 bg-light">
    <div class="d-flex flex-column h-100 justify-content-center align-items-center">
        <div class="w-50">
            <div class="card card-outline card-warning">
                <div class="card-header text-center">
                    <h5>Verification Notice</h5>
                    <div class="d-flex flex-column text-muted text-secondary mt-1 text-xs">
                        Please verify your email before you continue.
                    </div>
                </div>
                <div class="card-body">
                    <div wire:loading>
                        <x-widgets.loading-overlay />
                    </div>
                    <form wire:submit="sendVerification" id="formResend" name="formResend">
                        <div class="col py-5">
                            <div class="callout callout-warning">
                                <h5>You email has not been verified</h5>
                                <p>Please verify you email first before continue, if you still haven't receive verifiy email yet. Plase use resend button bellow to try again.</p>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary btn-block font-weight-bold" id="resend" name="resend">
                                <span class="indicator-label"><i class="fas fa-paper-plane mr-2"></i> Resend</span>
                                <span class="indicator-progress d-none">
                                    <span class="spinner-border spinner-border-sm"></span>
                                </span>
                            </button>
                        </div>
                    </form>
                    <p class="mb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <a wire:navigate href="{{ route('home') }}" class="text-sm">Home</a>
                        <a wire:click="logout" href="javascript:;" class="text-sm">Logout</a>
                    </div>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
