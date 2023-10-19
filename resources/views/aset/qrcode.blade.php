@extends('includes.template')

@section('menunya')
<h2>
    Aset <i class="fa fa-solid fa-arrow-right"></i> Print Qr-Code
</h2>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <a href="{{ route('aset.index') }}" class="btn btn-danger mb-2"> Kembali</a>
            <div class="card">
                <div class="card-header">
                    <h3>QR Code {{ $qrcode->nama }}</h3>
                </div>
                <center class="mb-5">
                    <div class="qr-field">
                        <div class="qrframe" style="border:2px solid black; width:310px; height:310px;">
                            <img src="data:image/png;base64,
                                    {!! base64_encode(
                                        QrCode::format('png')->size(300)->errorCorrection('H')->generate($qrcode->kode),
                                    ) !!} ">
                        </div>
                        <div class="mt-2">
                            <h4>{{ $qrcode->kode }}</h4>
                        </div>
                    </div>
                    <a href="{{ route('aset.cetakqrcode', ['id' => $qrcode->kode]) }}" class="btn btn-primary"
                        style="width:110px; margin:5px 0;">Cetak QR Code</a>
                </center>
            </div>
        </div>
    </div>
@endsection
@section(' footer')
@endsection
