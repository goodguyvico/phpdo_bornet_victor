<div class="container text-center">
    <h2 class="text-center">Liste Categories</h2>
    <table class="table table-dark table-hover">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($aCategoryCollection as $category):
            ?>
            <tr>
                <td><?php echo $category->getTitle(); ?></td>
                <td><a class="btn btn-outline-light"  href="index.php?action=categoryEdit&id=<?php echo $category->getId();?>">Modifier</a>
                    <a class="btn btn-danger"  href="index.php?action=categoryDelete&id=<?php echo $category->getId()?>">Suppr.</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <a class="btn btn-dark mb-3" href="index.php?action=categoryAdd">AJOUTER</a>
</div>