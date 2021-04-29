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
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Table Member</h4>
                        <button class="btn btn-primary btn-round ml-auto">
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
