<?php
/**
 * Template Name: CE Questionnaire(2026)
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

get_header("no-nav"); ?>

<div id="primary" <?php astra_primary_class("ce-questionnaire-page"); ?>>
  <article>
    <header class="entry-header ce-questionnaire-header">
      <section class="ast-container">
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <h2>Scoring System</h2>
        <p>Total Score: 0 to 42</p>
      </section>
    </header>

    <section class="question-set">
      <div class="question-set-container ast-container">
        <div class="score-options-container">
          <ul class="score-options">
            <li><span>0</span><span>Not started or missing</span></li>
            <li><span>1</span><span>In progress or incomplete</span></li>
            <li><span>2</span><span>Complete & verified or not applicable</span></li>
          </ul>
        </div>
        <div class="floating-total">
          <span class="floating-total-score"></span>
        </div>

    <?php
      if( have_rows('category') ): ?>
        <form id="ce-questionnaire">
          <?php
          $question_number = 0;
          while( have_rows('category') ) : the_row();

          // Get parent value.
          $category_title = get_sub_field('category_title');?>
          <h3><?php echo $category_title; ?></h3>
          <?php
          // Loop over sub repeater rows.
          if( have_rows('question') ):
            while( have_rows('question') ) : the_row();
              $question_number++; ?>
              <div class="question">
              <?php
                // Get sub values.
                $question_text = get_sub_field('question_text');
                $question_subtext = get_sub_field('question_subtext'); 
              ?>
                <p class="question-text"><?php echo $question_text; ?></p>
                <p class="question-subtext"><?php echo $question_subtext; ?></p>
                <fieldset>
                  <input type="radio" name="q<?php echo $question_number; ?>" id="q<?php echo $question_number; ?>0" checked value=0>
                  <label for="q<?php echo $question_number; ?>0">0</label>
                  <input type="radio" name="q<?php echo $question_number; ?>" id="q<?php echo $question_number; ?>1" value=1 >
                  <label for="q<?php echo $question_number; ?>1">1</label>
                  <input type="radio" name="q<?php echo $question_number; ?>" id="q<?php echo $question_number; ?>2" value=2 >
                  <label for="q<?php echo $question_number; ?>2">2</label>
                </fieldset>
                <?php
                  $score_messages = get_sub_field('score_messages');
                  $score_0 = $score_messages['score_0'];
                  $score_1 = $score_messages['score_1'];
                  $score_2 = $score_messages['score_2'];
                ?>
                <output>
                  <ul>
                    <li class="score-0" style="display:none;"><?php echo $score_0; ?></li>
                    <li class="score-1" style="display:none;"><?php echo $score_1; ?></li>
                    <li class="score-2" style="display:none;"><?php echo $score_2; ?></li>
                  </ul>
                </output>
              </div>
            <?php 
            endwhile;
          endif;
          endwhile; ?>
          <div class="result">
            <h3>Result</h3>
            <div class="result-comments">
              <div class="total-score">
                <!-- <label for="scoretotal">Total</label> -->
                <output name="scoretotal" ></output>
              </div>
              <div class="total-score-comments-group">
                <?php if( have_rows('results') ): ?>
                <div class="total-score-heading-comments">
                <?php while( have_rows('results') ) : the_row(); ?>
                  <div data-threshold="<?php echo get_sub_field('threshold'); ?>" >
                    <p class="total-score-heading"><?php echo get_sub_field('title'); ?></p>
                    <p class="total-score-comments"><?php echo get_sub_field('text'); ?></p>
                  </div>
                <?php endwhile; ?>
                </div>
                <?php endif; ?>
                <p><a class="primary-button wide-button colour-reversed" href="https://lumisinternational.com/ce-mark-contact/" target="_blank">Contact Now!</a></p>
              </div>
            </div>
          </div>
        </form>
      <?php endif; ?>
      </div>
    </section>
    <section class="people ast-container">
      <h3>Right here at the booth to help you!</h3>
      <?php if ( have_rows('people') ) :?>
      <ul class="people-block">
        <?php while ( have_rows('people') ) : the_row(); ?>
        <li>
          <figure>
            <?php echo wp_get_attachment_image(get_sub_field('photo'), "full"); ?>
          </figure>
          <p><span class="person-name"><?php echo get_sub_field('name'); ?></span><br><?php echo get_sub_field('title'); ?></p>
        </li>
        <?php endwhile; ?>
      </ul>
      <?php endif; ?>
    </section>
    <section class="disclaimer ast-container">
      <p><strong>Disclaimer</strong></p>
      <?php echo wp_kses_post(get_field('disclaimer')); ?>
    </section>
  </article>

</div><!-- #primary -->

<?php get_footer(); ?>
