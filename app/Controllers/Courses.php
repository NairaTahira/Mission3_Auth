<?php
namespace App\Controllers;

use App\Models\CourseModel;  
use App\Models\TakesModel;

class Courses extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new CourseModel(); 
    }

    public function index()
    {
        $courseModel = new CourseModel();
        $takeModel   = new TakesModel();

        $courses = $courseModel->findAll();
        $enrolledIds = [];

        if (session()->get('role') === 'student') {
            $studentId = session()->get('user_id');
            $enrolled  = $takeModel->where('student_id', $studentId)->findAll();
            $enrolledIds = array_column($enrolled, 'course_id');
        }

        $data = [
            'title'       => 'Courses',   
            'content'     => view('courses/index', [
                'courses'     => $courses,
                'enrolledIds' => $enrolledIds
            ])
        ];

        return view('view_template_01', $data);
    }

    public function create()
    {
        if (session()->get('role') !== 'admin') return redirect()->to('/courses');

        $data = [
            'title'   => 'Add Course',
            'content' => view('courses/create')
        ];
        return view('view_template_01', $data);
    }

    public function store()
    {
        $this->model->save([
            'course_code' => $this->request->getPost('course_code'),
            'course_name' => $this->request->getPost('course_name'),
            'credits'     => $this->request->getPost('credits')
        ]);
        return redirect()->to('/courses');
    }

    public function edit($id)
    {
        $course = $this->model->find($id);
        $data = [
            'title'   => 'Edit Course',
            'content' => view('courses/edit', ['course' => $course])
        ];
        return view('view_template_01', $data);
    }

    public function update($id)
    {
        $this->model->update($id, [
            'course_code' => $this->request->getPost('course_code'),
            'course_name' => $this->request->getPost('course_name'),
            'credits'     => $this->request->getPost('credits')
        ]);
        return redirect()->to('/courses');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to('/courses');
    }
}
