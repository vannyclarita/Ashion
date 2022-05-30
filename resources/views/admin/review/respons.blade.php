@extends('template.admin')
@section('title', 'Response ')
@section('judul', 'Response')

@section('content')

<div class="content">
          <div class="row">
          <div class="col-md-7">
            <div class="card ">
              <div class="card-header ">
                <h5 class="text-center">Product Image</h5>
              </div>
              <div class="card-body">
                <img src="{{ asset('img/shop/shop-1.jpg') }}z" alt="">
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title">Review Product</h5>
              </div>
              <div class="card-body">
                  <form method="POST" action="{{ url('admin/addresponse/'.$reviews->id) }}">
                    @csrf
                        <div class="form-group">
                        <label>Review</label>
                        <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror" value="{{ $reviews->content }}" disabled>
                        @error('product_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="form-group">
                        <textarea type="text" name="response" class="form-control @error('response') is-invalid @enderror" placeholder="Response..." > {{ old('response') }}</textarea>
                        @error('response')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
