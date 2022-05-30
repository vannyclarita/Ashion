@extends("template.admin")
@section('title', 'Transaction')
@section('judul', 'Transaction')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title, text-center">List Transaction</h5>
              </div>
              <div class="card-body">
                 <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <tr>
                      <th>NO</th>
                      <th>User</th>
                      <th>Courier</th>
                      <th>Timeout</th>
                      <th>Status</th>
                      <th class="text-center">Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->courier->courier }}</td>
                            <td>{{ $item->timeout }}</td>
                            <td>{{ $item->status }}</td>
                            <td class="text-center">
                                <a href="{{  url('admin/transaction/edit/'.$item->id) }}" class="btn btn-primary btn-sm">
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
