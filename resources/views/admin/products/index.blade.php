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
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Danh sách</h5>
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Ảnh</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Tên sản phẩm</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Mã sp</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Kho</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Giá</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Danh mục</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Trạng thái</h6>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td class="border-bottom-0">
                                        <img style="width: 90px; height: auto" class="img-thumbnail"
                                             src="{{Storage::url('uploads/images/products/' . $product->base_image)}}"
                                             alt="image">
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1">{{$product->name}}</h6>
                                        <div class="d-flex hover-effect">
                                                <span class="fw-normal">
                                                <a href="{{route('products.show', [$product->id])}}">Xem</a> |
                                                <a href="{{route('products.edit', [$product->id])}}">Sửa</a> |
                                                </span>
                                            <form style="margin-left: 1%"
                                                  action="{{route('products.destroy', [$product->id])}}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    onclick="return confirm('Sản pẩm sẽ bị xoá vĩnh viễn, bạn chắc chứ ?')"
                                                    class="text-danger" type="submit"
                                                    style="background: none;border: none">Xoá
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">{{$product->id}}</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold {{($product->quantity > 0) ? "text-success" : "text-danger"}} mb-0">{{$product->quantity}}</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">{{$product->base_price}}</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">{{$product->category->name}}</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <div class="d-flex align-items-center gap-2">
                                            <span
                                                class="badge {{($product->status == 1) ? "bg-success" : "bg-danger"}} rounded-3 fw-semibold">{{($product->status == 1) ? "Active" : "Hidden"}}</span>
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
@endsection

@push('styles')
    <style>

    </style>
@endpush

@section('js')

@endsection
