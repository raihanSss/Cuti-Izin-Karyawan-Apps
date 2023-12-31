@extends('layouts/index')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="row ">
        <div class="col-xl-4 col-lg-6">
            <div class="card l-bg-cyan-dark">
            <div class="card-statistic-3">
                <div class="card-icon card-icon-large"><i class="fa fa-briefcase"></i></div>
                <div class="card-content">
                <h4 class="card-title">Sisa Cuti Tahunan</h4>
                <span>{{$sisa_cuti}} hari</span>
                <div class="progress mt-1 mb-1" data-height="8">
                    <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mb-0 text-sm">
                    <span class="mr-1"></span>
                         
                </p>
                </div>
            </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6">
            <div class="card l-bg-purple-dark">
            <div class="card-statistic-3">
                <div class="card-icon card-icon-large"><i class="fa fa-briefcase"></i></div>
                <div class="card-content">
                <h4 class="card-title">Permohonan Disetujui</h4>
                <span>{{$jmlPermohonanDisetujui}} disetujui</span>
                <div class="progress mt-1 mb-1" data-height="8">
                    <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mb-0 text-sm">
                    <span class="mr-1"><i class="fas fa-eye"></i></span>
                        <a href="{{route('karyawan.permohonan.disetujui')}}" class="text-white">View Detail</a> 
                </p>
                </div>
            </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6">
            <div class="card l-bg-orange-dark">
            <div class="card-statistic-3">
                <div class="card-icon card-icon-large"><i class="fa fa-briefcase"></i></div>
                <div class="card-content">
                <h4 class="card-title">Permohonan Ditolak</h4>
                <span>{{$jmlPermohonanDitolak}} ditolak</span>
                <div class="progress mt-1 mb-1" data-height="8">
                    <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mb-0 text-sm">
                    <span class="mr-1"><i class="fas fa-eye"></i></span>
                        <a href="{{route('karyawan.permohonan.ditolak')}}" class="text-white">View Detail</a> 
                </p>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-12 col-sm-12 col-lg-12">
        <div id="flash-data" data-flashdata="{{ Session::get('success') }}"></div>
            <div class="card">
            <div class="card-header">
                <h4>History Permohonan</h4>
                <div class="card-header-action">
                    <a href="{{route('permohonan.index')}}" class="btn btn-info"> <i class="fa fa-eye"></i> View All</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive table-invoice">
                <table class="table table-striped">
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama karyawan</th>
                        <th>NIK</th>
                        <th>Divisi</th>
                        <th>Jenis Permohonan </th>
                        <th>Alasan</th>
                        <th>Mulai</th>
                        <th>Berakhir</th>
                        <th>Status</th>
                    </tr>
                    @foreach($permohonan as $i => $p)
                    <tr>
                        <td class="p-0 text-center">{{$i+1}}</td>
                        <td class="font-weight-600">{{$p->name}}</td>
                        <td class="align-middle">{{$p->NIK}}</td>
                        <td class="text-truncate">{{$p->divisi}}</td>
                        <td class="text-center">{{$p->jenis_cuti}}</td>
                        <td class="text-truncate">{{$p->alasan_cuti}}</td>
                        <td class="align-middle">{{$p->tgl_mulai}}</td>
                        <td class="align-middle">{{$p->tgl_akhir}}</td>
                        <td class="align-middle">
                            @if($p->status === "disetujui")
                                <span class="badge badge-success">{{$p->status}}</span>
                            @elseif($p->status === "pending")
                                <span class="badge badge-warning">{{$p->status}}</span>
                            @elseif($p->status === "ditolak")
                                <span class="badge badge-danger">{{$p->status}}</span>
                            @endif
                            
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