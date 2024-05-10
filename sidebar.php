<div class="container">
    <div class="row align-items-center gy-3">
        <div class="logo-wrapper col-md-2">
            <div class="logo">
            <?php 
                if(has_custom_logo()){
                    the_custom_logo();
                }
                else {
                    echo '<a class="navbar-brand" href="#"><img src="assets/img/SAQR.png" alt="Theme logo"></a>';
                }
                ?>
            </div>
        </div>
        <div class="mohamdy-portfolio-sidebar col-md-7">
            <?php dynamic_sidebar(  ); ?>
        </div>
        <div class="social col-md-3">
            <ul class="list-unstyled list-inline">
                <li class="list-inline-item"><i class="fab fa-facebook fa-xl"></i></li>
                <li class="list-inline-item"><i class="fab fa-twitter fa-xl"></i></li>
                <li class="list-inline-item"><i class="fab fa-linkedin-in fa-xl"></i></li>
                <li class="list-inline-item"><i class="fab fa-github fa-xl"></i></li>
            </ul>
        </div>
        
    </div>
</div>
<hr>
<div class="container text-center">
    <div class="copy"><?php echo esc_html(get_theme_mod('footer_copy_rights', 'Add your signature from Apperance -> Customize -> Footer settings')); ?></div>
    <!-- <div class="copy">© 2024, Made with <span><i class="fa-solid fa-heart"></i></span> by Mohamed Hamdy</div> -->
</div>