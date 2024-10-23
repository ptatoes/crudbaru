@extends('layouts.app')

@section('content')
<section>
    <div class="container mx-auto max-w-screen-xl px-4 lg:px-12">
        <div class="section-container shadow-lg sm:rounded-lg overflow-hidden relative">

            <!-- Search Bar and Add Customer Button Section -->
            <div class="header-section p-6 flex flex-col md:flex-row items-center justify-between">

                <!-- Search Bar -->
                <div class="search-container w-full md:w-1/2 flex">
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
                            <div class="icon-container">
                                <svg aria-hidden="true" class="search-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        
                        <!-- Search Button -->
                        <button type="submit" class="search-button ml-2">
                            Search
                        </button>
                    </form>
                </div>
                   <!-- "Back to All List" Button -->
                   @if(request('search'))
                   <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                       <a href="{{ route('customers.index') }}" class="back-btn px-4 py-2 hover:text-brown-900 font-medium rounded-lg text-sm">
                           Back to All List
                       </a>
                   </div>
                   @endif

                <!-- Add Customer Button -->
                <div class="add-button-container mt-4 md:mt-0 md:ml-4">
                    <button 
                        type="button" 
                        onclick="window.location='{{ route('customers.create') }}'" 
                        class="add-button"
                    >
                        <svg class="add-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
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
                                        
                                        <!-- Delete Button with Confirmation -->
                                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                type="button" 
                                                onclick="confirmDelete({{ $customer->id }})" 
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

<!-- JavaScript for Delete Confirmation -->
<script>
    function confirmDelete(customerId) {
        if (confirm('Are you sure you want to delete this customer?')) {
            document.querySelector(`form[action$="customers/${customerId}"]`).submit();
        }
    }
</script>

<style>
/* General container styles */
.section-container {
    background-color: #ffffff;
    background-opacity: 0.95;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
}

.header-section {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.search-container {
    display: flex;
    width: 100%;
}

.search-input {
    background-color: #ffffff;
    border: 1px solid #a1c5e2;
    padding: 10px; /* Increased padding for height */
    width: 100%;
    border-radius: 6px 0 0 6px; /* Rounded corners on the left side */
    height: 40px; /* Set a fixed height */
}

.search-button {
    background-color: #3498db;
    padding: 10px 16px; /* Same height and adjusted padding */
    font-size: 12px;
    border-radius: 0 6px 6px 0; /* Rounded corners on the right side */
    color: white;
    height: 40px; /* Same height as search input */
}

.icon-container {
    position: absolute;
    top: 50%;
    left: 10px;
    transform: translateY(-50%);
}

.search-icon {
    width: 20px;
    height: 20px;
    fill: black; /* Change icon color to black */
}

.add-button-container {
    margin-top: 16px; /* Adjust margin for spacing */
}

.add-button {
    background-color: #2c3e50;
    padding: 10px 16px; /* Adjust padding */
    color: white;
    border-radius: 20px; /* More rounded corners */
    display: flex;
    align-items: center;
    gap: 6px;
    transition: background-color 0.3s; /* Add transition for hover effect */
}

.add-button:hover {
    background-color: #1a252f; /* Darker on hover */
}

.page-title {
    font-size: 24px;
    text-align: center;
    color: #004d99;
}

.message-alert, .no-results-alert {
    text-align: center;
    padding: 12px;
    background-color: #f4f1ea;
    color: #b30000;
    border-radius: 6px;
}

/* Table styles */
.customer-table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}

.table-head {
    background-color: #8c6a4a;
}

.table-header {
    padding: 12px;
    color: #fdfcf5;
    text-align: center;
}

.table-row:nth-child(even) {
    background-color: #f4f1ea;
}

.table-row:hover {
    background-color: #ddd;
}

.table-data {
    padding: 12px;
    color: #3b3029;
    text-align: center;
}

.action-buttons {
    display: flex;
    gap: 10px;
}

.edit-button, .delete-button {
    padding: 8px 12px;
    border-radius: 6px;
    color: white;
}

.edit-button {
    background-color: #3498db;
}

.delete-button {
    background-color: #e74c3c;
}

/* Back to homepage button */
.back-home-button {
    color: #004d99;
    font-weight: bold;
}
</style>
@endsection
