@extends('admin.layouts.master')


@section('title')
    Thêm mới
@endsection
@section('content')
    <form action="{{route('admin.catalogues.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row ">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="name">

                </div>
                <div class="mb-3">
                    <label for="cover" class="form-label">Cover</label>
                    <input type="file" class="form-control" name="cover" id="cover">

                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3 form-check">
                    <input type="checkbox" checked class="form-check-input" name="is_active" value="1" id="is_active">
                    <label class="form-check-label" for="exampleCheck1">Is_active</label>
                </div>
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
