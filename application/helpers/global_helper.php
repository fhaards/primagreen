<?php

function isAdmin()
{
	$ci = &get_instance();
	return $ci->session->level == 'admin';
}

function isUser()
{
	$ci = &get_instance();
	return $ci->session->level == 'user';
}

function isLoggedIn()
{
	$ci = &get_instance();
	return $ci->session->status == "login";
}

function show404IfNotAdmin()
{
	if (!isAdmin()) {
		redirect('error404');
	}
}

function redirectIfNotLogin()
{
	$ci = &get_instance();
	if ($ci->session->userdata('status') != "login") {
		redirect(base_url("login"));
	}
}

function redirectIfAdminAccessUserPage()
{
	$ci = &get_instance();
	if ($ci->session->userdata('level') == "admin") {
		redirect(base_url("dashboard"));
	}
}


function getUserData()
{
	$ci = &get_instance();
	$ci->load->model('model_f_user_login');
	return $ci->model_f_user_login->findBy('email', $ci->session->email);
}

function getCompanyData()
{
	$ci = &get_instance();
	$ci->load->model('model_settings');
	return $ci->model_settings->getAllCompanyData();
}

function getBannerData()
{
	$ci = &get_instance();
	$ci->load->model('model_settings');
	return $ci->model_settings->getAllBannerData();
}
