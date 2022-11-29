@props([
'label' => 'Default',
'name' => 'Default',
'placeholder' => 'Choose...',
'col' => '12',
'required' => FALSE,
'values' => NULL,
'selected' => NULL,
'multiple' => TRUE,
'autofocus' => FALSE,
])


<div class="col-lg-{{$col}}">
    <div class="mb-3">
        <label for="{{$name}}">{{$label}} <small><code>{{$required == true ? '[Required]' : ''}}</code></small> </label>
        <br />



        <select class="row select2 form-control {{$multiple ? 'select2-multiple' : ''}} col-lg-9" data-trigger
            name="{{$name}}{{$multiple ? '[]' : ''}}" id="{{$name}}" {{$multiple ? 'multiple' : '' }}
            data-placeholder="{{$placeholder}}" {{$required ? 'required' : '' }}>


            <option value data-choices-placeholder>{{$placeholder}}</option>
            {{ $slot }}

            @foreach($values as $value)
            <option value="{{$value->id}}"
                
                @if ($selected)
                @if ($selected->contains('id', $value->id)) selected @endif
                {{ $value->title }}
                @else
                @if(old($name) == $value->id) selected @endif
                @endif
                >
                {{$value->title}}</option>
            @endforeach
        </select>
        @error($name)
        <div class="invalid-feedback">{{$message}}</div>@enderror
        </select>
    </div>
</div>