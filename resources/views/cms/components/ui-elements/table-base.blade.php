<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex flex-wrap align-items-center">
                    <h4 class="card-title">{{ \Illuminate\Support\Str::ucfirst($subTitle) }}</h4>

                    <div class="ms-auto">
                        <div>
                            <a href="{{route('cms.' . Str::plural(Str::lower($pageTitle)) . '.create')}}" type="button" class="btn btn-primary btn-md">
                                <i class="bx bx-plus"></i> New {{ $pageTitle }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">

                {{ $slot }}

            </div>
        </div>
    </div>
</div>