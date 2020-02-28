<?php
class MY_Controller extends CI_Controller {

    public $data = array();
    public function __construct() {
        parent::__construct();
		
		$this->load->model('master');
		
    }
    public function isLogged() {
        if (!($this->session->userdata('loged_in') > 0)) {
            redirect(ADMIN . '/login', 'refresh');
            exit;
        }
    }
    function upload_video($path, $field_name, $file_name) {

        $config['upload_path'] = $path;
        $config['allowed_types'] = "*";
        $config['max_size'] = 0;
        $config['file_name'] = $file_name;

        $this->load->library('upload', $config);



        if (!$this->upload->do_upload($field_name)) {
            $image['error'] = $this->upload->display_errors();

            return $image;
        } else {

            $image = $this->upload->data();
            return $image;
        }
    }

    function upload_image($path, $field_name, $width = '', $height = '') {
        $stamp = time();
        $config['upload_path'] = $path;
        $config['allowed_types'] = "*";
        $config['max_size'] = 0;
        $config['file_name'] = $stamp;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($field_name)) {
            $image['error'] = $this->upload->display_errors();
            $this->pr($image, true);
            return $image;
        } else {

            $image = $this->upload->data();


            $config_manip = array(
                'image_library' => 'gd2',
                'source_image' => $path . $image['file_name'],
                'new_image' => $path . "thumb/",
                'maintain_ratio' => true,
                'create_thumb' => TRUE,
                'thumb_marker' => '',
                'width' => 150
            );
            $this->load->library('image_lib', $config_manip);
            /*if (!$this->image_lib->resize()) {
                echo $this->image_lib->display_errors();
            }*/
            $this->image_lib->clear();

            return $image;
        }
    }

}
?>