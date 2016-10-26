<?php

namespace CodePress\CodeCategory\Controllers;


class AdminCategoriesController extends Controller
{

    /**
     * @return string
     */
    public function index()
    {
        return view('codecategory::index');
    }

}