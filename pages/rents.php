<?php
?>

<div class="mb-4">
    <form class="form-inline">
        <div class="form-group mr-3">
            <label for="type" class="mr-2">Type:</label>
            <select class="form-control" id="type" name="rent">
                <option value="">Select One</option>
                <option value="books">Books</option>
                <option value="equipment">Equipment</option>
            </select>
        </div>
        <div class="form-group mr-3">
            <label for="status" class="mr-2">Status:</label>
            <select class="form-control" id="status" name="status">
                <option value="">Select One</option>
                <option value="rented">Rented</option>
                <option value="returned">Returned</option>
            </select>
        </div>

        <button class="btn btn-primary btn-filter">Filter</button>
    </form>
</div>

<table class="table table-striped">
    <thead>
    <tr>
        <th>S/N</th>
        <th>User</th>
        <th>Type</th>
        <th>Status</th>
        <th>Created At</th>
    </tr>
    </thead>
    <tbody id="rentRow"></tbody>
</table>

<nav class="mt-4">
    <ul class="pagination">
        <nav>
            <ul class="pagination" id="pagination-rent-list">
            </ul>
        </nav>
    </ul>
</nav>
