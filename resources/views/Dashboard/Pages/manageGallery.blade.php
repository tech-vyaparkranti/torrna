@extends('layouts.dashboardLayout')
@section('title', 'Manage Gallery')
@section('content')
    <x-dashboard-container container_header="Manage Gallery">
        <x-card>
            <x-card-header>Add Gallery Items</x-card-header>
            <x-card-body>
                <x-form>
                    <x-input type="hidden" name="id" id="id" value=""></x-input>
                    <x-input type="hidden" name="action" id="action" value="insert"></x-input>

                    <x-input-with-label-element name="local_image[]" id="local_image" type="file"
                        label="Upload Images" placeholder="Images" accept="image/*"
                        multiple></x-input-with-label-element>

                    <x-input-with-label-element type="url" name="image_link" id="image_link" placeholder="Image Link"
                        label="Image Link"></x-input-with-label-element>

                    <x-input-with-label-element required name="alternate_text" id="alternate_text"
                        placeholder="Alernate Text For Image" label="Alternate Text"></x-input-with-label-element>

                    <x-input-with-label-element type="file" name="local_video" id="local_video" placeholder="Video"
                        label="Upload Video"></x-input-with-label-element>

                    <x-input-with-label-element type="url" name="video_link" id="video_link" placeholder="Video Link"
                        label="Video Link"></x-input-with-label-element>

                    <x-input-with-label-element type="text" id="title" name="title"
                        placeholder="Gallery Item Title" label="Title"></x-input-with-label-element>

                    <x-text-area-with-label id="description" name="description" placeholder="Gallery Item Description"
                        label="Description"></x-text-area-with-label>

                    <x-input-with-label-element type="number" id="position" name="position" placeholder="Position"
                        label="Position"></x-input-with-label-element>

                    <x-select-label-group required name="view_status" id="view_status" label_text="View Status">
                        <option value="visible">Visibile</option>
                        <option value="hidden">Hidden</option>
                    </x-select-label-group>
                    <x-select-label-group required name="filter_category" id="filter_category_id" label_text="Filter Category">
                        <option value="Temples">Temples</option>
                        <option value="Monuments">Monuments</option>
                        <option value="HillStations">HillStations</option>
                    </x-select-label-group>
                    <x-form-buttons></x-form-buttons>
                </x-form>
            </x-card-body>
        </x-card>
        <x-card>
            <x-card-header>Menu Category Data</x-card-header>
            <x-card-body>
                <x-data-table></x-data-table>
            </x-card-body>
        </x-card>
    </x-dashboard-container>
@endsection

@section('script')
    <script type="text/javascript">
        let site_url = '{{ url('/') }}';
        var table = "";
        $(function() {

            table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('addGalleryDataTable') }}",
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}'
                    }
                },
                "scrollX": true,
                "order": [
                    [1, 'desc']
                ],
                columns: [{
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        title: "Action"
                    },
                    {
                        data: '{{ \App\Models\GalleryItem::ID }}',
                        name: '{{ \App\Models\GalleryItem::ID }}',
                        title: "Id"
                    },
                    {
                        data: '{{ \App\Models\GalleryItem::TITLE }}',
                        name: '{{ \App\Models\GalleryItem::TITLE }}',
                        title: "Title"
                    },
                    {
                        data: '{{ \App\Models\GalleryItem::DESCRIPTION }}',
                        name: '{{ \App\Models\GalleryItem::DESCRIPTION }}',
                        title: "Description"
                    },
                    {
                        data: '{{ \App\Models\GalleryItem::ALTERNATE_TEXT }}',
                        name: '{{ \App\Models\GalleryItem::ALTERNATE_TEXT }}',
                        title: "Alternate Text"
                    },
                    {
                        data: '{{ \App\Models\GalleryItem::FILTER_CATEGORY }}',
                        name: '{{ \App\Models\GalleryItem::FILTER_CATEGORY }}',
                        title: "Filter Category"
                    },
                    {
                        data: '{{ \App\Models\GalleryItem::LOCAL_IMAGE }}',
                        render: function(data, type) {
                            let image = '';
                            if (data) {
                                image += '<img alt="Stored Image" src="' + site_url + data +
                                    '" class="img-thumbnail">';
                            }
                            return image;
                        },
                        orderable: false,
                        searchable: false,
                        title: "Image Local"
                    },
                    {
                        data: '{{ \App\Models\GalleryItem::IMAGE_LINK }}',
                        render: function(data, type) {

                            let image = '';
                            if (data) {
                                image += '<img alt="Image Link" src="' + data +
                                    '" class="img-thumbnail">';
                            }
                            return image;
                        },
                        orderable: false,
                        searchable: false,
                        title: "Image Link"
                    },
                    {
                        data: '{{ \App\Models\GalleryItem::LOCAL_VIDEO }}',
                        render: function(data, type) {
                            let video = '';
                            if (data) {
                                video += '<video width="100" height="100" controls><source src="' +
                                    site_url + data + '" type="video/mp4">' +
                                    'Your browser does not support the video tag.</video>';
                            }
                            return video;
                        },
                        orderable: false,
                        searchable: false,
                        title: "Video Local"
                    },
                    {
                        data: '{{ \App\Models\GalleryItem::VIDEO_LINK }}',
                        render: function(data, type) {
                            let video = '';
                            if (data) {
                                video += '<video width="100" height="100" controls><source src="' +
                                    data + '" type="video/mp4">' +
                                    'Your browser does not support the video tag.</video>';
                            }
                            return video;
                        },
                        orderable: false,
                        searchable: false,
                        title: "Video Link"
                    },
                    {
                        data: '{{ \App\Models\GalleryItem::POSITION }}',
                        name: '{{ \App\Models\GalleryItem::POSITION }}',
                        title: "Position"
                    },
                    {
                        data: '{{ \App\Models\GalleryItem::VIEW_STATUS }}',
                        name: '{{ \App\Models\GalleryItem::VIEW_STATUS }}',
                        title: "View Status"
                    },

                ]
            });

        });
        $(document).on("click", ".edit", function() {
            let row = $.parseJSON(atob($(this).data("row")));
            if (row['id']) {
                $("#id").val(row['id']);
                $("#image_link").val(row['image_link']);
                $("#alternate_text").val(row['alternate_text']);
                $("#video_link").val(row['video_link']);
                $("#title").val(row['title']);
                $("#description").val(row['description']);
                $("#position").val(row['position']);
                $("#view_status").val(row['view_status']);
                $("#filter_category_id").val(row['filter_category']);
                $("#action").val("update");
                scrollToDiv();
            }
        });
        $(document).ready(function() {
            $("#submit_form").on("submit", function() {
                var form = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: '{{ route('addGalleryItems') }}',
                    data: form,
                    cache: false,
                    contentType: false,
                    processData: false,
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
            });
        });

        function deleteGallery(id) {
            if (id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This item will be removed!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('addGalleryItems') }}',
                            data: {
                                id: id,
                                action: "delete",
                                '_token': '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if (response.status) {
                                    successMessage(response.message);
                                    table.ajax.reload()
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
    </script>
    @include('Dashboard.include.dataTablesScript')
@endsection
