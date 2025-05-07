<?php
use App\Models\Department;
use App\Http\Controllers\CommonController;
?>
@extends('layouts.app')
@section('content')
@include('layouts.admin-sidebar')

<!-- Page Wrapper -->
<div class="page-wrapper">

<div class="container mx-auto px-4 py-8">
    <!-- Header with Search -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <h1 class="text-2xl font-bold text-gray-800">Employee Salary Report</h1>
        
        <div class="relative w-full md:w-64">
            <input type="text" id="employeeSearch" placeholder="Search employees..." 
                   class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Month Selection with Dropdown -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
        <div class="flex items-center space-x-4">
            <div class="relative">
                <button id="monthDropdownButton" class="flex items-center justify-between px-4 py-2 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 w-48">
                    <span class="font-medium">
                        @if (isset($firstDate))
                            {{ date("F Y", strtotime($firstDate)) }}
                        @else
                            {{ date("F Y") }}
                        @endif
                    </span>
                    <svg class="ml-2 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                
                <div id="monthDropdown" class="hidden absolute z-10 mt-1 w-48 bg-white shadow-lg rounded-md py-1 border border-gray-200">
                    @php
                        $currentYear = date('Y');
                        $currentMonth = date('m');
                        $months = [];
                        for ($i = 0; $i < 12; $i++) {
                            $time = strtotime("-$i months");
                            $months[date('Y-m', $time)] = date('F Y', $time);
                        }
                    @endphp
                    
                    @foreach($months as $value => $label)
                        <a href="{{ route('salary_get_month_wise', ['month' => $value]) }}" 
                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ (isset($firstDate) && $firstDate == $value.'-01') ? 'bg-blue-50 text-blue-600' : '' }}">
                            {{ $label }}
                        </a>
                    @endforeach
                </div>
            </div>
            
            <a href="{{ route('emp_salary_report') }}" 
               class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
                Current Month
            </a>
        </div>
        
        <div class="text-right">
            <span class="text-sm text-gray-500">Total Employees: {{ count($emp) }}</span>
        </div>
    </div>

    <!-- Stats Cards -->
    <!-- <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-lg shadow border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Salary</p>
                    <p class="mt-1 text-2xl font-semibold text-gray-900">
                        
                    </p>
                </div>
                <div class="bg-blue-100 p-3 rounded-full">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="bg-white p-6 rounded-lg shadow border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Average Salary</p>
                    <p class="mt-1 text-2xl font-semibold text-gray-900">
                        
                    </p>
                </div>
                <div class="bg-green-100 p-3 rounded-full">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="bg-white p-6 rounded-lg shadow border-l-4 border-purple-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Highest Salary</p>
                    <p class="mt-1 text-2xl font-semibold text-gray-900">
                        
                    </p>
                </div>
                <div class="bg-purple-100 p-3 rounded-full">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Employee Table -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200" id="employeeTable">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer sort" data-sort="name">
                            <div class="flex items-center">
                                Employee
                                <svg class="ml-1 h-4 w-4 text-gray-400 sort-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                </svg>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer sort" data-sort="id">
                            <div class="flex items-center">
                                ID
                                <svg class="ml-1 h-4 w-4 text-gray-400 sort-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                </svg>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer sort" data-sort="join-date">
                            <div class="flex items-center">
                                Join Date
                                <svg class="ml-1 h-4 w-4 text-gray-400 sort-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                </svg>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer sort" data-sort="salary">
                            <div class="flex items-center">
                                Salary
                                <svg class="ml-1 h-4 w-4 text-gray-400 sort-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                </svg>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($emp as $emps)
                        @php
                            $date = isset($firstDate) ? $firstDate : date("Y-m-d");
                            $comm = new CommonController();
                            $total_salary = $comm->getSalary($emps->id, $date);
                            $departmentname = Department::where('id', $emps->department)->first()->department;
                        @endphp
                        <tr class="hover:bg-gray-50 employee-row" data-name="{{ strtolower($emps->fullname) }}" data-id="{{ $emps->emp_id }}" data-join-date="{{ strtotime($emps->date_of_joining) }}" data-salary="{{ $total_salary }}">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <!-- <img class="h-10 w-10 rounded-full" src="assets/img/profiles/avatar-02.jpg" alt="{{ $emps->fullname }}"> -->
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900 name">{{ $emps->fullname }}</div>
                                        <div class="text-sm text-gray-500">{{ $departmentname }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 id">
                                {{ $emps->emp_id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 join-date">
                                {{ date("d M Y", strtotime($emps->date_of_joining)) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 salary">
                                ₹{{ number_format($total_salary, 2) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                <a href="{{ route('salary_slip', ['id' => $emps->id, 'date' => date("Ymd", strtotime($date))]) }}" 
                                   class="px-3 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition text-xs sm:text-sm inline-flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Slip
                                </a>
                                
                                <div x-data="{ open: false }" class="relative inline-block text-left">
                                    <button @click="open = !open" type="button" class="inline-flex justify-center px-3 py-1 border border-gray-300 shadow-sm text-xs sm:text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                                        </svg>
                                    </button>
                                    
                                    <div x-show="open" @click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-10">
                                        <div class="py-1">
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" data-toggle="modal" data-target="#edit_salary">
                                                <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                                Edit
                                            </a>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                                View
                                            </a>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                                </svg>
                                                Download
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <!-- Empty State -->
            <div id="noResults" class="hidden p-8 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No employees found</h3>
                <p class="mt-1 text-sm text-gray-500">Try adjusting your search or filter to find what you're looking for.</p>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Interactive Features -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Month Dropdown Toggle
    const monthDropdownButton = document.getElementById('monthDropdownButton');
    const monthDropdown = document.getElementById('monthDropdown');
    
    if (monthDropdownButton && monthDropdown) {
        monthDropdownButton.addEventListener('click', function() {
            monthDropdown.classList.toggle('hidden');
        });
    }
    
    // Employee Search
    const employeeSearch = document.getElementById('employeeSearch');
    const employeeRows = document.querySelectorAll('.employee-row');
    const noResults = document.getElementById('noResults');
    
    if (employeeSearch) {
        employeeSearch.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            let hasResults = false;
            
            employeeRows.forEach(row => {
                const name = row.getAttribute('data-name');
                const id = row.getAttribute('data-id').toLowerCase();
                
                if (name.includes(searchTerm) || id.includes(searchTerm)) {
                    row.style.display = '';
                    hasResults = true;
                } else {
                    row.style.display = 'none';
                }
            });
            
            if (hasResults) {
                noResults.classList.add('hidden');
            } else {
                noResults.classList.remove('hidden');
            }
        });
    }
    
    // Table Sorting
    const sortButtons = document.querySelectorAll('.sort');
    
    sortButtons.forEach(button => {
        button.addEventListener('click', function() {
            const sortKey = this.getAttribute('data-sort');
            const rows = Array.from(document.querySelectorAll('.employee-row'));
            const icon = this.querySelector('.sort-icon');
            
            // Toggle sort direction
            const direction = this.classList.contains('asc') ? 'desc' : 'asc';
            
            // Reset all sort buttons
            sortButtons.forEach(btn => {
                btn.classList.remove('asc', 'desc');
                btn.querySelector('.sort-icon').classList.add('text-gray-400');
                btn.querySelector('.sort-icon').classList.remove('text-blue-500');
            });
            
            // Set current sort state
            this.classList.add(direction);
            icon.classList.remove('text-gray-400');
            icon.classList.add('text-blue-500');
            
            // Sort rows
            rows.sort((a, b) => {
                let aValue, bValue;
                
                if (sortKey === 'name') {
                    aValue = a.getAttribute('data-name');
                    bValue = b.getAttribute('data-name');
                } else if (sortKey === 'id') {
                    aValue = a.getAttribute('data-id');
                    bValue = b.getAttribute('data-id');
                } else if (sortKey === 'join-date') {
                    aValue = parseInt(a.getAttribute('data-join-date'));
                    bValue = parseInt(b.getAttribute('data-join-date'));
                } else if (sortKey === 'salary') {
                    aValue = parseFloat(a.getAttribute('data-salary'));
                    bValue = parseFloat(b.getAttribute('data-salary'));
                }
                
                if (direction === 'asc') {
                    return aValue > bValue ? 1 : -1;
                } else {
                    return aValue < bValue ? 1 : -1;
                }
            });
            
            // Re-append rows in sorted order
            const tbody = document.querySelector('tbody');
            rows.forEach(row => tbody.appendChild(row));
        });
    });
});
</script>

</div>
<!-- /Page Wrappe
@endsection