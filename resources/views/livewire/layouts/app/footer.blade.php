<footer class="main-footer py-2">
    @if (!auth()->user()->hasVerifiedEmail())
        <div class="row bg-danger rounded py-3">
            <div class="d-flex flex-column flex-grow-1 justify-content-center align-items-center">
                You email has not been verified
                <a href="{{ route('verification.notice') }}" class="text-primary" wire:navigate>Click here to see details.</a>
            </div>
        </div>
    @endif
    <div class="row bg-warning rounded py-3 d-none" wire:offline.class.remove="d-none">
        <div class="d-flex flex-column flex-grow-1 justify-content-center align-items-center text-white">
            This device is currently offline.
        </div>
    </div>
    <div class="float-left d-none d-sm-block">
        {{ Date::now()->translatedFormat('l, j F Y') }}
    </div>
    <div class="float-right">
        <a class="text-muted" href="mailto:{{ config('setting.general.web_email') }}">
            {!! config('setting.general.copyright') !!}
        </a>
    </div>
</footer>
