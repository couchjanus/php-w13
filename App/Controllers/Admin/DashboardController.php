<?php
class DashboardController   
{
	public function index()
	{
        // echo "Dashboard Controller";
        render('admin/index', ['title'=>'Dashboard Controller PAGE']);
	}
}

