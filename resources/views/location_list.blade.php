@extends('layouts.app')

@section('content')
    @include('layouts.admin-sidebar')

    <style>
        .location-table {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .table-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
        }

        .table-title {
            margin: 0;
            display: flex;
            align-items: center;
        }

        .table-title i {
            margin-right: 10px;
            font-size: 1.5rem;
        }

        .table-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            background-color: #f8f9fa;
            border-bottom: 1px solid #e0e0e0;
        }

        .dataTables_wrapper {
            padding: 0 20px 20px;
        }

        .table thead th {
            border-bottom: 2px solid #e0e0e0;
            font-weight: 600;
            color: #495057;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
        }

        .table tbody tr {
            transition: all 0.2s;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .status-active {
            background-color: #d4edda;
            color: #155724;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .status-inactive {
            background-color: #f8d7da;
            color: #721c24;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .action-btn {
            border: none;
            background: transparent;
            padding: 5px;
            margin: 0 3px;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            transition: all 0.2s;
        }

        .action-btn:hover {
            background-color: #f1f3f5;
        }

        .action-btn.edit {
            color: #17a2b8;
        }

        .action-btn.view {
            color: #28a745;
        }

        .action-btn.delete {
            color: #dc3545;
        }

        .badge-primary {
            background-color: rgba(102, 126, 234, 0.1);
            color: #667eea;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .dataTables_filter input {
            border-radius: 20px;
            padding: 5px 15px;
            border: 1px solid #e0e0e0;
        }

        .dataTables_length select {
            border-radius: 20px;
            padding: 5px 15px;
            border: 1px solid #e0e0e0;
        }

        .pagination .page-item.active .page-link {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-color: #667eea;
        }

        .pagination .page-link {
            color: #667eea;
            border-radius: 50% !important;
            margin: 0 3px;
            border: none;
        }

        .pagination .page-link:hover {
            background-color: #f1f3f5;
        }

        .btn-add {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 8px 20px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s;
            border-radius: 30px;
        }

        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Location Management</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href=""><i class="fas fa-home"></i> Dashboard</a></li>
                            <li class="breadcrumb-item active"><i class="fas fa-map-marker-alt"></i> Locations</li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('add_location') }}" class="btn btn-add">
                            <i class="fas fa-plus"></i> Add New
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-12">
                    <div class="location-table">
                        <div class="table-header">
                            <h3 class="table-title"><i class="fas fa-map-marked-alt"></i> All Locations</h3>
                        </div>

                        <div class="table-actions">
                            <div class="show-entries">
                                Show <select name="datatable_length" class="custom-select">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> entries
                            </div>
                            <form action="{{ route('list_location_search') }}" method="post" class="search-box">
                                @csrf
                                <div class="input-group">
                                    <input type="search" name="search" class="form-control"
                                        placeholder="Search locations...">
                                    <button type="submit class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover datatable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Site Name</th>
                                        <th>Location</th>
                                        <th>Contact</th>
                                        <th>Guards</th>

                                        <th>Last Updated</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($locations as $key => $location)
                                        <tr>
                                            <td>#{{ $key + 1 }}</td>
                                            <td>
                                                <strong>{{ $location->site_name }}</strong>
                                                <div class="text-muted small">{{ $location->area }}</div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-map-marker-alt text-danger mr-2"></i>
                                                    <div>
                                                        {{ $location->city }}, {{ $location->state }}
                                                        <div class="text-muted small">{{ $location->postal_code }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div>{{ $location->contact_person }}</div>
                                                <div class="text-muted small">{{ $location->phone }}</div>
                                            </td>
                                            <td>
                                                <span class="badge-primary">{{ $location->no_of_guard }} Guards</span>
                                            </td>

                                            <td>
                                                {{ $location->updated_at->format('d M Y') }}
                                                <div class="text-muted small">{{ $location->updated_at->diffForHumans() }}</div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="">

                                                        <button class="action-btn view" title="View Details">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{ route('add_location', $location->id) }}">

                                                        <button class="action-btn edit" title="Edit">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{ route('delete_location', $location->id) }}">

                                                        <button class="action-btn delete" title="Delete">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="table-footer px-4 py-3 d-flex justify-content-between align-items-center">
                            <div class="showing-entries">
                                Showing 1 to 10 of 25 entries
                            </div>
                            <nav>
                                <ul class="pagination mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script>
            $(document).ready(function () {
                // Initialize DataTable
                $('.datatable').DataTable({
                    responsive: true,
                    dom: '<"top"fl>rt<"bottom"ip><"clear">',
                    language: {
                        search: "_INPUT_",
                        searchPlaceholder: "Search locations...",
                        lengthMenu: "Show _MENU_ entries",
                        paginate: {
                            previous: '<i class="fas fa-chevron-left"></i>',
                            next: '<i class="fas fa-chevron-right"></i>'
                        }
                    },
                    initComplete: function () {
                        $('.dataTables_filter input').addClass('form-control');
                        $('.dataTables_length select').addClass('form-control');
                    },
                    columnDefs: [
                        { responsivePriority: 1, targets: 0 },
                        { responsivePriority: 2, targets: 1 },
                        { responsivePriority: 3, targets: -1 }
                    ]
                });

                // Tooltip initialization
                $('[title]').tooltip({
                    placement: 'top',
                    trigger: 'hover'
                });

                // Custom filtering
                $('.custom-filter').change(function () {
                    var table = $('.datatable').DataTable();
                    table.column($(this).data('column'))
                        .search($(this).val())
                        .draw();
                });
            });
        </script>
    @endsection

@endsection