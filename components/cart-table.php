<div>
    <table class="table table-sm">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Item Cost</th>
                <th>Action</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cart as $cartItem) : ?>
                <?php
                $productId = $cartItem['productId'];
                $productId = (int)$productId;//Convert product Id to int
                $quantity = $cartItem['quantity'];
                $product = $productInstance->getProductById($productId);
                $itemCost = $product['product_price'] * $quantity;
                $totalCost += $itemCost;
                ?>
                <tr>
                    <td><?php echo $product['product_name']; ?></td>
                    <td>$<?php echo number_format($product['product_price'], 2); ?></td>
                    <td>
                        <button class="btn btn-sm btn-secondary" id="decrementCart" data-product-id="<?php echo $productId; ?>" onclick="location.reload();">-</button>
                        <span id="quantityLabel_<?php echo $productId; ?>"><?php echo $quantity; ?></span>
                        <button class="btn btn-sm btn-secondary" id="addToCart" data-product-id="<?php echo $productId; ?>" data-product-name="<?php echo $product['product_name']; ?>" data-product-price="<?php echo $product['product_price']; ?>" data-quantity="1" onclick="location.reload();">+</button>
                    </td>
                    <td>$<?php echo number_format($itemCost, 2); ?></td>
                    <td>
                        <button class="btn btn-sm btn-danger" id="removeFromCart" data-product-id="<?php echo $productId; ?>" onclick="location.reload();">Remove</button>
                    </td>
                    <td><a href="product.php?id=<?php echo $productId; ?>" class="btn btn-sm btn-link">View product</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div>
    <h3>Total Cost: $<?php echo number_format($totalCost, 2); ?></h3>
</div>
<div class="mt-5">
    <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Proceed to checkout</button>
</div>