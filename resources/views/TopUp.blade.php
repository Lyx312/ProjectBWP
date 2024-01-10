@extends("layout.Home")

@section("content")

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">Top Up</div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="text" class="form-control" id="jumlah" name="jumlah" required>
                        </div>

                        <div class="form-group">
                            <label for="payment_method">Pilih Metode Pembayaran</label>
                            <select class="form-control" id="payment_method" name="payment_method" required>
                                <option value="bank_transfer" >BCA</option>
                                <option value="e_wallet">Pulsa</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Top Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
