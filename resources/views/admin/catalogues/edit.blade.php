@extends('admin.layouts.master')


@section('title')
    Cập nhật danh mục
@endsection
@section('content')
    <form action="{{route('admin.catalogues.update', $model->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row ">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" value="{{$model->name}}" name="name" id="name" aria-describedby="name">

                </div>
                <div class="mb-3">
                    <label for="cover" class="form-label">Cover</label>
                    <input type="file" class="form-control" name="cover" id="cover">
                    <img src="{{\Storage::url($model->cover)}}" alt="" width="50px">

                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3 form-check">
                    <input type="checkbox"
                            @if($model->is_active) checked @endif

                           class="form-check-input" name="is_active" value="1" id="is_active">
                    <label class="form-check-label" for="exampleCheck1">Is_active</label>
                </div>
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

