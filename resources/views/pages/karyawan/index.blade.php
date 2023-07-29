@extends('layouts/index')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="row">
        <div class="col-12 col-sm-12 col-lg-12">
            <div id="flash-data" data-flashdata="{{ Session::get('success') }}"></div>
            <div class="card">
            <div class="card-header">
                <h4>Data Karyawan</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive table-invoice">
                <table class="table table-striped" id="table-1">
                    
             {{-- <a class="btn btn-action bg-blue mr-1" href="{{route('karyawan.tambah',['id' => $k->id])}}" >Tambah Data Karyawan</a> 
                     --}}
                        {{-- <a class="btn btn-action bg-blue mr-1" href="" >Tambah Data Karyawan</a>  --}}
                    
                        <div class="ml-4 mt-3">
                            <button class="btn btn-action bg-blue" data-toggle="modal" data-target="#exampleModal">Tambah Data Karyawan</button>
                        </div>

                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama Lengkap</th>
                        <th>NIK</th>
                        <th>Divisi</th>
                        <th>Alamat</th>
                        <th>No Telpon</th>
                        <th>Jumlah Cuti</th>
                        <th>Opsi</th>
                    </tr>
                    @foreach($karyawan as $i => $k)
                        <tr>
                            <td class="p-0 text-center">{{$i+1}}</td>
                            <td class="font-weight-600">{{$k->name}}</td>
                            <td class="font-weight-600">{{$k->NIK}}</td> 
                            <td class="font-weight-600">{{$k->divisi}}</td>
                            <td class="text-truncate">{{$k->alamat}}</td>
                            <td class="align-middle">{{$k->no_telpon}}</td>
                            <td class="align-middle">{{$k->jumlah_cuti}} Hari</td>
                            <td> 
                                <a class="btn btn-action bg-purple mr-1" href="{{route('karyawan.edit',['id' => $k->id])}}" >Edit</a> 
                            </td>
                            <td> 
                                <a class="btn btn-action bg-red mr-1" href="#" >Hapus</a> 
                            </td>
                        </tr>
                    @endforeach
                </table>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
    
    <!-- modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="formModal">Form Tambah Data Karyawan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            {{-- @if(session()->has('sukses'))
                                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                      <i class="bi bi-check-lg"></i> {{ session('sukses') }}
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif
                                    @if(session()->has('hapus'))
                                    <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                                      <i class="bi bi-check-lg"></i> {{ session('hapus') }}
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif --}}
            <div class="modal-body">
            {{-- <form class="" action="{{ route('karyawan.insert') }}" method="post" > --}}
                
                    @csrf
                <div class="form-group">
                <label>Nama Lengkap</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                   <div class="input-group-text"> 
                    </div>
                    </div>
                    <input type="text" class="form-control" name="nama">
                </div>
                </div>
                <div class="form-group">
                    <label>NIK</label>
                    <div class="input-group">
                       <div class="input-group-prepend"> 
                        <div class="input-group-text"> 
                        </div>
                        </div>
                        <input type="text" class="form-control" name="nik">
                    </div>
                    </div>
                <div class="form-group">
                <label>Alamat</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                     <div class="input-group-text"> 
                    </div>
                    </div>
                    <input type="text" class="form-control"  name="alamat">
                </div>
                </div>
                <div class="form-group">
                <label>No Telpon</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                   <div class="input-group-text"> 
                    </div>
                    </div>
                    <input type="text" class="form-control"  name="no_telpon">
                </div>
                </div>
                <div class="form-group">
                <label>Jumlah Cuti</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <div class="input-group-text">

                    </div>
                    </div>
                    <input type="text" class="form-control"  name="jumlah_cuti">
                </div>
                </div
            </form>
            
            <button type="button" class="btn btn-primary m-t-15 waves-effect">submit</button>
            </div>
          
        </div>
        </div>
    </div>
    
    <div class="settingSidebar">
        <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
        </a>
        <div class="settingSidebar-body ps-container ps-theme-default">
        <div class=" fade show active">
            <div class="setting-panel-header">Setting Panel
            </div>
            <div class="p-15 border-bottom">
            <h6 class="font-medium m-b-10">Select Layout</h6>
            <div class="selectgroup layout-color w-50">
                <label class="selectgroup-item">
                <input type="radio" name="value" value="1" class="selectgroup-input select-layout" checked>
                <span class="selectgroup-button">Light</span>
                </label>
                <label class="selectgroup-item">
                <input type="radio" name="value" value="2" class="selectgroup-input select-layout">
                <span class="selectgroup-button">Dark</span>
                </label>
            </div>
            </div>
            <div class="p-15 border-bottom">
            <h6 class="font-medium m-b-10">Sidebar Color</h6>
            <div class="selectgroup selectgroup-pills sidebar-color">
                <label class="selectgroup-item">
                <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                    data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                </label>
                <label class="selectgroup-item">
                <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                    data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                </label>
            </div>
            </div>
            <div class="p-15 border-bottom">
            <h6 class="font-medium m-b-10">Color Theme</h6>
            <div class="theme-setting-options">
                <ul class="choose-theme list-unstyled mb-0">
                <li title="white" class="active">
                    <div class="white"></div>
                </li>
                <li title="cyan">
                    <div class="cyan"></div>
                </li>
                <li title="black">
                    <div class="black"></div>
                </li>
                <li title="purple">
                    <div class="purple"></div>
                </li>
                <li title="orange">
                    <div class="orange"></div>
                </li>
                <li title="green">
                    <div class="green"></div>
                </li>
                <li title="red">
                    <div class="red"></div>
                </li>
                </ul>
            </div>
            </div>
            <div class="p-15 border-bottom">
            <div class="theme-setting-options">
                <label>
                <span class="control-label p-r-20">Mini Sidebar</span>
                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                    id="mini_sidebar_setting">
                <span class="custom-switch-indicator"></span>
                </label>
            </div>
            </div>
            <div class="p-15 border-bottom">
            <div class="theme-setting-options">
                <div class="disk-server-setting m-b-20">
                <p>Disk Space</p>
                <div class="sidebar-progress">
                    <div class="progress" data-height="5">
                    <div class="progress-bar l-bg-green" role="progressbar" data-width="80%" aria-valuenow="80"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="progress-description">
                    <small>26% remaining</small>
                    </span>
                </div>
                </div>
                <div class="disk-server-setting">
                <p>Server Load</p>
                <div class="sidebar-progress">
                    <div class="progress" data-height="5">
                    <div class="progress-bar l-bg-orange" role="progressbar" data-width="58%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="progress-description">
                    <small>Highly Loaded</small>
                    </span>
                </div>
                </div>
            </div>
            </div>
            <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
            <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                <i class="fas fa-undo"></i> Restore Default
            </a>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection