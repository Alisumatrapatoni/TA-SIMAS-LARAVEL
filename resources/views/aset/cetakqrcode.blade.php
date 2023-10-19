<link href="{{ asset('vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">
<div class="container mt-3">
    <div class="row">
        <h3><img class="img-fluid" src="{{ asset('simas/images/smk.jpeg') }}" width="50px" alt="Logo" /> Aset SMKN 1
            Kalianget</h3>
    </div>
    <hr>
    <div class="mt-2 mb-5">
        <div class="qr-field">
            <div class="qrframe" style="border:2px solid black; width:950px; height:310px; display: flex; flex-direction: row;">
                <div style="display: flex; flex-direction: column; align-items: center;">
                    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->errorCorrection('H')->generate($qrcode->kode)) !!}" style="width: 300px; height: 300px;">

                </div>
                <div class="mt-5 pt-3" style="margin-left: 20px; display: flex; flex-direction: column;">
                    <p><span style="font-weight: bold;">Kode Aset :</span> {{ $qrcode->kode }}</p>
                    <p><span style="font-weight: bold;">Nama Aset :</span> {{ $qrcode->nama }}</p>
                    <p><span style="font-weight: bold;">Tanggal Pembelian :</span> {{ $qrcode->tanggal_pembelian }}</p>
                    <p><span style="font-weight: bold;">Kondisi :</span> {{ $qrcode->kondisi }}</p>
                    <p><span style="font-weight: bold;">Brand :</span> {{ $qrcode->brand }}</p>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    window.print();
</script>
