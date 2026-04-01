<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rannim_model extends CI_Model
{
	//[Log In / Session section] ----------------------------------------------------------------------------------------------------

	public function log_user_in()
	{
		$email = $this->input->post('email');
		$password_hash = sha1($this->input->post('password'));

		$this->db->where('email', $email);
		$this->db->where('password_hash', $password_hash);
		$query = $this->db->get('users');

		if ($query->num_rows() == 1) {
			$user = $query->row();
			$this->session->set_userdata('user_id', $user->user_id);
			$this->session->set_userdata('email', $user->email);
			$this->session->set_userdata('full_name', $user->full_name);
			$this->session->set_userdata('username', $user->username);
			$this->session->set_userdata('mobile', $user->mobile);
			$this->session->set_userdata('date_of_birth', $user->date_of_birth);
			$this->session->set_userdata('country', $user->country);
			$this->session->set_userdata('is_premium', $user->is_premium);
			$this->session->set_userdata('user_photo', $user->user_photo);
			return true;
		} else {
			return false;
		}
	}

	public function guest_mode()
	{
		$this->session->set_userdata('user_id', null);
		$this->session->set_userdata('email', null);
		$this->session->set_userdata('full_name', null);
		$this->session->set_userdata('username', null);
		$this->session->set_userdata('mobile', null);
		$this->session->set_userdata('date_of_birth', null);
		$this->session->set_userdata('country', null);
		$this->session->set_userdata('is_premium', null);
		$this->session->set_userdata('user_photo', null);
		return true;
	}

	// [Get all section]---------------------------------------------------------------------------------------------------

	public function get_all_users()
	{
		$query = $this->db->get('users');
		return $query->result();
	}

	public function get_all_my_private_playlists()
	{
		$user_id = $this->session->userdata('user_id');
		$this->db->where('is_public', 0);
		$this->db->where('section', 0);
		$this->db->where('user_id', $user_id);
		$query = $this->db->get('playlists');
		return $query->result();
	}

	public function get_all_my_private_podcasts_playlists()
	{
		$user_id = $this->session->userdata('user_id');
		$this->db->where('is_public', 0);
		$this->db->where('section', 1);
		$this->db->where('user_id', $user_id);
		$query = $this->db->get('playlists');
		return $query->result();
	}

	public function get_all_public_playlists()
	{
		$query = $this->db->select('t1.*, t2.username')
			->from("playlists as t1")
			->join("users as t2", "t1.user_id 	= t2.user_id", "LEFT")
			->where('is_public', 1)
			->where('section', 0)
			->get();
		return $query->result();
	}

	public function get_all_public_podcasts_playlists()
	{
		$query = $this->db->select('t1.*, t2.username')
			->from("playlists as t1")
			->join("users as t2", "t1.user_id 	= t2.user_id", "LEFT")
			->where('is_public', 1)
			->where('section', 1)
			->get();
		return $query->result();
	}

	public function get_all_songs()
	{
		$query = $this->db->select('t1.*, t3.artist_name, t4.type_name, t5.category_name')
			->from("songs as t1")
			->join("artist as t3", "t1.artist_id 	= t3.artist_id", "LEFT")
			->join("type as t4", "t1.type_id 		= t4.type_id", "LEFT")
			->join("category as t5", "t1.category_id 	= t5.category_id", "LEFT")
			->get();
		return $query->result();
	}

	public function get_all_countries()
	{
		$query = $this->db->get('countries');
		return $query->result();
	}

	public function get_all_podcasts()
	{
		$query = $this->db->select('t1.*, t2.artist_name, t4.type_name, t5.category_name')
			->from("podcasts as t1")
			->join("artist as t2", "t1.host_id 		= t2.artist_id", "LEFT")
			->join("type as t4", "t1.type_id 		= t4.type_id", "LEFT")
			->join("category as t5", "t1.category_id 	= t5.category_id", "LEFT")
			->get();
		return $query->result();
	}

	public function get_all_albums()
	{
		$query = $this->db->select('t1.*, t2.artist_name, t3.category_name')
			->from("albums as t1")
			->join("artist as t2", "t1.artist_id 	= t2.artist_id", "LEFT")
			->join("category as t3", "t1.genre_id 	= t3.category_id", "LEFT")
			->get();
		return $query->result();
	}

	public function get_all_artists()
	{
		$query = $this->db->select('t1.*, t2.country_name')
			->from("artist as t1")
			->join("countries as t2", "t1.country_id 	= t2.country_id", "LEFT")
			->get();
		return $query->result();
	}

	public function count_artist_songs_num($artist_id)
	{
		$this->db->where("artist_id", $artist_id);
		$this->db->from("songs");
		return $this->db->count_all_results();
	}

	public function get_all_categories()
	{
		$query = $this->db->get('category');
		return $query->result();
	}

	public function get_all_bands()
	{
		$query = $this->db->get('band');
		return $query->result();
	}

	public function get_all_types()
	{
		$query = $this->db->get('type');
		return $query->result();
	}

	// [Get one section]-------------------------------------------------------------------------------------------------------------

	public function get_one_playlist($id)
	{
		$query = $this->db->select('t1.*, t2.username, t2.user_photo')
			->from("playlists as t1")
			->join("users as t2", "t1.user_id 	= t2.user_id", "LEFT")
			->where('playlist_id', $id)
			->get();
		return $query->row();
	}

	public function get_one_type($id)
	{
		$this->db->where('type_id', $id);
		$query = $this->db->get('type');
		return $query->row();
	}

	public function get_one_category($id)
	{
		$this->db->where('category_id', $id);
		$query = $this->db->get('category');
		return $query->row();
	}

	public function get_one_album($id)
	{
		$this->db->where('album_id', $id);
		$query = $this->db->get('albums');
		return $query->row();
	}

	public function get_one_song($id)
	{
		$query = $this->db->select('t1.*, t2.artist_name, t3.band_name')
			->from("songs as t1")
			->join("artist as t2", "t1.artist_id 	= t2.artist_id", "LEFT")
			->join("band as t3", "t2.band_id 		= t3.band_id", "LEFT")
			->where('song_id', $id)
			->get();
		return $query->row();
	}

	public function get_one_podcast($id)
	{
		$query = $this->db->select('t1.*, t2.artist_name, t3.band_name')
			->from("podcasts as t1")
			->join("artist as t2", "t1.host_id 	= t2.artist_id", "LEFT")
			->join("band as t3", "t2.band_id 	= t3.band_id", "LEFT")
			->where('podcast_id', $id)
			->get();
		return $query->row();
	}

	public function get_one_artist($id)
	{
		$this->db->where('artist_id', $id);
		$query = $this->db->get('artist');
		return $query->row();
	}

	public function get_one_band($id)
	{
		$this->db->where('band_id', $id);
		$query = $this->db->get('band');
		return $query->row();
	}

	public function get_one_user($id)
	{
		$this->db->where('user_id', $id);
		$query = $this->db->get('users');
		return $query->row();
	}

	// [Get by section]--------------------------------------------------------------------------------------------------------------

	public function get_songs_by_playlist($playlist_id)
	{
		$query = $this->db->select('t1.*, t2.title, t2.song_photo, t2.created_at')
			->from("playlist_songs as t1")
			->join("songs as t2", "t1.song_id 	= t2.song_id", "LEFT")
			->where('playlist_id', $playlist_id)
			->get();
		return $query->result();
	}

	public function get_podcasts_by_playlist($playlist_id)
	{
		$query = $this->db->select('t1.*, t2.title, t2.podcast_thumbnail, t2.created_at')
			->from("playlist_podcasts as t1")
			->join("podcasts as t2", "t1.podcast_id 	= t2.podcast_id", "LEFT")
			->where('playlist_id', $playlist_id)
			->get();
		return $query->result();
	}

	public function get_categories_by_type($type_id)
	{
		$this->db->where('type_id', $type_id);
		$query = $this->db->get('category');
		return $query->result();
	}

	public function get_songs_by_category($category_id)
	{
		$query = $this->db->select('t1.*, t3.artist_name, t4.type_name, t5.category_name')
			->from("songs as t1")
			->join("artist as t3", "t1.artist_id 	= t3.artist_id", "LEFT")
			->join("type as t4", "t1.type_id 		= t4.type_id", "LEFT")
			->join("category as t5", "t1.category_id 	= t5.category_id", "LEFT")
			->where('t1.category_id', $category_id)
			->get();
		return $query->result();
	}

	public function get_podcasts_by_category($category_id)
	{
		$query = $this->db->select('t1.*, t2.artist_name, t4.type_name, t5.category_name')
			->from("podcasts as t1")
			->join("artist as t2", "t1.host_id 		= t2.artist_id", "LEFT")
			->join("type as t4", "t1.type_id 		= t4.type_id", "LEFT")
			->join("category as t5", "t1.category_id 	= t5.category_id", "LEFT")
			->where('t1.category_id', $category_id)
			->get();
		return $query->result();
	}

	public function get_songs_by_album($album_id)
	{
		$query = $this->db->select('t1.*, t2.title, t2.song_photo, t2.created_at')
			->from("album_songs as t1")
			->join("songs as t2", "t1.song_id 	= t2.song_id", "LEFT")
			->where('t1.album_id', $album_id)
			->get();
		return $query->result();
	}

	public function get_lyrics_by_song($song_id)
	{
		$this->db->where('song_id', $song_id);
		$query = $this->db->get('lyrics_timestamps');
		return $query->row();
	}

	public function get_songs_by_artist($artist_id)
	{
		$this->db->where('artist_id', $artist_id);
		$query = $this->db->get('songs');
		return $query->result();
	}

	public function get_artists_by_band($band_id)
	{
		$this->db->where('band_id', $band_id);
		$query = $this->db->get('artist');
		return $query->result();
	}

	// [Get specific section]--------------------------------------------------------------------------------------------------------

	public function get_six_songs()
	{
		$query = $this->db->select('t1.*, t3.artist_name, t4.type_name, t5.category_name')
			->from("songs as t1")
			->join("artist as t3", "t1.artist_id 	= t3.artist_id", "LEFT")
			->join("type as t4", "t1.type_id 		= t4.type_id", "LEFT")
			->join("category as t5", "t1.category_id 	= t5.category_id", "LEFT")
			->limit(6)
			->get();
		return $query->result();
	}

	public function get_six_playlists()
	{
		$query = $this->db->select('*')
			->from('playlists')
			->limit(6)
			->get();
		return $query->result();
	}

	public function get_six_Podcasts()
	{
		$query = $this->db->select('t1.*, t2.artist_name, t4.type_name, t5.category_name')
			->from("podcasts as t1")
			->join("artist as t2", "t1.host_id 		= t2.artist_id", "LEFT")
			->join("type as t4", "t1.type_id 		= t4.type_id", "LEFT")
			->join("category as t5", "t1.category_id 	= t5.category_id", "LEFT")
			->limit(6)
			->get();
		return $query->result();
	}

	public function get_number_of_songs($playlist_id)
	{
		$this->db->where("playlist_id", $playlist_id);
		$this->db->from("playlist_songs");
		return $this->db->count_all_results();
	}

	public function get_number_of_playlist_podcasts($playlist_id)
	{
		$this->db->where("playlist_id", $playlist_id);
		$this->db->from("playlist_podcasts");
		return $this->db->count_all_results();
	}

	public function get_number_of_songs_albums($album_id)
	{
		$this->db->where("album_id", $album_id);
		$this->db->from("album_songs");
		return $this->db->count_all_results();
	}

	// [Special section]-------------------------------------------------------------------------------------------------------------

	public function songs_search($keyword)
	{
		$query = $this->db->select('t1.*, t3.artist_name, t4.type_name, t5.category_name')
			->from('songs as t1')
			->join('artist as t3', 't1.artist_id = t3.artist_id', 'LEFT')
			->join('type as t4', 't1.type_id = t4.type_id', 'LEFT')
			->join('category as t5', 't1.category_id = t5.category_id', 'LEFT')
			->like('title', $keyword)
			->get();
		return $query->result();
	}

	public function podcasts_search($keyword)
	{
		$query = $this->db->select('t1.*, t2.artist_name, t4.type_name, t5.category_name')
			->from("podcasts as t1")
			->join("artist as t2", "t1.host_id 		= t2.artist_id", "LEFT")
			->join("type as t4", "t1.type_id 		= t4.type_id", "LEFT")
			->join("category as t5", "t1.category_id 	= t5.category_id", "LEFT")
			->like('title', $keyword)
			->or_like('description', $keyword)
			->get();
		return $query->result();
	}

	public function artists_search($keyword)
	{
		$query = $this->db->select('t1.*, t2.*')
			->from("artist as t1")
			->join("countries as t2", "t1.country_id 	= t2.country_id", "LEFT")
			->like('artist_name', $keyword)
			->or_like('artist_bio', $keyword)
			->get();
		return $query->result();
	}

	public function validate_user_email($email)
	{
		$this->db->where('email', $email);
		$query = $this->db->get('users');

		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return false;
		}
	}

	public function validate_user_authentication_code($authentication_code)
	{
		$this->db->where('authentication_code', $authentication_code);
		$query = $this->db->get('users');

		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return false;
		}
	}
}
