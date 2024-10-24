@extends('layouts.app')

@section('content')
<!-- Centered title under the navbar -->
<h1 class="page-title">Edit Order</h1>

<form id="editOrderForm" action="{{ route('orders.update', $order->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="customer">Customer</label>
    <select name="customer_id" id="customer" required>
        <option value="">Select Customer</option> <!-- Default option to trigger validation -->
        @foreach($customers as $customer)
            <option value="{{ $customer->id }}" {{ $order->customer_id == $customer->id ? 'selected' : '' }}>
                {{ $customer->name }}
            </option>
        @endforeach
    </select>

    <label for="service">Service</label>
    <select name="service_id" id="service" required>
        <option value="">Select Service</option> <!-- Default option to trigger validation -->
        @foreach($services as $service)
            <option value="{{ $service->id }}" data-price="{{ $service->price }}" {{ $order->service_id == $service->id ? 'selected' : '' }}>
                {{ $service->service_name }}
            </option>
        @endforeach
    </select>

    <label for="order_date">Order Date</label>
    <input type="date" name="order_date" id="order_date" value="{{ $order->order_date }}" required>

    <!-- Updated Payment Status Dropdown -->
    <label for="status">Payment Status</label>
    <select name="status" id="status" required>
        <option value="">Select Payment Status</option>
        <option value="Paid" {{ $order->status == 'Paid' ? 'selected' : '' }}>Paid</option>
        <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
    </select>

    <label for="weight">Weight (kg)</label>
    <input type="number" step="0.01" name="weight" id="weight" value="{{ $order->weight }}" required>

    <label for="price">Price (Rp)</label>
    <input type="number" step="0.01" name="price" id="price" value="{{ $order->price }}" readonly>

    <!-- Checkbox for Laundry Not Taken Yet -->
    <div class="form-group">
        <label for="pending" class="not-taken-label">
            <input type="checkbox" id="pending" name="pending" onclick="toggleDateInput()" class="not-taken-checkbox"> 
            Laundry Not Taken Yet
        </label>
    </div>
    
    <!-- Date Taken Input -->
    <div class="form-group">
        <label for="date_taken">Date Taken</label>
        <input type="date" name="date_taken" id="date_taken" value="{{ $order->date_taken }}" required>
    </div>
    
    <!-- Update Order Button -->
    <button type="button" id="submitOrderBtn" class="back-btn" onclick="validateForm()">Update Order</button>
</form>

<!-- Back Button -->
<a href="{{ route('orders.index') }}" class="back-btn">Back to Homepage</a>

<!-- Modal for confirmation -->
<div id="confirmationModal" class="modal">
    <div class="modal-content">
        <h2>Are you sure you want to update this order?</h2>
        <div class="modal-buttons">
            <button id="confirmOrderBtn">Yes, Update Order</button>
            <button id="cancelModalBtn" class="cancel-btn">No, Go Back</button>
        </div>
    </div>
</div>

<!-- Modal for warning -->
<div id="warningModal" class="modal">
    <div class="modal-content">
        <h2>Please fill in all the required fields.</h2>
        <div class="modal-buttons">
            <button id="closeWarningModalBtn" class="cancel-btn">Close</button>
        </div>
    </div>
</div>

<script>
    function toggleDateInput() {
        const checkbox = document.getElementById('pending');
        const dateInput = document.getElementById('date_taken');

        if (!checkbox.checked) {
            dateInput.disabled = false;
            dateInput.required = true;
        } else {
            dateInput.disabled = true;
            dateInput.value = "";
            dateInput.required = false;
        }
    }

    window.onload = function() {
        toggleDateInput();
    };

    function validateForm() {
        const dateInput = document.getElementById('date_taken');
        const checkbox = document.getElementById('pending');

        if (!checkbox.checked && !dateInput.value) {
            alert("Please enter the Date Taken when Laundry Not Taken Yet is not checked.");
            return false;
        }

        return true;
    }

    const submitOrderBtn = document.getElementById('submitOrderBtn');
    const confirmationModal = document.getElementById('confirmationModal');
    const warningModal = document.getElementById('warningModal');
    const confirmOrderBtn = document.getElementById('confirmOrderBtn');
    const cancelModalBtn = document.getElementById('cancelModalBtn');
    const closeWarningModalBtn = document.getElementById('closeWarningModalBtn');
    const editOrderForm = document.getElementById('editOrderForm');
    const weightInput = document.getElementById('weight');
    const priceInput = document.getElementById('price');
    const serviceSelect = document.getElementById('service');

    function calculatePrice() {
        const selectedService = serviceSelect.options[serviceSelect.selectedIndex];
        const servicePrice = parseFloat(selectedService.getAttribute('data-price')) || 0;
        const weight = parseFloat(weightInput.value) || 0;
        const totalPrice = servicePrice * weight;

        priceInput.value = totalPrice.toFixed(2);
    }

    weightInput.addEventListener('input', calculatePrice);
    serviceSelect.addEventListener('change', calculatePrice);

    submitOrderBtn.addEventListener('click', function() {
        if (validateForm()) {
            confirmationModal.style.display = 'flex';
        } else {
            warningModal.style.display = 'flex';
        }
    });

    cancelModalBtn.addEventListener('click', function() {
        confirmationModal.style.display = 'none';
    });

    closeWarningModalBtn.addEventListener('click', function() {
        warningModal.style.display = 'none';
    });

    confirmOrderBtn.addEventListener('click', function() {
        editOrderForm.submit();
    });

    calculatePrice();
</script>



@endsection
