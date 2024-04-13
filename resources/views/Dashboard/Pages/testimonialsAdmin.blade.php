@extends('layouts.dashboardLayout')
@section('title', 'Testimonials')
@section('content')

    <x-content-div heading="Manage Testimonials">
        <x-card-element header="Add Testimonials">
            <x-form-element method="POST" enctype="multipart/form-data" id="submitForm" action="javascript:">
                <x-input type="hidden" name="id" id="id" value=""></x-input>
                <x-input type="hidden" name="action" id="action" value="insert"></x-input>

                <x-input-with-label-element id="client_name" label="Client Name" placeholder="Client Name"
                    name="client_name" required></x-input-with-label-element>
                <x-input-with-label-element id="client_email" type="email" label="Client Email" placeholder="Client Email"
                    name="client_email"></x-input-with-label-element>

                <x-input-with-label-element id="client_image" type="file" accept="image/*"  label="Client Image" placeholder="Client Image"
                    name="client_image" required></x-input-with-label-element>


                <x-select-label-group id="approval_status" name="approval_status" label_text="Approval Status" required="true">
                    
                    @foreach ($approval_statuses as $key=>$value)
                        <option value="{{ $key }}">{{$value}}</option>
                    @endforeach
                </x-select-label-group>

                <x-input-with-label-element id="item_priority" label="Sorting Number" type="numeric" minVal="1"
                    placeholder="Sorting Number" name="item_priority" ></x-input-with-label-element>

                
                <x-text-area-with-label div_class="col-md-12 col-sm-12 mb-3" id="review_text"
                    placeholder="Review Text" label="Review Text" name="review_text"
                    required></x-text-area-with-label>

                <x-form-buttons></x-form-buttons>
            </x-form-element>

        </x-card-element>

        <x-card-element header="Services Data">
            <x-data-table>

            </x-data-table>
        </x-card-element>
    </x-content-div>
@endsection

@section('script')

    <script type="text/javascript">
        $('#review_text').summernote({
            placeholder: 'Review Text',
            tabsize: 2,
            height: 100
        });
        let site_url = '{{ url('/') }}';
        let table = "";
        $(function() {

            table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                "scrollX": true,
                ajax: {
                    url: "{{ route('testimonialsData') }}",
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}'
                    }
                },
                columns: [{
                        data: "DT_RowIndex",
                        orderable: false,
                        searchable: false,
                        title: "Sr.No."
                    },
                    {
                        data: 'id',
                        name: 'id',
                        title: 'Id',
                        visible: false
                    },
                    {
                        data: 'client_name',
                        name: 'client_name',
                        title: 'Client Name'
                    },
                    {
                        data: 'client_image',
                        render: function(data, type, row) {
                            let image = '';
                            if (data) {
                                image += '<img alt="Stored Image" src="' + site_url + data +
                                    '" class="img-thumbnail">';
                            }
                            return image;
                        },
                        orderable: false,
                        searchable: false,
                        title: "Client Image"
                    },


                    {
                        data: 'client_email',
                        name: 'client_email',
                        title: 'Client Email'
                    },
                    {
                        data: 'approval_status',
                        name: 'approval_status',
                        title: 'Approval Status'
                    },
                    {
                        data: 'review_text',
                        name: 'review_text',
                        title: 'Review Text'
                    },
                    {
                        data: 'item_priority',
                        name: 'item_priority',
                        title: 'Sorting Number'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        title: 'Action'
                    },
                ],
                order: [
                    [1, "desc"]
                ]
            });

        });
        $(document).on("click", ".edit", function() {
            $.ajax({
                type: 'GET',
                url: "{{ route('getTestimonialRowData') }}",
                data: {
                    id: $(this).data("row_id"),
                    '_token': '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.status) {
                        let row = response.data;
                        $("#id").val(row['id']);
                        $("#client_name").val(row['client_name']);
                        $("#client_email").val(row['client_email']);
                        $("#client_image").prop("required",false);
                        $("#approval_status").val(row['approval_status']);
                        $("#item_priority").val(row['item_priority']);
                        $("#review_text").val(row['review_text']);
                        $('#review_text').summernote('destroy');
                        $('#review_text').summernote({
                            focus: true
                        });
                        $("#action").val("update");

                scrollToDiv();
                    } else {
                        errorMessage(response.message);
                    }
                },
                failure: function(response) {
                    errorMessage(response.message);
                }
            });
            
            
        });


        function Disable(id) {
            changeAction(id, "disable", "This item will be disabled!", "Yes, disable it!");
        }

        function Enable(id) {
            changeAction(id, "enable", "This item will be enabled!", "Yes, enable it!");
        }

        function changeAction(id, action, text, confirmButtonText) {
            if (id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: text,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: confirmButtonText
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('saveTestimonialsMaster') }}",
                            data: {
                                id: id,
                                action: action,
                                '_token': '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if (response.status) {
                                    successMessage(response.message, true);
                                    table.ajax.reload();
                                } else {
                                    errorMessage(response.message);
                                }
                            },
                            failure: function(response) {
                                errorMessage(response.message);
                            }
                        });
                    }
                });
            } else {
                errorMessage("Something went wrong. Code 102");
            }
        }


        $(document).ready(function() {
            $("#submitForm").on("submit", function() {
                var form = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('saveTestimonialsMaster') }}",
                    data: form,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status) {
                            successMessage(response.message, "reload");
                        } else {
                            errorMessage(response.message);
                        }

                    },
                    failure: function(response) {
                        errorMessage(response.message);
                    }
                });
            });
             
        });
    </script>
    @include('Dashboard.include.dataTablesScript')
    {{-- @include('Dashboard.include.summernoteScript') --}}
@endsection
