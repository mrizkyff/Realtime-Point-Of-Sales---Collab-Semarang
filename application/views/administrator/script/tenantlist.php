<script type="text/javascript">
    $(document).ready(function(){
        tampilTenant();
        $('#tableTenant').dataTable({
            "order" : [[6, 'desc']]
        });
        console.log('halo');

        function tampilTenant(){
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url('Tenant/getAllTenant') ?>',
                async: false,
                dataType: 'JSON',
                success : function(data){
                        var html = '';
                        var i;
                        for(i=0;i<data.length; i++){
                            var status = '';
                            var role = '';
                            if (data[i].level == 1){
                                role = "Admin";
                            }
                            else if(data[i].level == 2){
                                role = "Tenant";
                            }
                            else if(data[i].level == 3){
                                role = "Kasir";
                            }

                            if (data[i].status == 1){
                                status = '<span class="status text-success">&bull;</span>Aktif'
                            }
                            else if (data[i].status == 2){
                                status = '<span class="status text-warning">&bull;</span>Nonaktif'
                            }
                            else if (data[i].status == 3){
                                status = '<span class="status text-danger">&bull;</span>Suspend'
                            }
                            
                            html += '<tr>'+
                                        '<td style="width:20px;">'+(i+1)+'</td>'+
                                        '<td style="width:200px"><a href="#"><img src="<?php echo base_url()?>asset/img/user/'+data[i].foto+'" class="avatar" alt="Avatar" style="width:25px; height:25px"> '+data[i].f_name+'</a></td>'+
                                        '<td>'+data[i].username+'</td>'+
                                        '<td>'+data[i].email+'</td>'+
                                        '<td>'+data[i].telp+'</td>'+
                                        '<td>'+data[i].alamat+'</td>'+
                                        '<td>'+data[i].tgl_registrasi+'</td>'+
                                        '<td>'+role+'</td>'+
                                        '<td style="width:100px;">'+status+'</td>'+
                                        '<td style "text-align:right;">'+
                                            '<a href="javascript:;" class="text-info item_edit" id="'+data[i].id+'" username="'+data[i].username+'">   <i class="fas fa-edit"></i>  </a>'+' '+
                                            '<a href="javascript:;" class="text-danger item_hapus" id="'+data[i].id+'" username="'+data[i].username+'"> <i class="fas fa-trash"></i> </a>'+' '+
                                        '</td>'+
                                    '</tr>';
                        }
                        $('#show_tenant_list').html(html);
                    }
            })

            // get edit tenant
            $('#show_tenant_list').on('click','.item_edit',function(){
                id = $(this).attr('id')
                username = $(this).attr('username')
                $('#modalEditTenant').modal('show');
                $('#textEditTenant').text("Form edit tenant "+username)
                $('#idTenant').val(id)
                
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('Tenant/getTenantById')?>",
                    data: {id:id},
                    dataType: "JSON",
                    success: function (response) {
                        $('#role').val(response[0]['level'])
                        $('#status').val(response[0]['status'])                      
                    }
                });
            })

            // get hapus tenant
            $('#show_tenant_list').on('click','.item_hapus',function(){
                id = $(this).attr('id')
                username = $(this).attr('username')
                
                $('#modalHapusTenant').modal('show');
                $('#textHapusTenant').text("yakin untuk meghapus "+username+'?')
                $('#idTenantx').val(id)
            })

            
            // aksi tambah tenant
            $('#submit').submit(function(e){
                e.preventDefault(); 
                    $.ajax({
                        url:'<?php echo base_url();?>tenant/do_upload',
                        type:"post",
                        data:new FormData(this),
                        processData:false,
                        contentType:false,
                        cache:false,
                        async:false,
                        success: function(data){
                            $('#modalTambahTenant').modal('hide');
                            $('#nmbrg').val('');
                            $('#jenis').val('');
                            $('#hrg').val('');
                            $('#desc').val('');
                            alert('Tenant/User Berhasil Ditambahkan');
                            console.log(data);
                            tampilTenant();
                        }
                    });
                });


            // aksi reset password
            $('#btnReset').on('click',function(){
                var id = $('#idTenant').val();
                var yakin = confirm('Yakin untuk reset password?');
                if (yakin){
                    var password = prompt('Masukkan password baru ');
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('Tenant/resetpassword')?>",
                        data: {id:id,password:password},
                        dataType: "JSON",
                        success: function (response) {
                            alert('Password berhasil di reset!');
                        }
                    });
                    
                }
                else{

                }
            })

            // aksi edit tenant
            $('#btnEditTenant').on('click',function(){
                var id = $('#idTenant').val();
                var level = $('#role').val();
                var status = $('#status').val();
                // simpan
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('Tenant/updateTenant')?>",
                    data: {id:id,level:level, status:status},
                    dataType: "JSON",
                    success: function (response) {
                        $('#modalEditTenant').modal('hide');
                        alert('Data tenant berhasil di update!');
                        tampilTenant();
                    }
                });
            })


            // aksi hapus tenant
            $('#btnHapusTenant').on('click',function(){
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('Tenant/deleteTenant')?>",
                    data: {id:id},
                    dataType: "JSON",
                    success: function (response) {
                        alert('Tenant berhasil dihapus!');  
                        $('#modalHapusTenant').modal('hide');     
                        tampilTenant();                     
                    }
                });
            })
        }
        
    })    
</script>


<script type="text/javascript">
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>