// Wait for the HTML document to be fully loaded and parsed (the code inside the callback function will be executed after the HTML document has loaded)
document.addEventListener('DOMContentLoaded', function () {

    // Function to add a product to the cart
    function addToCart(productId, productName, productPrice, quantity) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        // Check if the product is already in the cart
        let cartItem = cart.find(item => item.productId === productId);

        if (cartItem) {
            // If the product exists, increment its quantity
            cartItem.quantity += quantity;
        } else {
            // If the product doesn't exist, add it to the cart
            cart.push({ productId, productName, productPrice, quantity });
            location.reload();// Refresh the page only once when a product is being added to cart for the first time, so the product page reloads with the product from session
        }

        localStorage.setItem('cart', JSON.stringify(cart));

        sendCartItemsToServer(cart);// Send the cart items to the server
    }

    // Event delegation for "Add to Cart" and "Decrement" button clicks
    document.addEventListener('click', function (event) {
        if (event.target && event.target.classList.contains('btn')) {
            if (event.target.id === 'addToCart') {
                let productId = event.target.getAttribute('data-product-id');
                let productName = event.target.getAttribute('data-product-name');
                let productPrice = parseFloat(event.target.getAttribute('data-product-price'));
                let quantity = parseInt(event.target.getAttribute('data-quantity'));

                addToCart(productId, productName, productPrice, quantity);
                updateCartUI(productId);
                
            } else if (event.target.id === 'decrementCart') {
                let productId = event.target.getAttribute('data-product-id');
                decrementCartItem(productId);
            } else if (event.target.id === 'removeFromCart') {
                let productId = event.target.getAttribute('data-product-id');
                removeCartItem(productId);
            }
        }
    });


    // Function to send cart items to the server using AJAX
    function sendCartItemsToServer(cart) {
        fetch('data/retrieve_cart_items.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ cartItems: cart }),
        })
        .then(response => {
            // Handle the response if needed
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }


    // Function to decrement the quantity of a cart item
    function decrementCartItem(productId) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        // Check if the product is already in the cart
        let cartItem = cart.find(item => item.productId === productId);

        if (cartItem && cartItem.quantity > 1) {
            // Decrement the quantity by 1 if it's greater than 1
            cartItem.quantity--;
            localStorage.setItem('cart', JSON.stringify(cart));
            sendCartItemsToServer(cart);
            updateCartUI(productId);
        } else if (cartItem && cartItem.quantity === 1) {
            // Remove the item from the cart if the quantity is 1
            removeCartItem(productId);
            location.reload();// Reload the page when an item is removed from cart, so the cart page reloads (without the cart item showing) with the new value of the session (which is empty)
        }
    }

    // Function to remove a cart item by product ID
    function removeCartItem(productId) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        // Remove the item with the specified productId from the cart
        let updatedCart = cart.filter(item => item.productId !== productId);
        localStorage.setItem('cart', JSON.stringify(updatedCart));
        sendCartItemsToServer(updatedCart);
        updateCartUI(productId);
    }

    // Function to update the cart UI (quantity label)
    function updateCartUI(productId) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        // Check if the product is already in the cart
        let cartItem = cart.find(item => item.productId === productId);

        if (cartItem) {
            // If the product is in the cart, display its quantity
            document.getElementById(`quantityLabel_${productId}`).textContent = cartItem.quantity;
        } else {
            // If the product is not in the cart, hide the quantity label
            document.getElementById(`quantityLabel_${productId}`).textContent = '';
        }
    }

    // Call updateCartUI for each product on page load
    // This will display the quantity if a product is already in the cart
    let productIds = document.querySelectorAll('[data-product-id]');
    productIds.forEach(productId => {
        updateCartUI(productId.getAttribute('data-product-id'));
    });
});
