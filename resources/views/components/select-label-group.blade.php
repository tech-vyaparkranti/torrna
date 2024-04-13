<div class="{{$attributes["div_class"]??"col-md-4 col-sm-12 mb-3"}}">
    <label class="{{$attributes["label_class"]??"form-label"}}" for="{{$attributes["id"]??""}}">{{$attributes["label_text"]??""}}
        @if(!empty($attributes["required"]))
        <span class="text-danger">*</span>
    @endif</label>
    <select {{ $attributes->merge(['class'=>'form-control']) }}>
        <option value="">Select</option>
        {{$slot}}
    </select>
</div>