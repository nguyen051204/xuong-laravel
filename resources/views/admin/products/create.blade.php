@extends('admin.layouts.master')

@section('script-libs')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    @section('title')
        Thêm mới Sản phẩm
    @endsection
    @section('content')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Thêm sản phẩm</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Sản phẩm</a></li>
                            <li class="breadcrumb-item active">Thêm mới</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

    <form action="{{route('admin.products.store')}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Thêm mới sản phẩm</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="">
                                    <label for="basiInput" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>

                                <div class="mt-4">
                                    <label for="sku" class="form-label">Mã Sản phẩm</label>
                                    <input type="text" class="form-control" id="sku" name="sku"
                                           value="{{\Illuminate\Support\Str::random(10)}}">
                                </div>


                                <div class="mt-4">
                                    <label for="catelogue_id" class="form-label">Catelogue</label>

                                    <select class="form-select" name="catelogue_id" id="catelogue_id" aria-label="Disabled select example">
                                        @foreach($catelogues as $id=>$name)

                                            <option value="{{$id}}">{{$name}}</option>

                                        @endforeach
                                    </select>
                                    <div>
                                        <div class="mt-4">
                                            <label for="Price_regular" class="form-label">Price_regular</label>
                                            <input type="text" class="form-control" id="price_regular"
                                                   name="price_regular">

                                            <div class="mt-4">
                                                <label for="price_sale" class="form-label">Price_sale</label>
                                                <input type="text" class="form-control" id="price_sale"
                                                       name="price_sale">
                                            </div>

                                            <div class="mt-4">
                                                <label for="basiInput" class="form-label">Img_thumbnail</label>
                                                <input type="file" class="form-control" id="img_thumbnail"
                                                       name="img_thumbnail">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row">

                                    <div class="col-md-2 form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="is_active"
                                               name="is_active" checked>
                                        <label class="form-check-label" for="SwitchCheck1">Is Active</label>
                                    </div>
                                    <div class="col-md-2  form-check form-switch form-switch-secondary">
                                        <input class="form-check-input" type="checkbox" role="switch" id="is_hot_deal"
                                               name="is_hot_deal" checked>
                                        <label class="form-check-label" for="SwitchCheck2">Is_hot_deal</label>
                                    </div>
                                    <div class="col-md-2  form-check form-switch form-switch-success">
                                        <input class="form-check-input" type="checkbox" role="switch" id="is_good_deal"
                                               checked>
                                        <label class="form-check-label" for="SwitchCheck3">Is_good_deal</label>
                                    </div>
                                    <div class="col-md-3 form-check form-switch form-switch-warning">
                                        <input class="form-check-input" type="checkbox" role="switch" id="is_new"
                                               checked>
                                        <label class="form-check-label" for="SwitchCheck4">New</label>
                                    </div>
                                    <div class="col-md-3 form-check form-switch form-switch-warning">
                                        <input class="form-check-input" type="checkbox" role="switch" id="is_show_home"
                                               checked>
                                        <label class="form-check-label" for="SwitchCheck4">Show Home</label>
                                    </div>

                                </div>

                                <div class="mt-2">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description"
                                              rows="3"></textarea>
                                </div>
                                <div class="mt-2">
                                    <label for="description" class="form-label">Material</label>
                                    <textarea class="form-control" id="material" name="material" rows="3"></textarea>
                                </div>
                                <div class="mt-2">
                                    <label for="description" class="form-label">Hướng dẫn sử dung</label>
                                    <textarea class="form-control" id="description" name="description"
                                              rows="3"></textarea>
                                </div>
                                <div class="mt-2">
                                    <label for="description" class="form-label">Content</label>
                                    <textarea name="content" id="content"></textarea>

                                </div>
                            </div>

                        </div>
                    </div>
                    <!--end col-->
                </div>
            </div>
        </div>
        <div class="row" style="overflow:scroll;height: 300px">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Biến thể</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <table>
                                <tr>
                                    <th >Size</th>
                                    <th >Color</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Image</th>
                                </tr>

                                @foreach($sizes as $sizeId=>$sizeName)
                                    @foreach($colors as $colorId=>$colerName)
                                        <tr>
                                            <td style="">{{$sizeName}}</td>
                                            <td>
                                                <div style="width: 40px ;height:40px;background: {{$colerName}}"></div>
                                            </td>
                                            <td><input type="text" class="form-control"
                                                       name="product_variants[{{$sizeId . '.' . $colorId}}][quantity]">
                                            </td>
                                            <td><input type="file" class="form-control"
                                                       name="product_variants[{{$sizeId . '.' . $colorId}}][image]">
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </table>
                        </div>

                    </div>

                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Galerry</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="">
                                    <label for="gallery_1" class="form-label">Gallery 1</label>
                                    <input type="file" class="form-control" name="product_galleries[]" id="gallery_1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label for="gallery_2" class="form-label">Gallery 2</label>
                                    <input type="file" class="form-control" name="product_galleries[]" id="gallery_2">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Tags</h4>
                    </div>
                    <div class="card-body">

                        <div class="row gy-4">
                            <div class="col-md-12">

                                <label for="gallery-1" class="form-label">Tags</label>
                                <select class="form-control" name="tags[]" id="tags"
                                        multiple="multiple">
                                    @foreach($tags as $id=>$name)
                                        <option value="{{$id}}">{{$name}}</option>
                                    @endforeach
                                </select>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!--end col-->

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <button type="submit" class="btn btn-success">Lưu</button>
                    </div>
                </div>

            </div>
        </div>
    </form>

    @endsection
    @section('script-libs')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script src="assets/js/pages/select2.init.js"></script>
        <script src="https:////cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>
    @endsection
    @section('scripts')
        <script>

            CKEDITOR.replace('content');

            $(document).ready(function () {
                $('.js-example-basic-multiple').select2();
            });
        </script>
    @endsection
