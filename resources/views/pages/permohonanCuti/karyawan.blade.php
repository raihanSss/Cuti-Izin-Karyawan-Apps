@extends('layouts/index')

@section('content')
<div class="main-content">
        <section class="section">
            @if(Session::get('error'))
                <div class="row">
                    <div class="col-12 col-sm-12 col-lg-12">
                        <div class="alert alert-danger alert-has-icon alert-dismissible show fade">
                            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                <span>×</span>
                                </button>
                                {{Session::get('error')}}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
          <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
             <div id="flash-data" data-flashdata="{{ Session::get('success') }}"></div>
              <div class="card">
                <div class="card-header">
                  <h4>Data Permohonan</h4>
                </div>
                <div class="ml-4 mt-3">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Buat Permohonan Baru</button>
                </div>
                <div class="card-body">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped" id="table-1">
                      <tr>
                        <th class="text-center">No</th>
                        <th>Nik</th>
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
                        <td class="align-middle">{{$p->NIK}}</td>
                        <td class="text-truncate">{{$p->divisi}}</td>
                        <td class="text-truncate">{{$p->jenis_cuti}}</td>
                        <td class="text-truncate">{{$p->alasan_cuti}}</td>
                        <td class="align-middle">{{$p->tgl_mulai}}</td>
                        <td class="align-middle">{{$p->tgl_akhir}}</td>
                        <td class="align-middle"><span class="badge badge-warning">{{$p->status}}</span></td>
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
                <h5 class="modal-title" id="formModal">Form Tambah Permohonan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="" action="{{ route('permohonan.insert')}}" method="post" >
                @csrf
                <div class="form-group">
                  <label for="divisi">Nik</label>
                  <input type="text" class="form-control" name="NIK" required value="{{ Session::get('user_login')[0]->NIK }}" readonly>
                </div>
                  <div class="form-group">
                    <label for="divisi">Divisi</label>
                    <input type="text" class="form-control" name="divisi" required value="{{ Session::get('user_login')[0]->divisi }}" readonly>
                  </div>
                  <div class="form-group">
                    <label for="alasan_cuti">Alasan</label>
                    <input type="text" class="form-control" name="alasan_cuti" required >
                  </div>
                  <div class="form-group col-md-4">
                    <label for="jenis_cuti">Jenis Permohonan</label>
                    <select id="jenis_cuti" class="form-control" name='jenis_cuti' required>
                      <option selected>-pilih-</option>
                      <option>Cuti tahunan</option>
                      <option>Cuti melahirkan</option>
                      <option>Cuti sakit</option>
                      <option>Cuti besar</option>
                      <option>Cuti alasan penting</option>
                      <option>Izin</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>tanggal Mulai</label>
                    <input type="text" name="tgl_mulai" required class="form-control datepicker">
                  </div>
                  <div class="form-group">
                    <label>tanggal Berakhir</label>
                    <input type="text" name="tgl_akhir" required class="form-control datepicker">
                  </div> 
                  <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                </form>
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