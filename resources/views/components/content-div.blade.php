<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{$attributes["heading"]??"Heading Not Given"}}</h4>
        <div class="row">
            <div class="col-md-12">
                {{$slot}}        
            </div>
        </div>  
</div>