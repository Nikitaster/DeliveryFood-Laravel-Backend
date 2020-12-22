let card = document.querySelectorAll('.card-text-good');
let addButtons = document.querySelectorAll('.add-to-busket-btn');
let createOrderButton = document.querySelector('.create_order_button');

const createCartRow = (name, price, amount) => {
    let foodRow = document.createElement('div');
    foodRow.classList.add('food-row');
    
    let foodName = document.createElement('span');
    foodName.classList.add('food-name');
    foodName.textContent = name;

    let foodPrice = document.createElement('strong');
    foodPrice.classList.add('food-price');
    foodPrice.textContent = price + ' ₽';

    let foodCounter = document.createElement('div');
    foodCounter.classList.add('food-counter');

    let counterBtnMinus = document.createElement('button');
    counterBtnMinus.classList.add('counter-button');
    counterBtnMinus.textContent = '–';
    counterBtnMinus.addEventListener('click', () => {
        busket.dropFromCart(name);
    });

    let counter = document.createElement('span');
    counter.classList.add('counter');
    counter.textContent = amount;

    let counterBtnPlus = document.createElement('button');
    counterBtnPlus.classList.add('counter-button');
    counterBtnPlus.textContent = '+';
    counterBtnPlus.addEventListener('click', () => {
        busket.addToCart(name);
    });

    foodCounter.append(counterBtnMinus);
    foodCounter.append(counter);
    foodCounter.append(counterBtnPlus);

    foodRow.append(foodName);
    foodRow.append(foodPrice);
    foodRow.append(foodCounter);
    
    return foodRow;
}

class Busket {
    constructor() {
        this.items = [];
        this.total = 0;

        for(let i=0; i<localStorage.length; i++) {
            let key = localStorage.key(i);
            if (key == 'restaurant') {
                continue;
            }
            let value = localStorage.getItem(key);
            value = value.split(',');
            this.addPageItems(key, Number(value[1]), Number(value[0]));
        }
        // this.checkRestaurantsOwnGoods();
        this.drawCatItems();
    }

    reset() {
        this.items = [];
        this.updateLocalStorage();
        this.drawCatItems();
    }

    addPageItems(name, price, amount=0) {
        for(let i = 0; i < this.items.length; ++i) {
            if(this.items[i]['name'] == name) {
                this.items[i]['price'] = price;
                this.items[i]['amount'] = amount;
                return; 
            }    
        }   
        this.items.push({
            'name': name,
            'price': price,
            'amount': amount,
        });  
    }

    addToCart(name) {
        for(let i = 0; i < this.items.length; ++i) {
            if(this.items[i]['name'] == name) {
                this.items[i]['amount'] = Number(this.items[i]['amount']) + 1;
                this.updateLocalStorage();
                this.drawCatItems();
            }
        }
    }

    dropFromCart(name) {
        for(let i = 0; i < this.items.length; ++i) {
            if(this.items[i]['name'] == name) {
                this.items[i]['amount'] = Number(this.items[i]['amount']) - 1;
                this.updateLocalStorage();
                this.drawCatItems();
            }
        }
    }

    updateLocalStorage() {
        for(let i = 0; i < this.items.length; ++i) {
            let name = this.items[i]['name'];
            let price = this.items[i]['price'];
            let amount = this.items[i]['amount'];
            localStorage.setItem(name, [amount, price]);  
        }
    }

    checkRestaurantsOwnGoods() {
        for(let i = 0; i < this.items.length; ++i) {
            if (this.items[i]['restaurant'] != localStorage.getItem('restaurant').split(',')[0]) {
                this.items.splice(i, 1);
            }
        }
    }

    drawCatItems() {
        document.querySelector('.cart-modal-body').innerHTML = '';
        document.querySelector('.cart-rest-name').textContent = '';
        this.total = 0;
        for(let i = 0; i < this.items.length; ++i) {
            if (this.items[i]['amount'] > 0) {
                let currentSum = Number(this.items[i]['price']) * Number(this.items[i]['amount']);
                document.querySelector('.cart-modal-body').append(createCartRow(
                    this.items[i]['name'],
                    currentSum,
                    this.items[i]['amount'],
                ));
                this.total = this.total + currentSum;
            }
        }

        document.querySelector('.modal-price-tag').textContent = this.total + ' ₽';
        if (localStorage.getItem('restaurant'))
            document.querySelector('.cart-rest-name').textContent = 'Заказ из "' + localStorage.getItem('restaurant') + '":';
    }

    async send() {
        let data = [];
        this.items.forEach(function (item, key, items) {
           if (Number(item['amount']) > 0) {
               data.push(item);
           }
        });

        if (!data.length) {
            alert('Корзина пуста!');
            return; 
        }

        data.push({'restaurant': localStorage.getItem('restaurant')});
        data.push({'address': document.querySelector('.input-address').value});
        
        let inputs = document.querySelectorAll('input');
        let csrf = '';
        inputs.forEach(function (input, key, inputs) {
            if(input.name == "_token") {
                csrf = String(input.value);
            }
        })

        let response = fetch('/create-order', {
            method: 'POST', 
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrf,
            },
            body: JSON.stringify(data),
        });

        let result = await response;

        if (result.redirected){
            localStorage.clear();
            document.querySelector('.cart-rest-name').textContent = '';
            window.location.href = result.url;
        }
        else {
            alert('Ошибка при отправке заказа!');
        }
        // .then(response => response.status)
        // .then(data => {
        //     console.log('Success:', data);
        // })
        // .catch((error) => {
        //     console.error('Error:', error);
        // });
    }
}

let busket = new Busket();

const CreateItems = () => { 
        card.forEach(function (card, key, cards) {
        let name = card.firstElementChild.firstElementChild.textContent;
        let price = Number(card.lastElementChild.lastElementChild.textContent.split('₽')[0]);
        
        busket.addPageItems(name, price);
    })
}

addButtons.forEach(function (btn, key, addButtons) {
    btn.addEventListener('click', (event) => {
        let pageRestaurant = document.querySelector('.restaurant-name').textContent;
        let storageRestaurant = localStorage.getItem('restaurant');
        if (pageRestaurant != storageRestaurant) {
            localStorage.clear();
            document.querySelector('.cart-rest-name').textContent = '';
            busket = new Busket();
            CreateItems();
        }
        
        localStorage.setItem('restaurant', document.querySelector('.restaurant-name').textContent);

        busket.addToCart(btn.name);
    }) 
});

createOrderButton.addEventListener('click', () => {
    busket.send();
});