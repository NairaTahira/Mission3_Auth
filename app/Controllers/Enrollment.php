<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;

class Enrollment extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    // Enroll student to course
    public function enroll($courseId)
    {
        if (session()->get('role') !== 'student') {
            return redirect()->to('/courses');
        }

        $studentId = session()->get('user_id'); // student_id = user_id according to model

        // check whether it is registered
        $exists = $this->db->table('takes')
            ->where('student_id', $studentId)
            ->where('course_id', $courseId)
            ->countAllResults();

        if ($exists == 0) {
            $this->db->table('takes')->insert([
                'student_id' => $studentId,
                'course_id'  => $courseId,
                'enroll_date' => date('Y-m-d')
            ]);
        }

        return redirect()->to('/my-courses');
    }

    // View Student's Enrolled Courses
    public function myCourses()
    {
        $studentId = session()->get('user_id');

        $courses = $this->db->table('takes')
            ->select('courses.course_code, courses.course_name, courses.credits')
            ->join('courses', 'takes.course_id = courses.id')
            ->where('takes.student_id', $studentId)
            ->get()
            ->getResultArray();

        $data = [
            'title'   => 'My Courses',
            'content' => view('enrollment/my_courses', ['courses' => $courses])
        ];
        return view('view_template_01', $data);
    }
}
