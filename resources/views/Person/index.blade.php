@extends('layouts.main')

@section('main')
    {{--message on success event--}}
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif
    {{--message on failure event--}}
    @if(Session::has('failed'))
        <div class="alert alert-danger">
            {{Session::get('failed')}}
        </div>
    @endif

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Avatar</th>
            <th scope="col">Full Name</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Email</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contacts as $contact)
            <tr class="">
                <td>
                    <img height="30" style="object-fit:cover;border-radius: 5px"
                         src="people_avatar/{{$contact['avatar']}}" alt="AV">
                </td>
                <td>{{$contact['name']." ".$contact['family']}}</td>
                <td>{{$contact['phone_number']}}</td>
                <td>{{$contact['email']}}</td>
                <td><a href="/update/{{$contact['id']}}" class="btn btn-sm btn-outline-primary">Update</a></td>
                <td>
                    <a href="" class="btn btn-sm btn-outline-danger"
                       onclick="return custom_confirm('Are you sure you want to remove this?',{{$contact['id']}},event);">Delete
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="/add" class="btn btn-outline-success mt-5 mb-5">Add Contact</a>


    <!--  modal: custom confirmation  -->
    <div class="modal fade text-left" id="modal-custom-confirmation" tabindex="-1" role="dialog"
         aria-labelledby="modal-help-title">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <strong class="modal-title" id="modal-help-title">Confirmation Delete</strong>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div><!--  /.modal-header  -->
                <div class="modal-body">
                    <p id="modal-help-text"></p>
                </div><!--  /.modal-body  -->
                <div class="modal-footer">
                    <button id="confirm_delete" type="button" class="btn btn-success">Yes</button>
                    <button id="cancel_delete" type="button" class="btn btn-default" data-dismiss="modal">No</button>
                </div><!--  /.modal-footer  -->
            </div><!--  /.modal-content  -->
        </div><!--  /.modal-dialog  -->
    </div>
    <!--  /.modal  -->

@endsection

<script type="text/javascript">
    function custom_confirm(message, id, event) {
        event.preventDefault();
        $('#modal-custom-confirmation').on('show.bs.modal', function (event) {
            var modal = $(this);

            modal.find('.modal-body #modal-help-text').text(message);
        });

        $('#modal-custom-confirmation').modal('show');

        $('#confirm_delete').on('click', function () {
            window.location = '/delete/' + id;
        });

    }
</script>
