{{--@if($errors->any())--}}
{{--    <div class="alert alert-danger" role="alert">--}}
{{--        <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--            <span aria-hidden="true">×</span>--}}
{{--        </button>--}}

{{--        @foreach($errors->all() as $error)--}}
{{--            {{ $error }}<br/>--}}
{{--        @endforeach--}}
{{--    </div>--}}
{{--@endif--}}
<div class="container mt-2">
    <div class="row">
        <div class="col-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
</div>
