@props([
    'type' => 'text',
    'col' => '12',
    'name' => 'Default',
    'label' => 'Default',
    'placeholder' => NULL,
    'required' => FALSE,
    'values' => [],
    'selected' => NULL,
    'multiple' => FALSE,
    'choices' => TRUE
    

])

<div class="col-lg-{{$col}}">
    <div class="mb-3">
        <label for="{{$name}}">{{$label}} <small><code>{{$required == TRUE ? '[Required]' : ''}}</code></small></label>
        <select
            class="form-control @if($choices) js-choice @endif @error($name) is-invalid @enderror"
            data-trigger
            name="{{$name}}"
            id="{{$name}}"
            data-placeholder="{{ $placeholder ?? 'Select ' . \Illuminate\Support\Str::lower($label)}}"
            {{$required ? 'required' : ''}}
            {{$multiple ? 'multiple' : ''}}
        >
            <option value data-choices-placeholder>{{$placeholder}}</option>
            {{$slot}}
            @foreach($values as $value)
                <option
                    value="{{$value->id}}"
                    @if($value->id == $selected) selected @endif
                >{{$value->title}}</option>
            @endforeach
        </select>
        @error($name)
        <div class="invalid-feedback">{{$message}}</div>@enderror
    </div>
</div>
