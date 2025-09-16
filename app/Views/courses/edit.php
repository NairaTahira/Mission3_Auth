<div class="container mt-5">

  <!-- Page Header -->
  <div class="card shadow-lg border-0 mb-4">
    <div class="card-body bg-warning text-dark rounded">
      <h3 class="mb-0"><i class="bi bi-pencil-square"></i> Edit Course</h3>
    </div>
  </div>

  <!-- Edit Course Form -->
  <div class="card shadow-sm border-0">
    <div class="card-body">
      <form method="post" action="/courses/update/<?= $course['id'] ?>">
        
        <div class="mb-3">
          <label class="form-label">Course Code</label>
          <input type="text" class="form-control" name="course_code" 
                 value="<?= esc($course['course_code']) ?>" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Course Name</label>
          <input type="text" class="form-control" name="course_name" 
                 value="<?= esc($course['course_name']) ?>" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Credits</label>
          <input type="number" class="form-control" name="credits" 
                 value="<?= esc($course['credits']) ?>" required>
        </div>

        <button class="btn btn-success"><i class="bi bi-save"></i> Update</button>
        <a href="/courses" class="btn btn-secondary">Back</a>
      </form>
    </div>
  </div>

</div>
