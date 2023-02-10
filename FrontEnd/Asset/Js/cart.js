var cart;

window.addEventListener("load", function() {
    // your code here
    document.getElementById("add-cart-1234").addEventListener("click", addProduct);
    //const data = element.dataset.pid;
    cart= document.querySelector('.cart span');
    console.log(cart);

});

function addProduct() {
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

  
