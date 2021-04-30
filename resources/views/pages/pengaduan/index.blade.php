@extends('layout.index')
@section('title','Data Pengaduan')
@section('content')
@section('page','Data Pengaduan')
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
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Table Pengaduan</h4>
                    </div>
                </div>
                <div class="card-body">
                    <table id="myTable" class="table table-striped table-bordered table-responsive" style="width: 100%">
                        <thead>
                            <tr style="text-align: center;">
                                <th style="width: 2%">No</th>
                                <th style="width: 30%">Jenis Pengaduan</th>
                                <th style="width: 20%">Pengaduan</th>
                                <th style="width: 20%">Tanggal</th>
                                <th style="width: 20%">Nama Member</th>
                                <th style="width: 18%">Foto</th>
                                <th style="width: 18%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $no => $a)
                            <tr>
                                <td>{{$no+1}}</td>
                                <td>{{$a->jenis_pengaduan}}</td>
                                <td>{{$a->pengaduan}}</td>
                                <td>{{$a->tanggal_pengaduan}}</td>
                                <td>{{$a->nama_member}}</td>
                                <td><img src="{{asset('pengaduan')}}/{{$a->foto}}" alt=""></td>
                                <td>
                                    <div class="form-button-action">
                                        <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Ubah Data">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus Data">
                                            <i class="fa fa-times"></i>
                                        </button>
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
    <script>
        $('#myTable').DataTable();
    </script>
@endsection
