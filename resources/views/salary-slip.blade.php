@extends('layouts.app')
@section('content')

<div class="p-6">
    <!-- Payslip Container -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 max-w-4xl mx-auto">
        <!-- Header Section -->
        <div class="bg-gradient-to-r from-indigo-600 to-blue-800 py-6 px-8 text-center relative">
            <div class="absolute top-0 left-0 w-full h-full opacity-10 bg-white"></div>
            <div class="relative z-10 flex flex-col md:flex-row items-center justify-between">
                <div class="w-full md:w-1/4 mb-4 md:mb-0">
                    <img src="assets/img/company-logo.png" alt="Company Logo" class="h-20 mx-auto filter drop-shadow-lg">
                </div>
                <div class="w-full md:w-2/4">
                    <h2 class="text-2xl font-bold text-yellow-300 mb-1">WEBSBABA TECHNOLOGY PVT LTD</h2>
                    <p class="text-blue-100 text-sm">Gurgaon, Haryana</p>
                    <p class="text-white font-medium mt-2 bg-black bg-opacity-20 py-1 px-3 rounded-full inline-block">
                        PAYSLIP FOR {{ strtoupper(now()->format("M Y")) }}
                    </p>
                </div>
                <div class="w-full md:w-1/4 mt-3 md:mt-0">
                    <div class="inline-block bg-white bg-opacity-30 rounded-full px-4 py-1 backdrop-filter backdrop-blur-sm">
                        <span class="text-yellow-600 font-bold">ID: {{ $emp->emp_id }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Employee Details Section -->
        <div class="p-5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-5">
                <!-- Employee Column -->
                <div class="space-y-2">
                    <div class="flex">
                        <span class="w-1/2 font-medium text-gray-600">Name:</span>
                        <span class="w-1/2 font-medium">{{ $emp->fullname }}</span>
                    </div>
                    <div class="flex">
                        <span class="w-1/2 font-medium text-gray-600">Department:</span>
                        <span class="w-1/2">{{ $department_emp->department }}</span>
                    </div>
                    <div class="flex">
                        <span class="w-1/2 font-medium text-gray-600">Designation:</span>
                        <span class="w-1/2">{{ $designation_emp->designation }}</span>
                    </div>
                </div>
                
                <!-- Employment Column -->
                <div class="space-y-2">
                    <div class="flex">
                        <span class="w-1/2 font-medium text-gray-600">Joining Date:</span>
                        <span class="w-1/2">{{ date("d-M-Y",strtotime($emp->date_of_joining)) }}</span>
                    </div>
                    <div class="flex">
                        <span class="w-1/2 font-medium text-gray-600">Work Days:</span>
                        <span class="w-1/2">{{ $total_working_days }}</span>
                    </div>
                    <div class="flex">
                        <span class="w-1/2 font-medium text-gray-600">PF Account:</span>
                        <span class="w-1/2">Esi/07</span>
                    </div>
                </div>
            </div>

            <!-- Earnings & Deductions -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                <!-- Earnings -->
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <div class="bg-blue-600 px-4 py-2 border-b border-blue-500">
                        <h3 class="font-semibold text-white">EARNINGS</h3>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <div class="grid grid-cols-3 px-4 py-2">
                            <span class="font-medium text-gray-700">Basic Salary</span>
                            <span class="text-right text-gray-500">0</span>
                            <span class="text-right font-medium text-green-600">₹0.00</span>
                        </div>
                        <div class="grid grid-cols-3 px-4 py-2">
                            <span class="font-medium text-gray-700">HRA</span>
                            <span class="text-right text-gray-500">0</span>
                            <span class="text-right font-medium text-green-600">₹0.00</span>
                        </div>
                        <div class="grid grid-cols-3 px-4 py-2">
                            <span class="font-medium text-gray-700">Wages</span>
                            <span class="text-right text-gray-500">0</span>
                            <span class="text-right font-medium text-green-600">₹0.00</span>
                        </div>
                        <div class="grid grid-cols-3 px-4 py-2 bg-blue-50 font-semibold">
                            <span class="text-blue-800">Gross Salary</span>
                            <span class="text-right text-blue-800">0</span>
                            <span class="text-right text-blue-800">₹0.00</span>
                        </div>
                    </div>
                </div>

                <!-- Deductions -->
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <div class="bg-blue-600 px-4 py-2 border-b border-blue-500">
                        <h3 class="font-semibold text-white">DEDUCTIONS</h3>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <div class="grid grid-cols-3 px-4 py-2">
                            <span class="font-medium text-gray-700">Provident Fund</span>
                            <span class="text-right text-gray-500">0</span>
                            <span class="text-right font-medium text-red-600">₹0.00</span>
                        </div>
                        <div class="grid grid-cols-3 px-4 py-2">
                            <span class="font-medium text-gray-700">ESI</span>
                            <span class="text-right text-gray-500">0</span>
                            <span class="text-right font-medium text-red-600">₹0.00</span>
                        </div>
                        <div class="grid grid-cols-3 px-4 py-2">
                            <span class="font-medium text-gray-700">Advance</span>
                            <span class="text-right text-gray-500">0</span>
                            <span class="text-right font-medium text-red-600">₹0.00</span>
                        </div>
                        <div class="grid grid-cols-3 px-4 py-2">
                            <span class="font-medium text-gray-700">Uniform</span>
                            <span class="text-right text-gray-500">0</span>
                            <span class="text-right font-medium text-red-600">₹0.00</span>
                        </div>
                        <div class="grid grid-cols-3 px-4 py-2">
                            <span class="font-medium text-gray-700">Fine (Penalty)</span>
                            <span class="text-right text-gray-500">0</span>
                            <span class="text-right font-medium text-red-600">₹0.00</span>
                        </div>
                        <div class="grid grid-cols-3 px-4 py-2 bg-blue-50 font-semibold">
                            <span class="text-blue-800">Total Deductions</span>
                            <span class="text-right text-blue-800">0</span>
                            <span class="text-right text-blue-800">₹0.00</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Summary Section -->
            <div class="bg-gray-50 rounded-lg p-4 mb-5 border border-gray-200">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="text-center">
                        <p class="text-sm text-gray-600">Total Earnings</p>
                        <p class="text-xl font-bold text-blue-800">₹0.00</p>
                    </div>
                    <div class="text-center">
                        <p class="text-sm text-gray-600">Total Deductions</p>
                        <p class="text-xl font-bold text-red-600">₹0.00</p>
                    </div>
                    <div class="text-center bg-blue-100 rounded-lg py-2">
                        <p class="text-sm text-blue-800 font-medium">Net Pay (Rounded)</p>
                        <p class="text-2xl font-bold text-blue-800">₹{{ number_format(round($currentMonthSalary->net_pay), 2) }}</p>
                    </div>
                </div>
            </div>

            <!-- Signature Section -->
            <div class="border-t border-gray-300 pt-5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <div class="h-px bg-gray-400 w-32 mb-1"></div>
                        <p class="text-sm text-gray-600">Employer's Signature</p>
                    </div>
                    <div class="text-right">
                        <div class="h-px bg-gray-400 w-32 ml-auto mb-1"></div>
                        <p class="text-sm text-gray-600">Employee's Signature</p>
                    </div>
                </div>
            </div>

            <!-- Footer Note -->
            <div class="mt-6 text-center text-xs text-gray-500">
                <p>Generated on {{ now()->format('d-M-Y h:i A') }} | Computer generated payslip</p>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex justify-center mt-6 space-x-4">
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-download mr-2"></i> Download PDF
        </button>
        <button onclick="window.print()" class="bg-white hover:bg-gray-100 text-blue-600 border border-blue-600 px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-print mr-2"></i> Print Payslip
        </button>
    </div>
</div>

<!-- Print Styles -->
<style>
    @media print {
        body * {
            visibility: hidden;
        }
        .p-6, .p-6 * {
            visibility: visible;
        }
        .p-6 {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            padding: 0;
        }
        .flex.justify-center {
            display: none !important;
        }
        .rounded-xl {
            border-radius: 0 !important;
            box-shadow: none !important;
        }
    }
</style>

@endsection