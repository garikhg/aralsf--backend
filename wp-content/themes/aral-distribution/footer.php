<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link       https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package    AralDistribution
 * @since      Aral Distribution 1.0
 */
?>
</main><!-- #main -->
</div><!--#primary-->
</div><!-- #content -->

<footer id="colophon" class="w-full bg-primary text-primary-foreground mt-auto">
	<?php get_template_part( 'template-parts/footer/colophon-beta' ); ?>
</footer>
</div><!-- #page -->

<?php get_template_part( 'template-parts/footer/age-checker' ); ?>
<?php wp_footer(); ?>

</body>
</html>
