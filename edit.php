<?php
include_once("templates/header.php");
?>

<div class="container">
    <?php include_once("templates/backbtn.html"); ?>
    <h3 id="main-title">Atualizar contato</h3>
    <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
        <input type="hidden" name="type" value="edit">
        <input type="hidden" name="id" value="<?= $contact['id'] ?>">
        <div class="form-group">
            <label for="name">Nome do Contato:</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Digite o nome" value="<?= $contact['name'] ?>" required>
        </div>
        <div class="form-group">
            <label for="phone">Telefone do Contato:</label>
            <input type="text" name="phone" id="phone" class="form-control" placeholder="Digite o telefone" value="<?= $contact['phone'] ?>" required>
        </div>
        <div class="form-group">
            <label for="observations">Observações do Contato:</label>
            <textarea type="text" name="observations" id="observations" class="form-control" placeholder="Digite as observações" rows="3"><?= $contact['observations'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>

<?php
include_once("templates/footer.php");
?>