<div class="{{ $attributes["div_class"]??"col-md-4 col-sm-12 mb-3" }}" {!! isset($attributes["div_id"])?'id="'.$attributes["div_id"].'"':'' !!}  >
    <label class="form-label" for="{{$attributes["id"]??""}}">{{$attributes["label"]??""}}</label>
    @if(!empty($attributes["required"]))
        <span class="text-danger">*</span>
    @endif
    <textarea {{$attributes->merge(["class"=>"form-control"])}}>{{ $slot }}</textarea>
</div>