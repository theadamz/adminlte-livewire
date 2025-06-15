import './bootstrap';
import {
    Confirmation,
    initMaxLength,
    initSelect2,
    initThemeMode,
    LoadingProgress,
    Notification
} from './general';

// global object for custom javascript because separated JS file cannot access $wire object like in component view
window.$wire;

document.addEventListener('alpine:init', () => {
    // global state for in progress navigate
    Alpine.store('navigate', {
        loading: true,
        to: null,
        start(url) {
            this.loading = true;
            this.to = url;
        },
        stop() {
            this.loading = false;
            this.to = null;
        }
    });
});

// Runs after Livewire is loaded but before it's initialized
document.addEventListener('livewire:init', (e) => {
    // sweetalert
    Livewire.on('confirm', confirmEvent);
    Livewire.on('notify', notifEvent);
    Livewire.on('loading', loadingEvent);
    Livewire.on('loading-hide', loadingHideEvent);

    setTimeout(() => {
        // set global object for $wire so that $wire can be access by other separated JS file
        window.$wire = Livewire.first();
    }, 100);
});

// Runs immediately after Livewire has finished initializing
document.addEventListener('livewire:initialized', function (e) {
    // set global object for $wire so that $wire can be access by other separated JS file
    window.$wire = Livewire.first();

    // Runs after all child elements in `component` are morphed
    Livewire.hook('morphed', () => {
        // after component morphed global object $wire will set again
        window.$wire = Livewire.first();

        // initialize common libraries after component rerender
        initCommonLibraries();
    });
});

// Triggered as the first step of any page navigation...
document.addEventListener('livewire:navigate', event => {
    // set global navigate
    Alpine.store('navigate').start(event.detail.url.href);
});

// Triggered as the final step of any page navigation...
document.addEventListener('livewire:navigated', function (e) {
    // initialize common libraries after navigate to other route
    initCommonLibraries();

    // reset
    setTimeout(() => {
        Alpine.store('navigate').stop();
    }, 100);
});

function initCommonLibraries() {
    // check if element has form-select2 class
    if (document.getElementsByClassName('form-select2').length > 0) {
        const elements = document.getElementsByClassName('form-select2');
        for (const item of elements) {
            initSelect2({
                element: `[name="${item.getAttribute('name')}"]`
            });
        }
    }

    // check if element has form-maxlength class
    if (document.getElementsByClassName('form-maxlength').length > 0) {
        const elements = document.getElementsByClassName('form-maxlength');
        for (const item of elements) {
            initMaxLength({
                element: `[name="${item.getAttribute('name')}"]`
            });
        }
    }


    // bootstrap file input
    if (typeof bsCustomFileInput !== 'undefined') {
        bsCustomFileInput.init();
    }

    // tooltip
    $('[data-toggle="tooltip"]').tooltip({
        trigger: 'hover',
    });

    // theme mode
    initThemeMode();
}

async function confirmEvent(data) {
    const confirmation = await Confirmation({
        message: data.message,
        title: data.title,
        type: data.type,
    });
    if (!confirmation.isConfirmed) return;

    // execute
    if (data.hasOwnProperty('method')) executeMethod(data);
    if (data.hasOwnProperty('dispatch')) executeDispatch(data);
}

function executeMethod(data) {
    if (!data.hasOwnProperty('method')) return;

    if (data.parameters) {
        if (data.method) Livewire.first().call(data.method, ...Object.values(data.parameters));
    } else {
        if (data.method) Livewire.first().call(data.method);
    }
}

function executeDispatch(data) {
    if (!data.hasOwnProperty('dispatch')) return;

    if (data.parameters) {
        Livewire.dispatch(data.dispatch, ...Object.values(data.parameters));
    } else {
        Livewire.dispatch(data.dispatch);
    }
}

function notifEvent(data) {
    Notification({
        message: data.message,
        title: data.title,
        type: data.type,
    });
}

function loadingEvent(data = null) {
    if (data === null) {
        LoadingProgress({
            show: true
        });
        return;
    }

    LoadingProgress({
        show: true,
        title: data.title,
        message: data.message,
        timer: data.timer
    });
}

function loadingHideEvent() {
    LoadingProgress({
        show: false
    });
}
