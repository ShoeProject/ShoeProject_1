
// let products = document.querySelectorAll('.product');
// 	console.log(products);

// 	console.log(cart);	

window.addEventListener("load", function() {
	cart = document.querySelector('.cart span');
	const btnCheckout = document.querySelector('.btn-checkout'); // cart checkout
});

// window.onbeforeunload = function() {
// 	// let prod = JSON.parse(localStorage.getItem('myCart')) || [];
// 	// localStorage.setItem('myCart', JSON.stringify(prod));
// 	console.log(prod.length);
// 	setCartCount(prod.length);
// };
  

// products.forEach(function (element) {
// 	btnAdd = element.querySelector('.buy-button');
// 	btnAdd.addEventListener('click', addProduct);
// });

function removeFromCart(id){
	const pid = id;
	let prod = JSON.parse(localStorage.getItem('myCart')) || [];	

	let productExists = false;
	// check if a product already exist in the cart
	for (let i = 0; i < prod.length; i++) {
		if (prod[i]['p_id'] === pid) {
			prod.splice(i, 1);	
			break;
		}
	}	
	
	removeFromDb(pid);		



	localStorage.setItem('myCart', JSON.stringify(prod));	
	setCartCount(prod.length);
	//	
}

function addProduct(id) {
	const pid = id;
	let prod = JSON.parse(localStorage.getItem('myCart')) || [];	

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
		const item = {
			p_id: pid,
			quantity: 1
		};

		prod.push(item);		
		setCartCount(prod.length);    
    	saveToDb(item.p_id);
		console.log("save cart");
	}
	
	if(productExists){
		// updateToDb(pid);
		// console.log("update cart");
	}

	localStorage.setItem('myCart', JSON.stringify(prod));
	
}

function setCartCount(len){
	cart.textContent = ' ' + len;    
}

// function checkout(argument) {
// 	localStorage.removeItem('myCart');

// 	cartProducts.innerHTML = '';
// 	cart.textContent = '0 ';
// }
// if (btnCheckout) {
// 	btnCheckout.addEventListener('click', checkout);
// }

function saveToDb(data){    
	var xhr = new XMLHttpRequest();
	xhr.open("GET", "http://localhost/shoeproject_1/Logic/CartLogic/savecart.php?data="+data, true);
	xhr.onreadystatechange = function() {
	if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
		// Handle response from PHP function
	}};
	xhr.send();    
	//window.location.href = "yourphpfile.php?action=callFunction";
}

function updateToDb(data){
	var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://localhost/shoeproject_1/Logic/CartLogic/updatecart.php?data="+data, true);
    xhr.onreadystatechange = function() {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            // Handle response from PHP function
    }};
    xhr.send(); 
}

function removeFromDb(data){
	var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://localhost/shoeproject_1/Logic/CartLogic/removecart.php?data="+data, true);
    xhr.onreadystatechange = function() {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
        // Handle response from PHP function
		location.reload();
    }};
    xhr.send();
}

  
