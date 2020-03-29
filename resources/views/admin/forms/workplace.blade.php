@extends('admin.index')

@section('content')

    {!! form_start($form) !!}
        <div>
            <button type="button" class="add-to-collection btn btn-secondary">Add equipment</button>
        </div>
        <div class="collection-container" data-prototype="{{ form_row($form->equipments->prototype()) }}"></div>
        {!! form_row($form->equipments) !!}
    {!! form_end($form) !!}

    <script>
        $(document).ready(function() {
            $('.add-to-collection').on('click', function(e) {
                e.preventDefault();
                let container = $('div.equipments');
                let count = container.children().length;
                let proto = $('div.collection-container').data('prototype').replace(/__NAME__/g, count);
                container.append(proto);
            });
        });
    </script>
@endsection