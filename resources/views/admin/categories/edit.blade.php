@extends('layouts.admin')

@section('main')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Sửa danh mục, id: {{$id}}</h5>
                    <div class="card">
                        <div class="card-body">
                            <form enctype="multipart/form-data"
                                  action="{{route('categories.update', [$category->id])}}"
                                  method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label class="form-label">Tên danh mục</label>
                                    <input type="text" name="category_name" value="{{$category->name}}"
                                           class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Trạng thái</label>
                                    <select class="form-select" name="category_status">
                                        <option
                                            value="{{$category->status}}">
                                            {{($category->status == 1) ? "Mở" : "Khoá"}}
                                        </option>
                                        <option value="{{($category->status == 1) ? 0 : 1}}">
                                            {{($category->status == 1) ? "Khoá" : "Mở"}}
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Ảnh</label> <br>
                                    <div class="d-flex align-items-center">
                                        <img class="img-thumbnail" style="width: 20%;height: auto"
                                             src="{{Storage::url('uploads/images/categories/' . $category->image_url)}}"
                                             alt="Chưa có ảnh !">
                                        <input type="file" class="form-control" name="category_image">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
