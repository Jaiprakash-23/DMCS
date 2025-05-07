@extends('layouts.app')
@section('content')
@include('layouts.admin-sidebar')

			<!-- /Sidebar -->

			<!-- Page Wrapper -->
            <div class="page-wrapper">

			<style>
        .profile-tab.active {
            border-bottom: 3px solid #3b82f6;
            color: #3b82f6;
            font-weight: 600;
        }
        .timeline-item::before {
            content: '';
            position: absolute;
            left: -20px;
            top: 0;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #3b82f6;
            border: 2px solid white;
            box-shadow: 0 0 0 2px #3b82f6;
        }
    </style>

<div class="bg-gray-50" x-data="{ activeTab: 'profile', editModalOpen: false }">
    <div class="container mx-auto px-4 py-6">
        <!-- Page Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">My Profile</h1>
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="#" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-blue-600">
                                <i class="fas fa-home mr-2"></i>
                                Home
                            </a>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Profile</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
            
            <div class="mt-4 md:mt-0">
                <a href="{{ route('add_employee',Auth::user()->id) }}">

                    <button @click="editModalOpen = true" class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition shadow-md">
                        <i class="fas fa-pencil-alt mr-2"></i> Edit Profile
                    </button>
                </a>
            </div>
        </div>

        <!-- Profile Header -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden mb-6">
            <div class="md:flex">
                <!-- Profile Picture -->
                <div class="md:w-1/4 p-6 flex justify-center">
                    <div class="relative">
                        <img class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg" src="assets/img/profiles/avatar-02.jpg" alt="Profile">
                        <button class="absolute bottom-0 right-0 bg-blue-600 text-white rounded-full p-2 hover:bg-blue-700 transition shadow-md">
                            <i class="fas fa-camera text-sm"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Profile Info -->
                <div class="md:w-3/4 p-6">
                    <div class="flex flex-col md:flex-row md:justify-between">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">{{ $user->fullname }}</h2>
                            <div class="flex items-center mt-1">
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">{{ $designation }}</span>
                                <span class="ml-2 text-sm text-gray-500">{{ $dpt }}</span>
                            </div>
                            <div class="mt-2 text-sm text-gray-500">
                                <i class="fas fa-id-card mr-1"></i> Employee ID: {{ $user->emp_id }}
                            </div>
                            <div class="text-sm text-gray-500">
                                <i class="fas fa-calendar-alt mr-1"></i> Joined on {{ $user->date_of_joining }}
                            </div>
                        </div>
                        
                        <div class="mt-4 md:mt-0">
                            <div class="text-sm">
                                <div class="text-gray-500 font-medium">Reports to:</div>
                                <div class="text-blue-600">{{ $report }}</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div class="flex items-center">
                            <div class="p-2 rounded-full bg-blue-100 text-blue-600 mr-3">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <div class="text-xs text-gray-500">Phone</div>
                                <div class="font-medium">{{ $user->phone }}</div>
                            </div>
                        </div>
                        
                        <div class="flex items-center">
                            <div class="p-2 rounded-full bg-blue-100 text-blue-600 mr-3">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <div class="text-xs text-gray-500">Email</div>
                                <div class="font-medium">{{ $user->email }}</div>
                            </div>
                        </div>
                        
                        <div class="flex items-center">
                            <div class="p-2 rounded-full bg-blue-100 text-blue-600 mr-3">
                                <i class="fas fa-birthday-cake"></i>
                            </div>
                            <div>
                                <div class="text-xs text-gray-500">Birthday</div>
                                <div class="font-medium">{{ $user->date_of_birth }}</div>
                            </div>
                        </div>
                        
                        <div class="flex items-center">
                            <div class="p-2 rounded-full bg-blue-100 text-blue-600 mr-3">
                                <i class="fas fa-venus-mars"></i>
                            </div>
                            <div>
                                <div class="text-xs text-gray-500">Gender</div>
                                <div class="font-medium">{{ $user->gender }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs Navigation -->
        <div class="border-b border-gray-200 mb-6">
            <nav class="flex space-x-8">
                <button @click="activeTab = 'profile'" 
                        :class="{ 'profile-tab active': activeTab === 'profile', 'text-gray-500 hover:text-gray-700': activeTab !== 'profile' }" 
                        class="py-4 px-1 font-medium text-sm">
                    <i class="fas fa-user mr-2"></i> My Profile
                </button>
                <a href="{{ route('my_attendance') }}" class="py-4 px-1 font-medium text-sm text-gray-500 hover:text-gray-700">
                    <i class="fas fa-calendar-check mr-2"></i> My Attendance
                </a>
                <a href="salary-slip.php" class="py-4 px-1 font-medium text-sm text-gray-500 hover:text-gray-700">
                    <i class="fas fa-money-bill-wave mr-2"></i> My Salary
                </a>
            </nav>
        </div>

        <!-- Profile Content -->
        <div x-show="activeTab === 'profile'" class="space-y-6">
            <!-- Personal & Emergency Info -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Personal Information -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Personal Information</h3>
                        <button class="text-blue-600 hover:text-blue-800">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="text-xs text-gray-500">Aadhaar Number</label>
                                <p class="font-medium">{{ $user->aadhaar_no }}</p>
                            </div>
                            <div>
                                <label class="text-xs text-gray-500">Voter ID Number</label>
                                <p class="font-medium">{{ $user->voter_id }}</p>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="text-xs text-gray-500">Nationality</label>
                                <p class="font-medium">{{ $user->nationality }}</p>
                            </div>
                            <div>
                                <label class="text-xs text-gray-500">Religion</label>
                                <p class="font-medium">{{ $user->religion }}</p>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="text-xs text-gray-500">Marital Status</label>
                                <p class="font-medium">{{ $user->marital_status }}</p>
                            </div>
                            <div>
                                <label class="text-xs text-gray-500">Blood Group</label>
                                <p class="font-medium">{{ $user->blood_group }}</p>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="text-xs text-gray-500">Height & Weight</label>
                                <p class="font-medium">{{ $user->height_weight }}</p>
                            </div>
                            <div>
                                <label class="text-xs text-gray-500">Skin Color</label>
                                <p class="font-medium">{{ $user->colour_of_skin }}</p>
                            </div>
                        </div>
                        
                        <div>
                            <label class="text-xs text-gray-500">Identity Mark</label>
                            <p class="font-medium">{{ $user->identity_mark }}</p>
                        </div>
                    </div>
                </div>
                
                <!-- Emergency Contact -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Emergency Contact</h3>
                        <button class="text-blue-600 hover:text-blue-800">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                    </div>
                    
                    <div class="space-y-6">
                        <div>
                            <h4 class="text-sm font-medium text-gray-700 mb-3">Primary Contact</h4>
                            <div class="space-y-3">
                                <div>
                                    <label class="text-xs text-gray-500">Name</label>
                                    <p class="font-medium">{{ $user->emergency_name }}</p>
                                </div>
                                <div>
                                    <label class="text-xs text-gray-500">Relationship</label>
                                    <p class="font-medium">{{ $user->emergency_relationship }}</p>
                                </div>
                                <div>
                                    <label class="text-xs text-gray-500">Phone</label>
                                    <p class="font-medium">{{ $user->emergency_phone }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="border-t border-gray-200 pt-4">
                            <h4 class="text-sm font-medium text-gray-700 mb-3">Secondary Contact</h4>
                            <div class="space-y-3">
                                <div>
                                    <label class="text-xs text-gray-500">Name</label>
                                    <p class="font-medium">{{ $user->emergency_name1 }}</p>
                                </div>
                                <div>
                                    <label class="text-xs text-gray-500">Relationship</label>
                                    <p class="font-medium">{{ $user->emergency_relationship1 }}</p>
                                </div>
                                <div>
                                    <label class="text-xs text-gray-500">Phone</label>
                                    <p class="font-medium">{{ $user->emergency_phone1 }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Bank & Family Info -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Bank Information -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Bank Information</h3>
                        <button class="text-blue-600 hover:text-blue-800">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                    </div>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="text-xs text-gray-500">Bank Name</label>
                            <p class="font-medium">{{ $user->bank_name }}</p>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="text-xs text-gray-500">Account Number</label>
                                <p class="font-medium">{{ $user->bank_account_no }}</p>
                            </div>
                            <div>
                                <label class="text-xs text-gray-500">IFSC Code</label>
                                <p class="font-medium">{{ $user->bank_ifsc }}</p>
                            </div>
                        </div>
                        
                        <div>
                            <label class="text-xs text-gray-500">PAN Number</label>
                            <p class="font-medium">{{ $user->pan_no }}</p>
                        </div>
                    </div>
                </div>
                
                <!-- Family Information -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Family Information</h3>
                        <button class="text-blue-600 hover:text-blue-800">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Relationship</th>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">{{ $user->family_mem_name }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ $user->family_mem_relationship }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ $user->family_mem_phone }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-4">
                        <label class="text-xs text-gray-500">Address</label>
                        <p class="font-medium">{{ $user->family_mem_address }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Education & Experience -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Education Information -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Education</h3>
                        <button class="text-blue-600 hover:text-blue-800">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                    </div>
                    
                    <div class="space-y-6">
                        <div class="relative pl-6 timeline-item">
                            <div class="absolute left-0 top-0 h-full w-0.5 bg-blue-200"></div>
                            <div class="space-y-1">
                                <h4 class="font-medium text-blue-600">{{ $user->institution }}</h4>
                                <p class="text-sm text-gray-600">{{ $user->degree }}</p>
                                <p class="text-xs text-gray-400">{{ $user->grade }}</p>
                            </div>
                        </div>
                        
                        <!-- <div class="relative pl-6 timeline-item">
                            <div class="absolute left-0 top-0 h-full w-0.5 bg-blue-200"></div>
                            <div class="space-y-1">
                                <h4 class="font-medium text-blue-600">International College of Arts and Science (PG)</h4>
                                <p class="text-sm text-gray-600">Msc Computer Science</p>
                                <p class="text-xs text-gray-400">2000 - 2003</p>
                            </div>
                        </div> -->
                    </div>
                </div>
                
                <!-- Experience Information -->
                <!-- <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Experience</h3>
                        <button class="text-blue-600 hover:text-blue-800">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                    </div>
                    
                    <div class="space-y-6">
                        <div class="relative pl-6 timeline-item">
                            <div class="absolute left-0 top-0 h-full w-0.5 bg-blue-200"></div>
                            <div class="space-y-1">
                                <h4 class="font-medium text-blue-600">Web Designer at Zen Corporation</h4>
                                <p class="text-xs text-gray-400">Jan 2013 - Present (5 years 2 months)</p>
                            </div>
                        </div>
                        
                        <div class="relative pl-6 timeline-item">
                            <div class="absolute left-0 top-0 h-full w-0.5 bg-blue-200"></div>
                            <div class="space-y-1">
                                <h4 class="font-medium text-blue-600">Web Designer at Ron-tech</h4>
                                <p class="text-xs text-gray-400">Jan 2013 - Present (5 years 2 months)</p>
                            </div>
                        </div>
                        
                        <div class="relative pl-6 timeline-item">
                            <div class="absolute left-0 top-0 h-full w-0.5 bg-blue-200"></div>
                            <div class="space-y-1">
                                <h4 class="font-medium text-blue-600">Web Designer at Dalt Technology</h4>
                                <p class="text-xs text-gray-400">Jan 2013 - Present (5 years 2 months)</p>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

    <!-- Edit Profile Modal -->
    <!-- <div x-show="editModalOpen" x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75" @click="editModalOpen = false"></div>
            </div>
            
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Profile Information</h3>
                                <button @click="editModalOpen = false" class="text-gray-400 hover:text-gray-500">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            
                            <div class="mt-4">
                                <form>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">First Name</label>
                                            <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="John">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Last Name</label>
                                            <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="Doe">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Birth Date</label>
                                            <input type="date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="1985-05-06">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Gender</label>
                                            <select class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                                <option value="male" selected>Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                        <div class="md:col-span-2">
                                            <label class="block text-sm font-medium text-gray-700">Address</label>
                                            <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="4487 Snowbird Lane">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">State</label>
                                            <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="New York">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Country</label>
                                            <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="United States">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Pin Code</label>
                                            <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="10523">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                                            <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="631-889-3206">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Department</label>
                                            <select class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                                <option>Select Department</option>
                                                <option selected>Web Development</option>
                                                <option>IT Management</option>
                                                <option>Marketing</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Designation</label>
                                            <select class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                                <option>Select Designation</option>
                                                <option selected>Web Designer</option>
                                                <option>Web Developer</option>
                                                <option>Android Developer</option>
                                            </select>
                                        </div>
                                        <div class="md:col-span-2">
                                            <label class="block text-sm font-medium text-gray-700">Reports To</label>
                                            <select class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                                <option>-</option>
                                                <option>Wilmer Deluna</option>
                                                <option>Lesley Grauer</option>
                                                <option selected>Jeffery Lalor</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-6 flex justify-end space-x-3">
                                        <button @click="editModalOpen = false" type="button" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                            Cancel
                                        </button>
                                        <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                            Save Changes
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
	</div>

				

            </div>
			<!-- /Page Wrapper -->
@endsection
