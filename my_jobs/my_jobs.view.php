<?php
    require_once '../setup.php';
    require_once '../includes/header.php'; 
?>
<div class="container">
    <div id="my_jobs" class="row">
    <?php while($job = mysqli_fetch_assoc($result_jobs)): ?>
        <div class="col-sm">
            <div id="card_job" class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?=$job['name']?></h5>
                    <p class="card-text"><?=$job['description']?></p>
                    <p class="card-payment"><?=$job['payment']?> €</p>
                    <a href="<?=APP_URL?>job/?id=<?=$job['id']?>" class="card-link btn btn-primary btn-sm">Ver Trabajo</a>
                    <a href="<?=APP_URL?>delete_job/?id=<?=$job['id']?>" class="card-link float-right btn btn-danger btn-sm">Borrar Trabajo</a>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>
</div>
<?php require_once '../includes/footer.php'; ?>