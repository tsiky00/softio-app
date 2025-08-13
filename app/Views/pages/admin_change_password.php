<!-- Vue pour changer le mot de passe admin -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-warning text-dark fw-bold">Changer le mot de passe</div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>
                    <form method="post" action="<?= base_url('admin/update-password') ?>">
                        <div class="mb-3">
                            <label for="old_password" class="form-label">Ancien mot de passe</label>
                            <input type="password" class="form-control" id="old_password" name="old_password" required>
                        </div>
                        <div class="mb-3">
                            <label for="new_password" class="form-label">Nouveau mot de passe</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirmer le nouveau mot de passe</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        </div>
                        <button type="submit" class="btn btn-warning w-100" id="submitBtn">
                            <span id="spinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                            <span id="btnText">Valider</span>
                        </button>
                    </form>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const form = document.querySelector('form');
                            const btn = document.getElementById('submitBtn');
                            const spinner = document.getElementById('spinner');
                            const btnText = document.getElementById('btnText');
                            if (form) {
                                form.addEventListener('submit', function() {
                                    btn.setAttribute('disabled', 'disabled');
                                    spinner.classList.remove('d-none');
                                    btnText.textContent = 'Chargement...';
                                });
                            }
                        });
                    </script>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>