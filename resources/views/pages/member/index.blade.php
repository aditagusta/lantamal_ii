@extends('layout.index')
@section('title','Data Member')
@section('content')
@section('page','Data Member')
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
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Table Member</h4>
                        <button class="btn btn-primary btn-round ml-auto" onclick="tambah()">
                            <i class="fa fa-plus"></i>
                            Data Member
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="myTable" class="table table-striped table-bordered table-responsive" style="width: 100%">
                        <thead>
                            <tr style="text-align: center;">
                                <th style="width: 2%">No</th>
                                <th style="width: 30%">Nama Member</th>
                                <th style="width: 20%">Alamat</th>
                                <th style="width: 20%">No. KTP</th>
                                <th style="width: 20%">Jenis Kelamin</th>
                                <th style="width: 18%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $no => $a)
                            <tr>
                                <td>{{$no+1}}</td>
                                <td>{{$a->nama_member}}</td>
                                <td>{{$a->alamat}}</td>
                                <td>{{$a->no_ktp}}</td>
                                <td>{{$a->jenis_kelamin}}</td>
                                <td>
                                    <div class="form-button-action">
                                        <a href="{{url('edit/member', $a->id_member)}}" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Ubah Data">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{route('hapusmember', $a->id_member)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus Data">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>
                                    </div>
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
<div class="modal fade" id="Modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="judul"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{url('tambah/member')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" class="form-control" name="username" >
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="text" class="form-control" name="password" >
            </div>
            <div class="form-group">
                <label for="">Ulangi Password</label>
                <input type="text" class="form-control" name="password1" >
            </div>
            <div class="form-group">
                <label for="">Nama Member</label>
                <input type="text" class="form-control" name="nama_member" >
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <input type="text" class="form-control" name="alamat" >
            </div>
            <div class="form-group">
                <label for="">No. KTP</label>
                <input type="number" class="form-control" name="no_ktp" >
            </div>
            <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <select name="jenis_kelamin"  class="form-control">
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
  </div>
    <script>
        function tambah()
        {
            $('#Modal').modal('show')
            document.getElementById("judul").innerHTML = "Form Tambah Data"
        }

        $('#myTable').DataTable();
    </script>
@endsection
