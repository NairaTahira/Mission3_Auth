<div class="container mt-5">

  <!-- Page Header -->
  <div class="card shadow-lg border-0 mb-4">
    <div class="card-body bg-primary text-white rounded">
      <h3 class="mb-0"><i class="bi bi-plus-circle"></i> Add Course</h3>
    </div>
  </div>

  <!-- Add Course Form -->
  <div class="card shadow-sm border-0">
    <div class="card-body">
      <form id="courseForm" method="post" action="/courses/store" novalidate>
        <div class="mb-3">
          <label class="form-label">Course Code</label>
          <input type="text" class="form-control" name="course_code" id="course_code" required>
          <div class="invalid-feedback">Course code is required.</div>
        </div>

        <div class="mb-3">
          <label class="form-label">Course Name</label>
          <input type="text" class="form-control" name="course_name" id="course_name" required>
          <div class="invalid-feedback">Course name is required.</div>
        </div>

        <div class="mb-3">
          <label class="form-label">Credits</label>
          <input type="number" class="form-control" name="credits" id="credits" required>
          <div class="invalid-feedback">Credits are required.</div>
        </div>

        <button class="btn btn-success">Save</button>
      </form>


    <script src="/js/mission4.js"></script>

    </div>
  </div>

</div>
