<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Check out</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="processes/checkout-process.php" method="post">
                    <div class="mb-3">
                        <label for="customer_email" class="col-form-label">Email:</label>
                        <input type="email" class="form-control" name="customer_email" id="customer_email" required>
                    </div>
                    <div class="mb-3">
                        <label for="customer_name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" name="customer_name" id="customer_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="shipping_address" class="col-form-label">Shipping Address:</label>
                        <textarea class="form-control" name="shipping_address" id="shipping_address" required></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="order" class="btn btn-dark btn-sm">Place order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>