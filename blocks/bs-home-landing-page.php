<?php
/**
 * Home Landing Page Block
 */
$heading = get_field('heading');
$industrial_heading = get_field('industrial_heading');
$industrial_info = get_field('industrial_info');
$industrial_link = get_field('industrial_link');
$industrial_image = get_field('industrial_image');
$rural_heading = get_field('rural_heading');
$rural_info = get_field('rural_info');
$rural_link = get_field('rural_link');
$rural_image = get_field('rural_image');

?>
<main class="home">
    <section class="home__bg__images">
        <div class="home__bg__images--image--one" style="background-image:url('<?= $industrial_image['url']; ?>')"></div>
        <div class="home__bg__images--image--two" style="background-image:url('<?= $rural_image['url']; ?>')"></div>
    </section>
    <section class="home__section">
        <section class="home_section--top">
            <div>
                <a href="<?= home_url(); ?>" aria-label="Bison Construction" class="home--logo">
                    <img src="<?= get_template_directory_uri() . '/assets/images/svg/bison-badge.svg'; ?>" alt="Bison Badge" class="logo--bison"/>
                </a>
                <?php if($heading): ?>
                    <h1 class="text--cream"><?= $heading; ?></h1>
                <?php endif; ?>
            </div>
        </section>
        <section class="home__section--columns">
            <div class="home__section--columns--column" >
                 <img src="<?= $rural_image['url']; ?>" alt="bn image" class="image--mobile"/>
                <span>
                <?php if($industrial_heading ): ?>
                    <h2 class="text--cream"><?= $industrial_heading ; ?></h2>
                <?php endif; ?>
                <?php if($industrial_info): ?>
                    <p class="text--cream"><?= $industrial_info; ?></p>
                <?php endif; ?>
                  <?php if($industrial_link): ?>
                    <a href="<?= $industrial_link['url']; ?>" 
                       alt="<?= $industrial_link['title']; ?>" 
                       target="<?= $industrial_link['target'] ? $industrial_link['target'] : '_self'; ?>"
                       class="btn--red"
                       data-attr="industrial"
                    >
                       <?= $industrial_link['title']; ?>
                    </a>
                <?php endif; ?>
                </span>
            </div>
        </section>
        <section class="home__section--columns">
            <div class="home__section__collumns--column">
                <img src="<?= $rural_image['url']; ?>" alt="bn image" class="image--mobile"/>
                <span>
                    <?php if ($rural_heading): ?>
                        <h2 class="text--cream"><?= $rural_heading; ?></h2>
                    <?php endif; ?>
                    
                    <?php if ($rural_info): ?>
                        <p class="text--cream"><?= $rural_info; ?></p>
                    <?php endif; ?>
                    
                    <?php if ($rural_link): ?>
                        <a href="<?= $rural_link['url']; ?>" 
                           alt="<?= $rural_link['title']; ?>" 
                           target="<?= $rural_link['target'] ? $rural_link['target'] : '_self'; ?>"
                           class="btn--red"
                           data-attr="rural"
                        >
                           <?= $rural_link['title']; ?>
                        </a>
                    <?php endif; ?>
                </span>
            </div>

        </section>
    </section>
</main>