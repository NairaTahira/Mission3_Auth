<div class="card shadow-lg">
  <div class="card-header bg-primary text-white">
    <i class="bi bi-people"></i> Students List
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>NIM</th>
          <th>Email</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($students as $i => $s): ?>
        <tr>
          <td><?= $i+1 ?></td>
          <td><?= esc($s['name']) ?></td>
          <td><?= esc($s['nim']) ?></td>
          <td><?= esc($s['email']) ?></td>
          <td>
            <a href="/students/view/<?= $s['id'] ?>" class="btn btn-sm btn-info">View Courses</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
