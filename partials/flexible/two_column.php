<?php
    $bannerside;
    $image;
    $imagesize;
    $subline;
    $content;
    $heading;
    $headingClass;
    $btntext;
    $btnlink;
?>

<div class="two-col-block <?= ($bannerside === "right") ? 'two-col-block--banner-right' : 'two-col-block--banner-left' ?>">
    <div class="wrapper">
        <div class="two-col-block__row">
            <div class="image" style="max-width:<?= $imagesize; ?>">
                <img src="<?php echo lp_theme_url(); ?>/images/<?= $image; ?>" alt="image" class="image__img">
            </div>
            <div class="content typography">
                <h2 class="<?= ($headingClass) ? $headingClass : 'h2' ?>">
                    <?= $heading; ?>
                </h2>
                <?php if($subline): ?>
                <h4>
                    <?= $subline; ?>
                </h4>
                <?php endif; ?>
                <p>
                    <?= $content; ?>
                </p>
                <a href="<?= $btnlink; ?>" class="btn">
                    <?= $btntext; ?>
                </a>
            </div>
        </div>
    </div>
</div>