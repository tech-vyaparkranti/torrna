@extends('layouts.dashboardLayout')
@section('title', 'Manage Contact Us')
@section('content')

    <x-content-div heading="Manage Contact Us">

        <x-card-element header="Manage Contact Us Data">
            <x-data-table>

            </x-data-table>
        </x-card-element>
    </x-content-div>
@endsection

@section('script')
@include('Dashboard.include.dataTablesScript')
    <script type="text/javascript">
        let site_url = '{{ url('/') }}';
        let table = "";
        $(function() {

            table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                "scrollX": true,
                scrollY: '400px',
                ajax: {
                    url: "{{ route('ContactUsData') }}",
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
                        data: 'first_name',
                        name: 'first_name',
                        title: 'First Name'
                    },
                    {
                        data: 'last_name',
                        name: 'last_name',
                        title: 'Last Name'
                    },
                    {
                        data: 'email',
                        name: 'email',
                        title: 'Email'
                    },
                    {
                        data: 'phone_number',
                        name: 'phone_number',
                        render: function(data, type, row) {
                            let number = '';
                            if (data) {
                                number = (row.country_code??"") + row.phone_number;
                            }
                            return number;
                        },
                        title: 'Phone Number'
                    },
                    {
                        data: 'message',
                        name: 'message',
                        orderable: false,
                        searchable: false,
                        title: 'Message'
                    },
                    {
                        data: 'created_at_date',
                        name: 'created_at_date',
                        orderable: false,
                        searchable: false,
                        title: 'Created Date'
                    }

                ],
                order: [
                    [1, "desc"]
                ]
            });

        });
    </script>
    
    {{-- @include('Dashboard.include.summernoteScript') --}}
@endsection
