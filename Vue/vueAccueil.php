<?php
?>

<section>
    <h2>Liste des billets</h2>

    <?php if(empty($billets)) : ?>
        <p>Aucun billet pour le moment.</p>
    <?php else : ?>
        <?php foreach($billets as $billet) : ?>
            <article>
                <h3>
                    <a href="index.php?action=billet&id=<?php echo $billet['BIL_ID']; ?>">
                        <?php echo htmlspecialchars($billet['BIL_TITRE']);?>
                    </a>
                </h3>
                <p class="date">
                    Publié le <?php echo $billet['BIL_DATE']; ?>
                </p>
            </article>
        <?php endforeach; ?>

     <?php endif; ?>
</section>