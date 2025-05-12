import './bootstrap';
import {
    initSelect2
} from './general';

if (document.getElementsByClassName('form-select2').length > 0) {
    const elements = document.getElementsByClassName('form-select2');
    for (const item of elements) {
        initSelect2(`[name="${item.getAttribute('name')}"]`);
    }
}
