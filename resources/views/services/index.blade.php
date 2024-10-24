@extends('layouts.app')

@section('content')
<section class="admin-service-index">
    <div class="container mx-auto max-w-screen-xl px-4 lg:px-12">
        <div class="section-container shadow-lg sm:rounded-lg overflow-hidden relative">

            <!-- Search Bar and Add Service Button Section -->
            <div class="header-section p-6 flex flex-col md:flex-row items-center justify-between">

                <!-- Search Bar -->
                <div class="search-container w-full md:w-1/2 flex items-center">
                    <form class="flex w-full" action="{{ route('services.index') }}" method="GET">
                        <label for="service-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <input 
                                type="text" 
                                id="service-search" 
                                name="search"  
                                class="search-input" 
                                placeholder="Search Services" 
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
                        <a href="{{ route('services.index') }}" class="back-btn add-button px-4 py-2 hover:text-brown-900 font-medium rounded-lg text-sm">
                            Back to All List
                        </a>
                    </div>
                    @endif
                </div>

                <!-- Add Service Button -->
                <div class="add-button-container mt-4 md:mt-0 md:ml-4">
                    <button 
                        type="button" 
                        onclick="window.location='{{ route('services.create') }}'" 
                        class="add-button"
                    >
                        Add Service
                    </button>
                </div>
            </div>

            <!-- Page Title -->
            <h1 class="page-title">Laundry Services</h1>

            <!-- Warning Messages -->
            @if (session()->has('message'))
                <div class="message-alert">
                    {{ session('message') }}
                </div>
            @elseif ($services->isEmpty() && request('search'))
                <div class="no-results-alert">
                    No services found.
                </div>
            @endif

            <!-- Services Table -->
            @if ($services->isNotEmpty())
            <div class="table-container overflow-x-auto">
                <table class="service-table">
                    <thead class="table-head">
                        <tr>
                            <th scope="col" class="table-header">Service Name</th>
                            <th scope="col" class="table-header">Price (Rp)</th>
                            <th scope="col" class="table-header">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                            <tr class="table-row">
                                <td class="table-data">{{ $service->service_name }}</td>
                                <td class="table-data">Rp {{ number_format($service->price) }}</td>
                                <td class="table-actions">
                                    <div class="action-buttons">
                                        <!-- Edit Button -->
                                        <form action="{{ route('services.edit', $service->id) }}" method="GET" class="inline-block">
                                            <button type="submit" class="edit-button">Edit</button>
                                        </form>
                                        
                                        <!-- Delete Button Form -->
                                        <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                type="button" 
                                                onclick="openDeleteModal({{ $service->id }})" 
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
    let serviceToDelete = null; // Variable to hold the service ID for deletion
    function openDeleteModal(serviceId) {
        serviceToDelete = serviceId; // Store the service ID
        document.getElementById('deleteConfirmationModal').style.display = 'flex'; // Show modal
    }

    function confirmDelete() {
        document.querySelector(`form[action$="services/${serviceToDelete}"]`).submit(); // Submit the delete form
    }
</script>

<!-- Modal for Delete Confirmation -->
<div id="deleteConfirmationModal" class="modal" style="display: none;">
    <div class="modal-content">
        <h2>Are you sure you want to delete this service?</h2>
        <div class="modal-buttons">
            <button id="confirmDeleteBtn" onclick="confirmDelete()">Yes, Delete Service</button>
            <button id="cancelDeleteBtn" onclick="document.getElementById('deleteConfirmationModal').style.display='none'" class="cancel-btn">No, Go Back</button>
        </div>
    </div>
</div>

@endsection
