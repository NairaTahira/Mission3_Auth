<div class="container mt-5">

  <!-- Page Header -->
  <div class="card shadow-lg border-0 mb-4">
    <div class="card-body d-flex justify-content-between align-items-center bg-primary text-white rounded">
      <h2 class="mb-0"><i class="bi bi-journal-text"></i> Courses</h2>
      <?php if(session()->get('role')==='admin'):?>
        <a href="/courses/create" class="btn btn-light text-primary fw-bold shadow-sm">
          <i class="bi bi-plus-circle"></i> Add Course
        </a>
      <?php endif;?>
    </div>
  </div>

  <!-- Courses Table -->
  <div class="card shadow-sm border-0">
    <div class="card-body p-0">
      <table class="table table-hover mb-0">
        <thead style="background: linear-gradient(90deg, #4b6cb7, #182848); color: #fff;">
          <tr>
            <th>#</th>
            <th>Code</th>
            <th>Course</th>
            <th>Credits</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if(!empty($courses)): ?>
            <?php foreach ($courses as $i => $c): ?>
            <tr>
              <td><?= $i+1 ?></td>
              <td class="fw-bold text-primary"><?= esc($c['course_code']) ?></td>
              <td><?= esc($c['course_name']) ?></td> 
              <td><span class="badge bg-success"><?= esc($c['credits']) ?></span></td>
              <td class="text-center">
                <?php if(session()->get('role')==='admin'):?>
                  <a href="/courses/edit/<?= $c['id'] ?>" class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil-square"></i> Edit
                  </a>
                  <a href="/courses/delete/<?= $c['id'] ?>" 
                     class="btn btn-danger btn-sm"
                     onclick="return confirm('Delete this course?')">
                    <i class="bi bi-trash"></i> Delete
                  </a>
                <?php else:?>
                  <a href="/enroll/<?= $c['id'] ?>" class="btn btn-primary btn-sm">
                    <i class="bi bi-box-arrow-in-right"></i> Enroll
                  </a>
                <?php endif;?>
              </td>
            </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="4" class="text-center text-muted p-3">
                No courses available
              </td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

</div>
