<?php include_once 'includes/header.php';
$id = $_GET['id'];
$nome = $_GET['nome']; ?>
<div id="" class="">
    <div class="">
        <h4>Tem certeza?</h4>
        <p>O cliente <b><?php echo $nome; ?></b> será removido do nosso banco de dados.</p>
    </div>
    <div class="" style="display: flex; gap:4px;">
        <a href="../index.php" class="btn green">Cancelar</a>
        <form action="../models/delete_db.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit" name="btn-delete" class="btn red">Deletar</button>
        </form>
    </div>
</div>
<?php include_once 'includes/footer.php'; ?>