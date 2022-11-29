@props([
'col' => '12',
'name' => 'Default',
'label' => 'Default',
'placeholder' => 'Default',
'id' =>'exampleFormControlTextarea1',

'required' => false,
'value' => null,
'editor' => true,
'cols' => 30,
'rows' => 10,
'info' => NULL,
])

<div class="col-lg-{{$col}}">
    <div class="mb-3">
        <label for="{{$name}}">{{$label}} <small><code>{{$required == true ? '[Required]' : ''}}</code> <br>{{ $info }}</small></label>
        <textarea id="{{$editor ? 'summernote' : ''}}" name="{{$name}}" cols="{{$cols}}" rows="{{$rows}}"
            class="form-control {{$editor ? 'summernote' : ''}} @error($name) is-invalid @enderror">{!! old($name, $value) !!}  </textarea>
        @error($name)<div class="invalid-feedback">{{$message}}</div>@enderror
    </div>
    {{-- for summernote --}}

    @push('scripts')
    <script>
        $(document).ready(function() {
        $('#summernote').summernote(
            {
                height: 350,
                focus: true
            }
        );
    });
    </script>
    @endpush
</div>