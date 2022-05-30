@extends('template.user')

@section('section')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Transaction List</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Proof Payment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td class="cart__product__item">
                                        <img src="{{ asset('img/shop-cart/cp-1.jpg')}}" alt="">
                                        <div class="cart__product__item__title">
                                            <h6>{{ $transactions->detail->first()->product->product_name }}</h6>
                                        </div>
                                        @if (count($transactions->detail)>1)
                                            <h6 class="d-block mb-3">+{{ count($transactions->detail)-1 }} produk lainnya</h6>
                                        @endif
                                    </td>
                                    <td class="cart__price">Rp. {{ number_format($transactions->total) }}</td>
                                    <td class="cart__price">
                                        <form method="POST" action="{{ url('user/proof/'.$transactions->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('patch')
                                        <div class="form-group">
                                            <input type="file" name="proof" id="proof" class="form-control @error('proof') is-invalid @enderror" value="{{ old('proof') }}">
                                            @error('proof')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

