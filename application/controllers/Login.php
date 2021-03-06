<?php
    class Login extends CI_Controller
    {
        public function __construct(){
            parent::__construct();
            $this->load->model('M_Login');
            $this->load->model('M_Logsys');
        }
        public function index(){
            $this->load->view('public/template/header');
            $this->load->view('public/page/pageLogin');
			$this->load->view('public/template/footer');
			// $this->load->view('public/script/login');
        }
        public function act_login(){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $where = array(
                'username' => $username,
                'password' => $password,
            );

            // data session
            
            $cek = $this->M_Login->cek_login($where)->num_rows();
            if($cek > 0){
                $idUser = $this->M_Login->find_id($where);
                $level = $this->M_Login->find_level($where);
                $foto = $level[0]->foto;
    
                $data_session = array(
                    'username' => $username,
                    'status' => "login",
                    'foto' => $foto,
                    'idUser' => $idUser[0]->id,
                    'permition' => $level[0]->status,
                    'level' => $level[0]->level,
                );
    
                $this->session->set_userdata($data_session);
                if($level[0]->level == 2){
                    if($level[0]->status == 3){
                        ?>
                        <script type="text/javascript">
                            alert('akun anda tersuspend! hubungi admin!')
                            window.location = "<?= base_url()?>"
                        </script>
                        <?php
                    }
                    else if($level[0]->status == 2){
                        $this->session->sess_destroy();
                        ?>
                        <script type="text/javascript">
                            alert('akun anda tidak aktif! hubungi admin!')
                            window.location = "<?= base_url()?>"
                        </script>
                        <?php
                    }
                    else{
                        redirect(base_url("main"));
                    }
                }
                elseif($level[0]->level == 1){
                    redirect(base_url("administrator"));
                }
                var_dump($data_session);
    
            }
            else{
                echo "Username dan password salah!";
            }
        }
        function logout(){
            $this->session->sess_destroy();
            redirect(base_url("login"));
        }
    }
    
?>