<?php
include_once("templates/header.php");
?>

<div class="container">
    <?php include_once("templates/backbtn.html"); ?>
    <h3 id="main-title">Novo contato</h3>
    <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
        <input type="hidden" name="type" value="create">
        <div class="form-group">
            <label for="name">Nome do Contato:</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Digite o nome" required>
        </div>
        <div class="form-group">
            <label for="phone">Telefone do Contato:</label>
            <input type="text" name="phone" id="phone" class="form-control" placeholder="Digite o telefone" required>
        </div>
        <div class="form-group">
            <label for="observations">Observações do Contato:</label>
            <textarea type="text" name="observations" id="observations" class="form-control" placeholder="Digite as observações" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>

<?php
include_once("templates/footer.php");
?>