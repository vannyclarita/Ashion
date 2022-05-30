@extends('template.admin')
@section('title', 'Product ')
@section('judul', 'Product')

@section('content')

<div class="content">
          <div class="row">
          <div class="col-md-7">
            <div class="card ">
              <div class="card-header ">
                <h5 class="text-center">Proof Payment</h5>
              </div>
              <div class="card-body">
                @if($transactions->proof_of_payment)
                    <img src="{{ asset('proof-transaction/'.$transactions->proof_of_payment)}}" alt="">
                @else
                    <h3>Belum Ada Bukti Pembayaran</h3>
                @endif
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title">TRANSACTION DETAIL</h5>
              </div>
              <div class="card-body">
                        <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror" value="{{ $transactions->user->name }}" disabled>
                        @error('product_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label>Courier</label>
                            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ $transactions->courier->courier }}" disabled>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Timeout</label>
                            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ $transactions->timeout }}" disabled>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ $transactions->address }}, {{ $transactions->province }}" disabled>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Total</label>
                            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ $transactions->total }}" disabled>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <form action="{{ url('admin/transaction/editprocess/'.$transactions->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                          <label for="status">Status</label>
                          <select class="form-control" name="status" id="">
                            @foreach ([
                            'canceled',
                            'delivered',
                            'expired',
                            'success',
                            'unverified',
                            'verified',
                            ] as $item)
                            <option value="{{ $item }}" {{ $transactions->status == $item ? 'selected':'' }}>{{ $item }}</option>
                            @endforeach
                            </select>
                      </div>


                    <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
