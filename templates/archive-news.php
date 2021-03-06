<?php oed_helpers::get_template_parts( array('_parts/html-header') ); ?>

<a class='news-back' href='/'>voltar para página principal</a>

<section
  class='section section--style-centered location-anchor'
  data-color-point='236, 50, 51'>
  <h1 class='section-title'><?php the_field('news_title', 'options'); ?></h1>
  <article class='news'>

    <div class='news-list'>
      
      <?php $news_query = getNewsQuery('-1', false); ?>
      <?php if ( $news_query->have_posts() ) : while ($news_query->have_posts()) : $news_query->the_post(); ?>
        
        <a target='_blank' href='<?php the_field('link', false, false); ?>' class='news-item'>
          <?php if (get_field('image')) : $image = get_field('image'); ?>
            <div class='news-item-picture'>
              <img src='<?php echo $image['sizes']['medium']; ?>' />
            </div>
          <?php endif; ?>
          <h1 class='news-item-title'><?php the_title(); ?></h1>
          <time class='news-item-date'><?php the_date(); ?></time>
          <div class='news-item-excerpt'><?php the_field('excerpt'); ?></div>
          <p class='news-item-link'><?php the_field('link', false, false); ?></p>
        </a>

      <?php endwhile; endif; ?>

    </div>

    <div id='inscreva-se' class='news-signup-wrapper location-anchor'>
      <section
        class='news-signup'
        data-color-point='236, 50, 51'>
        <p class='news-signup-callout'><?php the_field('newsletter_signup_title', 'options', false); ?></p>
        <a
          class='button news-signup-button'
          href='<?php the_field('newsletter_signup_url', 'options'); ?>'
          target='_blank'>
          inscreva-se na lista
        </a>
        <p class='news-signup-disclaimer'>
          <?php the_field('newsletter_signup_description', 'options', false); ?>
        </p>
      </section>
    </div>

  </article>
</section>

<?php oed_helpers:: get_template_parts( array('_parts/html-footer') ); ?>
