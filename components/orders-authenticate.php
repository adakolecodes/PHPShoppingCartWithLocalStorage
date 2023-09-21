<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Enter email to view orders</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="orders.php" method="GET">
                    <div class="mb-3">
                        <label for="customer_email" class="col-form-label">Email:</label>
                        <input type="email" class="form-control" name="customer_email" id="customer_email" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="viewOrders" class="btn btn-dark btn-sm">Proceed</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>