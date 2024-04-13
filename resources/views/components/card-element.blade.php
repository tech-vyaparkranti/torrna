<div class="card mb-4">
    @if(isset($attributes["header"]))
    <div class="alert-dark card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{$attributes["header"]}}</h5>
    </div>
    @endif
    {{$slot}}
</div>
