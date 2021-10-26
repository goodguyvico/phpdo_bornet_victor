<div class="container text-center">
    <h2 class="text-center">Liste Produits</h2>
    <a class="btn btn-dark mb-3" href="index.php?action=produitsAdd">AJOUTER</a>
    <table class="table table-dark table-hover">
        <thead>
        <tr>
            <th>Image</th>
            <th>Noms</th>
            <th>Prix</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($aProductCollection as $product):
            ?>
            <tr>
                <td><img src="<?php $product->getPicture()?>" alt=""/></td>
                <td><?php echo $product->getTitle(); ?></td>
                <td><?php echo $product->getPrice();?></td>
                <td><a class="btn btn-outline-light"  href="index.php?action=produitsEdit&id=<?php echo $product->getId();?>">Modifier</a>
                    <a class="btn btn-danger"  href="index.php?action=produitsDelete&id=<?php echo $product->getId()?>">Suppr.</a></tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>