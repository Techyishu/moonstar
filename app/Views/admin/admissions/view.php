<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="mb-3">
    <a href="<?= base_url('admin/admissions') ?>" class="btn btn-sm btn-secondary">
        <i class="bi bi-arrow-left"></i> Back to Admissions
    </a>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>Application Details</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th width="200">Application Number:</th>
                        <td><code><?= esc($admission['application_number']) ?></code></td>
                    </tr>
                    <tr>
                        <th>Student Name:</th>
                        <td><?= esc($admission['student_name']) ?></td>
                    </tr>
                    <tr>
                        <th>Date of Birth:</th>
                        <td><?= date('F d, Y', strtotime($admission['date_of_birth'])) ?></td>
                    </tr>
                    <tr>
                        <th>Gender:</th>
                        <td><?= ucfirst($admission['gender']) ?></td>
                    </tr>
                    <tr>
                        <th>Class Applied For:</th>
                        <td><?= esc($admission['class_applied']) ?></td>
                    </tr>
                    <tr>
                        <th>Previous School:</th>
                        <td><?= esc($admission['previous_school'] ?? 'N/A') ?></td>
                    </tr>
                    <tr>
                        <th>Parent/Guardian Name:</th>
                        <td><?= esc($admission['parent_name']) ?></td>
                    </tr>
                    <tr>
                        <th>Parent Email:</th>
                        <td><?= esc($admission['parent_email']) ?></td>
                    </tr>
                    <tr>
                        <th>Parent Phone:</th>
                        <td><?= esc($admission['parent_phone']) ?></td>
                    </tr>
                    <tr>
                        <th>Address:</th>
                        <td><?= nl2br(esc($admission['address'])) ?></td>
                    </tr>
                    <tr>
                        <th>Applied On:</th>
                        <td><?= date('F d, Y g:i A', strtotime($admission['created_at'])) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h6>Update Status</h6>
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/admissions/update-status/' . $admission['id']) ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status" required>
                            <option value="pending" <?= $admission['application_status'] == 'pending' ? 'selected' : '' ?>>
                                Pending</option>
                            <option value="accepted" <?= $admission['application_status'] == 'accepted' ? 'selected' : '' ?>>Accepted</option>
                            <option value="rejected" <?= $admission['application_status'] == 'rejected' ? 'selected' : '' ?>>Rejected</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Remarks</label>
                        <textarea class="form-control" name="remarks"
                            rows="4"><?= esc($admission['remarks'] ?? '') ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-check-circle"></i> Update Status
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>