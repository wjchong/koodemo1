<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');
class File_uploader
{
	
	private $no_of_files_on_folder	= 50;
	private $CI;
	private $default_path 				= "./assets/images/";
	private $config	;

	public function __construct()
	{
		
		$this->CI =& get_instance();
		
		$this->config	['upload_path']	= $this->default_path;
		$this->config	['allowed_types'] = '*';
		
		$this->CI->load->library('upload');
	}
	
	
	public function set_default_upload_path( $default_path )
	{
		
		$this->config['upload_path']	= $default_path;
		$this->default_path				= $default_path;
	}
	public function set_no_of_files_on_folder( $nooffiles )
	{
		
		$this->no_of_files_on_folder = $nooffiles;
	}
	public function set_allowed_types( $allowed_types )
	{
		
		$this->config['allowed_types']	= $allowed_types;
	}
	
	public function set_max_size ( $max_size )
	{
		$this->config['max_size']	= $max_size;
	}	
	public function set_max_width( $max_width )
	{
		$this->config['max_width']	= $max_width;
	}
	public function set_max_height( $max_height )
	{
		$this->config['max_height'] = $max_height;
	}
	public function upload_image( $field_name )
	{
		
		if ( $this->config	['allowed_types'] == '*')
			$this->config['allowed_types']		= 'jpeg|jpg|png|';
		
		return $this->file_upload( $field_name );
	}
	
	
	public function upload_document( $field_name )
	{
		if ( $this->config ['allowed_types'] == '*')
			$this->config ['allowed_types']		= 'pdf|doc|docx|ppt|pptx|';
		return $this->file_upload( $field_name );
	}
	
	public function upload_other_file( $field_name )
	{
		$this->config['allowed_types']		= '*';
		return $this->file_upload( $field_name );
	}
		
	 
	private function file_upload ( $field_name )
	{	
		
		$upload_folder_name	= $this->directory_maintainer();
		$upload_file_name		= $this->get_file_name ( $field_name );
		
		if ( $upload_file_name )
		{
			$this->config ['file_name']  		= $upload_file_name;
			$this->config ['upload_path']	= $this->default_path.$upload_folder_name ."/";
		}
		else
		{
			return 	array("status"=>"Blank Upload Not Allow");
		}

		
		$this->CI->upload->initialize($this->config);		

		
		if (! $this->CI->upload->do_upload($field_name) )
		{

			return  array(	"status"=>"Only For PNG|JPG|JPEG Allow",
								'data' => $this->CI->upload->display_errors(), 
								);
		}
		else	
		{
			return array(	"status"	=>	"200",
								"data"	=>	$upload_folder_name."/".$upload_file_name,
							);
		}	
		
		
	}
	
	
	private function get_file_name ( $field_name )
	{
		
		if( !file_exists( $_FILES[$field_name] ['tmp_name']) || !is_uploaded_file ( $_FILES[$field_name]['tmp_name']) )
		{
			return false;
		}
		return rand(0000,1111)."-".$_FILES [ $field_name ] ['name'];	
	}	
	
	private function directory_maintainer()
	{
		$no_of_folders 	= $this->folder_counter();
		

		if ( $no_of_folders == 0 ) 
		{
			$this->create_dir("0");
			$no_of_files	= $this->file_counter($no_of_folders);
		}
		
		else
		{
			$no_of_files	= $this->file_counter($no_of_folders-1);

			if ( $no_of_files >= $this->no_of_files_on_folder )
			{
				$this->create_dir( $no_of_folders );
			}
			else
			{
				$no_of_folders--;
			}		
		}
		
		return $no_of_folders;
		
	}	
	
	
	private function file_counter( $folder_name) 
	{
		$file_count = count( scandir( $this->default_path.$folder_name ) ) - 2 ;
		return $file_count;
	}
	
	private function folder_counter() 
	{
		$folder_count	= count( glob( $this->default_path."*",GLOB_ONLYDIR) );
		return $folder_count;
	}
	
	private function create_dir($folder_name)
	{
		mkdir($this->default_path.$folder_name);
		chmod($this->default_path.$folder_name,0777);
		return $folder_name; 
	}
}
