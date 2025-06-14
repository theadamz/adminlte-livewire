import {
    sleep
} from "../../general";

const initComponentEvents = () => {
    $('#timezone').on("select2:select", function (e) {
        $wire.set('timezone', e.params.data.id);
    });
}

Livewire.on('init-js-component', async () => {
    await sleep(100)
    initComponentEvents();
});
