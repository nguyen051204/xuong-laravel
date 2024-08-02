@extends('admin.layouts.master')

@section('title', 'Danh mục sản phẩm')

@section('style-libs')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Danh mục sản phẩm</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">Datatables</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">Basic Datatables</h5>
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Thêm mới</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Img_thumbnail</th>
                                <th>Name</th>
                                <th>SKU</th>
                                <th>Catalogues</th>
                                <th>Price Regular</th>
                                <th>Price Sale</th>
                                <th>View</th>
                                <th>Tags</th>
                                <th>Is Active</th>
                                <th>Is Hot Deal</th>
                                <th>Is Good Deal</th>
                                <th>Is Show Home</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @php
                                            $url = $item->img_thumbnail;
                                            if (!Illuminate\Support\Str::contains($url, 'http')) {
                                                $url = Illuminate\Support\Facades\Storage::url($url);
                                            }
                                        @endphp
                                        <img src="{{ $url }}" width="100px">
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->sku }}</td>
                                    <td>{{ $item->catelogue->name }}</td>
                                    <td>{{ $item->price_regular }}</td>
                                    <td>{{ $item->price_sale }}</td>
                                    <td>{{ $item->view }}</td>
                                    <td>
                                    @foreach($item->tags as $tag)
                                            <span class="btn btn-primary">{{$tag->name}}</span>
                                        @endforeach
                                    </td>
                                    <td>{!! $item->is_active ? '<span class="btn btn-primary">Yes</span>' : '<span class="btn btn-danger">No</span>' !!}</td>
                                    <td>{!! $item->is_hot_deal ? '<span class="btn btn-primary">Yes</span>' : '<span class="btn btn-danger">No</span>' !!}</td>
                                    <td>{!! $item->is_good_deal ? '<span class="btn btn-primary">Yes</span>' : '<span class="btn btn-danger">No</span>' !!}</td>
                                    <td>{!! $item->is_show_home ? '<span class="btn btn-primary">Yes</span>' : '<span class="btn btn-danger">No</span>' !!}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.products.show', $item->id) }}" class="btn btn-info mb-1">Xem chi tiết</a>
                                        <a href="{{ route('admin.products.edit', $item->id) }}" class="btn btn-warning mb-1">Sửa</a>
                                        <form action="{{route('admin.products.destroy',$item)}}" method="post" onsubmit="return confirm('Bạn có chắc muỗn xóa không')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-primary">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!--end col-->
    </div><!--end row-->

@endsection

@section('script-libs')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true,
                dom: 'Bfrtip',
                buttons: [
                    'print',
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]
                        }
                    }
                ],
                order: [
                    [0, 'desc']
                ]
            });
        });
    </script>
@endsection
