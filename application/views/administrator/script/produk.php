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
            order: [[6, 'desc']],
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
                            $('#tersedia').val('');
                            $('#tableProduk').DataTable().ajax.reload();
                            alert('Produk Berhasil Ditambahkan');

                        }
                    });
                });

        });
        

        // get hapus
        $('#tableProduk').on('click','.hapus_record',function(){
            var id = $(this).data('id');
            var nama = $(this).data('nmbrg');
            $('#modalHapus').modal('show');
            $('#id_delete').val(id);
            $('#textHapus').text('Anda yakin untuk menghapus item '+nama+'?');
        })

        // get update
        $('#tableProduk').on('click','.edit_record',function(){
            $('#modalEdit').modal('show');
            $('#id_edit').val();
            $('#nmbrgx').val($(this).data('nmbrg'))
            $('#jenisx').val($(this).data('jenis'))
            $('#hrgx').val($(this).data('harga'))
            $('#descx').val($(this).data('deskripsi'))
            $('#tersediax').val($(this).data('tersedia'))
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
                    $('#modalHapus').modal('hide');
                    $('#tableProduk').DataTable().ajax.reload();
                    alert('Produk '+id+' berhasil dihapus!');
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
            var tersedia = $('#tersediax').val();

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
                    tersedia:tersedia,
                },
                success : function(data){
                    $('#nmbrgx').val('');
                    $('#jenisx').val('');
                    $('#hrgx').val('');
                    $('#descx').val('');
                    $('#tersediax').val('');
                    $('#modalEdit').modal('hide');
                    $('#tableProduk').DataTable().ajax.reload();
                    alert('Produk berhasil di update!');
                    console.log(data);
                }
            })
        })

    })
</script>