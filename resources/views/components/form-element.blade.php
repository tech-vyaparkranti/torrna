<div class="card-body mt-2">
    <form {{ $attributes->merge(["method"=>"POST","action"=>"#"]) }} >
        @if($attributes["method"]=="POST")
            @csrf
        @endif
        <div class="row">
        {{$slot}}
        </div>
    </form>
</div>