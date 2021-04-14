<script type="text/javascript">
    $(document).ready(function () {
        tampilProfile();
        
        function tampilProfile(){
            var id = <?= json_encode($this->session->userdata('idUser'))?>

            $.ajax({
                type: "POST",
                url: "<?= base_url('profile/getProfile')?>",
                data: {id:id},
                dataType: "JSON",
                success: function (response) {
                    var lvl = ''
                    var stat = ''
                    if(response['level']==1){
                        lvl = 'Admin'
                    }
                    else if(response['level']==2){
                        lvl = "User"
                    }
                    else if(response['level']==3){
                        lvl = "Kasir"
                    }

                    if(response['status'] == 1){
                        stat = 'Active'
                    }
                    else if(response['status'] == 2){
                        stat = 'Non active'
                    }
                    else if(response['status'] == 3){
                        stat = "Suspended"
                    }

                    $('#fname').val(response['f_name'])
                    $('#lname').val(response['l_name'])
                    $('#nmtenant').val(response['nama_tenant'])
                    $('#username').val(response['username'])
                    $('#password').val(response['password'])
                    $('#email').val(response['email'])
                    $('#telp').val(response['telp'])
                    $('#alamat').val(response['alamat'])
                    $('#level').val(lvl)
                    $('#status').val(stat)
                }
            });
        }
        
        $(document).ready(function(){ 
            // upload foto
            $('#submit').submit(function(e){
                e.preventDefault(); 
                var id = $('#idUser').val();
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('profile/do_upload')?>",
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        cache: false,
                        asycn: false,
                        success: function (response) {
                            alert('Profil berhasil diperbarui, silakan login!');
                            // console.log(response);
                            // tampilProfile();
                            window.location = "<?= base_url('Login/logout') ?>";
                        }
                    });
                });

            });
    });

</script>