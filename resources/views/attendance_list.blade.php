@php
    use App\Models\Department;
    use App\Models\Attendance;
@endphp
@extends('layouts.app')
@section('content')
    @include('layouts.admin-sidebar')

    <div class="page-wrapper">
        <div class="container mx-auto px-4 py-6">
            <!-- Page Title -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Attendance {{ $department_name }}</h2>
            </div>

            <!-- Search Filter -->
            <div class="bg-white rounded-lg shadow p-4 mb-6">
            <form action="{{ route('attendance_search') }}" method="POST" class="flex gap-2">
    @csrf
    <input type="text" id="emp_id" name="search" value="{{ request('emp_id') }}"
           class="flex-grow px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
           placeholder="Enter employee ID/name">
    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-md transition duration-300">
        Search
    </button>
</form>
            </div>

            <!-- Attendance Table -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sr No.</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Employee</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Employee ID</th>
                                @if ($department_name == 'All Employee')
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Department</th>
                                @endif
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Punch Out</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($employee as $emp)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $emp->fullname }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $emp->emp_id }}</td>
                                @if ($department_name == 'All Employee')
                                    @php
                                        $departmentname = Department::where('id', $emp->department)->first()->department;
                                    @endphp
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $departmentname }}</td>
                                @endif
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ date('d-m-Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm" id="statustd{{ $emp->id }}">
                                    @php
                                        $date = date("Y-m-d H:i:s");
                                        $attendance_tbl = Attendance::where("date", date("Y-m-d"))->where("emp_id", $emp->id)->first();
                                    @endphp
                                    @if (!empty($attendance_tbl))
                                        @if ($attendance_tbl->attendance_status == 1 || $attendance_tbl->attendance_status == 2)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Present
                                            </span>
                                        @else
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                Absent
                                            </span>
                                        @endif
                                    @else
                                    <div class="relative inline-block text-left" x-data="{ open: false }" @click.away="open = false">
                                        <button 
                                            type="button" 
                                            class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-3 py-1 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                            @click="open = !open"
                                        >
                                            Select Status
                                            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>

                                        <div 
                                            x-show="open" 
                                            x-transition:enter="transition ease-out duration-100"
                                            x-transition:enter-start="transform opacity-0 scale-95"
                                            x-transition:enter-end="transform opacity-100 scale-100"
                                            x-transition:leave="transition ease-in duration-75"
                                            x-transition:leave-start="transform opacity-100 scale-100"
                                            x-transition:leave-end="transform opacity-0 scale-95"
                                            class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-10"
                                        >
                                            <div class="py-1" role="menu" aria-orientation="vertical">
                                                <a 
                                                    href="#" 
                                                    class="block px-4 py-2 text-sm text-green-600 hover:bg-green-50" 
                                                    role="menuitem"
                                                    onclick="changeStatus(1,{{ $emp->id }},'{{ $date }}'); open = false"
                                                >
                                                    Present
                                                </a>
                                                <a 
                                                    href="#" 
                                                    class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50" 
                                                    role="menuitem"
                                                    onclick="changeStatus(0,{{ $emp->id }},'{{ $date }}'); open = false"
                                                >
                                                    Absent
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm" id="punch-out">
                                    @if (!empty($attendance_tbl))
                                        @if ($attendance_tbl->attendance_status == 1)
                                            <button id="punch_outs{{ $emp->id }}" onclick="punchOut(2,{{ $emp->id }},'{{ $date }}')" class="px-3 py-1 bg-red-600 text-white text-sm rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                Punch Out
                                            </button>
                                        @endif
                                    @else
                                        <span id="punch{{ $emp->id }}"></span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="relative inline-block text-left" x-data="{ open: false }" @click.away="open = false">
                                        <!-- Three-dot menu button -->
                                        <button 
                                            type="button" 
                                            class="text-gray-400 hover:text-gray-600 focus:outline-none transition-colors duration-200"
                                            @click="open = !open"
                                            aria-expanded="false"
                                            aria-haspopup="true"
                                        >
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                            </svg>
                                        </button>

                                        <!-- Dropdown menu -->
                                        <div 
                                            x-show="open"
                                            x-transition:enter="transition ease-out duration-100"
                                            x-transition:enter-start="transform opacity-0 scale-95"
                                            x-transition:enter-end="transform opacity-100 scale-100"
                                            x-transition:leave="transition ease-in duration-75"
                                            x-transition:leave-start="transform opacity-100 scale-100"
                                            x-transition:leave-end="transform opacity-0 scale-95"
                                            class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-10 focus:outline-none"
                                        >
                                            <div class="py-1">
                                                <a 
                                                    href="#" 
                                                    class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors duration-150"
                                                    onclick="openEditModal({{ $emp->id }}); open = false"
                                                >
                                                    <svg class="mr-3 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                    Edit
                                                </a>
                                                <!-- <a 
                                                    href="#" 
                                                    class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors duration-150"
                                                >
                                                    <svg class="mr-3 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                    View Details
                                                </a> -->
                                                <!-- <a 
                                                    href="#" 
                                                    class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-gray-100 hover:text-red-800 transition-colors duration-150"
                                                >
                                                    <svg class="mr-3 h-5 w-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                    Delete
                                                </a> -->
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Edit Attendance Modal -->
        <div class="fixed z-50 inset-0 overflow-y-auto hidden" id="edit_leave_modal">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3  sm:mt-0 sm:ml-4 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Edit Attendance</h3>
                                <form  method="post"  action="{{ route('update_status') }}" class="space-y-4">
                                    @csrf
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Present Status</label>
                                        <select name="ststus"  class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                                            <option>-- Select Status --</option>
                                            <option value="1">Present</option>
                                            <option value="0">Absent</option>
                                        </select>
                                    </div>
                                    <!-- <div>
                                        <label class="block text-sm font-medium text-gray-700">Duty Status</label>
                                        <select name="duty_ststus" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                                            <option>-- Select Status --</option>
                                            <option value="1">On</option>
                                            <option value="0">Off</option>
                                        </select>
                                    </div> -->
                                    <input type="text" name="emp_id" id="empid" class="hidden">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Remark <span class="text-red-500">*</span></label>
                                        <textarea rows="3" class="mt-1 block w-full shadow-sm sm:text-sm focus:ring-blue-500 focus:border-blue-500 border border-gray-300 rounded-md" placeholder="End Shift, Moved, Error Report"></textarea>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="submit" 
                                id="save_attendance_btn"
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Save
                        </button>
                        <button type="button" 
                                onclick="closeEditModal()"
                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Cancel
                        </button>
                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>

        <script>
            // Modal functions
            function openEditModal(empId) {
                document.getElementById('empid').value = empId;
                const modal = document.getElementById('edit_leave_modal');
                modal.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            }

            function closeEditModal() {
                const modal = document.getElementById('edit_leave_modal');
                modal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }

            // Close modal when clicking outside
            document.getElementById('edit_leave_modal').addEventListener('click', function(e) {
                if (e.target === this) {
                    closeEditModal();
                }
            });

            // Save button handler
            // document.getElementById('save_attendance_btn').addEventListener('click', function() {
                
                
            //     closeEditModal();
            // });

            // Existing functions
            function changeStatus(status_id, emp_id, date) {
                $.ajax({
                    url: "{{ route('present_absent') }}",
                    type: 'POST',
                    data: {
                        'status_id': status_id,
                        'emp_id': emp_id,
                        'date': date,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        if (response.status == 1) {
                            if (response.status_id == 1) {
                                $("#punch" + emp_id).html('<button class="px-3 py-1 bg-red-600 text-white text-sm rounded-md hover:bg-red-700">Punch Out</button>');
                                $("#statustd" + emp_id).html('<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Present</span>');
                            } else {
                                $("#statustd" + emp_id).html('<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Absent</span>');
                            }
                        }
                    },
                });
            }

            function punchOut(status_id, emp_id, date) {
                $.ajax({
                    url: "{{ route('punch_out') }}",
                    type: 'POST',
                    data: {
                        'status_id': status_id,
                        'emp_id': emp_id,
                        'date': date,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        if (response.status == 2) {
                            $("#punch_outs" + emp_id).hide();
                            $("#punch" + emp_id).html('<button class="px-3 py-1 bg-red-600 text-white text-sm rounded-md hover:bg-red-700">Punch</button>');
                        } else {
                            $("#statustd" + emp_id).html('<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Present</span>');
                        }
                    },
                });
            }
        </script>
    </div>
    <!-- /Page Wrapper -->
@endsection