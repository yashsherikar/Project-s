let openShopping = document.querySelector('.shopping');
let closeShopping = document.querySelector('.closeShopping');
let list = document.querySelector('.list');
let listCard = document.querySelector('.listCard');
let body = document.querySelector('body');
let total = document.querySelector('.total');
let quantity = document.querySelector('.quantity');

openShopping.addEventListener('click', ()=>{
    body.classList.add('active');
})
closeShopping.addEventListener('click', ()=>{
    body.classList.remove('active');
})

let products = [
    {
        id: 1,
        name: 'Diya',
        image: 'product-1.jpg',
        Discription :'This Is Best Diya',
        price: 399
    },
    {
        id: 2,
        name: 'Diya',
        image: 'product-2.jpg',
        price: 400
    },
    {
        id: 3,
        name: 'PRODUCT NAME 3',
        image: 'product-3.jpg',
        price: 280
    },
    {
        id: 4,
        name: 'stone keychain',
        image: 'product-4.jpg',
        price: 250
    },
    {
        id: 5,
        name: 'stone keychain',
        image: 'product-5.jpg',
        price: 300
    },
    {
        id: 6,
        name: 'stone keychain',
        image: 'product-6.jpg',
        price: 290
    },
    {
        id: 7,
        name: 'name keychain',
        image: 'product-7.jpg',
        price: 150
    },
    {
        id: 8,
        name: 'soft toy keychain',
        image: 'product-8.jpg',
        price: 120
    },
    {
        id: 9,
        name: 'keychain',
        image: 'product-9.jpg',
        price: 150
    },
    {
        id: 10,
        name: 'pendent',
        image: 'product-10.jpg',
        price: 199
    },
    {
        id: 11,
        name: 'earring',
        image: 'product-11.jpg',
        price: 220
    },
    {
        id: 12,
        name: 'earring',
        image: 'product-12.jpg',
        price: 180
    },
    {
        id: 13,
        name: 'key holder',
        image: 'product-13.jpg',
        price: 499
    },
    {
        id: 14,
        name: 'wooden lamp',
        image: 'product-14.jpg',
        price: 799
    },
    {
        id: 15,
        name: 'pen holder',
        image: 'product-15.jpg',
        price: 250
    },
    {
        id: 16,
        name: '',
        image: 'product-16.jpg',
        price: 250
    },
    {
        id: 17,
        name: 'PRODUCT NAME 5',
        image: 'product-17.jpg',
        price: 499
    },
    {
        id: 18,
        name: 'PRODUCT NAME 6',
        image: 'product-18.jpg',
        price: 499
    },
    {
        id: 19,
        name: 'PRODUCT NAME 1',
        image: 'product-19.jpg',
        price: 299
    },
    {
        id: 20,
        name: 'PRODUCT NAME 2',
        image: 'product-20.jpg',
        price: 699
    },
    {
        id: 21,
        name: 'PRODUCT NAME 3',
        image: 'product-21.jpg',
        price: 300
    },
    
];
let listCards  = [];
function initApp(){
    products.forEach((value, key) =>{
        let newDiv = document.createElement('div');
        newDiv.classList.add('item');
        newDiv.innerHTML = `
            <img src="image/${value.image} "  onclick="alert('${value.Discription}')">
            <div style ="font-size: 15px;" class="title">${value.name}</div>
            <div style ="font-size: 15px;"class="price">${value.price.toLocaleString()} ₹ </div>
            <button onclick="addToCard(${key})">Add To Card</button>`;
        list.appendChild(newDiv);

        
    })
}

initApp();
function addToCard(key){
    if(listCards[key] == null){
        // copy product form list to list card
        listCards[key] = JSON.parse(JSON.stringify(products[key]));
        listCards[key].quantity = 1;
    }
    reloadCard();
}
function reloadCard(){
    listCard.innerHTML = '';
    let count = 0;
    let totalPrice = 0;
    listCards.forEach((value, key)=>{
        totalPrice = totalPrice + value.price;
        count = count + value.quantity;
        if(value != null){
            let newDiv = document.createElement('li');
            newDiv.innerHTML = `
                <div><img src="image/${value.image}"/></div>
                <div>${value.name}</div>
                <div>${value.price.toLocaleString()}</div>
                <div>
                    <button onclick="changeQuantity(${key}, ${value.quantity - 1})">-</button>
                    <div class="count">${value.quantity}</div>
                    <button onclick="changeQuantity(${key}, ${value.quantity + 1})">+</button>
                </div>`;
                listCard.appendChild(newDiv);
        }
    })
    total.innerText = totalPrice.toLocaleString();
    quantity.innerText = count;
}
function changeQuantity(key, quantity){
    if(quantity == 0){
        delete listCards[key];
    }else{
        listCards[key].quantity = quantity;
        listCards[key].price = quantity * products[key].price;
    }
    reloadCard();
}