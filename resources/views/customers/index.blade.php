@extends('layouts.app')

@section('content')
<section class="admin-customers">
    <div class="container mx-auto max-w-screen-xl px-4 lg:px-12">
        <div class="section-container shadow-lg sm:rounded-lg overflow-hidden relative">

            <!-- Search Bar and Add Customer Button Section -->
            <div class="header-section p-6 flex flex-col md:flex-row items-center justify-between">

                <!-- Search Bar -->
                <div class="search-container w-full md:w-1/2 flex items-center">
                    <form class="flex w-full" action="{{ route('customers.index') }}" method="GET">
                        <label for="customer-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <input 
                                type="text" 
                                id="customer-search" 
                                name="search"  
                                class="search-input" 
                                placeholder="Search Customers" 
                                value="{{ request('search') }}"
                            >
                        </div>
                        
                        <!-- Search Button -->
                        <button type="submit" class="search-button ml-2">
                            Search
                        </button>
                    </form>

                    <!-- "Back to All List" Button -->
                    @if(request('search'))
                    <div class="ml-2">
                        <a href="{{ route('customers.index') }}" class="back-btn add-button px-4 py-2 hover:text-brown-900 font-medium rounded-lg text-sm">
                            Back to All List
                        </a>
                    </div>
                    @endif
                </div>

                <!-- Add Customer Button -->
                <div class="add-button-container mt-4 md:mt-0 md:ml-4">
                    <button 
                        type="button" 
                        onclick="window.location='{{ route('customers.create') }}'" 
                        class="add-button"
                    >
                        Add Customer
                    </button>
                </div>
            </div>

            <!-- Page Title -->
            <h1 class="page-title">Customers</h1>

            <!-- Warning Messages -->
            @if (session()->has('message'))
                <div class="message-alert">
                    {{ session('message') }}
                </div>
            @elseif ($customers->isEmpty() && request('search'))
                <div class="no-results-alert">
                    No customers found.
                </div>
            @endif

            <!-- Customers Table -->
            @if ($customers->isNotEmpty())
            <div class="table-container overflow-x-auto">
                <table class="customer-table">
                    <thead class="table-head">
                        <tr>
                            <th scope="col" class="table-header">Name</th>
                            <th scope="col" class="table-header">Email</th>
                            <th scope="col" class="table-header">Phone Number</th>
                            <th scope="col" class="table-header">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr class="table-row">
                                <td class="table-data">{{ $customer->name }}</td>
                                <td class="table-data">{{ $customer->email }}</td>
                                <td class="table-data">{{ $customer->phone_number }}</td>
                                <td class="table-actions">
                                    <div class="action-buttons">
                                        <!-- Edit Button -->
                                        <form action="{{ route('customers.edit', $customer->id) }}" method="GET" class="inline-block">
                                            <button type="submit" class="edit-button">Edit</button>
                                        </form>
                                        
                                        <!-- Delete Button Form -->
                                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                type="button" 
                                                onclick="openDeleteModal({{ $customer->id }})" 
                                                class="delete-button"
                                            >
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif

            <!-- Back to Homepage Button -->
            <div class="p-6 text-center">
                <a href="{{ route('admin.dashboard') }}" class="back-home-button">Back to Homepage</a>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript for Delete Confirmation Modal -->
<script>
    let customerToDelete = null; // Variable to hold the customer ID for deletion
    function openDeleteModal(customerId) {
        customerToDelete = customerId; // Store the customer ID
        document.getElementById('deleteConfirmationModal').style.display = 'flex'; // Show modal
    }

    function confirmDelete() {
        document.querySelector(`form[action$="customers/${customerToDelete}"]`).submit(); // Submit the delete form
    }
</script>

<!-- Modal for Delete Confirmation -->
<div id="deleteConfirmationModal" class="modal" style="display: none;">
    <div class="modal-content">
        <h2>Are you sure you want to delete this customer?</h2>
        <div class="modal-buttons">
            <button id="confirmDeleteBtn" onclick="confirmDelete()">Yes, Delete Customer</button>
            <button id="cancelDeleteBtn" onclick="document.getElementById('deleteConfirmationModal').style.display='none'" class="cancel-btn">No, Go Back</button>
        </div>
    </div>
</div>

@endsection
