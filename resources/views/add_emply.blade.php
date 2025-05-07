@extends('layouts.app')
@section('content')
    @include('layouts.admin-sidebar')

    <!-- /Sidebar -->

    <!-- Page Wrapper -->
    <div class="page-wrapper">

    

<div class="bg-gray-50" x-data="{ activeTab: 'profile' }">
    <div class="container mx-auto px-4 py-6">
        <!-- Page Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Add New Employee</h1>
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="#" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-blue-600">
                                <i class="fas fa-home mr-2"></i>
                                Dashboard
                            </a>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Add Employee</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                
            </div>
        </div>
        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

        <!-- Main Form -->
        <form action="{{route('save_employee')}}" method="post" class="bg-white rounded-xl shadow-md overflow-hidden" enctype="multipart/form-data">
            @csrf
            <!-- Profile Section -->
            <div class="p-6 border-b border-gray-200">
                <div class="flex flex-col md:flex-row items-start md:items-center space-y-4 md:space-y-0 md:space-x-6 w-full">
                    <!-- Profile Picture -->
                    <div class="relative group">
    <!-- Profile Image Container -->
    <div class="relative w-24 h-24 rounded-full overflow-hidden border-4 border-white shadow-lg">
        <!-- Current Profile Image -->
        <img id="profileImage" class="w-full h-full object-cover" 
             src="{{ asset('storage/' .$employee?->profile_image ) }}" 
             alt="Profile Picture">
        
        <!-- Image Upload Overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-full">
            <span class="text-white text-sm font-medium">
                <i class="fas fa-camera mr-1"></i> Change
            </span>
        </div>
    </div>
    
    <!-- File Input -->
    <div class="mt-3 text-center">
        <label class="inline-block cursor-pointer">
            <span class="px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded-md transition-colors duration-300 inline-flex items-center">
                <i class="fas fa-camera mr-1"></i> Change Photo
            </span>
            <input type="file" id="profileUpload" name="image" class="hidden" accept="image/*">
        </label>
    </div>
</div>

<!-- JavaScript for Image Preview -->
<script>
document.getElementById('profileUpload').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(event) {
            document.getElementById('profileImage').src = event.target.result;
        }
        reader.readAsDataURL(file);
    }
});
</script>
                    
                    <!-- Basic Info -->
                    <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-4 w-full ">
                        
                        <div class="col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Full Name <span class="text-red-500">*</span></label>
                            <input type="text" name="name" value="{{ $employee?->fullname }}"  class="w-full form-input rounded-md border-gray-300 border py-1 px-1" placeholder="Full Name">
                            @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Department <span class="text-red-500">*</span></label>
                            <select name="department" id="department" onchange="selectDesignation()" class="w-full form-input rounded-md border-gray-300 border py-1 px-1" >
                                <option value="">Select Department</option>
                                @foreach ($department as $d)
                                    @if ($d->department != 'Admin')
                                    <option value="{{ $d?->id }}" {{ $d?->id == $employee?->department ? 'selected' : '' }}>
                                     {{ $d?->department }}
                                     </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Designation <span class="text-red-500">*</span></label>
                            <select name="designation" id="designation" class="w-full form-input rounded-md border-gray-300 border py-1 px-1">
                                <option value="{{ $employee?->designation }}">Select Designation</option>
                            </select>
                        </div>
                        
                        <div>
                       
                            <label class="block text-sm font-medium text-gray-700 mb-1">Site Location <span class="text-red-500">*</span></label>
                            <select name="location_site" id="location_site" class="w-full form-input rounded-md border-gray-300 border py-1 px-1">
                                <option value="">Select Site</option>
                                @foreach ($location_site as $ls)
                                    <option value="{{ $ls?->id }}" {{ $ls?->id == $employee?->site ? 'selected' : '' }}>
                                     {{ $ls?->site_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Employee ID</label>
                            <input type="text" value="{{ $new_emp_id }}" class="w-full form-input rounded-md border-gray-300 bg-gray-100 border py-1 px-1" readonly>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Joining Date <span class="text-red-500">*</span></label>
                            <input type="date" name="joining_date" value="{{ $employee?->date_of_joining }}"  class="w-full form-input rounded-md border-gray-300 border py-1 px-1" required>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Reports To <span class="text-red-500">*</span></label>
                            <select name="report_id" id="report_id" class="w-full form-input rounded-md border-gray-300 border py-1 px-1">
                                <option value="{{ $employee?->reports_to }}">Report to</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Info Section -->
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Contact Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                        <input type="number" name="contact" value="{{ $employee?->phone }}" id="contact" class="w-full form-input rounded-md border-gray-300 border py-1 px-1" placeholder="Phone Number">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <input type="email" name="email" id="email" value="{{ $employee?->email }}" class="w-full form-input rounded-md border-gray-300 border py-1 px-1" placeholder="Email">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Date of Birth</label>
                        <input type="date" name="dob" value="{{ $employee?->date_of_birth }}" id="dob" class="w-full form-input rounded-md border-gray-300 border py-1 px-1">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                        <select name="gender" id="gender" class="w-full form-input rounded-md border-gray-300 border py-1 px-1">
                            <option value="male" selected>Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                        <textarea name="address" id="address" value="{{ $employee?->address }}" rows="2" class="w-full form-input rounded-md border-gray-300 border py-1 px-1"></textarea>
                    </div>
                </div>
            </div>

            <!-- Tabs Navigation -->
            <div class="border-b border-gray-200">
                <nav class="flex">
                    <button type="button" @click="activeTab = 'profile'" 
                            :class="{ 'border-b-2 border-blue-500 text-blue-600': activeTab === 'profile', 'text-gray-500 hover:text-gray-700': activeTab !== 'profile' }" 
                            class="px-4 py-3 text-sm font-medium">
                        Personal Details
                    </button>
                </nav>
            </div>

            <!-- Tab Content -->
            <div class="p-6">
                <!-- Personal Information Tab -->
                <div x-show="activeTab === 'profile'" class="space-y-6">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Personal Details -->
                        <div class="bg-gray-50 rounded-lg p-4">
                            <h4 class="text-md font-semibold text-gray-800 mb-3">Personal Details</h4>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Aadhaar Number</label>
                                    <input type="number" name="aadhar_no" value="{{ $employee?->aadhaar_no }}" class="w-full form-input rounded-md border-gray-300 border py-1 px-1" placeholder="Aadhar Number">
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Voter ID Number</label>
                                    <input type="text" name="voter_id_no" value="{{ $employee?->voter_id }}" class="w-full form-input rounded-md border-gray-300 border py-1 px-1" placeholder="Voter ID Number">
                                </div>
                                
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Nationality</label>
                                        <input type="text" name="nantionality" value="{{ $employee?->nationality }}" class="w-full form-input rounded-md border-gray-300 border py-1 px-1" placeholder="Indian">
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Religion</label>
                                        <input type="text" name="religion" value="{{ $employee?->religion }}" class="w-full form-input rounded-md border-gray-300 border py-1 px-1" placeholder="Hindu">
                                    </div>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Marital Status</label>
                                    <select name="marital_status" class="w-full form-input rounded-md border-gray-300 border py-1 px-1">
                                        <option value="single">Single</option>
                                        <option value="married">Married</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Identity Mark</label>
                                    <input type="text" name="identity_mark" value="{{ $employee?->identity_mark }}" class="w-full form-input rounded-md border-gray-300 border py-1 px-1" placeholder="Left hand black mark">
                                </div>
                                
                                <div class="grid grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Blood Group</label>
                                        <input type="text" name="blood_group" value="{{ $employee?->blood_group }}" class="w-full form-input rounded-md border-gray-300 border py-1 px-1" placeholder="A+">
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Height</label>
                                        <input type="text" name="height_weight" value="{{ $employee?->height_weight }}" class="w-full form-input rounded-md border-gray-300 border py-1 px-1" placeholder="169cm">
                                    </div>
                                    
                                    <!-- <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Weight</label>
                                        <input type="text" value="{{ $employee?->religion }}" class="w-full form-input  rounded-md border-gray-300 border py-1 px-1" placeholder="70kg">
                                    </div> -->
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Skin Color</label>
                                    <input type="text" name="color_of_skin" value="{{ $employee?->colour_of_skin }}" class="w-full form-input rounded-md border-gray-300 border py-1 px-1" placeholder="Undertones (हल्का रंग)">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Emergency Contacts -->
                        <div class="bg-gray-50 rounded-lg p-4">
                            <h4 class="text-md font-semibold text-gray-800 mb-3">Emergency Contacts</h4>
                            <div class="space-y-6">
                                <div>
                                    <h5 class="text-sm font-medium text-gray-700 mb-2">Primary Contact</h5>
                                    <div class="space-y-3">
                                        <div>
                                            <label class="block text-xs font-medium text-gray-500 mb-1">Name</label>
                                            <input type="text" name="primary_name" value="{{ $employee?->emergency_name }}" class="w-full form-input rounded-md border-gray-300 border py-1 px-1">
                                        </div>
                                        
                                        <div>
                                            <label class="block text-xs font-medium text-gray-500 mb-1">Relationship</label>
                                            <input type="text" name="relationship" value="{{ $employee?->emergency_relationship }}" class="w-full form-input rounded-md border-gray-300 border py-1 px-1">
                                        </div>
                                        
                                        <div>
                                            <label class="block text-xs font-medium text-gray-500 mb-1">Phone</label>
                                            <input type="text" name="primary_contact" value="{{ $employee?->emergency_phone }}" class="w-full form-input rounded-md border-gray-300 border py-1 px-1">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="border-t border-gray-200 pt-4">
                                    <h5 class="text-sm font-medium text-gray-700 mb-2">Secondary Contact</h5>
                                    <div class="space-y-3">
                                        <div>
                                            <label class="block text-xs font-medium text-gray-500 mb-1">Name</label>
                                            <input type="text" name="secondary_name" value="{{ $employee?->emergency_name1 }}" class="w-full form-input rounded-md border-gray-300 border py-1 px-1">
                                        </div>
                                        
                                        <div>
                                            <label class="block text-xs font-medium text-gray-500 mb-1">Relationship</label>
                                            <input type="text" name="secondary_relationship" value="{{ $employee?->emergency_relationship1 }}" class="w-full form-input rounded-md border-gray-300 border py-1 px-1">
                                        </div>
                                        
                                        <div>
                                            <label class="block text-xs font-medium text-gray-500 mb-1">Phone</label>
                                            <input type="text" name="secondry_contact" value="{{ $employee?->emergency_phone1 }}" class="w-full form-input rounded-md border-gray-300 border py-1 px-1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Bank & Family Info -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Bank Information -->
                        <div class="bg-gray-50 rounded-lg p-4">
                            <h4 class="text-md font-semibold text-gray-800 mb-3">Bank Information</h4>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Bank Name</label>
                                    <input type="text" name="bank_name" value="{{ $employee?->bank_name }}" class="w-full form-input rounded-md border-gray-300 border py-1 px-1">
                                </div>
                                
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Account Number</label>
                                        <input type="number" name="account_no" value="{{ $employee?->bank_account_no }}" class="w-full form-input rounded-md border-gray-300 border py-1 px-1">
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">IFSC Code</label>
                                        <input type="text" name="ifcs_code" value="{{ $employee?->bank_ifsc }}" class="w-full form-input rounded-md border-gray-300 border py-1 px-1">
                                    </div>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">PAN Number</label>
                                    <input type="text" name="pan_no" value="{{ $employee?->pan_no }}" class="w-full form-input rounded-md border-gray-300 border py-1 px-1">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Family Information -->
                        <div class="bg-gray-50 rounded-lg p-4">
                            <h4 class="text-md font-semibold text-gray-800 mb-3">Family Information</h4>
                            <div class="space-y-4">
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                                        <input type="text" name="family_member_name" value="{{ $employee?->family_mem_name }}" class="w-full form-input rounded-md border-gray-300 border py-1 px-1">
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Relationship</label>
                                        <input type="text" name="family_member_relation" value="{{ $employee?->family_mem_relationship }}" class="w-full form-input rounded-md border-gray-300 border py-1 px-1">
                                    </div>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                                    <input type="number" name="family_member_contact" value="{{ $employee?->family_mem_phone }}" class="w-full form-input rounded-md border-gray-300 border py-1 px-1">
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                                    <textarea name="family_member_address" rows="2" value="{{ $employee?->family_mem_address }}" class="w-full form-input rounded-md border-gray-300 border py-1 px-1"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Education & Experience -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Education -->
                        <div class="bg-gray-50 rounded-lg p-4">
                            <div class="flex justify-between items-center mb-3">
                                <h4 class="text-md font-semibold text-gray-800">Education</h4>
                                <button type="button" class="text-blue-600 text-sm font-medium">
                                    <i class="fas fa-plus mr-1"></i> Add More
                                </button>
                            </div>
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Institution</label>
                                    <input type="text" name="institution" value="{{ $employee?->institution }}" class="w-full form-input rounded-md border-gray-300 border py-1 px-1">
                                </div>
                                
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Degree</label>
                                        <input type="text" name="degree" value="{{ $employee?->degree }}" class="w-full form-input rounded-md border-gray-300 border py-1 px-1">
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Grade</label>
                                        <input type="text" name="grade" value="{{ $employee?->grade }}" class="w-full form-input rounded-md border-gray-300 border py-1 px-1">
                                    </div>
                                </div>
                                
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Start Date</label>
                                        <input type="date" name="starting_date" value="{{ $employee?->starting_date }}" class="w-full form-input rounded-md border-gray-300 border py-1 px-1">
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">End Date</label>
                                        <input type="date" name="completion_date" value="{{ $employee?->completion_date }}" class="w-full form-input rounded-md border-gray-300 border py-1 px-1">
                                        <input type="text" name="id" value="{{ $employee?->id }}" class="w-full form-input rounded-md border-gray-300 border py-1 px-1" hidden>
                                    </div>
                                </div>
                            </div>

                        </div>
                        
                        <!-- Experience -->
                        <div class="bg-gray-50 rounded-lg p-4">
                            <div class="flex justify-between items-center mb-3">
                                <h4 class="text-md font-semibold text-gray-800">Experience</h4>
                                <button type="button" class="text-blue-600 text-sm font-medium">
                                    <i class="fas fa-plus mr-1"></i> Add More
                                </button>
                            </div>
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Company Name</label>
                                    <input type="text" class="w-full form-input rounded-md border-gray-300 border py-1 px-1">
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Job Position</label>
                                    <input type="text" class="w-full form-input rounded-md border-gray-300 border py-1 px-1">
                                </div>
                                
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">From</label>
                                        <input type="date" class="w-full form-input rounded-md border-gray-300 border py-1 px-1">
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">To</label>
                                        <input type="date" class="w-full form-input rounded-md border-gray-300 border py-1 px-1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Footer -->
            <div class="bg-gray-50 px-6 py-4 border-t border-gray-200 flex justify-end">
                <button type="button" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 mr-3">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Save Employee
                </button>
            </div>
        </form>
    </div>

    <script>
        function selectDesignation() {
            var department_id = $("#department").val();
            $.ajax({
                url: "{{ route('get_designation') }}",
                type: 'POST',
                data: {
                    'department_id': department_id,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    $('#designation').empty();
                    $('#report_id').empty();
                    
                    if (response.designation && response.designation.length > 0) {
                        $('#designation').append('<option value="">Select Designation</option>');
                        $.each(response.designation, function(index, designation) {
                            $('#designation').append('<option value="' + designation.id + '">' + designation.designation + '</option>');
                        });
                    }
                    
                    if (response.report_data) {
                        $('#report_id').append('<option value="">Report to</option>');
                        $('#report_id').append('<option value="' + response.report_data.id + '">' + response.report_data.department + '</option>');
                    }
                },
            });
        }
    </script>
</div>

    </div>
    <!-- /Page Wrapper -->
@endsection
