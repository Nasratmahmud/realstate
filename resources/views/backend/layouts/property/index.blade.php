@extends('backend.app')

@section('title', 'Property')

@push('styles')
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"> --}}
    <style>
        .ck-editor__editable[role="textbox"] {
            min-height: 160px;
        }

        .input-group-label {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .input-group-label .input-group-text {
            flex: 0 0 auto;
            width: auto;
            max-width: 150px;
            text-align: right;
        }

        .input-group-label .form-control {
            flex: 1;
            min-width: 0;
        }

        .mission-item {
            margin-bottom: 1rem;
            border: 1px solid #000000;
            border-radius: 0.25rem;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid mt-4 mb-4">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mt-5">Property</h3>
                    <nav aria-label="breadcrumb" class="ms-auto">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">property</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card box-shadow-0">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="">Property Table</h5> <!-- Optional title for the card -->
                    <a href="{{ route('property.create') }}" class="btn btn-primary">Add Property</a>
                </div>
                <hr>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="data-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Bedrooms</th>
                                        <th>Bathrooms</th>
                                        <th>Parking</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="ViewPropertyDetails" tabindex="-1"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title d-flex">Property Details</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="appending">
              <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                }
            });
            if (!$.fn.DataTable.isDataTable('#data-table')) {
                $('#data-table').DataTable({
                    order: [],
                    lengthMenu: [
                        [25, 50, 100, 200, 500, -1],
                        [25, 50, 100, 200, 500, "All"]
                    ],
                    processing: true,
                    responsive: true,
                    serverSide: true,
                    language: {
                        processing: `<div class="text-center">
                        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                        <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>`
                    },
                    pagingType: "full_numbers",
                    dom: "<'row justify-content-between table-topbar'<'col-md-2 col-sm-4 px-0'l><'col-md-2 col-sm-4 px-0'f>>tipr",
                    ajax: {
                        url: "{{ route('property.index') }}",
                        type: 'GET',
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'title',
                            name: 'title',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'price',
                            name: 'price',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'phone',
                            name: 'phone',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'email',
                            name: 'email',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'bedrooms',
                            name: 'bedrooms',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'bathrooms',
                            name: 'bathrooms',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'parking',
                            name: 'parking',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'status',
                            name: 'status',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ]
                });
            }
        });

        // delete Confirm
        function showDeleteConfirm(id) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure you want to delete this record?',
                text: 'If you delete this, it will be gone forever.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteItem(id);
                }
            });
        };

        // Delete Button
        function deleteItem(id) {
            var url = '{{ route('property.destroy', ':id') }}';
            var csrfToken = '{{ csrf_token() }}';
            $.ajax({
                type: "DELETE",
                url: url.replace(':id', id),
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(resp) {
                    console.log(resp);
                    if (resp.success) {
                        Swal.fire(
                            'Deleted!',
                            resp.message,
                            'success'
                        );

                        $('#data-table').DataTable().ajax.reload();
                    } else {
                        Swal.fire(
                            'Error!',
                            resp.message,
                            'error'
                        );
                    }
                }, // success end
                error: function(xhr) {
                    // Handle error response
                    if (xhr.status === 404) {
                        toastr.error('Item not found.');
                    } else {
                        toastr.error('deleted successfully.');
                        // location.reload();
                    }
                }
            })
        }

           // Parking Change Confirm Alert
        function showParkingChangeAlert(id) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: 'You want to update the parking?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Yes update it',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    park(id);
                }
            });
        }
        // parking Change
        function park(id) {
            var url = '{{ route('property.parking', ':id') }}';
            $.ajax({
                type: "GET",
                url: url.replace(':id', id),
                success: function(resp) {
                    console.log(resp);
                    $('#data-table').DataTable().ajax.reload();
                    if (resp.success === true) {
                        // show toast message
                        Swal.fire({
                            title: "Good job!",
                            text: "Unpublished Successfully.",
                            icon: "success"
                        });
                    } else if (resp.success === false) {
                        Swal.fire({
                            title: "Good job!",
                            text: "published Successfully.",
                            icon: "success"
                        });
                    } else {
                        toastr.error(resp.message);
                    }
                }, // success end
                error: function(error) {
                    // location.reload();
                } // Erro
            });
        }

        // status Change Confirm Alert
        function showStatusChangeAlert(id) {
            event.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: 'You want to update the status?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Yes update it',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    status(id);
                }
            });
        }

        // status Change
        function status(id) {
            var url = "{{ route('property.status', ':id') }}";
            $.ajax({
                type: "GET",
                url: url.replace(':id', id),
                success: function(resp) {
                    console.log(resp);
                    $('#data-table').DataTable().ajax.reload();
                    if (resp.success === true) {
                        // show toast message
                        Swal.fire({
                            title: "Good job!",
                            text: "Unpublished Successfully.",
                            icon: "success"
                        });
                    } else if (resp.success === false) {
                        Swal.fire({
                            title: "Good job!",
                            text: "published Successfully.",
                            icon: "success"
                        });
                    } else {
                        toastr.error(resp.message);
                    }
                }, // success end
                error: function(error) {
                    // location.reload();
                } // Erro
            });
        }
        // property model
        function viewQuestion(id) {
        var url = "{{ route('property.viewmodel', ':id') }}";
        $.ajax({
            type: "POST",
            url: url.replace(':id', id),
            data: {
                _token: '{{ csrf_token() }}' // Include CSRF token for security
            },
            success: function(resp) {
                    const domainName = window.location.origin;
                        let ImageUrl = resp.image ? `${domainName}/uploads/backend/property/${resp.image}` :
                            '{{ asset('frontend/images/home-post-1.png') }}';
                        let VideoUrl = resp.video ? `${domainName}/uploads/backend/property/${resp.video}`: 'none';
                        // console.log(VideoUrl);
                        let html = `
                            <p class="ps-3"><b>Name:</b></br> ${resp.title || 'N/A'}</p>
                            <p class="ps-3"><b>Keywords:</b></br> ${resp.keywords || 'N/A'}</p>
                            <p class="ps-3"><b>City:</b></br> ${resp.city || 'N/A'}</p>
                            <p class="ps-3"><b>Area:</b></br> ${resp.area || 'N/A'}</p>
                            <b class="ps-3">Amenities:</b></br>
                            <ol class="ps-3">
                                ${resp.aminites && resp.aminites.length > 0 ? resp.aminites.map(item => `<li>${item.name}</li>`).join('') : 'None'}
                            </ol>
                            <p class="ps-3"><b>Category:</b></br> ${resp.category ? resp.category.name : 'N/A'}</p>
                            <p class="ps-3"><b>Accommodation:</b></br> ${resp.accommodation || 'N/A'}</p>
                            <p class="ps-3"><b>Address:</b></br> ${resp.address || 'N/A'}</p>
                            <p class="ps-3"><b>Detail:</b></br> ${resp.details || 'N/A'}</p>
                            <p class="ps-3"><b>Sub Detail:</b></br> ${resp.subdetails || 'N/A'}</p>
                            <p class="ps-3"><b>Sub_Sub_Detail:</b></br> ${resp.sub_subdetails || 'N/A'}</p>
                            <span class="ps-3"><b>Image:</b></br>
                                 <img src="${ImageUrl}" alt="Content Image" class="post_image" width="100px" height="100px"/>
                            </span>
                            <div><b>Video:</b></br>
                                <video controls style="width:600px;height:400px;">
                                     <source src="${VideoUrl}">
                                </video>
                            </div>
                        `;
                    const add = document.getElementById('appending');
                    add.innerHTML = html;
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                toastr.error('Something went wrong. Please try again later.');
            }
        });
    }
    </script>
@endpush
