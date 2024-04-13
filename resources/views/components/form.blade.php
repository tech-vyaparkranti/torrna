<form {{ $attributes->merge(['method' => 'POST','enctype'=>'multipart/form-data','action'=>'javascript:','id'=>"submit_form"]) }}>
    @csrf
    <div class="row">{{$slot}}</div>
</form>