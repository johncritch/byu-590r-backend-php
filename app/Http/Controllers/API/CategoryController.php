<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends BaseController
{
	public function index()
	{
		$categories = Category::all();
		return $this->sendResponse($categories, "Categories fetched");
	}
}
