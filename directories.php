<?php
    $categories = Category::find_all();
?>
<h2 style="font-weight: bolder;" >Directories</h2>



<nav id="sidebar">

    <ul class="nav nav-pills  nav-sidefeatures">
        <div class="col-lg-41">
        <?php foreach ($categories as $category){?>
            <li>
                <a  href="index.php?cat_id=<?= $category->id?>"><span class="<?= $category->fa_class ?>" ></span> <?= $category->category?></a>
            </li>

        <?php } ?>
        </div>
    </ul>

</nav>