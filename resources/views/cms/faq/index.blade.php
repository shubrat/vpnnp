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
                                <a class="btn btn-primary btn-md waves-effect waves-light" href="{{route('cms.faqs.create')}}">
                                    <span class="icon">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span>Add {{Str::singular($pageTitle)}}</span>
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
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Status</th>
                                <th>Action</th>
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
                    url: "{{ route('cms.faqs.toggle.status') }}",
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
                let DTable = $("#datatable").DataTable({
                    "language": {
                        "lengthMenu": "Show MENU entries",
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
                    ajax: "{{ route('cms.faqs.index') }}",
               columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                 
                    {
                        data: 'question',
                        name: 'question'
                    },
                    {
                        data: 'answer',
                        name: 'answer'
                    },
              
                    {
                        data: 'status',
                        name: 'status'
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

                $('#datatable').on('click', '#delete-btn', function (event) {
                    event.preventDefault();
                    event.stopPropagation();
                    let id = $(this).data('id');
                    let delete_url = "{{ route('cms.faq.delete', '') }}/" + id;
                    showConfirmationDialog(delete_url, DTable);
                });

            });
    </script>
    @endpush

</x-cms-master-layout>