@extends('admin.index')

@section('content')
    <div class="list">
        <table id="reservations-list" class="display">
            <thead>
            <tr>
                <th>Date</th>
                <th>Workplace</th>
                <th>User</th>
            </tr>
            </thead>
        </table>
    </div>
    <script>
        let reservationDataRoute = "{{ route('reservation.data')}}";
        $(document).ready(function() {
            $('#reservations-list').DataTable({
                'ajax': reservationDataRoute,
                'columns': [
                    {data: 'date', name: 'date'},
                    {data: 'workplace_name', name: 'workplace'},
                    {data: 'user_name', name: 'user'}
                ]
            });
        } );
    </script>
@endsection