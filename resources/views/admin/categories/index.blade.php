@extends('layouts.admin')

@section('main')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Sample Page</h5>
                <p class="mb-0">This is a sample page </p>
                <div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 ">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">Thêm mới</h5>
                        <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
                                <input type="text" class="form-control" name="category_name" id="exampleInputEmail1"
                                       aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">Tên là thứ sẽ xuất hiện trên trang web của bạn
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ảnh</label>
                                <input type="file" name="category_image" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">Danh sách</h5>
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0 align-middle">
                                <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">
                                            <input type="checkbox" class="form-check-input">
                                        </h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Ảnh</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Tên danh mục</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Trạng thái</h6>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">
                                                <input type="checkbox" class="form-check-input" name="checked"
                                                       value="{{$category->id}}">
                                            </h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <img
                                                src="{{Storage::url('uploads/images/categories/' . $category->image_url)}}"
                                                style="width: 70px;height: auto"
                                                class="card-img" alt="img">
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1">{{$category->name}}</h6>
                                            <div class="d-flex">
                                                <span class="fw-normal">
                                                <a href="{{route('categories.show', [$category->id])}}">Xem</a> |
                                                <a href="{{route('categories.edit', [$category->id])}}">Sửa</a> |
                                                </span>
                                                <form style="margin-left: 1%"
                                                      action="{{route('categories.destroy', [$category->id])}}"
                                                      method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        onclick="return confirm('Danh mục sẽ bị xoá vĩnh viễn, bạn chắc chứ ?')"
                                                        class="text-danger" type="submit"
                                                        style="background: none;border: none">Xoá
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                        <td class="border-bottom-0">
                                            <div class="d-flex align-items-center gap-2">
                                            <span
                                                class="badge {{($category->status == 1) ? "bg-success" : "bg-danger"}} rounded-3 fw-semibold">
                                                {{($category->status == 1) ? "Mở" : "Khoá"}}
                                            </span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>

    </script>
@endsection
