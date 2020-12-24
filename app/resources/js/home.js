const changeInfoBtn = document.querySelector('#changePersonInfoButton');
const changeInfoSubmit = document.querySelector('#changePersonInfoSubmit'); 
const changeInfoInputs = document.querySelectorAll('.person-info-input');

const safeValues = [];
changeInfoInputs.forEach(function (input, key, inputs) {
    safeValues.push(input.value);
});

changeInfoBtn.addEventListener('click', () => {
    if (!changeInfoBtn.classList.contains('clicked')) {
        changeInfoInputs.forEach(function (input, key, inputs) {
            input.disabled = false;        
        });
        changeInfoBtn.classList.add('clicked');
        changeInfoBtn.classList.remove('btn-secondary');
        changeInfoBtn.textContent = 'Отмена';
        changeInfoSubmit.classList.remove('d-none');
    } else {
        changeInfoInputs.forEach(function (input, key, inputs) {
            input.disabled = true;     
            input.value = safeValues[key];
        });
        changeInfoBtn.classList.add('btn-secondary');
        changeInfoSubmit.classList.add('d-none');
        changeInfoBtn.classList.remove('clicked');
        changeInfoBtn.textContent = 'Изменить';
    }
});