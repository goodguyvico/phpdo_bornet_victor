<!-- les formulaires d'ajout et d'édition sont concentrer sur la meme page gràce aux conditions !-->
<h3 class="text-center"><?php if ($_GET["action"] == "produitsEdit"):
        echo "Formulaire édition";
    else:
        echo "Formulaire d'ajout";
    endif; ?></h3>
<!-- Condition pour afficher les erreurs de saisie!-->
<?php if (!empty($errorMsg) && count($errorMsg) > 0) :
    foreach ($errorMsg as $msg) : ?>
        <div class="alert alert-danger text-center"><?php echo $msg; ?></div>
    <?php
    endforeach;
endif; ?>

<div class="col-8 card mx-auto mt-3 shadow">
    <div class="card-body">
        <form action="" method="post">
            <label for="title" class="form-label">Nom</label>
            <input class="form-control" id="title" name="title" type="text" value="<?php
            if ($_GET['action'] == "produitsEdit" && (empty($_POST))):
                echo $product->getTitle();
            elseif ($_GET['action'] == "produitsEdit" && !empty($_POST)):
                echo $_POST['title'];
            endif; ?>"/>
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4"><?php
                if ($_GET['action'] == "produitsEdit" && (empty($_POST))):
                    echo $product->getDescription();
                elseif ($_GET['action'] == "produitsEdit" && !empty($_POST)):
                    echo $_POST['description'];
                endif; ?></textarea>
            <label for="picture" class="form-label">Image</label>
            <input class="form-control" id="picture" name="picture" type="text" value="<?php
            if ($_GET['action'] == "produitsEdit" && (empty($_POST))):
                echo $product->getPicture();
            elseif ($_GET['action'] == "produitsEdit" && !empty($_POST)):
                echo $_POST['picture'];
            endif; ?>" />
            <label for="price" class="form-label">Prix</label>
            <input class="form-control" id="price" name="price" type="number" value="<?php
            if ($_GET['action'] == "produitsEdit" && (empty($_POST))):
                echo $product->getPrice();
            elseif ($_GET['action'] == "produitsEdit" && !empty($_POST)):
                echo $_POST['price'];
            endif; ?>" />


            <label for="category" class="form-label">Category</label>
            <input class="form-control" id="category" name="category" type="number" value="<?php
            if ($_GET['action'] == "produitsEdit" && (empty($_POST))):
                echo $product->getCategory();
            elseif ($_GET['action'] == "produitsEdit" && !empty($_POST)):
                echo $_POST['category'];
            endif; ?>" />

            <input type="hidden" name="id" id="id" value="<?php
            if ($_GET['action'] == "produitsEdit" && (empty($_POST))):
                echo $product->getId();
            elseif ($_GET['action'] == "produitsEdit" && !empty($_POST)):
                echo $_POST['id'];
            endif ?>"/>
            <button class="btn btn-dark mt-3" type="submit" name="valid" value="valid">
                <?php
                if ($_GET["action"] == "produitsEdit"):
                    echo "Editer";
                else:
                    echo "Ajouter"; endif;?>
            </button>
        </form>
    </div>
</div>
</div>
