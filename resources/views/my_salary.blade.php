<?php
use App\Models\Department;
use App\Http\Controllers\CommonController;
?>
@extends('layouts.app')
@section('content')
    @include('layouts.admin-sidebar')


    <div class="page-wrapper">

     

            <div class="flex h-screen bg-gray-50">
                <div class="flex-1 overflow-auto">
                    <div class="p-6">
                        <!-- Header -->
                        <div class="flex justify-between items-center mb-6">
                            <div>
                                <h1 class="text-2xl font-bold text-gray-800">My Salary</h1>
                                <p class="text-gray-600">View and manage your salary details</p>
                            </div>
                            <div class="flex space-x-3">
                                <button
                                    class="px-4 py-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors">
                                    <i class="fas fa-download mr-2"></i> Export
                                </button>
                            </div>
                        </div>

                        <!-- Filters -->
                       

                        <!-- Salary Table -->
                        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Employee</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Month</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Site</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Fine</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Salary</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($emp as $emps)
                                            <tr class="hover:bg-gray-50 transition-colors">
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 h-10 w-10">
                                                            <img class="h-10 w-10 rounded-full"
                                                                src="{{ asset('assets/img/profiles/avatar-02.jpg') }}" alt="">
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium text-gray-900">{{ $emps->emp_name }}
                                                            </div>
                                                            <div class="text-sm text-gray-500">{{ $emps->department }}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">{{ date("M Y", strtotime($emps->created)) }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        {{ $emps->site }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-red-600">
                                                    -
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    ₹{{ number_format($emps->salary_month, 2) }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                    <div class="flex space-x-2">
                                                        <a href="{{ route('salary_slip', ['id' => $emps->emp_id, 'date' => date("Ymd")]) }}"
                                                            class="text-blue-600 hover:text-blue-900 px-3 py-1 rounded-md bg-blue-50 hover:bg-blue-100 transition-colors">
                                                            View Payslip
                                                        </a>
                                                        <button
                                                            class="text-gray-600 hover:text-gray-900 px-3 py-1 rounded-md bg-gray-50 hover:bg-gray-100 transition-colors">
                                                            Download
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Pagination -->
                            <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                                <div class="flex-1 flex justify-between sm:hidden">
                                    <a href="#"
                                        class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                        Previous
                                    </a>
                                    <a href="#"
                                        class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                        Next
                                    </a>
                                </div>
                                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                    <div>
                                        <p class="text-sm text-gray-700">
                                            Showing
                                            <span class="font-medium">1</span>
                                            to
                                            <span class="font-medium">10</span>
                                            of
                                            <span class="font-medium">20</span>
                                            results
                                        </p>
                                    </div>
                                    <div>
                                        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px"
                                            aria-label="Pagination">
                                            <a href="#"
                                                class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                                <span class="sr-only">Previous</span>
                                                <i class="fas fa-chevron-left"></i>
                                            </a>
                                            <a href="#" aria-current="page"
                                                class="z-10 bg-blue-50 border-blue-500 text-blue-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                                1
                                            </a>
                                            <a href="#"
                                                class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                                2
                                            </a>
                                            <a href="#"
                                                class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                                3
                                            </a>
                                            <a href="#"
                                                class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                                <span class="sr-only">Next</span>
                                                <i class="fas fa-chevron-right"></i>
                                            </a>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Stats Cards -->
                        
                    </div>
                </div>
            </div>

            <!-- Salary Details Modal -->
            <div class="fixed z-10 inset-0 overflow-y-auto hidden" id="salaryModal">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div
                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Salary Details - January 2023
                                    </h3>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <h4 class="text-md font-medium text-blue-600 mb-3">Earnings</h4>
                                            <div class="space-y-3">
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">Basic Salary</span>
                                                    <span class="font-medium">₹12,000.00</span>
                                                </div>
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">HRA</span>
                                                    <span class="font-medium">₹7,200.00</span>
                                                </div>
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">Special Allowance</span>
                                                    <span class="font-medium">₹2,400.00</span>
                                                </div>
                                                <div class="border-t border-gray-200 pt-2 mt-2">
                                                    <div class="flex justify-between font-semibold">
                                                        <span>Total Earnings</span>
                                                        <span>₹21,600.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <h4 class="text-md font-medium text-red-600 mb-3">Deductions</h4>
                                            <div class="space-y-3">
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">Provident Fund</span>
                                                    <span class="font-medium">₹576.00</span>
                                                </div>
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">ESI</span>
                                                    <span class="font-medium">₹480.00</span>
                                                </div>
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">Professional Tax</span>
                                                    <span class="font-medium">₹200.00</span>
                                                </div>
                                                <div class="border-t border-gray-200 pt-2 mt-2">
                                                    <div class="flex justify-between font-semibold">
                                                        <span>Total Deductions</span>
                                                        <span>₹1,256.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-6 bg-blue-50 p-4 rounded-lg">
                                        <div class="flex justify-between text-lg font-bold">
                                            <span>Net Salary</span>
                                            <span class="text-blue-700">₹20,344.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button type="button"
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                                Download Payslip
                            </button>
                            <button type="button"
                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                onclick="closeModal()">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function openModal() {
                    document.getElementById('salaryModal').classList.remove('hidden');
                }

                function closeModal() {
                    document.getElementById('salaryModal').classList.add('hidden');
                }
            </script>

      

    </div>
    <!-- /Page Wrapper -->

@endsection