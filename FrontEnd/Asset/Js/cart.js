
let products = document.querySelectorAll('.product');
	console.log(products);
let	cart= document.querySelector('.cart span');
	console.log(cart);	

// window.addEventListener("load", function() {

// });

products.forEach(function (element) {
	btnAdd = element.querySelector('.buy-button');
	btnAdd.addEventListener('click', addProduct);
});

function populate() { // get items on page load
	let prod = JSON.parse(localStorage.getItem('myCart')) || 0;

	if (prod) cart.textContent = prod.length + ' ';

	if (!cartProducts || prod == 0) return;

	let total = 0;
	prod.forEach(function (el) {
		let t = el.price.split('').filter(a => !isNaN(a)).join(''); //convert to number
		total += (Number(t) * el.quantity);
	});

	prod.forEach(function (p) { // fill the cart products

		const el = document.createElement('tr');
		el.innerHTML = (` 
			<th>${p.p_id}</th>
			<td>${p.title}</td>
			<td>${p.quantity}</td>
			<td>${p.price}</td>
		`);
		cartProducts.appendChild(el);
	});

	const totalContainer = document.createElement('div');
	totalContainer.style.fontSize = '1.2rem';
	totalContainer.textContent = `Total : $${total}`;

	const wrapper = document.querySelector('.wrapper');
	wrapper.insertBefore(totalContainer, btnCheckout);

};


function addProduct() {
	console.log("addProduct");
	const pid = this.dataset.pid;
	const parent = this.parentNode;
	const productBody = parent.parentNode;

	const title = productBody.querySelector('.card-title').innerHTML;
	const price = parent.querySelector('.price').innerHTML;

	let prod = JSON.parse(localStorage.getItem('myCart')) || [];

	const item = {
		p_id: pid,
		title,
		quantity: 1,
		price
	};

	let productExists = false;
	// check if a product already exist in the cart
	for (let i = 0; i < prod.length; i++) {
		if (prod[i]['p_id'] === pid) {
			prod[i]['quantity'] += 1;
			productExists = true;
			break;
		}
	}

	if (!productExists) {
		prod.push(item);
	}

	localStorage.setItem('myCart', JSON.stringify(prod));
	cart.textContent = ' ' + prod.length;    
    saveToDb(item.p_id);

	//console.log(localStorage.getItem('myCart')); //    
}

function saveToDb(data){    
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "http://localhost/shoeproject_1/Logic/CartLogic/savecart.php?data="+data, true);
       // console.log("http://localhost/shoeproject_1/Logic/CartLogic/savecart.php?data="+data);
        xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            // Handle response from PHP function
        }};
        xhr.send();    
        //window.location.href = "yourphpfile.php?action=callFunction";
}

function updateDb(data){
    
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/Logic/CartLogic/savecart.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.send(data);

    xhr.onreadystatechange = function() {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
        // Handle response from PHP function
    }
    };

}

// function checkout(argument) {
// 	localStorage.removeItem('myCart');

// 	cartProducts.innerHTML = '';
// 	cart.textContent = '0 ';
// }
// if (btnCheckout) {
// 	btnCheckout.addEventListener('click', checkout);
// }

  
