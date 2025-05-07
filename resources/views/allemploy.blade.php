
@extends('layouts.app')
@section('content')
@include('layouts.admin-sidebar')

	<!-- Page Wrapper -->
            <div class="page-wrapper">

			<div class="container mx-auto px-4 py-6">
        <!-- Page Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Employee Management</h1>
                <!-- <p class="text-sm text-gray-500">Site: Lucknow</p> -->
            </div>
            
            <div class="flex items-center space-x-3">
                <!-- View Toggle -->
                <div class="flex bg-gray-100 rounded-lg p-1">
                    <a href="allemploy.php" class="p-2 rounded-lg bg-white shadow-sm text-blue-600">
                        <i class="fas fa-th"></i>
                    </a>
                    <a href="{{route('allemploy_list_search')}}" class="p-2 rounded-lg text-gray-500 hover:text-blue-600">
                        <i class="fas fa-bars"></i>
                    </a>
                </div>
                
                <!-- Add Employee Button -->
                <a href="{{ url('add_employee') }}" class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition shadow-md">
                    <i class="fas fa-plus mr-2"></i> Add Employee
                </a>
            </div>
        </div>

        <!-- Search Filters -->
        <div class="bg-white rounded-xl shadow-sm p-4 mb-6">
    <form action="{{ route('allemploy_list_search') }}" method="post" class="grid grid-cols-1 md:grid-cols-4 gap-4">
        @csrf
        <!-- Employee Search Field -->
        <div class="relative w-full col-span-2 md:col-span-3">
            <div class="flex items-center border border-gray-300 rounded-lg focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-transparent transition-all">
                <!-- Search Icon -->
                <div class="pl-3 text-gray-400">
                    <i class="fas fa-search"></i>
                </div>
                <!-- Input Field -->
                <input 
                    type="text" 
                    id="empIdSearch" 
                    name="search" 
                    class="w-full pl-3 pr-4 py-2 focus:outline-none bg-transparent peer" 
                    placeholder=" "
                    aria-label="Search by employee name or ID"
                    autocomplete="off"
                >
                <!-- Clear Button (X) - appears when input has value -->
                <button 
                    type="button" 
                    class="clear-search pr-3 text-gray-400 hover:text-gray-600 hidden" 
                    aria-label="Clear search"
                >
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <!-- Floating Label -->
            <label for="empIdSearch" class="absolute left-9 top-2 text-xs text-gray-500 transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2.5 peer-focus:top-2 peer-focus:text-xs peer-focus:text-gray-500 pointer-events-none">
                Search Employee name / Employee ID
            </label>
        </div>
        
        <!-- Search Button -->
        <button 
            type="submit" 
            class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition font-medium shadow-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 flex items-center justify-center"
            aria-label="Search employees"
        >
            <i class="fas fa-search mr-2"></i> Search
        </button>
    </form>
</div>

<!-- JavaScript for enhanced functionality -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('empIdSearch');
    const clearBtn = document.querySelector('.clear-search');
    
    // Show/hide clear button based on input
    searchInput.addEventListener('input', function() {
        clearBtn.classList.toggle('hidden', !this.value.trim());
    });
    
    // Clear input field
    clearBtn.addEventListener('click', function() {
        searchInput.value = '';
        searchInput.focus();
        this.classList.add('hidden');
    });
    
    // Optional: Add autocomplete suggestions
    // You would need to implement this with your backend API
});
</script>

        <!-- Employee Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
            @foreach ($all_employee_report as $allemp)
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition transform hover:-translate-y-1" x-data="{ dropdownOpen: false }">
                <!-- Employee Card -->
                <div class="p-4">
                    <div class="flex flex-col items-center">
                        <!-- Avatar -->
                        <div class="relative mb-4">
                            <a href="my_profile.php" class="block">
                                <img class="w-20 h-20 rounded-full object-cover border-4 border-white shadow" src="{{ asset('storage/'.$allemp->profile_image) }}" alt="{{$allemp->fullname}}">
                            </a>
                            <!-- Online Status Indicator -->
                            <span class="absolute bottom-0 right-0 block h-3 w-3 rounded-full bg-green-500 ring-2 ring-white"></span>
                        </div>
                        
                        <!-- Employee Info -->
                        <div class="text-center w-full">
                            <h3 class="text-lg font-semibold text-gray-800 mb-1 truncate">
                                <a href="my_profile.php" class="hover:text-blue-600 transition">{{$allemp->fullname}}</a>
                            </h3>
                            <p class="text-sm text-gray-500 font-medium">{{$allemp->designation}}</p>
                            <p class="text-xs text-gray-400 mt-1">{{$allemp->department}}</p>
                            
                            <!-- Contact Info (visible on hover) -->
                            <div class="mt-2 pt-2 border-t border-gray-100  transition-opacity duration-200">
                                <div class="flex items-center justify-center text-xs text-gray-500">
                                    <i class="fas fa-envelope mr-2"></i>
                                    <span class="truncate">{{$allemp->email}}</span>
                                </div>
                                <div class="flex items-center justify-center text-xs text-gray-500 mt-1">
                                    <i class="fas fa-phone mr-2"></i>
                                    <span>{{$allemp->phone}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Action Dropdown -->
                <div class="bg-gray-50 px-4 py-3 flex justify-between items-center border-t border-gray-100">
                    <span class="text-xs font-medium px-2 py-1 bg-blue-100 text-blue-800 rounded-full">
                        ID: {{$allemp->emp_id}}
                    </span>
                    
                    <div class="relative">
                        <button @click="dropdownOpen = !dropdownOpen" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        
                        <div x-show="dropdownOpen" @click.away="dropdownOpen = false" 
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="origin-top-right absolute right-0 bottom-full mb-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-10">
                            <div class="py-1">
                                <a href="{{ route('add_employee',$allemp->id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-pencil-alt mr-2 w-4 text-center"></i> Edit
                                </a>
                                <a href="{{ route('employee_delete',$allemp->id) }}"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                   >
                                    <i class="fas fa-trash-alt mr-2 w-4 text-center"></i> Delete
                                </a>
                                <!-- <a href="my_profile.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-eye mr-2 w-4 text-center"></i> View Profile
                                </a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Empty State -->
        @if(count($all_employee_report) == 0)
        <div class="text-center py-12 bg-white rounded-xl shadow-sm mt-6">
            <div class="mx-auto h-24 w-24 text-gray-400 mb-4">
                <i class="fas fa-users-slash text-5xl"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900 mb-1">No employees found</h3>
            <p class="text-gray-500 max-w-md mx-auto mb-4">Try adjusting your search or filter to find what you're looking for.</p>
            <a href="add-my_profile.php" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition shadow-md">
                <i class="fas fa-plus mr-2"></i> Add New Employee
            </a>
        </div>
        @endif

        <!-- Pagination (example) -->
        <div class="mt-8 flex items-center justify-between bg-white px-4 py-3 rounded-lg shadow-sm">
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-gray-700">
                        Showing <span class="font-medium">1</span> to <span class="font-medium">10</span> of <span class="font-medium">20</span> results
                    </p>
                </div>
                <div>
                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Previous</span>
                            <i class="fas fa-chevron-left"></i>
                        </a>
                        <a href="#" aria-current="page" class="z-10 bg-blue-50 border-blue-500 text-blue-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                            1
                        </a>
                        <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                            2
                        </a>
                        <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                            3
                        </a>
                        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Next</span>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Simple search functionality (can be enhanced with AJAX)
        document.addEventListener('DOMContentLoaded', function() {
            const empIdSearch = document.getElementById('empIdSearch');
            const empNameSearch = document.getElementById('empNameSearch');
            const designationFilter = document.getElementById('designationFilter');
            const employeeCards = document.querySelectorAll('.grid > div');
            
            function filterEmployees() {
                const idValue = empIdSearch.value.toLowerCase();
                const nameValue = empNameSearch.value.toLowerCase();
                const designationValue = designationFilter.value.toLowerCase();
                
                employeeCards.forEach(card => {
                    const id = card.querySelector('[id$="ID"]')?.textContent.toLowerCase() || '';
                    const name = card.querySelector('h3 a').textContent.toLowerCase();
                    const designation = card.querySelector('p:nth-of-type(1)').textContent.toLowerCase();
                    
                    const idMatch = id.includes(idValue);
                    const nameMatch = name.includes(nameValue);
                    const designationMatch = designationValue === '' || designation.includes(designationValue);
                    
                    if (idMatch && nameMatch && designationMatch) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            }
            
            empIdSearch.addEventListener('input', filterEmployees);
            empNameSearch.addEventListener('input', filterEmployees);
            designationFilter.addEventListener('change', filterEmployees);
        });
    </script>



            </div>
			<!-- /Page Wrapper -->
@endsection
