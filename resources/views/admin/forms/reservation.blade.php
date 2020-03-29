@extends('admin.index')

@section('content')
    {!! form($form) !!}

    <div class="alert alert-success d-none" id="msg_div">
        <span id="res_message"></span>
    </div>

    <script>
        let reservationSaveRoute = "{{ route('reservation.save')}}";
        $("#reservation-form").submit(function (e) {
            e.preventDefault();

            let form = $(this);
            $.ajax({
                url: reservationSaveRoute,
                type: "POST",
                data: form.serialize(),
                success: function( response ) {
                    $('#res_message').show();
                    $('#res_message').html(response.message);
                    $('#msg_div').removeClass('d-none');

                    if (response.status) {
                        document.getElementById("reservation-form").reset();
                    }
                    setTimeout(function(){
                        $('#res_message').hide();
                        $('#msg_div').hide();
                    }, 10000);
                }
            });
        });




        if ($("#reservation-form").length > 0) {
            $("#reservation-form").validate({
                rules: {

                },
                submitHandler: function(form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: reservationSaveRoute,
                        type: "POST",
                        data: $('#reservation-form').serialize(),
                        success: function( response ) {
                            $('#res_message').show();
                            $('#res_message').html(response.message);
                            $('#msg_div').removeClass('d-none');

                            if (response.status) {
                                document.getElementById("reservation-form").reset();
                            }
                            setTimeout(function(){
                                $('#res_message').hide();
                                $('#msg_div').hide();
                            },10000);
                        }
                    });
                }
            })
        }
    </script>
@endsection