<div class="container mt-5">

  <!-- Welcome Card -->
  <div class="card shadow-lg border-0">
    <div class="card-body text-center py-5">
      <h2 class="fw-bold text-primary">
        <i class="bi bi-person-circle"></i> Welcome, <?= esc(session()->get('username')) ?>!
      </h2>
      <p class="text-muted">You are logged in as <b><?= esc(session()->get('role')) ?></b>.</p>
      <p class="lead">Use the navigation menu above or the quick links below to get started.</p>
    </div>
  </div>

  <!-- Quick Actions / Feature Highlights -->
  <div class="row mt-4">
    
    <?php if(session()->get('role') === 'admin'): ?>
      <!-- Manage Courses -->
      <div class="col-md-6 mb-4">
        <div class="card text-center shadow-sm h-100 border-0">
          <div class="card-body">
            <i class="bi bi-journal-text display-4 text-primary"></i>
            <h5 class="mt-3">Manage Courses</h5>
            <p class="text-muted">Create, edit, or delete courses.</p>
            <a href="/courses" class="btn btn-outline-primary btn-sm">Go</a>
          </div>
        </div>
      </div>

      <!-- Manage Students -->
      <div class="col-md-6 mb-4">
        <div class="card text-center shadow-sm h-100 border-0">
          <div class="card-body">
            <i class="bi bi-people-fill display-4 text-success"></i>
            <h5 class="mt-3">Manage Students</h5>
            <p class="text-muted">View and manage student data.</p>
            <a href="/students" class="btn btn-outline-success btn-sm">Manage</a>
          </div>
        </div>
      </div>

    <?php elseif(session()->get('role') === 'student'): ?>
      <!-- Browse Courses -->
      <div class="col-md-6 mb-4">
        <div class="card text-center shadow-sm h-100 border-0">
          <div class="card-body">
            <i class="bi bi-book display-4 text-primary"></i>
            <h5 class="mt-3">Available Courses</h5>
            <p class="text-muted">Browse and enroll in courses.</p>
            <a href="/courses" class="btn btn-outline-primary btn-sm">Browse</a>
          </div>
        </div>
      </div>

      <!-- My Courses -->
      <div class="col-md-6 mb-4">
        <div class="card text-center shadow-sm h-100 border-0">
          <div class="card-body">
            <i class="bi bi-list-check display-4 text-success"></i>
            <h5 class="mt-3">My Courses</h5>
            <p class="text-muted">View the courses you are enrolled in.</p>
            <a href="/my-courses" class="btn btn-outline-success btn-sm">View</a>
          </div>
        </div>
      </div>
    <?php endif; ?>
    

  </div>
</div>
