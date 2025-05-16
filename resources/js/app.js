import './bootstrap';
import {
    initMaxLength,
    initSelect2,
    initThemeMode
} from './general';

// global object for custom javascript because separated JS file cannot access $wire object like in component view
window.$wire;

document.addEventListener('livewire:initialized', function () {
    // set global object for $wire after livewire finished initializing
    window.$wire = Livewire.first();

    Livewire.hook('morphed', () => {
        // set global object for $wire after all child elements in `component` are morphed
        window.$wire = Livewire.first();

        // Runs common libraries after all child elements in `component` are morphed
        initCommonLibraries();
    });
});

document.addEventListener('livewire:navigated', function () {
    // Runs common libraries immediately after Livewire has finished navigated
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
