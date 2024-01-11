@extends("layout.Home")

@section("content")
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">Top Up</div>
                <div class="card-body">
                    <form action="{{ route('top-up-process') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="jumlah">Total</label>
                            @if($errors->has('jumlah'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('jumlah') }}
                                </div>
                            @endif
                            <input type="text" class="form-control" id="jumlah" name="jumlah">
                        </div>

                        <div class="form-group">
                            <label for="payment_method">Payment Method</label>
                            @if($errors->has('payment_method'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('payment_method') }}
                                </div>
                            @endif
                            <select class="form-control" id="payment_method" name="payment_method">
                                <option value="bank_transfer" >BCA</option>
                                <option value="e_wallet">Pulsa</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Top Up</button>
                    </form>
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
