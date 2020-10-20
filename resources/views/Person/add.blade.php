@extends('layouts.main')

@section('main')

    <a href="/" class="btn btn-dark">Home</a>

    <form class="col-10 form-row" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group col-4">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="Enter person name" required>
        </div>
        <div class="form-group col-4">
            <label for="exampleInputEmail1">Family</label>
            <input type="text" name="family" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="Enter person family">
        </div>
        <div class="form-group col-4">
            <label for="exampleInputEmail1">Phone number</label>
            <input type="tel" name="phone_number" class="form-control" id="exampleInputEmail1"
                   aria-describedby="emailHelp"
                   placeholder="Enter person phone number" required>
        </div>
        <div class="form-group col-6">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="Enter person email">
        </div>
        <div class="form-group col-6">
            <label for="exampleFormControlFile1">Avatar</label>
            <div class="custom-file">
                <input type="file" name="avatar" class="custom-file-input" id="exampleFormControlFile1">
                <label for="exampleFormControlFile1" class="custom-file-label">Select avatar</label>
            </div>
        </div>
        <div class="form-group col-12 d-flex justify-content-center mt-5">
            <button type="submit" class="btn btn-success">save</button>
        </div>
    </form>

@endsection
