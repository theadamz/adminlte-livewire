<div x-show="$store.navigate.loading" x-transition>
    <div class="preloader flex-column justify-content-center align-items-center bg-white" style="opacity: .8;">
        <img class="animation__shake" src="{{ asset('assets/images/web_logo_loader.png') }}" height="60" width="60">
        <div class="flex-row mt-5">
            <span class="spinner-border spinner-border-sm text-secondary mr-2"></span>
            <span class="h6 text-muted">Please wait...</span>
        </div>
    </div>
</div>
