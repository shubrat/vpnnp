@props([
    'title' => 'Form',
    'route' => '#',
    'method' => 'POST',
    'requiredParam' => null,
    'hasTitle' => true,
    'subTitle' => null,
])

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                @if($hasTitle !== false)
                    <h5 class="mb-1">{{\Illuminate\Support\Str::singular($title)}} Form</h5>
                    @if($subTitle)
                        <p class="card-title-desc">{{$subTitle}}</p>
                    @endif
                @endif
            </div>
            <div class="card-body">
                <form
                    @if($method === 'POST') action="{{route($route, $requiredParam)}}" @endif
                    @if($method === 'PUT') action="{{route($route, $requiredParam)}}" @endif
                    method="POST"
                    enctype="multipart/form-data"
                    class="needs-validation"
                >
                    @csrf
                    @method($method)

                    <div class="row">
                        {{$slot}}
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
