<?php
include_once 'includes/header.php';
include_once '../models/config.php';
include_once '../controllers/mensagem.php';
include_once '../controllers/selecionar_id.php'
?>
<!-- formulario.html -->
<div>
    <h1 class="">Editar Cliente</h1>
    <form action="../controllers/valida_update.php" method="post" class="form">
        <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">
        <label class="" for="nome">Nome:</label><br />
        <input class="validate" type="text" id="nome" name="nome" required class="form-control" placeholder="Fabio" value="<?php echo $cliente['nome']; ?>" />
        <label for="sobrenome">Sobrenome:</label><br />
        <input type="text" id="sobrenome" name="sobrenome" required class="form-control" placeholder="Argel" value="<?php echo $cliente['sobrenome']; ?>" />
        <label for="email">Email:</label><br />
        <input type="email" id="email" name="email" required class="form-control" placeholder="exemplo@email.com" value="<?php echo $cliente['email']; ?>" />
        <label for="telefone">Telefone:</label><br />
        <input class="form-control" type="tel" pattern="[0-9()-]{1,15}" id="telefone" name="telefone" title="Apenas números. Máximo de 15 dígitos." required placeholder="55555555555" value="<?php echo $cliente['telefone']; ?>" />
        </br>
        <button class="btn" name="btn-cadastrar" type="submit">Atualizar<i class="material-icons right">send</i></button>
        <a href="../index.php" class="btn green">Ver clientes<i class="material-icons right">visibility</i></a>
    </form>
</div>
<?php
include_once 'includes/footer.php'; ?>