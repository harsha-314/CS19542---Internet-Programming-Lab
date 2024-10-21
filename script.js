document.addEventListener("DOMContentLoaded", () => {
    fetchProducts();
});

function fetchProducts() {
    fetch('get_products.php')
        .then(response => response.json())
        .then(products => {
            const productContainer = document.getElementById("products");
            products.forEach(product => {
                const productDiv = document.createElement("div");
                productDiv.classList.add("product");
                productDiv.dataset.id = product.id;
                productDiv.dataset.name = product.name;
                productDiv.dataset.price = product.price;

                productDiv.innerHTML = `
                    <h4>${product.name}</h4>
                    <p>Price: $${product.price}</p>
                    <button class="add-to-cart" data-id="${product.id}">Add to Cart</button>
                `;

                productContainer.appendChild(productDiv);
            });

            // Attach event listeners to new buttons
            document.querySelectorAll(".add-to-cart").forEach(button => {
                button.addEventListener("click", () => {
                    const productId = button.dataset.id;
                    addToCart(productId);
                });
            });
        });
}

function addToCart(productId) {
    const quantity = 1; // Example quantity, you can modify this
    fetch('add_to_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `product_id=${productId}&quantity=${quantity}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            updateCart(); // Call your existing function to update the cart
        }
    });
}
