<?php require 'includs/header.inc.php'; ?> <?php require 'includs/navbar.inc.php'; 
$View = new View();?> <section class="container">
    <section id="mainAsideParent"> <?php require 'includs/sidebar.inc.php'; ?> <main> <?php foreach ($View->getArticle(10) as $row):?> <article>
                <section class="aricleimg" style="background-image: url(<?php echo $row['image'];?>);"></section>
                <section>
                    <h2 class="subject" title=<?php echo "'" .$row['subject']. "'";?>><?php echo substr($row['subject'], 0, 60)."..." ;?></h2>
                    <section class="dateTag">
                        <p><?php echo $row['published'];?></p><span>|</span><a href=<?php echo constant("DOMAIN").'pages/categorie.php'; ?>><?php echo $row['categorie'];?></a>
                    </section> <?php echo strip_tags(substr($row['article'], 0, 230), '<p><span><a><h1><h2><h3><h4><h5><h6>')."..." ;?>&nbsp<a class="readMore" href="#">Read more...</a>
                </section>
            </article> <?php endforeach;?> <button class="button">More Postes <i class="fas fa-long-arrow-alt-right"></i></button>
        </main>
    </section>
</section> <?php require 'includs/footer.inc.php'; ?>