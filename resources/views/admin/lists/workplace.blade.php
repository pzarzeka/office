@extends('admin.index')

@section('content')
    <div class="list">
        <table id="workplaces-list" class="display">
            <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Equipments</th>
            </tr>
            </thead>
        </table>
    </div>
    <script>
        let workplaceDataRoute = "{{ route('workplace.data')}}";
        $(document).ready(function() {
            $('#workplaces').DataTable({
                'ajax': workplaceDataRoute,
                'columns': [
                    {data: 'name', name: 'name'},
                    {data: 'description', name: 'description'},
                    {data: 'equipments_list', name: 'equipments'}
                ]
            });
        } );
    </script>
@endsection