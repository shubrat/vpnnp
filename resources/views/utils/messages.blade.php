<!-- Sweet Alert Laravel Confirmation Try -->

{{-- 
<script>


        //select2 box

        $('#myselect').select2({
            width: '100%',
            placeholder: "Select an Option",
            allowClear: true
        });

        $('body').on('click', '#mark-read', function(e) {
            e.preventDefault();
            e.stopPropagation();
            var url = "{{ route('admin.newsletters.markRead') }}"

            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    '_token': '{{ @csrf_token() }}'

                },
                success: function(data) {
                    $('#notify').load(location.href + (' #notify'));
                    $('#unread').html(
                        '<a href="#!" class="small text-reset text-decoration-underline"> Unread 0 </a>'
                    );
                    $('span#btn-count').html('0');

                }

            });

        });
</script> --}}
<script>
  
    // function showConfirmationDialog(url, table) {
    //     Swal.fire({
    //         title: 'Are you sure?',
    //         text: "You won't be able to revert this!",
    //         type: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3d4144',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Yes, delete it!'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             $.ajax({
    //                 url: url,
    //                 type: 'delete',
    //                 data: {'_token': '{{ @csrf_token() }}'},
    //                 success: function (result) {
    //                     Swal.fire(
    //                         'Deleted!',
    //                         'Your record has been deleted.',
    //                         'success'
    //                     ).then(() => {
    //                         // location.reload();
    //                         table.ajax.reload();
    //                     })
    //                 },
    //                 error: function (result) {
    //                     console.log(result.success)
    //                     Swal.fire(
    //                         'Error!',
    //                         'Some Problem Occured. Please Try again later.',
    //                         'error'
    //                     ).then(() => {
    //                         table.ajax.reload();
    //                     })
    //                 }
    //             })
    //         } else {
    //             Swal.fire("Cancelled", "Deletion Cancelled", "error");
    //         }
    //     })
    // }


    
    const initSwitchToggler = () => {
        if (document.querySelectorAll('.js-switch').length) {
            let switcheryEl = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

            switcheryEl.forEach(function(html) {
                new Switchery(html, {
                    size: 'small'
                });
            });
        }
    }


</script>

<!-- Alertify -->
@php
    $errors = Session::get('error');
    $messages = Session::get('success');
    $info = Session::get('info');
    $warnings = Session::get('warning')
@endphp

@if (is_array($errors)) @foreach($errors as $key => $value)
    <script>
        alertify.error("{{ $value }}")
    </script>
@endforeach @endif

@if ($messages) @foreach($messages as $key => $value)
    <script>
        alertify.success("{{ $value }}")
    </script>
@endforeach @endif

@if ($info) @foreach($info as $key => $value)
    <script>
        alertify.info("{{ $value }}")
    </script>
@endforeach @endif

@if ($warnings) @foreach($warnings as $key => $value)
    <script>
        alertify.warning("{{ $value }}")
    </script>
@endforeach @endif
