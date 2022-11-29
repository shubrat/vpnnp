
<x-cms-master-layout>

    <x-breadcrumb :title="$pageTitle" :item="2" :method="''" />

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-wrap align-items-center">
                        <h4 class="card-title">{{ \Illuminate\Support\Str::ucfirst($subTitle) }}</h4>
                        <div class="ms-auto">

                            <div>
                                
                                    <a  href="{{ route('cms.members.create') }}"  class="btn btn-primary btn-md waves-effect waves-light">
                                    <i class="bx bx-plus"></i> New {{ $pageTitle }}
                                    </a>
                        
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>SN.</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>About</th>
                                <th>Image</th>
                                <th>Twitter URL</th>
                                <th>Facebook URL</th>
                                <th>Instagram URL</th>
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

  


    @push('scripts')
    <script>
        function toggleIsStatus(id) {
                let statusEl = $('#status-' + id);
                let status = statusEl.prop('checked') === true ? 'on' : 'off';

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{ route('cms.members.toggle.status') }}",
                    data: {
                       'id': id,
                    },
                    success: function(data) {
                        (data.status === 'success') ?
                        alertify.success(data.message): alertify.error(data.message);
                    }
                });
            }
            $(document).ready(() => {
                var DTable = $("#datatable").DataTable({
                    "language": {
                        "lengthMenu": "Show _MENU_ entries",
                    },
                    "dom": "<'row'" +
                        "<'col-sm-6 d-flex align-items-center justify-content-start'l>" +
                        "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                        ">" +

                        "<'table-responsive'tr>" +

                        "<'row'" +
                        "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                        "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                        ">",
                    processing: true,
                    serverSide: true,
                    "scrollX": true,
                    "scrollY": false,
                    responsive: false,
                    ajax: window.location.href,
                    columns: [{data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data: 'name', name: 'name'},
                        {data: 'designation', name: 'designation'},
                        {data: 'about', name: 'about'},
                        {data: 'image', name: 'image', orderable: false},
                        {data: 'twitter', name: 'twitter', orderable: false},
                        {data: 'facebook', name: 'facebook', orderable: false},
                        {data: 'instagram', name: 'instagram', orderable: false},
                        {data: 'status', name: 'status', orderable: false},
                        {data: 'actions', name: 'actions', orderable: false, searchable: false},
                    ],
                        
            
                    "fnDrawCallback": function () {
                        initSwitchToggler();
                      
                    }
                });

                $('#datatable').on('click', '#delete-btn', function (event) {
                    event.preventDefault();
                    event.stopPropagation();
                    let id = $(this).data('id');
                    let url = "{{ route('cms.members.delete', '') }}/" + id;
                    showConfirmationDialog(url, DTable);
                });

           
            });
    </script>
    @endpush


</x-cms-master-layout>