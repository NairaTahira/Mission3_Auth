<?php
namespace App\Controllers;

use App\Models\TakesModel;
use App\Models\CourseModel;
use App\Models\StudentModel;

class Takes extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new TakesModel();
    }

    public function delete($id)
    {
        if (session()->get('role') !== 'admin') return redirect()->to('/students');

        $this->model->delete($id);
        return redirect()->back()->with('message', 'Enrollment deleted.');
    }
}
