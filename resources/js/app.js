import './bootstrap';
import {
    Confirmation,
    initMaxLength,
    initSelect2,
    initThemeMode
} from './general';

// global object for custom javascript because separated JS file cannot access $wire object like in component view
window.$wire;

// Runs after Livewire is loaded but before it's initialized
document.addEventListener('livewire:init', () => {
    // sweetalert confirmation
    Livewire.on('confirm', confirmEvent);
});

// Runs immediately after Livewire has finished initializing
document.addEventListener('livewire:initialized', function () {
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

// Triggered as the final step of any page navigation...
document.addEventListener('livewire:navigated', function () {
    // initialize common libraries after navigate to other route
    initCommonLibraries();
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
