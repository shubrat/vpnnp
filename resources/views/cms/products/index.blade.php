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

                                <a href="{{ route('cms.products.create') }}"
                                    class="btn btn-primary btn-md waves-effect waves-light">
                                    <i class="bx bx-plus"></i> New {{ $pageTitle }}
                                </a>

                            </div>
                        </div>
                    </div>
                </div>




                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>

                                <th>SN</th>
                                <th>Name</th>
                                {{-- <th>Image</th> --}}
                                <th>Short Description</th>
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
        function toggleIsFeatured(id) {
                let featuredEl = $('#is-featured-switch-' + id);
                let is_featured = featuredEl.prop('checked') === true ? 'on' : 'off';

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{ route('cms.products.toggle.featured') }}",
                    data: {
                        'is_featured': is_featured,
                        'product_id': id,
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
                        data: 'info',
                        name: 'info',
                        orderable: false
                    },

                

                   

                    {
                        data: 'is_featured',
                        name: 'is_featured',
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
                let url = "{{ route('cms.services.delete', '') }}/" +id;

                showConfirmationDialog(url, DTable);
            });
        });

      
    </script>
    @endpush

</x-cms-master-layout>