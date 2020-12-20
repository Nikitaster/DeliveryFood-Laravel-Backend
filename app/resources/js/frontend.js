const cartButton = document.querySelector('#cart-button');
const closeModalButton = document.querySelector('.close');
const modal = document.querySelector('.modal');
const hideModal = document.querySelector('#btn-close');

const ToggleModal = (event) => {
    modal.classList.toggle('is-open');
};

cartButton.addEventListener('click', ToggleModal);
closeModalButton.addEventListener('click', ToggleModal);
hideModal.addEventListener('click', ToggleModal);
document.addEventListener('keydown', (event) => {
    if (event.key = 'Escape' && modal.classList.contains('is-open')) {
        ToggleModal();
    }
});