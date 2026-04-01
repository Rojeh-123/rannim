<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rannim extends CI_Controller
{
	//[Settings section] ------------------------------------------------------------------------------------------------------------
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Rannim_model');
	}

	private function set_upload_options($path_folder)
	{
		$config = array();
		$config['upload_path'] = './dashboard/assets/uploads/' . $path_folder;
		$config['allowed_types'] = 'jpg|jpeg|gif|png|webp|svg';
		$config['max_size'] = '0';
		$config['overwrite'] = FALSE;

		return $config;
	}

	//[Log In / Session section] ----------------------------------------------------------------------------------------------------

	public function log_user_in_view($msg = null)
	{
		$data["msg"] = $msg;
		$this->load->view('log_user_in_view', $data);
	}

	public function log_user_in()
	{
		if ($this->Rannim_model->log_user_in()) {
			redirect('Rannim');
		} else {
			$msg = 1;
			redirect('Rannim/log_user_in_view/' . $msg);

		}
	}

	public function log_out()
	{
		$this->session->sess_destroy();
		redirect("Rannim/log_user_in_view");
	}

	public function guest_mode()
	{
		$this->Rannim_model->guest_mode();
		redirect('Rannim');
	}

	public function register_view($msg = null)
	{
		if ($this->verify_session()) {
			redirect('Rannim');
		} else {
			$data["msg"] = $msg;
			$data["countries"] = $this->Rannim_model->get_all_countries();
			$this->load->view('register_view', $data);
			;
		}
	}

	public function register()
	{
		if ($_FILES['user_photo']['name'] != '') {
			$path_folder = 'users_photos';
			$this->load->library('upload');
			$this->upload->initialize($this->set_upload_options($path_folder));
			if (!$this->upload->do_upload('user_photo')) {
				$user_photo = $this->upload->display_errors();
			} else {
				$data = array('upload_data' => $this->upload->data());
				$user_photo = $data['upload_data']['file_name'];
			}
		} else {
			$user_photo = "No file selected!";
		}

		date_default_timezone_set('Africa/Cairo');
		$created_at = date('Y:m:d H:i:s', time());

		$authentication_code = sha1(uniqid(rand(), true));
		$password_hash = sha1($this->input->post('password'));

		$data = array(
			"full_name" => $this->input->post('full_name'),
			"username" => $this->input->post('username'),
			"email" => $this->input->post('email'),
			"mobile" => $this->input->post('mobile'),
			"date_of_birth" => $this->input->post('date_of_birth'),
			"country" => $this->input->post('country'),
			"password_hash" => $password_hash,
			"authentication_code" => $authentication_code,
			"user_photo" => $user_photo,
			"created_at" => $created_at
		);

		$this->db->insert("users", $data);

		redirect('Rannim/log_user_in_view');
	}

	public function verify_session()
	{
		if ($this->session->userdata('user_id') == true && $this->session->userdata('email') == true) {
			return true;
		} else {
			return false;
		}
	}

	// [Special section]-------------------------------------------------------------------------------------------------------------

	public function index()
	{
		$data["songs"] = $this->Rannim_model->get_six_songs();
		$data["playlists"] = $this->Rannim_model->get_six_playlists();
		$data["podcasts"] = $this->Rannim_model->get_six_podcasts();
		$data['number_of_songs'] = [];
		foreach ($data['playlists'] as $playlist) {
			$playlist_id = $playlist->playlist_id;
			$data['number_of_songs'][$playlist_id] = $this->Rannim_model->get_number_of_songs($playlist_id);
		}
		$data["title"] = "Rannim | Home";
		$this->load->view('side_bar_view', $data);
		$this->load->view('home_view');
	}

	public function show_user_profile($id)
	{
		$data['user'] = $this->Rannim_model->get_one_user($id);
		$data["title"] = "Rannim | " . $data['user']->username . " Profile";
		$this->load->view('side_bar_view', $data);
		$this->load->view('one_user_view');
	}

	public function show_add_playlist()
	{
		$data["title"] = "Rannim | Create Playlist";
		$this->load->view('side_bar_view', $data);
		$this->load->view("add_playlist_view");
	}

	public function search_view()
	{
		$data['title'] = "Rannim | Search";
		$this->load->view('side_bar_view', $data);
		$this->load->view('search_view');
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
		$data["results"] = $search;
		$data['title'] = "Rannim | Search Result";
		$this->load->view('side_bar_view', $data);
		$this->load->view('search_result_view');
	}

	//[Show all section] ------------------------------------------------------------------------------------------------------------

	public function show_all_users()
	{
		$data['users'] = $this->Rannim_model->get_all_users();
		$data["title"] = "Rannim | All Users";
		$this->load->view('side_bar_view', $data);
		$this->load->view('all_users_view');
	}

	public function show_all_playlists()
	{
		$data['my_private_playlists'] = $this->Rannim_model->get_all_my_private_playlists();
		$data['my_private_podcasts_playlists'] = $this->Rannim_model->get_all_my_private_podcasts_playlists();
		$data['playlists'] = $this->Rannim_model->get_all_public_playlists();
		$data['podcasts_playlists'] = $this->Rannim_model->get_all_public_podcasts_playlists();

		$data["title"] = "Rannim | All Playlists";
		$this->load->view('side_bar_view', $data);
		$this->load->view('all_playlists_view');
	}

	public function show_all_podcasts()
	{
		$data['podcasts'] = $this->Rannim_model->get_all_podcasts();
		$data['title'] = "Rannim | All Podcasts";
		$this->load->view('side_bar_view', $data);
		$this->load->view('all_podcasts_view');
	}

	public function show_all_songs()
	{
		$data['songs'] = $this->Rannim_model->get_all_songs();
		$data['title'] = "Rannim | All Songs";
		$this->load->view('side_bar_view', $data);
		$this->load->view('all_songs_view');
	}

	public function show_all_albums()
	{
		$data['albums'] = $this->Rannim_model->get_all_albums();
		$data['number_of_songs'] = [];
		foreach ($data['albums'] as $album) {
			$album_id = $album->album_id;
			$data['number_of_songs'][$album_id] = $this->Rannim_model->get_number_of_songs_albums($album_id);
		}
		$data['title'] = "Rannim | All Albums";
		$this->load->view('side_bar_view', $data);
		$this->load->view('all_albums_view');
	}

	public function show_all_artists()
	{
		$data['artists'] = $this->Rannim_model->get_all_artists();
		$data['title'] = "Rannim | All Artists";
		$this->load->view('side_bar_view', $data);
		$this->load->view('all_artists_view');
	}

	public function show_all_categories()
	{
		$data['categories'] = $this->Rannim_model->get_all_categories();
		$data['title'] = "Rannim | All Categories";
		$this->load->view('side_bar_view', $data);
		$this->load->view('all_categories_view');
	}

	public function show_all_bands()
	{
		$data['bands'] = $this->Rannim_model->get_all_bands();
		$data['title'] = "Rannim | All Bands";
		$this->load->view('side_bar_view', $data);
		$this->load->view('all_bands_view');
	}

	public function show_all_types()
	{
		$data['types'] = $this->Rannim_model->get_all_types();
		$data['title'] = "Rannim | All Types";
		$this->load->view('side_bar_view', $data);
		$this->load->view('all_types_view');
	}

	//[Show one section] ------------------------------------------------------------------------------------------------------------

	public function show_one_playlist($playlist_id)
	{
		$data['playlist'] = $this->Rannim_model->get_one_playlist($playlist_id);
		$data['songs'] = $this->Rannim_model->get_all_songs();
		$data['playlist_songs'] = $this->Rannim_model->get_songs_by_playlist($playlist_id);
		$data['number_of_songs'] = $this->Rannim_model->get_number_of_songs($playlist_id);
		$data['title'] = "Rannim | " . $data['playlist']->playlist_name;
		$this->load->view('side_bar_view', $data);
		$this->load->view('one_playlist_view');
	}

	public function show_one_podcast_playlist($playlist_id)
	{
		$data['playlist'] = $this->Rannim_model->get_one_playlist($playlist_id);
		$data['podcasts'] = $this->Rannim_model->get_all_podcasts();
		$data['playlist_podcasts'] = $this->Rannim_model->get_podcasts_by_playlist($playlist_id);
		$data['number_of_podcasts'] = $this->Rannim_model->get_number_of_playlist_podcasts($playlist_id);
		$data['title'] = "Rannim | " . $data['playlist']->playlist_name;
		$this->load->view('side_bar_view', $data);
		$this->load->view('one_podcast_playlist_view');
	}

	public function show_one_type($type_id)
	{
		$data['categories'] = $this->Rannim_model->get_categories_by_type($type_id);
		$type = $this->Rannim_model->get_one_type($type_id);
		$data['title'] = "Rannim | " . $type->type_name;
		$this->load->view('side_bar_view', $data);
		$this->load->view('all_categories_view');
	}

	public function show_one_song($song_id)
	{
		$data['lyrics'] = $this->Rannim_model->get_lyrics_by_song($song_id);
		$data['song'] = $this->Rannim_model->get_one_song($song_id);
		$data['title'] = "Rannim | " . $data['song']->title;
		$this->load->view('side_bar_view', $data);
		$this->load->view('one_song_view');
	}

	public function show_one_podcast($podcast_id)
	{
		$data['podcast'] = $this->Rannim_model->get_one_podcast($podcast_id);
		$data['title'] = "Rannim | " . $data['podcast']->title;
		$this->load->view('side_bar_view', $data);
		$this->load->view('one_podcast_view');
	}

	public function show_one_category($category_id)
	{
		$data['songs'] = $this->Rannim_model->get_songs_by_category($category_id);
		$data['podcasts'] = $this->Rannim_model->get_podcasts_by_category($category_id);
		$data['artists'] = $this->Rannim_model->get_all_artists();
		$data['category'] = $this->Rannim_model->get_one_category($category_id);
		$data['title'] = "Rannim | " . $data['category']->category_name;
		$this->load->view('side_bar_view', $data);
		$this->load->view('one_category_view');
	}

	public function show_one_album($album_id)
	{
		$data['album'] = $this->Rannim_model->get_one_album($album_id);
		$data['songs'] = $this->Rannim_model->get_all_songs();
		$data['album_songs'] = $this->Rannim_model->get_songs_by_album($album_id);
		$data['number_of_songs'] = $this->Rannim_model->get_number_of_songs_albums($album_id);
		$data['title'] = "Rannim | " . $data['album']->album_name;
		$this->load->view('side_bar_view', $data);
		$this->load->view('one_album_view');
	}

	public function show_one_artist($artist_id)
	{
		$data['artist'] = $this->Rannim_model->get_one_artist($artist_id);
		$data['songs'] = $this->Rannim_model->get_songs_by_artist($artist_id);
		$data['title'] = "Rannim | " . $data['artist']->artist_name;
		$this->load->view("side_bar_view", $data);
		$this->load->view("one_artist_view");
	}

	public function show_one_band($band_id)
	{
		$data['band'] = $this->Rannim_model->get_one_band($band_id);
		$data['artists'] = $this->Rannim_model->get_artists_by_band($band_id);
		$data['title'] = "Rannim | " . $data['band']->band_name;
		$this->load->view("side_bar_view", $data);
		$this->load->view("one_band_view");
	}

	// [Add section]-----------------------------------------------------------------------------------------------------------------

	public function add_song_to_playlist()
	{
		date_default_timezone_set('Africa/Cairo');
		$created_at = date('Y:m:d H:i:s', time());

		$playlist_id = $this->input->post('playlist_id');
		$data = array(
			"playlist_id" => $playlist_id,
			"song_id" => $this->input->post('song'),
			"added_at" => $created_at
		);

		$this->db->insert("playlist_songs", $data);

		redirect("Rannim/show_one_playlist/$playlist_id");
	}

	public function add_podcast_to_playlist()
	{
		date_default_timezone_set('Africa/Cairo');
		$created_at = date('Y:m:d H:i:s', time());

		$playlist_id = $this->input->post('playlist_id');
		$data = array(
			"playlist_id" => $playlist_id,
			"podcast_id" => $this->input->post('podcast'),
			"added_at" => $created_at
		);

		$this->db->insert("playlist_podcasts", $data);

		redirect("Rannim/show_one_podcast_playlist/$playlist_id");
	}

	public function add_playlist()
	{
		if ($_FILES['playlist_photo']['name'] != '') {
			$path_folder = 'playlists_photos';
			$this->load->library('upload');
			$this->upload->initialize($this->set_upload_options($path_folder));
			if (!$this->upload->do_upload('playlist_photo')) {
				$playlist_photo = $this->upload->display_errors();
			} else {
				$data = array('upload_data' => $this->upload->data());
				$playlist_photo = $data['upload_data']['file_name'];
			}
		} else {
			$playlist_photo = "No file selected!";
		}

		date_default_timezone_set('Africa/Cairo');
		$created_at = date('Y:m:d H:i:s', time());

		$data = array(
			"user_id" => $this->input->post('user_id'),
			"playlist_name" => $this->input->post('playlist_name'),
			"is_collaborative" => $this->input->post('is_collaborative'),
			"is_public" => $this->input->post('is_public'),
			"section" => $this->input->post('section'),
			"playlist_photo" => $playlist_photo,
			"created_at" => $created_at
		);

		$this->db->insert("playlists", $data);

		$playlist_id = $this->db->insert_id();

		$share_link = base_url("Rannim/view/" . $playlist_id);

		$this->db->where('playlist_id', $playlist_id);
		$this->db->update('playlists', ['share_link' => $share_link]);

		redirect('Rannim/show_all_playlists');
	}

	// [Delete / Disable section]---------------------------------------------------------------------------------------------------

	public function delete_playlist($playlist_id, $playlist_photo)
	{
		$this->db->where("playlist_id", $playlist_id);
		$this->db->delete("playlists");

		$this->db->where("playlist_id", $playlist_id);
		$this->db->delete("playlist_songs");

		$this->db->where("playlist_id", $playlist_id);
		$this->db->delete("playlist_podcasts");

		$playlist_photo_path = './dashboard/assets/uploads/playlists_photos/' . $playlist_photo;

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

	public function delete_song_from_playlist($song_id, $playlist_id)
	{
		$this->db->where("song_id", $song_id);
		$this->db->delete("playlist_songs");
		redirect("Rannim/show_one_playlist/$playlist_id");
	}

	public function delete_podcast_from_playlist($podcast_id, $playlist_id)
	{
		$this->db->where("podcast_id", $podcast_id);
		$this->db->delete("playlist_podcasts");
		redirect("Rannim/show_one_podcast_playlist/$playlist_id");
	}

	public function delete_user($user_id, $user_photo)
	{
		$this->db->where("user_id", $user_id);
		$this->db->delete("users");

		$user_photo_path = './dashboard/assets/uploads/users_photos/' . $user_photo;

		if (file_exists($user_photo_path)) {
			if (unlink($user_photo_path)) {
				$this->session->set_flashdata('success', 'Image deleted successfully.');
			} else {
				$this->session->set_flashdata('error', 'Failed to delete the image.');
			}
		} else {
			$this->session->set_flashdata('error', 'Image does not exist.');
		}

		$this->session->sess_destroy();
		redirect("Rannim/log_user_in_view");
	}

	// [Edit section]----------------------------------------------------------------------------------------------------------------

	public function edit_user($user_id)
	{
		$data['countries'] = $this->Rannim_model->get_all_countries();
		$data['title'] = "Rannim | Edit User";
		$data['user'] = $this->Rannim_model->get_one_user($user_id);
		$this->load->view('side_bar_view', $data);
		$this->load->view('edit_user_view');
	}

	public function edit_playlist($playlist_id)
	{
		$data['playlist'] = $this->Rannim_model->get_one_playlist($playlist_id);
		$data['title'] = "Rannim | Edit Playlist";
		$this->load->view('side_bar_view', $data);
		$this->load->view('edit_playlist_view');
	}

	// [Update section]--------------------------------------------------------------------------------------------------------------

	public function update_user()
	{
		$user_id = $this->input->post("user_id");

		if ($_FILES['edit_user_photo']['name'] != '') {
			$path_folder = 'users_photos';
			$this->load->library('upload');
			$this->upload->initialize($this->set_upload_options($path_folder));
			if (!$this->upload->do_upload('edit_user_photo')) {
				$new_user_photo = $this->upload->display_errors();
			} else {
				$data = array('upload_data' => $this->upload->data());
				$new_user_photo = $data['upload_data']['file_name'];

				$old = $this->input->post("user_old_photo");
				$old_photo_path = './dashboard/assets/uploads/users_photos/' . $old;
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
		} else {
			$user = $this->Rannim_model->get_one_user($user_id);
			$new_user_photo = $user->user_photo;
		}

		$data = array(
			"full_name" => $this->input->post("full_name"),
			"username" => $this->input->post("username"),
			"email" => $this->input->post("email"),
			"mobile" => $this->input->post("mobile"),
			"country" => $this->input->post("country"),
			"date_of_birth" => $this->input->post("date_of_birth"),
			"user_photo" => $new_user_photo
		);

		$this->db->where("user_id", $user_id);
		$this->db->update("users", $data);

		redirect("Rannim/show_all_users");
	}

	public function update_playlist()
	{
		$playlist_id = $this->input->post("playlist_id");

		if ($_FILES['playlist_photo']['name'] != '') {
			$path_folder = 'playlists_photos';
			$this->load->library('upload');
			$this->upload->initialize($this->set_upload_options($path_folder));
			if (!$this->upload->do_upload('playlist_photo')) {
				$new_playlist_photo = $this->upload->display_errors();
			} else {
				$data = array('upload_data' => $this->upload->data());
				$new_playlist_photo = $data['upload_data']['file_name'];

				$old = $this->input->post("playlist_old_photo");
				$old_photo_path = './dashboard/assets/uploads/playlists_photos/' . $old;
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
		} else {
			$playlist = $this->Rannim_model->get_one_playlist($playlist_id);
			$new_playlist_photo = $playlist->playlist_photo;
		}

		date_default_timezone_set('Africa/Cairo');
		$updated_at = date('Y:m:d H:i:s', time());

		$data = array(
			"playlist_name" => $this->input->post('playlist_name'),
			"is_collaborative" => $this->input->post('is_collaborative'),
			"is_public" => $this->input->post('is_public'),
			"section" => $this->input->post('section'),
			"playlist_photo" => $new_playlist_photo,
			"updated_at" => $updated_at
		);

		$this->db->where("playlist_id", $playlist_id);
		$this->db->update("playlists", $data);

		redirect("Rannim/show_all_playlists");
	}

	// [Forgot password section]-----------------------------------------------------------------------------------------------------

	public function forgot_password($msg = null)
	{
		if ($msg == 1) {
			$msg = "Invalid E-mail!";
			$this->load->view('forgot_password_view', $msg);
			;
		} else {
			$this->load->view('forgot_password_view');
			;
		}

	}

	public function send_reset_link()
	{
		$email = $this->input->post('email');
		if ($this->rannim_model->validate_user_email($email)) {
			$data["user_data"] = $this->rannim_model->validate_user_email($email);
			$authentication_code = $data["user_data"]->authentication_code;

			$reset_link = site('Rannim/reset_password/' . $authentication_code);
			$this->load->library('email');
			$this->config->load("supportEmail");

			$this->email->from($this->config->item('smtp_user'), $this->config->item('Rannim'));
			$this->email->to($email);
			$this->email->subject('Reset your password');
			$this->email->message('if you want to reset your password please follow the following link: ' . $reset_link);

			if ($this->email->send()) {
				echo "Reset link sent successfully.";
			} else {
				echo $this->email->print_debugger();
			}
		} else {
			redirect("Rannim/forgot_password/" . 1);
		}
	}

	public function reset_password($authentication_code)
	{
		if ($this->rannim_model->validate_user_authentication_code($authentication_code)) {
			$data["user_data"] = $this->rannim_model->validate_user_authentication_code($authentication_code);
			$this->load->view('reset_password_view', $data);
			;
		} else {

		}
	}

	public function update_user_password()
	{
		$user_id = $this->input->post("user_id");
		$data["password_hash"] = sha1($this->input->post('password'));
		$this->db->where("user_id", $user_id);
		$this->db->update("users", $data);

		redirect("Rannim");
	}
}
