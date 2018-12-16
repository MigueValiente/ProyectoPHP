<?php
    require_once '../setup.php';
    require_once '../includes/header.php'; 
    require_once '../functions/helpers.php';
?>

<div class="container">
    <div class="offset-3 col-6 pt-4 pb-4">
        <?php if( $job ): ?>
        <h2><?=$job['name']?></h2>
        <h4>Descripcion</h4>
        <p><?=$job['description']?></p>
        <h4>Salario</h4>
        <p><?=$job['payment']?>€</p>
        <p class="text-right"><a href="<?=APP_URL?>edit_job/?id=<?=$job['id']?>"><i class="fas fa-edit"></i></a></p>
        <?php endif; ?>
        
        
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>