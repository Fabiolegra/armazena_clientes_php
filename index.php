<?php
include_once 'views/includes/header.php';
include_once 'models/config.php';
include_once 'controllers/mensagem.php';
include_once 'controllers/lista_cliente.php';
?>
<div class="input-group" style="margin: 4px 0;">
    <form action="models/search_db.php" method="post" style="display: flex;">
        <input type="search" name="search" class="form-control rounded" placeholder="Email ou telefone do cliente" aria-label="Search" aria-describedby="search-addon">
        <button type="submit" class="btn btn-outline-primary">Pesquisar</button>
    </form>
</div>
<h1 class="" style="color: white;">Lista de Clientes</h1>
<p class="">
    <a href="views/adicionar.php" class="btn waves-effect waves-light">
        <i class="material-icons left">add_circle</i>
        Adicionar Cliente
    </a>
</p>
<table class="table-auto responsive-table" style="margin: 8px 0;">
    <thead class="border border-slate-500" style="background-color: rgb(87 83 78);">
        <tr class="" style="color: rgb(241 245 249);">
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Adicionado</th>
            <th class="my-3">Editar</th>
            <th class="my-3">Remover</th>
        </tr>
    </thead>
    <tbody class="border-collapse border-slate-500 border">
        <?php
        foreach ($clientes as $cliente) :
        ?>
            <tr class=" border border-slate-500" style="color: rgb(241 245 249);">
                <td class=""><?php echo $cliente['nome']; ?></td>
                <td class=""><?php echo $cliente['sobrenome']; ?></td>
                <td class=""><a class="hover:text-blue-500"><?php echo $cliente['email']; ?></a></td>
                <td class=""><a class="hover:text-blue-500"><?php echo $cliente['telefone']; ?></a></td>
                <td class=""><a class="hover:text-blue-500"><?php echo substr($cliente['data_adicionado'], 0, 19);; ?></a></td>
                <td><a href="views/editar.php?id=<?php echo $cliente['id']; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
                <td><a href="views/deletar.php?id=<?php echo $cliente['id']; ?>&nome=<?php echo $cliente['nome']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>
            </tr>
        <?php
        endforeach;
        session_unset();
        ?>
    </tbody>
</table>
<?php
include_once 'views/includes/footer.php'; ?>