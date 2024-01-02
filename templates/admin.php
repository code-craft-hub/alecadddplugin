
<div class="wrap">
    <h1>Alecaddd Plugin</h1>
    <?php settings_errors(); ?>

    <form action="options.php" method="post">
        <?php settings_fields( "workhard_group" );
              do_settings_sections( 'alecaddd_plugin' );
              submit_button();  
        ?>
    </form>
</div>