<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<style type="text/css">
    body {
        /* color: #566787; */
		/* background: #f5f5f5; */
		/* font-family: 'Varela Round', sans-serif;s */
		/* font-size: 13px; */
	}
	.table-wrapper {
        background: #fff;
        padding: 20px 25px;
        margin: 30px 0;
		border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
        font-family: 'Varela Round', sans-serif;s
		font-size: 13px;
    }
	.table-title {
		padding-bottom: 15px;
		background: #299be4;
		color: #fff;
		padding: 16px 30px;
		margin: -20px -25px 10px;
		border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
		margin: 5px 0 0;
		font-size: 24px;
	}
	.table-title .btn {
		color: #566787;
		float: right;
		font-size: 13px;
		background: #fff;
		border: none;
		min-width: 50px;
		border-radius: 2px;
		border: none;
		outline: none !important;
		margin-left: 10px;
	}
	.table-title .btn:hover, .table-title .btn:focus {
        color: #566787;
		background: #f2f2f2;
	}
	.table-title .btn i {
		float: left;
		font-size: 21px;
		margin-right: 5px;
	}
	.table-title .btn span {
		float: left;
		margin-top: 2px;
	}
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
		padding: 12px 15px;
		vertical-align: middle;
    }
	table.table tr th:first-child {
		width: 60px;
	}
	table.table tr th:last-child {
		width: 100px;
	}
    table.table-striped tbody tr:nth-of-type(odd) {
    	background-color: #fcfcfc;
	}
	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }	
    table.table td:last-child i {
		opacity: 0.9;
		font-size: 22px;
        margin: 0 5px;
    }
	table.table td a {
		font-weight: bold;
		color: #566787;
		display: inline-block;
		text-decoration: none;
	}
	table.table td a:hover {
		color: #2196F3;
	}
	table.table td a.settings {
        color: #2196F3;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table .avatar {
		border-radius: 50%;
		vertical-align: middle;
		margin-right: 10px;
	}
	.status {
		font-size: 30px;
		margin: 2px 2px 0 0;
		display: inline-block;
		vertical-align: middle;
		line-height: 10px;
	}
    .text-success {
        color: #10c469;
    }
    .text-info {
        color: #62c9e8;
    }
    .text-warning {
        color: #FFC107;
    }
    .text-danger {
        color: #ff5b5b;
    }
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    }	
    .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
	.pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }
</style>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Daftar Tenant</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tenant</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <br>


        <!-- awal tabel daftar tenant -->
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-5">
                            <h2>Tenant <b>Management</b></h2>
                        </div>
                        <div class="col-sm-7">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahTenant"><i class="material-icons">&#xE147;</i> <span>Tambah Tenant</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover" id="tableTenant">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>						
                            <th>Nama Tenant</th>						
                            <th>Username</th>						
                            <th>Email</th>						
                            <th>Telp</th>						
                            <th>Alamat</th>						
                            <th>Date</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="show_tenant_list">
                        
                    </tbody>
                </table>
            </div>
        <!-- akhir tabel daftar tenant -->


        <!-- modal tambah tenant/user -->
        <!-- Button trigger modal -->
        <!-- Modal -->
        <div class="modal fade" id="modalTambahTenant" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambahkan Tenant atau User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <form id="submit">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="fname">Nama Depan *</label>
                            <input class="form-control" type="text" name="fname" id="fname" required>
                        </div>
                        <div class="form-group">
                            <label for="lname">Nama Belakang *</label>
                            <input class="form-control" type="text" name="lname" id="lname" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username *</label>
                            <input class="form-control" type="text" name="username" id="username" required>
                        </div>
                        <div class="form-group">
                            <label for="nmtenant">Nama Tenant</label>
                            <input class="form-control" type="nmtenant" name="nmtenant" id="nmtenant" required>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail *</label>
                            <input class="form-control" type="email" name="email" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="telp">Telp *</label>
                            <input class="form-control" type="text" name="telp" id="telp" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat *</label>
                            <input class="form-control" type="text" name="alamat" id="alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password *</label>
                            <input class="form-control" type="password" name="password" id="password" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Role *</label>
                            <select class="custom-select" name="role1" id="role1" required>
                                <option selected>Pilih Role</option>
                                <option value="1">Admin</option>
                                <option value="2">Tenant</option>
                                <option value="3">Kasir</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status *</label>
                            <select class="custom-select" name="status1" id="status1" required>
                                <option selected>Pilih Status</option>
                                <option value="1">Active</option>
                                <option value="2">Nonactive</option>
                                <option value="3">Suspend</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto *</label>
                            <input type="file" id="foto" name="foto" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btnTambahTenant">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- akhir modal tambah tenatn/user -->
        
        <!-- modal edit tenant -->
        <!-- Button trigger modal -->
        <!-- Modal -->
        <div class="modal fade" id="modalEditTenant" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><p id="textEditTenant"></p></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="idTenant" id="idTenant">
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="custom-select" name="role" id="role">
                                <option selected>Pilih Role</option>
                                <option value="1">Admin</option>
                                <option value="2">Tenant</option>
                                <option value="3">Kasir</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="custom-select" name="status" id="status">
                                <option selected>Pilih Status</option>
                                <option value="1">Active</option>
                                <option value="2">Nonactive</option>
                                <option value="3">Suspend</option>
                            </select>
                        </div>
                        <button type="button" name="btnReset" id="btnReset" class="btn btn-danger btn-lg btn-block">Reset Password</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btnEditTenant">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal akhir edit tenant -->

        <!-- modal hapus tenant -->
        <!-- Button trigger modal -->        
        <!-- Modal -->
        <div class="modal fade" id="modalHapusTenant" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title">Hapus tenant</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                    <div class="modal-body">
                        <input type="hidden" id="idTenantx">
                        <div class="container-fluid">
                            <p id="textHapusTenant"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" id="btnHapusTenant">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- akhir modal hapus tenant -->
