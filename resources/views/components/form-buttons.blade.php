<div class="{{ $attributes['submit_div_class']??"col-md-12 col-sm-12 mb-3 text-center" }}" >
    <button type="{{ $attributes["submit_type"]??"submit" }}" id="{{$attributes['submit_btn_id']??'submit_button'}}" class="{{ $attributes["submit_class"]??"btn btn-primary" }}" >{{ $attributes["submit_text"]??"Submit" }}</button>
    <button type="{{ $attributes["reset_btn_type"]??"reset" }}" id="{{ $attributes["reset_btn_id"]??"reset_btn" }}" class="{{ $attributes["reset_btn_class"]??"btn btn-danger" }}" >{{ $attributes["reset_btn_text"]??"Reset" }}</button>
</div>