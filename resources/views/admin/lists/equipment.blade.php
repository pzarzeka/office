@extends('admin.index')

@section('content')
    <div class="list">
        <table id="equipments-list" class="display">
            <thead>
                <tr>
                    <th>Kind</th>
                    <th>Model</th>
                    <th>Name</th>
                    <th>Year</th>
                    <th>Value</th>
                    <th>Description</th>
                    <th>Workplace</th>
                </tr>
            </thead>
        </table>
    </div>
    <script>
        let equipmentDataRoute = "{{ route('equipment.data')}}";
        $(document).ready(function() {
            $('#equipments-list').DataTable({
                'ajax': equipmentDataRoute,
                'columns': [
                    {data: 'kind', name: 'kind'},
                    {data: 'model', name: 'model'},
                    {data: 'name', name: 'name'},
                    {data: 'year_purchase', name: 'year'},
                    {data: 'value', name: 'value'},
                    {data: 'description', name: 'description'},
                    {data: 'workplace.name', name: 'workplace'}
                ]
            });
        } );
    </script>
@endsection