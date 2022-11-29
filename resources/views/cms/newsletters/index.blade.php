<x-cms-master-layout :pageTitle="$pageTitle">
    <x-breadcrumb :title="$pageTitle" :item="2" :method="'List Of'" />


    <div class="row">
        <div class="col-12">
            <div class="card-body">
                <div class="card-header">
                    <div class="d-flex flex-wrap align-items-center">
                        {{-- <h4 class="card-title">List of all {{\Illuminate\Support\Str::plural($pageTitle)}}</h4> --}}
                        <div class="ms-auto">
                            {{-- <div>
                                <a href="#" type="button" class="btn btn-primary btn-md">
                                    <i class="bx bx-plus"></i> New {{ $pageTitle }}
                                </a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                    <thead>
                        <tr>
                            <th>SN.</th>
                            <th>Email</th>
                            <th>created_at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>


                    <tbody>


                    </tbody>
                </table>

            </div>
        </div>
    </div>

    @push('scripts')
    <script>
       
        $(document).ready(() => {

            var DTable = $("#datatable").DataTable({
                    "language": {
                        "lengthMenu": "Show _MENU_",
                    },
                    "dom": "<'row'" +
                        "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                        "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                        ">" +

                        "<'table-responsive'tr>" +

                        "<'row'" +
                        "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                        "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                        ">",
                    processing: true,
                    serverSide: true,

                    responsive: false,
                    ajax: window.location.href,
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                
                        {
                            data: 'email',
                            name: 'email'
                        },

                        {
                            data: 'created_at',
                            name: 'created_at'
                        },

                       
                        {
                            data: 'actions',
                            name: 'actions',
                            orderable: false,
                            searchable: false
                        },
                    ],
                                
                    
                });

                
                $('#datatable').on('click', '#delete-btn', function(event) {
                    event.preventDefault();
                    event.stopPropagation();
                    var id = $(this).data('id');
                    var url = "{{ route('cms.newsletters.delete', '') }}/" +id;

                    showConfirmationDialog(url, DTable);
                });
            });
    </script>

    @endpush

</x-cms-master-layout>