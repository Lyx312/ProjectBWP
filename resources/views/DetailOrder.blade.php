<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Order - </title>
</head>
<body>
    {{-- untuk seller setelah memilih order pesanan yang masuk dari customer --}}
    {{-- klo kurang, mau dirubah, gpp --}}

    <div class="container-fluid mt-3">
        <div class="row mx-3 align-items-center">
            <div class="col-8 d-flex" style="font-size: 2rem; font-weight: bold; color: #007bff;">
                Ecommerce
            </div>
            <div class="col text-right">
                <a href="#" class="btn btn-primary">Print</a>
                <a href="#" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row mx-3">
            <div class="col">
            <h2>Invoice</h2>
            </div>
        </div>

        <div class="row mx-3 mt-4">
            <div class="col">
                <label for="" style="font-weight:bold;">Order ID : </label>
            </div>
            <div class="col ">
                <label for="" style="font-weight:bold;">Pembeli :</label>
            </div>
        </div>

        <div class="row mx-3">
            <div class="col">
                <label for="" style="font-weight:bold;">Date :</label>
            </div>
        </div>

        <div class="table px-4 mt-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Product Price</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Furry Dolls</td>
                    <td>2</td>
                    <td>Rp 1.000.000,00</td>
                    <td>Rp 2.000.000,00</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="row mx-3 catatan">
            <div class="col mx-3 bg-light rounded">
                <div class="row">
                    <label for="" style="font-weight:bold;">Catatan untuk Penjual :</label>
                </div>

                <div class="row">
                        <!-- Isi Pesan -->
                    <p>ini isi pesan </p>
                </div>
            </div>

        </div>

        <div class="row mx-3 mt-4">
            <div class="col">
                <label for=""style="font-weight:bold;">Subtotal:</label>
            </div>
            <div class="col text-right" style="font-weight:bold;">Rp. Total</div>
        </div>

        <div class="row mx-3">
            <div class="col">
                <hr style="border: 1px solid #d9d9d9;">
            </div>
        </div>


        <div class="row mx-3">
            <div class="col">
                <!-- jenis kurir -->
               <p style="font-weight:bold;">No-Send</p>
            </div>

            <div class="col text-right">
                <p>Rp.10.000.000,00</p>
            </div>
        </div>

        <div class="row mx-3">
            <div class="col mx-3">
                <div class="row">
                    <label for=""style="font-weight:bold;">Shipping Destination</label>
                </div>
                <div class="row">
                    <label for="" style="font-weight:bold;">{Nama Customer}</label>
                </div>
            </div>
            <div class="col">
            <div class="row bg-light rounded">
                    <div class="col">
                        <label for="" style="font-weight:bold;">Total:</label>
                    </div>
                    <div class="col text-right">
                        <p>Rp.1000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
