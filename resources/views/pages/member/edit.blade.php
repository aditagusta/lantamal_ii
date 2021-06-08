@extends('layout.index')
@section('title','Data Member')
@section('content')
@section('page','Edit Member')
<div class="page-inner mt--5">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-body" align=center>
                    <h1>PANDEKA LAUIK SAKTI</h1>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            @if ($message = Session::get('status'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif

            @if ($message = Session::get('error'))
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <form action="{{route('upmember')}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="hidden" class="form-control" name="id_member" value="{{$data->id_member}}">
                    <input type="text" class="form-control" name="username" value="{{$data->username}}">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" class="form-control" name="password" value="{{$data->password1}}">
                </div>
                <div class="form-group">
                    <label for="">Ulangi Password</label>
                    <input type="text" class="form-control" name="password1" value="{{$data->password1}}">
                </div>
                <div class="form-group">
                    <label for="">Nama Member</label>
                    <input type="text" class="form-control" name="nama_member" value="{{$data->nama_member}}">
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="{{$data->alamat}}">
                </div>
                <div class="form-group">
                    <label for="">No. KTP</label>
                    <input type="number" class="form-control" name="no_ktp" value="{{$data->no_ktp}}">
                </div>
                <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jk"  class="form-control">
                        <option value="Pria">Pria</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <br>
                <button class="btn btn-primary" type="submit">Simpan</button>
              </form>
        </div>
    </div>
</div>
<script>
    $('#jk').val("{{$data->jenis_kelamin}}")
</script>
@endsection
