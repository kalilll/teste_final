import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    const dialog = document.getElementById('dialog');

    document.querySelectorAll('[command="show-modal"][commandfor="dialog"]').forEach(btn => {
        btn.addEventListener('click', () => {
            dialog.showModal();
        });
    });

    document.querySelectorAll('[command="close"][commandfor="dialog"]').forEach(btn => {
        btn.addEventListener('click', () => {
            dialog.close();
        });
    });
});
