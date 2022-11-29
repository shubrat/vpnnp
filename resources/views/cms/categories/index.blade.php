<x-cms-master-layout :pageTitle="$pageTitle">
    <x-breadcrumb :title="$pageTitle" :item="2" />


    <div class="row">
        <div class="col-12">
            <div class="card-body">

                <div class="card-header">
                    <div class="d-flex flex-wrap align-items-center">
                        <h4 class="card-title">List of all {{\Illuminate\Support\Str::plural($pageTitle)}}</h4>
                        <div class="ms-auto">
                            <div>
                                <button type="button" class="btn btn-primary btn-md waves-effect waves-light"
                                    data-bs-toggle="modal" data-bs-target="#staticBackdropCreateClientModal">
                                    <i class="bx bx-plus"></i> New {{ $pageTitle }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>

                                <th>SN</th>
                                
                                <th>Category Name</th>
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


    <div class="modal fade" id="staticBackdropCreateClientModal" data-bs-backdrop="static" data-bs-keyboard="true"
        tabindex="-1" role="dialog" aria-labelledby="createClientModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ route('cms.categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="createClientModal">Add Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body row">

                        <!-- Category Title -->
                        <x-input-field :label="'Category Name'" :name="'title'" :col="12" :required="TRUE"
                            :autofocus="TRUE" />

                                        </div>


                    <!-- Button -->
                    <div class="modal-footer border-top-0">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </form>
                <x-file-manager />
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
                    url: "{{ route('cms.categories.toggle.status') }}",
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
                        data: 'title',
                        name: 'title'
                    },
                    
                 
                    {
                        data: 'status',
                        name: 'status',
                        orderable: false
                    },


                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    },
                    ],

                    "fnDrawCallback": function () {
                        initSwitchToggler();
                        }               
                
            });

      

            $('#datatable').on('click', '#delete-btn', function(event) {
                event.preventDefault();
                event.stopPropagation();
                let id = $(this).data('id');
                let url = "{{ route('cms.categories.delete', '') }}/" +id;

                showConfirmationDialog(url, DTable);
            });
        });

      
    </script>
    @endpush

</x-cms-master-layout>