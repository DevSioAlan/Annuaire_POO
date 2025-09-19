<form method="post" action="index.php?uc=Gerer&action=supprimer">
    <div class="mb-3">
        <label for="id" class="form-label">Choisir un membre à supprimer :</label>
        <select class="form-select" name="id" id="id" required>
            <?php foreach ($les_membres as $un_membre) : ?>
                <option value="<?= $un_membre['id'] ?>">
                    <?= htmlspecialchars($un_membre['nom'] . " " . $un_membre['prenom']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-danger">Valider</button>
</form>
