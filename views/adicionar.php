<?php
include_once 'includes/header.php';
include_once '../controllers/mensagem.php'
?>
<!-- formulario.html -->
<div>
    <h1 class="light">Adicionar Cliente</h1>
    <form action="../controllers/valida_add.php" method="post" class="form">
        <label for="nome">Nome:</label><br />
        <input type="text" id="nome" name="nome" required class="form-control" placeholder="Fabio" />
        <label for="sobrenome">Sobrenome:</label><br />
        <input type="text" id="sobrenome" name="sobrenome" required class="form-control" placeholder="Argel" />
        <label for="email">Email:</label><br />
        <input type="email" id="email" name="email" required class="form-control" placeholder="exemplo@email.com" />
        <label for="telefone">Telefone:</label><br />
        <input class="form-control" type="tel" pattern="[0-9()+-]{1,11}" id="telefone" name="telefone" title="Apenas números. Máximo de 15 dígitos." required placeholder="55555555555" />
        </br>
        <button class="btn" name="btn-cadastrar" type="submit">Cadastrar<i class="material-icons right">send</i></button>
        <a href="../index.php" class="btn green">Ver clientes<i class="material-icons right">visibility</i></a>
    </form>
</div>
<?php
include_once 'includes/footer.php'; ?>