@extends("template.admin")
@section('title', 'Product')
@section('judul', 'Product')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title, text-center">List Product</h5>
                <div class="pull-right">
                    <a href="{{ url('admin/product/add') }}" class="btn btn-success btn-sm">
                        <i class="fa fa-plus"></i> Add
                    </a>
                </div>
              </div>
              <div class="card-body">
                 <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <tr>
                      <th>NO</th>
                      <th>Product Name</th>
                      <th>User</th>
                      <th>Review</th>
                      <th>Rate</th>
                      <th class="text-center">Respon</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviews as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->product->product_name }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->content }}</td>
                            <td>
                            @for ($i = 1; $i <= $item->rate; $i++ )
                                <i class="fa fa-star"></i>
                            @endfor
                            </td>
                            <td class="text-center">
                                <a href="{{  url('admin/response/'.$item->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil"></i>
                                </a>
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
