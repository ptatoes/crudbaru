@extends('layouts.app')

@section('content')
<div class="service-edit-page">
    <h1 class="page-title">Edit Service</h1>

    <!-- Form for editing an existing service -->
    <form id="editServiceForm" action="{{ route('services.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="service_name">Service Name:</label>
        <input type="text" id="service_name" name="service_name" value="{{ old('service_name', $service->service_name) }}" required><br>

        <label for="price">Price (Rupiah):</label>
        <input type="number" id="price" name="price" value="{{ old('price', $service->price) }}" required step="0.01"><br>

        <button type="button" id="submitEditServiceBtn" class="back-btn">Update Service</button>
    </form>

    <!-- Back Button -->
    <a href="{{ route('services.index') }}" class="back-btn">Back to Services List</a>

    <!-- Modal for confirmation -->
    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <h2>Are you sure you want to update this service?</h2>
            <div class="modal-buttons">
                <button id="confirmEditServiceBtn">Yes, Update Service</button>
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
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get elements
        const submitEditServiceBtn = document.getElementById('submitEditServiceBtn');
        const confirmationModal = document.getElementById('confirmationModal');
        const warningModal = document.getElementById('warningModal');
        const confirmEditServiceBtn = document.getElementById('confirmEditServiceBtn');
        const cancelModalBtn = document.getElementById('cancelModalBtn');
        const closeWarningModalBtn = document.getElementById('closeWarningModalBtn');
        const editServiceForm = document.getElementById('editServiceForm');

        // Validate the form fields
        function validateForm() {
            const serviceName = document.getElementById('service_name').value;
            const price = document.getElementById('price').value;

            // Check if all fields are filled
            return (serviceName !== "" && price !== "");
        }

        // Show the confirmation modal or warning modal based on validation
        submitEditServiceBtn.addEventListener('click', function() {
            if (validateForm()) {
                confirmationModal.style.display = 'flex'; // Show confirmation modal if form is valid
            } else {
                warningModal.style.display = 'flex'; // Show warning modal if form is incomplete
            }
        });

        // Hide the confirmation modal when cancel button is clicked
        cancelModalBtn.addEventListener('click', function() {
            confirmationModal.style.display = 'none';
        });

        // Hide the warning modal when close button is clicked
        closeWarningModalBtn.addEventListener('click', function() {
            warningModal.style.display = 'none';
        });

        // Submit the form when confirmation button is clicked
        confirmEditServiceBtn.addEventListener('click', function() {
            editServiceForm.submit();
        });
    });
</script>
@endsection
