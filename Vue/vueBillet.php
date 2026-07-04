<?php
?>

<section>
    <article>
        <h2><?php echo htmlspecialchars($billet['BIL_TITRE']); ?></h2>
        <p class="date">Publié le <?php echo $billet['BIL_DATE']; ?></p>
        <p><?php echo htmlspecialchars($billet['BIL_CONTENU']); ?></p>
    </article>

    <hr>

    <section>
        <h3>Commentaires (<?php echo count($commentaires); ?>)</h3>

        <?php if (empty($commentaires)) : ?>
            <p>Aucun commentaire pour ce billet.</p>
        <?php else : ?>
            <?php foreach($commentaires as $commentaire) : ?>
                    <div class="commentaire">
                        <strong><?php echo htmlspecialchars($commentaire['COM_AUTEUR']); ?></strong>
                        <span class="date"> - <?php echo $commentaire['COM_DATE']; ?></span>
                        <p><?php echo htmlspecialchars($commentaire['COM_CONTENU']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
    </section>

    <hr>

    <section>
        <h3>Ajouter un commentaire</h3>
        <form action="index.php?action=commenter" method="POST">
            <input type="hidden" name="id" value="<?php echo $billet['BIL_ID']; ?>">

            <label for="auteur">Votre nom :</label>
            <input type="text" id="auteur" name="auteur" required>

            <label for="contenu">Votre commentaire :</label>
            <textarea name="contenu" id="contenu" required></textarea>

            <button type="submit">Publier</button>
        </form>
    </section>
</section>