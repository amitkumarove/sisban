<?php
$testimonial = get_field('testimonial_block');
?>

<?php if($testimonial || get_sub_field('text')) : ?>
<div class="testimonial">
    <div class="testimonial__inner">
        <div class="testimonial__inner__content">
            <?php echo get_sub_field('text') ? get_sub_field('text') : $testimonial['text']; ?>
        </div>
        <p class="name"><?php echo get_sub_field('person_name')? get_sub_field('person_name') : $testimonial['person_name']; ?></p>
        <p class="post"><?php echo get_sub_field('job_title') ? get_sub_field('job_title') : $testimonial['job_title']; ?></p>
    </div>
</div>
<?php endif; ?>
