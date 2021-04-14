<script type="text/javascript">
    $(document).ready(function(){
        
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
        {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };
        var t = $("#tableProduk").dataTable({
            // ganti bahasa datatable jadi bahasa indonesia
            "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Indonesian.json"
            },
            initComplete: function() {
                var api = this.api();
                $('#mytable_filter input')
                        .off('.DT')
                        .on('keyup.DT', function(e) {
                            if (e.keyCode == 13) {
                                api.search(this.value).draw();
                    }
                });
            },
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            ajax: {"url": "<?php echo base_url('product/json')?>", "type": "POST"},
            columns: [
                {"data": "id_produk","orderable": false},
                {"data": "kdbrg"},
                {"data": "jenis"},
                {"data": "nmbrg"},
                {"data": "harga"},
                {"data": "deskripsi"},
                {"data": "tgl_stok"},
                {"data": "gambar"},
                {"data": "tersedia"},
                {"data": "id_tenant"},
                {"data": "aksi", "orderable": false},
            ],
            // order menurut urutan kolom
            order: [[1, 'desc']],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        });

        // simpan produk
        // simpan produk dengan gambar
        $(document).ready(function(){ 
            // upload foto
            $('#submit').submit(function(e){
                e.preventDefault(); 
                    $.ajax({
                        url:'<?php echo base_url();?>product/do_upload',
                        type:"post",
                        data:new FormData(this),
                        processData:false,
                        contentType:false,
                        cache:false,
                        async:false,
                        success: function(data){
                            $('#modalTambah').modal('hide');
                            $('#nmbrg').val('');
                            $('#jenis').val('');
                            $('#hrg').val('');
                            $('#desc').val('');
                            alert('Produk Berhasil Ditambahkan');
                            tampilProduk();
                        }
                    });
                });

        });
        

        // get hapus
        $('#show_produk').on('click','.item_hapus',function(){
            var id = $(this).attr('id');
            var nama = $(this).attr('nama');
            $('#modalHapus').modal('show');
            $('#id_delete').val(id);
            $('#textHapus').text('Anda yakin untuk menghapus item '+nama+'?');
        })

        // get update
        $('#show_produk').on('click','.item_edit',function(){
            var id = $(this).attr('id');
            $.ajax({
                url : '<?php echo base_url('product/getByCode')?>',
                type : 'POST',
                dataType : 'JSON',
                data : {id:id},
                success : function(data){
                    $('#modalEdit').modal('show');
                    $('#id_edit').val(id);
                    $('#nmbrgx').val(data[0]['nmbrg'])
                    $('#jenisx').val(data[0]['jenis'])
                    $('#hrgx').val(data[0]['harga'])
                    $('#descx').val(data[0]['deskripsi'])
                    console.log(data[0]['nmbrg']);
                    
                }
            })
        })

        // aksi hapus
        $('#btnHapus').on('click',function(){
            var id = $('#id_delete').val();
            $.ajax({
                type : 'POST',
                url : '<?php echo base_url('product/delete') ?>',
                dataType : 'JSON',
                data : {id:id},
                success : function(data){
                    alert('Produk '+id+' berhasil dihapus!');
                    $('#modalHapus').modal('hide');
                    tampilProduk();
                    $('#tableProduk').DataTable();
                    // console.log(data);
                    
                }
            });

            return false;
        });
        
        // aksi update
        $('#btnUpdate').on('click',function(){
            var id = $('#id_edit').val();
            var nmbrg = $('#nmbrgx').val();
            var jenis = $('#jenisx').val();
            var hrg = $('#hrgx').val();
            var desc = $('#descx').val();
            
            $.ajax({
                type :'POST',
                url : '<?php echo base_url('product/update') ?>',
                dataType : 'JSON',
                data : {
                    id:id,
                    nmbrg:nmbrg,
                    jenis:jenis,
                    hrg:hrg,
                    desc:desc,
                },
                success : function(data){
                    alert('Produk berhasil di update!');
                    tampilProduk();
                    $('#nmbrgx').val('');
                    $('#jenisx').val('');
                    $('#hrgx').val('');
                    $('#descx').val('');
                    $('#modalEdit').modal('hide');
                }
            })
        })

    })
</script>