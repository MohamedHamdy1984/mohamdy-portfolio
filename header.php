<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoHamdy</title>

    <!-- Popins font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <?php wp_head() ?>
</head>

<body>

    <header class="py-3 position-absolute w-100">
        <div class="container mb-3">
            <nav class="navbar nav-pills nav-justified navbar-expand-lg text-bg-dark rounded-5 px-4" data-bs-theme="dark">
                <div class="container">
                    <?php
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        echo '<a class="navbar-brand" href="#"><img src="assets/img/SAQR.png" alt="Theme logo"></a>';
                    }
                    ?>

                    

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <?php wp_nav_menu([
                            'theme_location' => 'top-menu',
                            'container'      => '',
                            'menu_class'     => 'navbar-nav ms-auto mb-2 mb-lg-0',
                            'walker'         => new Mohamdy_Top_Menu_Walker
                        ]) ?>

                    </div> <!-- End collapse -->
                </div><!-- End container -->
            </nav>
        </div>
    </header>