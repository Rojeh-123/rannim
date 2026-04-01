<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rannim extends CI_Controller {
//[Settings section] --------------------------------------------------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Rannim_model');
	}

	private function set_upload_options($path_folder)
	{
		$config = array();
		$config['upload_path'] = './assets/uploads/' . $path_folder;
		$config['allowed_types'] = 'jpg|jpeg|gif|png|webp|svg';
		$config['max_size']      = '0';
		$config['overwrite']     = False;

		return $config;
	}

	private function set_sound_upload_options($path_folder)
	{
		$config = array();
		$config['upload_path'] = './assets/uploads/' . $path_folder;
		$config['allowed_types'] = 'mp3|wav|ogg|m4a|aac|flac|wma|alac|aiff|ape|opus|mka|mp4a|wv|tta|shn|dff|dsf|pcm|bwf|mp2|ra|ac3|ec3|amr|mid|midi|mod|xm|it|s3m|flp|als|aup|sf2|nki|rx2|weba|oma|omg|vox';
		$config['max_size']      = '0';
		$config['overwrite']     = False;

		return $config;
	}

//[Log In / Session section] ----------------------------------------------------------------------------------------------------

	public function log_admin_in()
	{

		if($this->Rannim_model->log_admin_in()){
			if($this->session->userdata("account_status") != 1){
				$msg = 3;
				redirect('Rannim/log_admin_in_view/' . $msg);
			}else{
				redirect('Rannim/show_all_admins');
			}
		}else{
			$msg = 1;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function log_admin_in_view($msg = null)
	{
		$data["msg"] = $msg;
		$this->load->view('log_admin_in_view', $data);
	}

	public function verify_session()
	{
        if($this->session->userdata('admin_id') == true && $this->session->userdata('email') == true)
        {
            return true;
        }else{
            return false;
        }
    }

// [Show all section]------------------------------------------------------------------------------------------------------------

	public function show_all_admins()
	{
		if($this->verify_session()){
			$data['admins'] = $this->Rannim_model->get_all_admins();
			$data["title"] = "Rannim | All Admins";
			$this->load->view('side_bar_view', $data);
			$this->load->view('all_admins_view');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function show_all_users()
	{
		if($this->verify_session()){
			$data['users'] = $this->Rannim_model->get_all_users();
			$data['title'] = "Rannim | All Users";
			$this->load->view('side_bar_view', $data);
			$this->load->view('all_users_view');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function show_all_countries()
	{
		if($this->verify_session()){
			$data['countries'] = $this->Rannim_model->get_all_countries();
			$data['title'] = "Rannim | All Countries";
			$this->load->view('side_bar_view', $data);
			$this->load->view('all_countries_view');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function show_all_songs()
	{
		if($this->verify_session()){
			$data['songs'] = $this->Rannim_model->get_all_songs();
			$data['artists'] = $this->Rannim_model->get_all_artists();
			$data['types'] = $this->Rannim_model->get_all_types();
			$data['title'] = "Rannim | All Songs";
			$this->load->view('side_bar_view', $data);
			$this->load->view('all_songs_view');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function show_all_podcasts()
	{
		if($this->verify_session()){
			$data['podcasts'] = $this->Rannim_model->get_all_podcasts();
			$data['hosts'] = $this->Rannim_model->get_all_artists();
			$data['types'] = $this->Rannim_model->get_all_types();
			$data['title'] = "Rannim | All Podcasts";
			$this->load->view('side_bar_view', $data);
			$this->load->view('all_podcasts_view');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function show_all_playlists()
	{
		if($this->verify_session()){
			$data['playlists'] = $this->Rannim_model->get_all_playlists();
			$data['podcasts_playlists'] = $this->Rannim_model->get_all_podcasts_playlists();
			$data['title'] = "Rannim | All Playlists";
			$this->load->view('side_bar_view', $data);
			$this->load->view('all_playlists_view');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function show_all_artists()
	{
		if($this->verify_session()){
			$data['artists'] = $this->Rannim_model->get_all_artists();
			$data['bands'] = $this->Rannim_model->get_all_bands();
			$data['countries'] = $this->Rannim_model->get_all_countries();
			$data['title'] = "Rannim | All Artists";
			$this->load->view('side_bar_view', $data);
			$this->load->view('all_artists_view');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function show_all_bands()
	{
		if($this->verify_session()){
			$data['bands'] = $this->Rannim_model->get_all_bands();
			$data['title'] = "Rannim | All Bands";
			$this->load->view('side_bar_view', $data);
			$this->load->view('all_bands_view');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}
	
	public function show_all_types()
	{
		if($this->verify_session()){
			$data['types'] = $this->Rannim_model->get_all_types();
			$data['title'] = "Rannim | All Types";
			$this->load->view('side_bar_view', $data);
			$this->load->view('all_types_view');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}
	
	public function show_all_categories()
	{
		if($this->verify_session()){
			$data['categories'] = $this->Rannim_model->get_all_categories();
			$data['types'] = $this->Rannim_model->get_all_types();
			$data['title'] = "Rannim | All Categories";
			$this->load->view('side_bar_view', $data);
			$this->load->view('all_categories_view');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function show_all_albums()
	{
		if($this->verify_session()){
			$data['albums'] = $this->Rannim_model->get_all_albums();
			$data['artists'] = $this->Rannim_model->get_all_artists();
			$data['categories'] = $this->Rannim_model->get_all_categories();
			$data['title'] = "Rannim | All Albums";
			$this->load->view('side_bar_view', $data);
			$this->load->view('all_albums_view');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function show_all_lyrics()
	{
		if($this->verify_session()){
			$data['lyrics'] = $this->Rannim_model->get_all_lyrics();
			$data['songs'] = $this->Rannim_model->get_no_lyrics_songs();
			$data['title'] = "Rannim | All Lyrics";
			$this->load->view('side_bar_view', $data);
			$this->load->view('all_lyrics_view');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

// [Show one section]------------------------------------------------------------------------------------------------------------

	public function show_one_user($user_id)
	{
		if($this->verify_session()){
			$data['user'] = $this->Rannim_model->get_one_user($user_id);
			$data["title"] = "Rannim | " . $data['user']->full_name . " User Profile";
			$this->load->view('side_bar_view', $data);
			$this->load->view('one_user_view');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function show_one_type($type_id)
	{
		if($this->verify_session()){
			$data['categories'] = $this->Rannim_model->get_categories_by_type($type_id);
			$data['types'] = $this->Rannim_model->get_all_types();
			$type = $this->Rannim_model->get_one_type($type_id);
			$data['title'] = "Rannim | " . $type->type_name;
			$this->load->view('side_bar_view', $data);
			$this->load->view('all_categories_view');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function show_one_album($album_id)
	{
		if($this->verify_session()){
			$data['album'] = $this->Rannim_model->get_one_album($album_id);
			$data['songs'] = $this->Rannim_model->get_all_songs();
			$data['album_songs'] = $this->Rannim_model->get_songs_by_album($album_id);
			$data['number_of_songs'] = $this->Rannim_model->get_number_of_songs_albums($album_id);
			$data['title'] = "Rannim | " . $data['album']->album_name;
			$this->load->view('side_bar_view', $data);
			$this->load->view('one_album_view');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function show_one_song($song_id)
	{
		if($this->verify_session()){
			$data['lyrics'] = $this->Rannim_model->get_lyrics_by_song($song_id);
			$data['song'] = $this->Rannim_model->get_one_song($song_id);
			$data['title'] = "Rannim | " . $data['song']->title;
			$this->load->view('side_bar_view', $data);
			$this->load->view('one_song_view');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function show_one_podcast($podcast_id)
	{
		if($this->verify_session()){
			$data['podcast'] = $this->Rannim_model->get_one_podcast($podcast_id);
			$data['title'] = "Rannim | " . $data['podcast']->title;
			$this->load->view('side_bar_view', $data);
			$this->load->view('one_podcast_view');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function show_one_category($category_id)
	{
		if($this->verify_session()){
			$data['category'] = $this->Rannim_model->get_one_category($category_id);
			$data['songs'] = $this->Rannim_model->get_songs_by_category($category_id);
			$data['podcasts'] = $this->Rannim_model->get_podcasts_by_category($category_id);
			$data['artists'] = $this->Rannim_model->get_all_artists();
			$category = $this->Rannim_model->get_one_category($category_id);
			$data['title'] = "Rannim | " . $category->category_name;
			$this->load->view('side_bar_view', $data);
			$this->load->view('one_category_view');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function show_one_playlist($playlist_id)
	{
		if($this->verify_session()){
			$data['playlist'] = $this->Rannim_model->get_one_playlist($playlist_id);
			$data['songs'] = $this->Rannim_model->get_all_songs();
			$data['playlist_songs'] = $this->Rannim_model->get_songs_by_playlist($playlist_id);
			$data['number_of_songs'] = $this->Rannim_model->get_number_of_songs($playlist_id);
			$data['title'] = "Rannim | " . $data['playlist']->playlist_name;
			$this->load->view('side_bar_view', $data);
			$this->load->view('one_playlist_view');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function show_one_podcast_playlist($playlist_id)
	{
		if($this->verify_session()){
			$data['playlist'] = $this->Rannim_model->get_one_playlist($playlist_id);
			$data['podcasts'] = $this->Rannim_model->get_all_podcasts();
			$data['playlist_podcasts'] = $this->Rannim_model->get_podcasts_by_playlist($playlist_id);
			$data['number_of_podcasts'] = $this->Rannim_model->get_number_of_playlist_podcasts($playlist_id);
			$data['title'] = "Rannim | " . $data['playlist']->playlist_name;
			$this->load->view('side_bar_view', $data);
			$this->load->view('one_podcast_playlist_view');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function show_one_artist($artist_id)
	{
		if($this->verify_session()){
			$data['artist'] = $this->Rannim_model->get_one_artist($artist_id);
			$data['songs'] = $this->Rannim_model->get_songs_by_artist($artist_id);
			$data['title'] = "Rannim | " . $data['artist']->artist_name;
			$this->load->view("side_bar_view", $data);
			$this->load->view("one_artist_view");
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function show_one_band($band_id)
	{
		if($this->verify_session()){
			$data['band'] = $this->Rannim_model->get_one_band($band_id);
			$data['artists'] = $this->Rannim_model->get_artists_by_band($band_id);
			$data['title'] = "Rannim | " . $data['band']->band_name;
			$this->load->view("side_bar_view", $data);
			$this->load->view("one_band_view");
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

// [Add section]-----------------------------------------------------------------------------------------------------------------

	public function add_admin()
	{
		if($this->verify_session()){
				date_default_timezone_set('Africa/Cairo');
				$created_at = date('Y:m:d H:i:s', time());

				$authentication_code = sha1(uniqid(rand(), true));

				$data = array(
					"full_name" 			=>	$this->input->post('full_name'),
					"username" 				=>	$this->input->post('username'),
					"email" 				=>	$this->input->post('email'),
					"password_hash" 		=>	sha1($this->input->post('password')),
					"mobile" 				=>	$this->input->post('mobile'),
					"authentication_code" 	=>	$authentication_code,
					"admin_rank" 			=>	$this->input->post('admin_rank'),
					"created_at" 			=>	$created_at
				);

				$this->db->insert("admin", $data);

				redirect('Rannim/show_all_admins');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function add_country()
	{
		if($this->verify_session()){
			if ($_FILES['country_flag']['name'] != '') {
				$path_folder = 'countries_flags';
				$this->load->library('upload');
				$this->upload->initialize($this->set_upload_options($path_folder));
				if (!$this->upload->do_upload('country_flag')) {
					$country_flag = $this->upload->display_errors();
				} else {
					$data = array('upload_data' => $this->upload->data());
					$country_flag = $data['upload_data']['file_name'];
				}
			} else {
				$country_flag = "No file selected!";
			}

			$data = array(
				"country_name" 			=>	$this->input->post('country_name'),
				"country_flag" 				=>	$country_flag,
			);

			$this->db->insert("countries", $data);

			redirect('Rannim/show_all_countries');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function add_podcast()
	{
		if($this->verify_session()){
			if ($_FILES['podcast_thumbnail']['name'] != '') {
				$path_folder = 'podcasts_photos';
				$this->load->library('upload');
				$this->upload->initialize($this->set_upload_options($path_folder));
				if (!$this->upload->do_upload('podcast_thumbnail')) {
					$podcast_thumbnail = $this->upload->display_errors();
				} else {
					$data = array('upload_data' => $this->upload->data());
					$podcast_thumbnail = $data['upload_data']['file_name'];
				}
			} else {
				$podcast_thumbnail = "No file selected!";
			}

			
			if ($_FILES['podcast_file']['name'] != '') {
				$path_folder = 'podcasts_files';
				$this->load->library('upload');
				$this->upload->initialize($this->set_sound_upload_options($path_folder));
				if (!$this->upload->do_upload('podcast_file')) {
					$podcast_file = $this->upload->display_errors();
				} else {
					$data = array('upload_data' => $this->upload->data());
					$podcast_file = $data['upload_data']['file_name'];
				}
			} else {
				$podcast_file = "No file selected!";
			}
	
			date_default_timezone_set('Africa/Cairo');
			$created_at = date('Y:m:d H:i:s', time());

			$data = array(
				"host_id" 	  		=>  $this->input->post('host'),
				"type_id"   		=>  $this->input->post('type'),
				"category_id" 	  	=>  $this->input->post('category'),
				"title" 			=>  $this->input->post('title'),
				"description" 	 	=>  $this->input->post('description'),
				"podcast_thumbnail" =>  $podcast_thumbnail,
				"podcast_file"   	=>  $podcast_file,
				"created_at"  		=>  $created_at
			);

			$this->db->insert("podcasts", $data);

			$podcast_id = $this->db->insert_id();

			$share_link = base_url("Rannim/view/" . $podcast_id);

			$this->db->where('podcast_id', $podcast_id);
			$this->db->update('podcasts', ['share_link' => $share_link]);

			redirect('Rannim/show_all_podcasts');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function add_artist()
	{
		if($this->verify_session()){
			if ($_FILES['artist_photo']['name'] != '') {
				$path_folder = 'artists_photos';
				$this->load->library('upload');
				$this->upload->initialize($this->set_upload_options($path_folder));
				if (!$this->upload->do_upload('artist_photo')) {
					$artist_photo = $this->upload->display_errors();
				} else {
					$data = array('upload_data' => $this->upload->data());
					$artist_photo = $data['upload_data']['file_name'];
				}
			} else {
				$artist_photo = "No file selected!";
			}

			date_default_timezone_set('Africa/Cairo');
			$created_at = date('Y:m:d H:i:s', time());

			$data = array(
				"artist_name" 		=>  $this->input->post('artist_name'),
				"artist_bio" 		=>  $this->input->post('artist_bio'),
				"band_id" 			=>  $this->input->post('artist_band'),
				"country_id" 		=>  $this->input->post('artist_country'),
				"artist_photo" 		=>  $artist_photo,
				"created_at" 		=>  $created_at
			);

			$this->db->insert("artist", $data);

			redirect('Rannim/show_all_artists');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function add_band()
	{
		if($this->verify_session()){
			if ($_FILES['band_photo']['name'] != '') {
				$path_folder = 'bands_photos';
				$this->load->library('upload');
				$this->upload->initialize($this->set_upload_options($path_folder));
				if (!$this->upload->do_upload('band_photo')) {
					$band_photo = $this->upload->display_errors();
				} else {
					$data = array('upload_data' => $this->upload->data());
					$band_photo = $data['upload_data']['file_name'];
				}
			} else {
				$band_photo = "No file selected!";
			}

			date_default_timezone_set('Africa/Cairo');
			$created_at = date('Y:m:d H:i:s', time());

			$data = array(
				"band_name" 		=>  $this->input->post('band_name'),
				"band_bio" 	  		=>  $this->input->post('band_bio'),
				"band_photo" 	  	=>  $band_photo,
				"created_at" 	  	=>  $created_at
			);

			$this->db->insert("band", $data);

			redirect('Rannim/show_all_bands');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function add_type()
	{
		if($this->verify_session()){
			if ($_FILES['type_photo']['name'] != '') {
				$path_folder = 'types_photos';
				$this->load->library('upload');
				$this->upload->initialize($this->set_upload_options($path_folder));
				if (!$this->upload->do_upload('type_photo')) {
					$type_photo = $this->upload->display_errors();
				} else {
					$data = array('upload_data' => $this->upload->data());
					$type_photo = $data['upload_data']['file_name'];
				}
			} else {
				$type_photo = "No file selected!";
			}

			$data = array(
				"type_name" 		=>  $this->input->post('type_name'),
				"type_photo" 	  	=>  $type_photo
			);

			$this->db->insert("type", $data);

			redirect('Rannim/show_all_types');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function add_category()
	{
		if($this->verify_session()){
			if ($_FILES['category_photo']['name'] != '') {
				$path_folder = 'categories_photos';
				$this->load->library('upload');
				$this->upload->initialize($this->set_upload_options($path_folder));
				if (!$this->upload->do_upload('category_photo')) {
					$category_photo = $this->upload->display_errors();
				} else {
					$data = array('upload_data' => $this->upload->data());
					$category_photo = $data['upload_data']['file_name'];
				}
			} else {
				$category_photo = "No file selected!";
			}

			$data = array(
				"category_name" 	=>  $this->input->post('category_name'),
				"type_id" 			=>  $this->input->post('type_id'),
				"category_photo" 	=>  $category_photo
			);

			$this->db->insert("category", $data);

			redirect('Rannim/show_all_categories');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function add_album()
	{
		if($this->verify_session()){
			if ($_FILES['album_photo']['name'] != '') {
				$path_folder = 'albums_photos';
				$this->load->library('upload');
				$this->upload->initialize($this->set_upload_options($path_folder));
				if (!$this->upload->do_upload('album_photo')) {
					$album_photo = $this->upload->display_errors();
				} else {
					$data = array('upload_data' => $this->upload->data());
					$album_photo = $data['upload_data']['file_name'];
				}
			} else {
				$album_photo = "No file selected!";
			}

			date_default_timezone_set('Africa/Cairo');
			$created_at = date('Y:m:d H:i:s', time());

			$data = array(
				"genre_id" 		=>	$this->input->post('category'),
				"artist_id" 	=>	$this->input->post('artist'),
				"release_date" 	=>	$this->input->post('release_date'),
				"album_name" 	=>	$this->input->post('album_name'),
				"album_photo" 	=>	$album_photo,
				"created_at" 	=>	$created_at
			);

			$this->db->insert("albums", $data);
			redirect('Rannim/show_all_albums');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function add_song_to_album()
	{
		if($this->verify_session()){
			date_default_timezone_set('Africa/Cairo');
			$created_at = date('Y:m:d H:i:s', time());
			$album_id = $this->input->post('album_id');
			$data = array(
				"album_id" 	=>	$album_id,
				"song_id" 		=>	$this->input->post('song'),
				"added_at" 		=>	$created_at
			);
			$this->db->insert("album_songs", $data);
			redirect("Rannim/show_one_album/$album_id");
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function add_lyric()
	{
		if($this->verify_session()){
			$data = array(
				"song_id" 		=>	$this->input->post('song'),
				"lyric_line" 	=>	$this->input->post('lyric_line')
			);

			$this->db->insert("lyrics_timestamps", $data);
			redirect('Rannim/show_all_lyrics');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function add_song_in_category()
	{
		if($this->verify_session()){
			if ($_FILES['song_photo']['name'] != '') {
				$path_folder = 'songs_photos';
				$this->load->library('upload');
				$this->upload->initialize($this->set_upload_options($path_folder));
				if (!$this->upload->do_upload('song_photo')) {
					$song_photo = $this->upload->display_errors();
				} else {
					$data = array('upload_data' => $this->upload->data());
					$song_photo = $data['upload_data']['file_name'];
				}
			} else {
				$song_photo = "No file selected!";
			}

			
			if ($_FILES['song_file']['name'] != '') {
				$path_folder = 'songs_sounds';
				$this->load->library('upload');
				$this->upload->initialize($this->set_sound_upload_options($path_folder));
				if (!$this->upload->do_upload('song_file')) {
					$song_file = $this->upload->display_errors();
				} else {
					$data = array('upload_data' => $this->upload->data());
					$song_file = $data['upload_data']['file_name'];
				}
			} else {
				$song_file = "No file selected!";
			}
	
			date_default_timezone_set('Africa/Cairo');
			$created_at = date('Y:m:d H:i:s', time());

			$category_id = $this->input->post('category');
			$data = array(
				"title" 	  =>  $this->input->post('title'),
				"artist_id"   =>  $this->input->post('artist'),
				"album_id" 	  =>  $this->input->post('album'),
				"category_id" =>  $category_id,
				"type_id" 	  =>  $this->input->post('type'),
				"song_photo"  =>  $song_photo,
				"song_file"   =>  $song_file,
				"created_at"  =>  $created_at
			);

			$this->db->insert("songs", $data);

			redirect("Rannim/show_one_category/$category_id");
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function add_song()
	{
		if($this->verify_session()){
			if ($_FILES['song_photo']['name'] != '') {
				$path_folder = 'songs_photos';
				$this->load->library('upload');
				$this->upload->initialize($this->set_upload_options($path_folder));
				if (!$this->upload->do_upload('song_photo')) {
					$song_photo = $this->upload->display_errors();
				} else {
					$data = array('upload_data' => $this->upload->data());
					$song_photo = $data['upload_data']['file_name'];
				}
			} else {
				$song_photo = "No file selected!";
			}

			
			if ($_FILES['song_file']['name'] != '') {
				$path_folder = 'songs_sounds';
				$this->load->library('upload');
				$this->upload->initialize($this->set_sound_upload_options($path_folder));
				if (!$this->upload->do_upload('song_file')) {
					$song_file = $this->upload->display_errors();
				} else {
					$data = array('upload_data' => $this->upload->data());
					$song_file = $data['upload_data']['file_name'];
				}
			} else {
				$song_file = "No file selected!";
			}
	
			date_default_timezone_set('Africa/Cairo');
			$created_at = date('Y:m:d H:i:s', time());

			$data = array(
				"title" 	  =>  $this->input->post('title'),
				"artist_id"   =>  $this->input->post('artist'),
				"category_id" =>  $this->input->post('category'),
				"type_id" 	  =>  $this->input->post('type'),
				"song_photo"  =>  $song_photo,
				"song_file"   =>  $song_file,
				"created_at"  =>  $created_at
			);

			$this->db->insert("songs", $data);

			redirect('Rannim/show_all_songs');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

// [Delete / Disable section]----------------------------------------------------------------------------------------------------
	
	public function disable_admin($admin_id)
	{
		if($this->verify_session()){
			$this->db->where("admin_id", $admin_id);
			$this->db->update("admin", array("account_status" => 0));

			redirect("Rannim/show_all_admins");
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function delete_user($user_id, $user_photo)
	{
		if($this->verify_session()){
			$this->db->where("user_id", $user_id);
			$this->db->delete("users");

			$user_photo_path = './assets/uploads/users_photos/' . $user_photo;

			if (file_exists($user_photo_path)) {
				if (unlink($user_photo_path)) {
					$this->session->set_flashdata('success', 'Image deleted successfully.');
				} else {
					$this->session->set_flashdata('error', 'Failed to delete the image.');
				}
			} else {
				$this->session->set_flashdata('error', 'Image does not exist.');
			}
			redirect('Rannim/show_all_users');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function delete_country($country_id, $country_flag)
	{
		if($this->verify_session()){
			$this->db->where("country_id", $country_id);
			$this->db->delete("countries");

			$country_flag_path = './assets/uploads/countries_flags/' . $country_flag;

			if (file_exists($country_flag_path)) {
				if (unlink($country_flag_path)) {
					$this->session->set_flashdata('success', 'Image deleted successfully.');
				} else {
					$this->session->set_flashdata('error', 'Failed to delete the image.');
				}
			} else {
				$this->session->set_flashdata('error', 'Image does not exist.');
			}
			redirect('Rannim/show_all_countries');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function delete_song($song_id, $song_photo = null)
	{
		if($this->verify_session()){
			$Song = $this->Rannim_model->get_one_song_delete($song_id);
			$song_file = $Song->song_file;

			$this->db->where("song_id", $song_id);
			$this->db->delete("songs");

			$song_photo_path = './assets/uploads/songs_photos/' . $song_photo;

			if (file_exists($song_photo_path)) {
				if (unlink($song_photo_path)) {
					$this->session->set_flashdata('success', 'Image deleted successfully.');
				} else {
					$this->session->set_flashdata('error', 'Failed to delete the image.');
				}
			} else {
				$this->session->set_flashdata('error', 'Image does not exist.');
			}

			$song_file_path = './assets/uploads/songs_sounds/' . $song_file;

			if (file_exists($song_file_path)) {
				if (unlink($song_file_path)) {
					$this->session->set_flashdata('success', 'File deleted successfully.');
				} else {
					$this->session->set_flashdata('error', 'Failed to delete the file.');
				}
			} else {
				$this->session->set_flashdata('error', 'File does not exist.');
			}

			redirect('Rannim/show_all_songs');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function delete_podcast($podcast_id, $podcast_thumbnail)
	{
		if($this->verify_session()){
			$podcast = $this->Rannim_model->get_one_podcast_delete($podcast_id);

			$this->db->where("podcast_id", $podcast_id);
			$this->db->delete("podcasts");

			$podcast_thumbnail_path = './assets/uploads/podcasts_photos/' . $podcast->podcast_thumbnail;

			if (file_exists($podcast_thumbnail_path)) {
				if (unlink($podcast_thumbnail_path)) {
					$this->session->set_flashdata('success', 'Image deleted successfully.');
				} else {
					$this->session->set_flashdata('error', 'Failed to delete the image.');
				}
			} else {
				$this->session->set_flashdata('error', 'Image does not exist.');
			}

			$podcast_file_path = './assets/uploads/podcasts_files/' . $podcast->podcast_file;

			if (file_exists($podcast_file_path)) {
				if (unlink($podcast_file_path)) {
					$this->session->set_flashdata('success', 'File deleted successfully.');
				} else {
					$this->session->set_flashdata('error', 'Failed to delete the file.');
				}
			} else {
				$this->session->set_flashdata('error', 'File does not exist.');
			}

			redirect('Rannim/show_all_podcasts');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function delete_artist($artist_id, $artist_photo)
	{
		if($this->verify_session()){
			$this->db->where("artist_id", $artist_id);
			$this->db->delete("artist");

			$artist_photo_path = './assets/uploads/artists_photos/' . $artist_photo;

			if (file_exists($artist_photo_path)) {
				if (unlink($artist_photo_path)) {
					$this->session->set_flashdata('success', 'Image deleted successfully.');
				} else {
					$this->session->set_flashdata('error', 'Failed to delete the image.');
				}
			} else {
				$this->session->set_flashdata('error', 'Image does not exist.');
			}
			redirect('Rannim/show_all_artists');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function delete_band($band_id, $band_photo)
	{
		if($this->verify_session()){
			$this->db->where("band_id", $band_id);
			$this->db->delete("band");

			$band_photo_path = './assets/uploads/bands_photos/' . $band_photo;

			if (file_exists($band_photo_path)) {
				if (unlink($band_photo_path)) {
					$this->session->set_flashdata('success', 'Image deleted successfully.');
				} else {
					$this->session->set_flashdata('error', 'Failed to delete the image.');
				}
			} else {
				$this->session->set_flashdata('error', 'Image does not exist.');
			}
			redirect('Rannim/show_all_bands');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function delete_type($type_id, $type_photo)
	{
		if($this->verify_session()){
			$this->db->where("type_id", $type_id);
			$this->db->delete("type");

			$type_photo_path = './assets/uploads/types_photos/' . $type_photo;

			if (file_exists($type_photo_path)) {
				if (unlink($type_photo_path)) {
					$this->session->set_flashdata('success', 'Image deleted successfully.');
				} else {
					$this->session->set_flashdata('error', 'Failed to delete the image.');
				}
			} else {
				$this->session->set_flashdata('error', 'Image does not exist.');
			}
			redirect('Rannim/show_all_types');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function delete_category($category_id, $category_photo)
	{
		if($this->verify_session()){
			$this->db->where("category_id", $category_id);
			$this->db->delete("category");

			$category_photo_path = './assets/uploads/categories_photos/' . $category_photo;

			if (file_exists($category_photo_path)) {
				if (unlink($category_photo_path)) {
					$this->session->set_flashdata('success', 'Image deleted successfully.');
				} else {
					$this->session->set_flashdata('error', 'Failed to delete the image.');
				}
			} else {
				$this->session->set_flashdata('error', 'Image does not exist.');
			}
			redirect('Rannim/show_all_categories');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function delete_album($album_id, $album_photo)
	{
		if($this->verify_session()){
			$this->db->where("album_id", $album_id);
			$this->db->delete("albums");

			$album_photo_path = './assets/uploads/albums_photos/' . $album_photo;

			if (file_exists($album_photo_path)) {
				if (unlink($album_photo_path)) {
					$this->session->set_flashdata('success', 'Image deleted successfully.');
				} else {
					$this->session->set_flashdata('error', 'Failed to delete the image.');
				}
			} else {
				$this->session->set_flashdata('error', 'Image does not exist.');
			}

			redirect("Rannim/show_all_albums");
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function delete_song_from_album($song_id, $album_id)
	{
		if($this->verify_session()){
			$this->db->where("song_id", $song_id);
			$this->db->delete("album_songs");
			redirect("Rannim/show_one_album/$album_id");
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function delete_lyric($lyric_id)
	{
		if($this->verify_session()){
			$this->db->where("lyric_id", $lyric_id);
			$this->db->delete("lyrics_timestamps");
			redirect("Rannim/show_all_lyrics");
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function delete_song_for_category($song_id, $song_photo)
	{
		if($this->verify_session()){
			$Song = $this->Rannim_model->get_one_song_delete($song_id);
			$song_file = $Song->song_file;

			$this->db->where("song_id", $song_id);
			$this->db->delete("songs");

			$song_photo_path = './assets/uploads/songs_photos/' . $song_photo;

			if (file_exists($song_photo_path)) {
				if (unlink($song_photo_path)) {
					$this->session->set_flashdata('success', 'Image deleted successfully.');
				} else {
					$this->session->set_flashdata('error', 'Failed to delete the image.');
				}
			} else {
				$this->session->set_flashdata('error', 'Image does not exist.');
			}

			$song_file_path = './assets/uploads/songs_sounds/' . $song_file;

			if (file_exists($song_file_path)) {
				if (unlink($song_file_path)) {
					$this->session->set_flashdata('success', 'File deleted successfully.');
				} else {
					$this->session->set_flashdata('error', 'Failed to delete the file.');
				}
			} else {
				$this->session->set_flashdata('error', 'File does not exist.');
			}

			redirect('Rannim/show_one_category/' . $Song->category_id);
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function delete_artist_from_band($artist_id, $band_id)
	{
		if($this->verify_session()){
			$data["band_id"] = null;
			$this->db->where("artist_id", $artist_id);
			$this->db->where("band_id", $band_id);
			$this->db->update("artist", $data);
			redirect("Rannim/show_one_band/$band_id");
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function delete_playlist($playlist_id, $playlist_photo)
	{
		$this->db->where("playlist_id", $playlist_id);
		$this->db->delete("playlists");

		$this->db->where("playlist_id", $playlist_id);
		$this->db->delete("playlist_songs");

		$this->db->where("playlist_id", $playlist_id);
		$this->db->delete("playlist_podcasts");

		$playlist_photo_path = './assets/uploads/playlists_photos/' . $playlist_photo;

		if (file_exists($playlist_photo_path)) {
			if (unlink($playlist_photo_path)) {
				$this->session->set_flashdata('success', 'Image deleted successfully.');
			} else {
				$this->session->set_flashdata('error', 'Failed to delete the image.');
			}
		} else {
			$this->session->set_flashdata('error', 'Image does not exist.');
		}

		redirect("Rannim/show_all_playlists");
	}

// [Edit section]----------------------------------------------------------------------------------------------------------------

	public function edit_admin($admin_id)
	{
		if($this->verify_session()){
			$data['admin'] = $this->Rannim_model->get_one_admin($admin_id);
			$data['title'] = "Rannim | Edit Admin";
			$this->load->view('side_bar_view', $data);
			$this->load->view('edit_admin_view');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function edit_country($country_id)
	{
		header("Content-Type: application/json");
		$data['country'] = $this->Rannim_model->get_one_country($country_id);
		echo json_encode($data);
	}

	public function edit_song($song_id)
	{
		if($this->verify_session()){
			$data['artists'] = $this->Rannim_model->get_all_artists();
			$data['types'] = $this->Rannim_model->get_all_types();
			$data['song'] = $this->Rannim_model->get_one_song($song_id);
			$data['title'] = "Rannim | Edit Song";
			$this->load->view('side_bar_view', $data);
			$this->load->view('edit_song_view');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function edit_podcast($podcast_id)
	{
		if($this->verify_session()){
			$data['hosts'] = $this->Rannim_model->get_all_artists();
			$data['types'] = $this->Rannim_model->get_all_types();
			$data['podcast'] = $this->Rannim_model->get_one_podcast($podcast_id);
			$data['title'] = "Rannim | Edit Podcast";
			$this->load->view('side_bar_view', $data);
			$this->load->view('edit_podcast_view');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function edit_artist($artist_id)
	{
		if($this->verify_session()){
			$data['artist'] = $this->Rannim_model->get_one_artist($artist_id);
			$data['bands'] = $this->Rannim_model->get_all_bands();
			$data['countries'] = $this->Rannim_model->get_all_countries();
			$data['title'] = "Rannim | Edit Artist";
			$this->load->view('side_bar_view', $data);
			$this->load->view('edit_artist_view');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function edit_band($band_id)
	{
		if($this->verify_session()){
			$data['band'] = $this->Rannim_model->get_one_band($band_id);
			$data['title'] = "Rannim | Edit Band";
			$this->load->view('side_bar_view', $data);
			$this->load->view('edit_band_view');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function edit_type($type_id)
	{
		header("Content-Type: application/json");
		$data['type'] = $this->Rannim_model->get_one_type($type_id);
		echo json_encode($data);
	}

	public function edit_category($category_id)
	{
		if($this->verify_session()){
			$data['category'] = $this->Rannim_model->get_one_category($category_id);
			$data['types'] = $this->Rannim_model->get_all_types();
			$data['title'] = "Rannim | Edit Category";
			$this->load->view('side_bar_view', $data);
			$this->load->view('edit_category_view');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function edit_album($album_id)
	{
		if($this->verify_session()){
			$data['album'] = $this->Rannim_model->get_one_album($album_id);
			$data['categories'] = $this->Rannim_model->get_all_categories();
			$data['artists'] = $this->Rannim_model->get_all_artists();
			$data['title'] = "Rannim | Edit Album";
			$this->load->view('side_bar_view', $data);
			$this->load->view('edit_album_view');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function edit_lyric($lyric_id)
	{
		header("Content-Type: application/json");
		$data['lyric'] = $this->Rannim_model->get_one_lyric($lyric_id);
		echo json_encode($data);
	}

	public function edit_one_song($song_id)
	{
		if($this->verify_session()){
			$data['artists'] = $this->Rannim_model->get_all_artists();
			$data['song'] = $this->Rannim_model->get_one_song($song_id);
			$data['title'] = "Rannim | Edit Song";
			$this->load->view('side_bar_view', $data);
			$this->load->view('edit_one_song_view');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

// [Update section]--------------------------------------------------------------------------------------------------------------

	public function update_admin()
	{
		if($this->verify_session()){
			date_default_timezone_set('Africa/Cairo');
			$updated_at = date('Y:m:d H:i:s', time());

			$admin_id = $this->input->post("admin_id");
			$password_hash = sha1($this->input->post('password'));
			$confirm_password_hash = sha1($this->input->post('confirm_password'));
			if($password_hash == $confirm_password_hash && $password_hash != $admin->password_hash && $password_hash != "" && $confirm_password_hash != ""){
				$data["password_hash"] = $password_hash;
			}
			$data = array(
				"full_name" 			=>	$this->input->post('full_name'),
				"username" 				=>	$this->input->post('username'),
				"email" 				=>	$this->input->post('email'),
				"mobile" 				=>	$this->input->post('mobile'),
				"admin_rank" 			=>	$this->input->post('admin_rank'),
				"updated_at" 			=>	$updated_at
			);

			$this->db->where("admin_id", $admin_id);
			$this->db->update("admin", $data);

			redirect("Rannim/show_all_admins");
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function update_country()
	{
		if($this->verify_session()){
			$country_id = $this->input->post("country_id");
	
			if ($_FILES['edit_country_flag']['name'] != '') {
				$path_folder = 'countries_flags';
				$this->load->library('upload');
				$this->upload->initialize($this->set_upload_options($path_folder));
				if (!$this->upload->do_upload('edit_country_flag')) {
					$new_country_flag = $this->upload->display_errors();
				} else {
					$data = array('upload_data' => $this->upload->data());
					$new_country_flag = $data['upload_data']['file_name'];
	
					$old = $this->input->post("old_flag");
					$old_flag_path = './assets/uploads/countries_flags/' . $old;
					if (file_exists($old_flag_path)) {
						if (unlink($old_flag_path)) {
							$this->session->set_flashdata('success', 'Image deleted successfully.');
						} else {
							$this->session->set_flashdata('error', 'Failed to delete the image.');
						}
					} else {
						$this->session->set_flashdata('error', 'Image does not exist.');
					}
				}
			}else{
				$country = $this->Rannim_model->get_one_country($country_id);
				$new_country_flag = $country->country_flag;
			}

			$data = array(
				"country_name" 	=>	$this->input->post("country_name")
			);
	
			if (isset($new_country_flag) && !empty($new_country_flag)) {
				$data["country_flag"] = $new_country_flag;
			}
	
			$this->db->where("country_id", $country_id);
			$this->db->update("countries", $data);
	
			redirect("Rannim/show_all_countries");
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function update_band()
	{
		if($this->verify_session()){
			$band_id = $this->input->post("band_id");
			if ($_FILES['band_photo']['name'] != '') {
				$path_folder = 'bands_photos';
				$this->load->library('upload');
				$this->upload->initialize($this->set_upload_options($path_folder));
				if (!$this->upload->do_upload('band_photo')) {
					$band_photo = $this->upload->display_errors();
				} else {
					$data = array('upload_data' => $this->upload->data());
					$band_photo = $data['upload_data']['file_name'];

					$old_band_photo = $this->input->post("old_band_photo");
					$old_band_photo_path = './assets/uploads/bands_photos/' . $old_band_photo;
					if (file_exists($old_band_photo_path)) {
						if (unlink($old_band_photo_path)) {
							$this->session->set_flashdata('success', 'Image deleted successfully.');
						} else {
							$this->session->set_flashdata('error', 'Failed to delete the image.');
						}
					} else {
						$this->session->set_flashdata('error', 'Image does not exist.');
					}
				}
			} else {
				$band_for_photo = $this->Rannim_model->get_one_band($band_id);
				$band_photo = $band_for_photo->band_photo;
			}

			date_default_timezone_set('Africa/Cairo');
			$updated_at = date('Y:m:d H:i:s', time());

			$data = array(
				"band_name" 		=>  $this->input->post('band_name'),
				"band_bio" 	  		=>  $this->input->post('band_bio'),
				"band_photo" 	  	=>  $band_photo,
				"updated_at" 	  	=>  $updated_at
			);

			$this->db->where("band_id", $band_id);
			$this->db->update("band", $data);

			redirect('Rannim/show_all_bands');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function update_type()
	{
		if($this->verify_session()){
			$type_id = $this->input->post("type_id");
	
			if ($_FILES['edit_type_photo']['name'] != '') {
				$path_folder = 'types_photos';
				$this->load->library('upload');
				$this->upload->initialize($this->set_upload_options($path_folder));
				if (!$this->upload->do_upload('edit_type_photo')) {
					$new_type_photo = $this->upload->display_errors();
				} else {
					$data = array('upload_data' => $this->upload->data());
					$new_type_photo = $data['upload_data']['file_name'];

					$old = $this->input->post("old_type_photo");
					$old_photo_path = './assets/uploads/types_photos/' . $old;
					if (file_exists($old_photo_path)) {
						if (unlink($old_photo_path)) {
							$this->session->set_flashdata('success', 'Image deleted successfully.');
						} else {
							$this->session->set_flashdata('error', 'Failed to delete the image.');
						}
					} else {
						$this->session->set_flashdata('error', 'Image does not exist.');
					}
				}
			}else{
				$type = $this->Rannim_model->get_one_type($type_id);
				$new_type_photo = $type->type_photo;
			}

			$data = array(
				"type_name" 	=>	$this->input->post("type_name")
			);
	
			if (isset($new_type_photo) && !empty($new_type_photo)) {
				$data["type_photo"] = $new_type_photo;
			}
	
			$this->db->where("type_id", $type_id);
			$this->db->update("type", $data);
	
			redirect("Rannim/show_all_types");
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function update_artist()
	{
		if($this->verify_session()){
			$artist_id = $this->input->post("artist_id");
			if ($_FILES['artist_photo']['name'] != '') {
				$path_folder = 'artists_photos';
				$this->load->library('upload');
				$this->upload->initialize($this->set_upload_options($path_folder));
				if (!$this->upload->do_upload('artist_photo')) {
					$artist_photo = $this->upload->display_errors();
				} else {
					$data = array('upload_data' => $this->upload->data());
					$artist_photo = $data['upload_data']['file_name'];

					$old_artist_photo = $this->input->post("old_artist_photo");
					$old_artist_photo_path = './assets/uploads/artists_photos/' . $old_artist_photo;
					if (file_exists($old_artist_photo_path)) {
						if (unlink($old_artist_photo_path)) {
							$this->session->set_flashdata('success', 'Image deleted successfully.');
						} else {
							$this->session->set_flashdata('error', 'Failed to delete the image.');
						}
					} else {
						$this->session->set_flashdata('error', 'Image does not exist.');
					}
				}
			} else {
				$artist_for_photo = $this->Rannim_model->get_one_artist($artist_id);
				$artist_photo = $artist_for_photo->artist_photo;
			}

			date_default_timezone_set('Africa/Cairo');
			$updated_at = date('Y:m:d H:i:s', time());

			$data = array(
				"artist_name" 		=>  $this->input->post('artist_name'),
				"artist_bio" 		=>  $this->input->post('artist_bio'),
				"band_id" 			=>  $this->input->post('artist_band'),
				"country_id" 		=>  $this->input->post('artist_country'),
				"artist_photo" 		=>  $artist_photo,
				"updated_at" 		=>  $updated_at
			);

			$this->db->where("artist_id", $artist_id);
			$this->db->update("artist", $data);

			redirect('Rannim/show_all_artists');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function update_category()
	{
		if($this->verify_session()){
			$category_id = $this->input->post("category_id");

			if ($_FILES['edit_category_photo']['name'] != '') {
				$path_folder = 'categories_photos';
				$this->load->library('upload');
				$this->upload->initialize($this->set_upload_options($path_folder));
				if (!$this->upload->do_upload('edit_category_photo')) {
					$new_category_photo = $this->upload->display_errors();
				} else {
					$data = array('upload_data' => $this->upload->data());
					$new_category_photo = $data['upload_data']['file_name'];

					$old = $this->input->post("old_category_photo");
					$old_photo_path = './assets/uploads/categories_photos/' . $old;
					if (file_exists($old_photo_path)) {
						if (unlink($old_photo_path)) {
							$this->session->set_flashdata('success', 'Image deleted successfully.');
						} else {
							$this->session->set_flashdata('error', 'Failed to delete the image.');
						}
					} else {
						$this->session->set_flashdata('error', 'Image does not exist.');
					}
				}
			}else{
				$category = $this->Rannim_model->get_one_category($category_id);
				$new_category_photo = $category->category_photo;
			}

			$data = array(
				"category_name" =>	$this->input->post("category_name"),
				"type_id" 		=>	$this->input->post("type_id")
			);

			if (isset($new_category_photo) && !empty($new_category_photo)) {
				$data["category_photo"] = $new_category_photo;
			}
	
			$this->db->where("category_id", $category_id);
			$this->db->update("category", $data);
	
			redirect("Rannim/show_all_categories");
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function update_lyric()
	{
		if($this->verify_session()){
			$lyric_id = $this->input->post("lyric_id");
			$data = array(
				"lyric_line" 	=>	$this->input->post('edit_lyric_line')
			);

			$this->db->where("lyric_id", $lyric_id);
			$this->db->update("lyrics_timestamps", $data);

			redirect("Rannim/show_all_lyrics");
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function update_album()
	{
		if($this->verify_session()){
			$album_id = $this->input->post("album_id");

			if ($_FILES['album_photo']['name'] != '') {
				$path_folder = 'albums_photos';
				$this->load->library('upload');
				$this->upload->initialize($this->set_upload_options($path_folder));
				if (!$this->upload->do_upload('album_photo')) {
					$new_album_photo = $this->upload->display_errors();
				} else {
					$data = array('upload_data' => $this->upload->data());
					$album_photo = $data['upload_data']['file_name'];

					$old = $this->input->post("album_old_photo");
					$old_photo_path = './assets/uploads/albums_photos/' . $old;
					if (file_exists($old_photo_path)) {
						if (unlink($old_photo_path)) {
							$this->session->set_flashdata('success', 'Image deleted successfully.');
						} else {
							$this->session->set_flashdata('error', 'Failed to delete the image.');
						}
					} else {
						$this->session->set_flashdata('error', 'Image does not exist.');
					}
				}
			}else{
				$album = $this->Rannim_model->get_one_album($album_id);
				$new_album_photo = $album->album_photo;
			}

			date_default_timezone_set('Africa/Cairo');
			$updated_at = date('Y:m:d H:i:s', time());

			$data = array(
				"genre_id" 		=>	$this->input->post('category'),
				"artist_id" 	=>	$this->input->post('artist'),
				"release_date" 	=>	$this->input->post('release_date'),
				"album_name" 	=>	$this->input->post('album_name'),
				"album_photo" 	=>	$album_photo,
				"updated_at" 	=>	$updated_at
			);

			$this->db->where("album_id", $album_id);
			$this->db->update("albums", $data);

			redirect("Rannim/show_all_albums");
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function update_song()
	{
		if($this->verify_session()){
			$song_id = $this->input->post("song_id");

			if ($_FILES['song_photo']['name'] != '') {
				$path_folder = 'songs_photos';
				$this->load->library('upload');
				$this->upload->initialize($this->set_upload_options($path_folder));
				if (!$this->upload->do_upload('song_photo')) {
					$song_photo = $this->upload->display_errors();
				} else {
					$data = array('upload_data' => $this->upload->data());
					$song_photo = $data['upload_data']['file_name'];

					$old_song_photo = $this->input->post("old_song_photo");
					$old_song_photo_path = './assets/uploads/songs_photos/' . $old_song_photo;
					if (file_exists($old_song_photo_path)) {
						if (unlink($old_song_photo_path)) {
							$this->session->set_flashdata('success', 'Image deleted successfully.');
						} else {
							$this->session->set_flashdata('error', 'Failed to delete the image.');
						}
					} else {
						$this->session->set_flashdata('error', 'Image does not exist.');
					}
				}
			} else {
				$song_for_photo = $this->Rannim_model->get_one_song($song_id);
				$song_photo = $song_for_photo->song_photo;
			}

			
			if ($_FILES['song_file']['name'] != '') {
				$path_folder = 'songs_sounds';
				$this->load->library('upload');
				$this->upload->initialize($this->set_sound_upload_options($path_folder));
				if (!$this->upload->do_upload('song_file')) {
					$song_file = $this->upload->display_errors();
				} else {
					$data = array('upload_data' => $this->upload->data());
					$song_file = $data['upload_data']['file_name'];

					$old_song_file = $this->input->post("old_song_file");
					$old_song_file_path = './assets/uploads/songs_sounds/' . $old_song_file;
					if (file_exists($old_song_file_path)) {
						if (unlink($old_song_file_path)) {
							$this->session->set_flashdata('success', 'File deleted successfully.');
						} else {
							$this->session->set_flashdata('error', 'Failed to delete the file.');
						}
					} else {
						$this->session->set_flashdata('error', 'File does not exist.');
					}
				}
			} else {
				$song_for_file = $this->Rannim_model->get_one_song($song_id);
				$song_file = $song_for_file->song_file;
			}
	
			date_default_timezone_set('Africa/Cairo');
			$updated_at = date('Y:m:d H:i:s', time());

			$data = array(
				"title" 	  =>  $this->input->post('title'),
				"artist_id"   =>  $this->input->post('artist'),
				"category_id" =>  $this->input->post('category'),
				"type_id" 	  =>  $this->input->post('type'),
				"song_photo"  =>  $song_photo,
				"song_file"   =>  $song_file,
				"updated_at"  =>  $updated_at
			);

			$this->db->where("song_id", $song_id);
			$this->db->update("songs", $data);

			redirect('Rannim/show_all_songs');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function update_podcast()
	{
		if($this->verify_session()){
			$podcast_id = $this->input->post("podcast_id");

			if ($_FILES['podcast_thumbnail']['name'] != '') {
				$path_folder = 'podcasts_photos';
				$this->load->library('upload');
				$this->upload->initialize($this->set_upload_options($path_folder));
				if (!$this->upload->do_upload('podcast_thumbnail')) {
					$podcast_thumbnail = $this->upload->display_errors();
				} else {
					$data = array('upload_data' => $this->upload->data());
					$podcast_thumbnail = $data['upload_data']['file_name'];

					$old_podcast_thumbnail = $this->input->post("old_podcast_thumbnail");
					$old_podcast_thumbnail_path = './assets/uploads/podcasts_photos/' . $old_podcast_thumbnail;
					if (file_exists($old_podcast_thumbnail_path)) {
						if (unlink($old_podcast_thumbnail_path)) {
							$this->session->set_flashdata('success', 'Image deleted successfully.');
						} else {
							$this->session->set_flashdata('error', 'Failed to delete the image.');
						}
					} else {
						$this->session->set_flashdata('error', 'Image does not exist.');
					}
				}
			} else {
				$podcast_for_photo = $this->Rannim_model->get_one_podcast($podcast_id);
				$podcast_thumbnail = $podcast_for_photo->podcast_thumbnail;
			}

			
			if ($_FILES['podcast_file']['name'] != '') {
				$path_folder = 'podcasts_files';
				$this->load->library('upload');
				$this->upload->initialize($this->set_sound_upload_options($path_folder));
				if (!$this->upload->do_upload('podcast_file')) {
					$podcast_file = $this->upload->display_errors();
				} else {
					$data = array('upload_data' => $this->upload->data());
					$podcast_file = $data['upload_data']['file_name'];

					$old_podcast_file = $this->input->post("old_podcast_file");
					$old_podcast_file_path = './assets/uploads/podcasts_files/' . $old_podcast_file;
					if (file_exists($old_podcast_file_path)) {
						if (unlink($old_podcast_file_path)) {
							$this->session->set_flashdata('success', 'File deleted successfully.');
						} else {
							$this->session->set_flashdata('error', 'Failed to delete the file.');
						}
					} else {
						$this->session->set_flashdata('error', 'File does not exist.');
					}
				}
			} else {
				$podcast_for_file = $this->Rannim_model->get_one_podcast($podcast_id);
				$podcast_file = $podcast_for_file->podcast_file;
			}
	
			date_default_timezone_set('Africa/Cairo');
			$updated_at = date('Y:m:d H:i:s', time());

			$data = array(
				"host_id" 	  		=>  $this->input->post('host'),
				"type_id"   		=>  $this->input->post('type'),
				"category_id" 	  	=>  $this->input->post('category'),
				"title" 			=>  $this->input->post('title'),
				"description" 	 	=>  $this->input->post('description'),
				"podcast_thumbnail" =>  $podcast_thumbnail,
				"podcast_file"   	=>  $podcast_file,
				"updated_at"  		=>  $updated_at
			);

			$this->db->where("podcast_id", $podcast_id);
			$this->db->update("podcasts", $data);

			redirect('Rannim/show_all_podcasts');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function update_one_song()
	{
		if($this->verify_session()){
			$song_id = $this->input->post("song_id");

			if ($_FILES['song_photo']['name'] != '') {
				$path_folder = 'songs_photos';
				$this->load->library('upload');
				$this->upload->initialize($this->set_upload_options($path_folder));
				if (!$this->upload->do_upload('song_photo')) {
					$song_photo = $this->upload->display_errors();
				} else {
					$data = array('upload_data' => $this->upload->data());
					$song_photo = $data['upload_data']['file_name'];

					$old_song_photo = $this->input->post("old_song_photo");
					$old_song_photo_path = './assets/uploads/songs_photos/' . $old_song_photo;
					if (file_exists($old_song_photo_path)) {
						if (unlink($old_song_photo_path)) {
							$this->session->set_flashdata('success', 'Image deleted successfully.');
						} else {
							$this->session->set_flashdata('error', 'Failed to delete the image.');
						}
					} else {
						$this->session->set_flashdata('error', 'Image does not exist.');
					}
				}
			} else {
				$song_for_photo = $this->Rannim_model->get_one_song($song_id);
				$song_photo = $song_for_photo->song_photo;
			}

			
			if ($_FILES['song_file']['name'] != '') {
				$path_folder = 'songs_sounds';
				$this->load->library('upload');
				$this->upload->initialize($this->set_sound_upload_options($path_folder));
				if (!$this->upload->do_upload('song_file')) {
					$song_file = $this->upload->display_errors();
				} else {
					$data = array('upload_data' => $this->upload->data());
					$song_file = $data['upload_data']['file_name'];

					$old_song_file = $this->input->post("old_song_file");
					$old_song_file_path = './assets/uploads/songs_sounds/' . $old_song_file;
					if (file_exists($old_song_file_path)) {
						if (unlink($old_song_file_path)) {
							$this->session->set_flashdata('success', 'File deleted successfully.');
						} else {
							$this->session->set_flashdata('error', 'Failed to delete the file.');
						}
					} else {
						$this->session->set_flashdata('error', 'File does not exist.');
					}
				}
			} else {
				$song_for_file = $this->Rannim_model->get_one_song($song_id);
				$song_file = $song_for_file->song_file;
			}
	
			date_default_timezone_set('Africa/Cairo');
			$updated_at = date('Y:m:d H:i:s', time());
			$category_id = $this->input->post('category');

			$data = array(
				"title" 	  =>  $this->input->post('title'),
				"artist_id"   =>  $this->input->post('artist'),
				"category_id" =>  $category_id,
				"type_id" 	  =>  $this->input->post('type'),
				"song_photo"  =>  $song_photo,
				"song_file"   =>  $song_file,
				"updated_at"  =>  $updated_at
			);

			$this->db->where("song_id", $song_id);
			$this->db->update("songs", $data);

			redirect("Rannim/show_one_category/$category_id");
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

// [Special section]-------------------------------------------------------------------------------------------------------------

	public function search_view()
	{
		if($this->verify_session()){
			$data['title'] = "Rannim | Search";
			$this->load->view('side_bar_view', $data);
			$this->load->view('search_view');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function search()
	{
		$keyword = $this->input->post('query');
		$data['songs_results'] = $this->Rannim_model->songs_search($keyword);
		$data['podcasts_results'] = $this->Rannim_model->podcasts_search($keyword);
		$data['artists_results'] = $this->Rannim_model->artists_search($keyword);
		$this->search_result_view($data);
	}

	public function search_result_view($search = null)
	{
		if($this->verify_session()){
			$data["results"] = $search;
			$data['title'] = "Rannim | Search Result";
			$this->load->view('side_bar_view', $data);
			$this->load->view('search_result_view');
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function show_our_view()
	{
		if($this->verify_session()){
			$data["title"] = "Rannim | Countries";
			$this->load->view("side_bar_view", $data);
			$this->load->view("about_us_view");
		}else{
			$msg = 2;
			redirect('Rannim/log_admin_in_view/' . $msg);
		}
	}

	public function get_categories_by_type($type_id)
	{
		header("Content-Type: application/json");
		$data['categories'] = $this->Rannim_model->get_categories_by_type($type_id);
		echo json_encode($data);
	}
}