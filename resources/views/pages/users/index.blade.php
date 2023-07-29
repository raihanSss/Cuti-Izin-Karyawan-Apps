@extends('layouts/index')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="row">
        <div class="col-12 col-sm-12 col-lg-12">
            <div id="flash-data" data-flashdata="{{ Session::get('success') }}"></div>
            <div class="card">
            <div class="card-header">
                <h4>Data User</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive table-invoice">
                <table class="table table-striped" id="table-1">

          

                        <div class="ml-4 mt-3">
                            <button class="btn btn-action bg-blue" data-toggle="modal" data-target="#exampleModal">Tambah Data User</button>
                        </div>

                    <tr>
                        <th align="center">No</th>
                        <th>Nama Lengkap</th>
                        <th>email</th>
                        <th>role</th>
                        {{-- <th>Opsi</th> --}}
                    </tr>
                    @foreach($users as $u)
                        <tr>
                            {{-- <td class="p-0 text-center">{{$u+1}}</td> --}}
                            <td class="font">{{$loop->iteration}}</td>
                            <td class="font-weight">{{$u->name}}</td>
                            <td class="font-weight">{{$u->email}}</td>
                            <td class="font-weight">{{$u->role}}</td>
                            <td>
                                {{-- <a class="btn btn-action bg-purple mr-1" href="{{route('users.edit',['id' => $u->id])}}" >Edit</a> --}}
                            </td>
                            {{-- <td><a class="btn btn-action bg-red mr-1" onclick="deleteKaryawan({{ $u->id }})" >Hapus</a></td> --}}
                            
                            {{-- <td>
                                <button
                                    class="badge bg-danger mr-1"
                                    onclick="deleteKaryawan({{ $k->id }})"
                                >Hapus
                                    <span data-feather="trash-fill">
                                       
                                    </span>
                                </button>
                            </td> --}}
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Form Tambah Data user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            <form method="POST" action="{{route('users.insert')}}">
                @csrf
                        <div class="form-group">
                        <label>username</label>
                        <input type="hidden" class="form-control" name="id">
                        <input type="text" class="form-control" name="name">
                        </div>
                          <div class="form-group">
                          <label>email</label>
                          <input type="hidden" class="form-control" name="id">
                          <input type="text" class="form-control" name="email">
                          </div>
                            <div class="form-group">
                                <label>password</label>
                                <input type="hidden" class="form-control" name="id">
                                <input type="password" class="form-control" name="password">
                            </div>
                              <div class="form-group">
                                <label>role</label>
                                {{-- <input type="hidden" class="form-control" name="id"> --}}
                                {{-- <input type="text" class="form-control" name="role"> --}}
                                <select name="role" id="role" class="form-control">
                                    <option selected>-pilih-</option>
                                    <option value="">Manager</option>
                                    <option value="">StafHR</option>
                                    <option value="">karyawan</option>
                                </select>
                              </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                </div>
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
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    console.log($('meta[name="csrf-token"]').attr('content'))
    function deleteUsers(id_users){
        console.log(id_users)
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Apakah anda yakin untuk menghapus?',
            text: "Jika sudah dihapus tidak dapat dibalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    async: true,
                    url: "{{ route('karyawan.delete') }}",
                    dataType: "JSON",
                    data: {
                        user_id: id_karyawan
                    },
                    type: "POST",
                    success: function(result){
                        console.log(result)
                        const { status, data, message } = result
                        if(Number(status) === -1){
                            Swal.fire({
                                position: 'center',
                                icon: 'info',
                                title: message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }else{
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: message,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            window.location.href = "{{ route('karyawan.index') }}";
                        }
                    },
                    error: function(err){
                        console.error("Err: ", err)
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Something goes wrong on Ajax!',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                })
                // swalWithBootstrapButtons.fire(
                //     'Deleted!',
                //     'Your file has been deleted.',
                //     'success'
                // )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        })
    }
    $(document).on('click', '#submit_users', function(){
        // const id_users = $('#id_users').val()
        const nama_users = $('#nama_users').val()
        const email_users = $('#email_users').val()
        const password_users = $('#password_users').val()
        const role_users = $('#role_users').val();
        console.log(id_users)
        if(id_users.length < 1 || nama_users.length < 3 || email_users.length < 3 || password_users.length < 3 || role_users.length < 1 ){
            console.log(true)
            Swal.fire({
                position: 'center',
                icon: 'info',
                title: 'Perhatikan inputan anda!',
                showConfirmButton: false,
                timer: 1500
            })
        }else{
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                async: true,
                url: "{{ route('karyawan.save') }}",
                dataType: "JSON",
                type: "POST",
                data: {
                    user_id: id_karyawan,
                    nik: nik_karyawan,
                    alamat: alamat_karyawan,
                    no_telpon: hp_karyawan,
                    jumlah_cuti: cuti_karyawan
                },
                success: function(result){
                    console.log(result)
                    const { status, data, message } = result
                    if(Number(status) === -1){
                        Swal.fire({
                            position: 'center',
                            icon: 'info',
                            title: message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }else{
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        window.location.href = "{{ route('karyawan.index') }}";
                    }
                },
                error: function(err){
                    console.error("Err: ", err)
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Something goes wrong on Ajax!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        }
    });
</script>
@endsection
