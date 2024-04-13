@extends('layouts.dashboardLayout')
@section('title', 'Destinations')
@section('content')

    <x-content-div heading="Manage Destinations">
        <x-card-element header="Add Destinations">
            <x-form-element method="POST" enctype="multipart/form-data" id="submitForm" action="javascript:">
                <x-input type="hidden" name="id" id="id" value=""></x-input>
                <x-input type="hidden" name="action" id="action" value="insert"></x-input>

                <x-input-with-label-element id="destination_name" label="Destination Name" placeholder="Destination Name" name="destination_name" required ></x-input-with-label-element>

                <x-input-with-label-element id="destination_image" label="Upload Destination Image" placeholder="Upload Destination Image" name="destination_image" type="file" accept="image/*" required></x-input-with-label-element>
 
                <x-input-with-label-element id="sorting_number" label="Sorting Number" type="numeric" minVal="1" placeholder="Sorting Number"  name="sorting_number"></x-input-with-label-element>
                
                <x-text-area-with-label div_class="col-md-12 col-sm-12 mb-3" id="destination_details" placeholder="Destination Details" label="Destination Details" name="destination_details" ></x-text-area-with-label>
                 
                <x-form-buttons></x-form-buttons>
            </x-form-element>

        </x-card-element>

        <x-card-element header="Destinations Data">
            <x-data-table>

            </x-data-table>
        </x-card-element>
    </x-content-div>
@endsection

@section('script')

    <script type="text/javascript">
    $('#destination_details').summernote({
        placeholder: 'Destination Details',
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
                    url: "{{ route('DestinationsData') }}",
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
                        data: '{{ \App\Models\DestinationsModel::ID }}',
                        name: '{{ \App\Models\DestinationsModel::ID }}',
                        title: 'Id',
                        visible: false
                    },
                    {
                        data: '{{ \App\Models\DestinationsModel::DESTINATION_NAME }}',
                        name: '{{ \App\Models\DestinationsModel::DESTINATION_NAME }}',
                        title: 'Destination Name'
                    },
                    {
                        data: '{{ \App\Models\DestinationsModel::DESTINATION_IMAGE }}',
                        render: function(data, type, row) {
                            let image = '';
                            if (data) {
                                image = '<img alt="Image Link" src="' + site_url + data +
                                    '" class="img-thumbnail">'
                            }
                            return image;
                        },
                        orderable: false,
                        searchable: false,
                        title: "Destination Image"
                    },
                    
                    
                    {
                        data: '{{ \App\Models\DestinationsModel::DESTINATION_DETAILS }}',
                        name: '{{ \App\Models\DestinationsModel::DESTINATION_DETAILS }}',
                        title: 'Destination Details'
                    },
                    {
                        data: '{{ \App\Models\DestinationsModel::SORTING_NUMBER }}',
                        name: '{{ \App\Models\DestinationsModel::SORTING_NUMBER }}',
                        title: 'Destination Listing Position'
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
            let row = $.parseJSON(atob($(this).data("row")));
            if (row['id']) {
                $("#id").val(row['id']);
                $("#destination_image").attr("required",false);
                $("#destination_name").val(row['destination_name']);
                $("#course_sorting").val(row['course_sorting']);
                $("#course_details").val(row['course_details']);
                $('#course_details').summernote('destroy');
                $('#course_details').summernote({focus: true});
                $("#action").val("update");

                scrollToDiv();
            } else {
                errorMessage("Something went wrong. Code 101");
            }
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
                            url: '{{ route('saveDestinations') }}',
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
                    url: '{{ route('saveDestinations') }}',
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
