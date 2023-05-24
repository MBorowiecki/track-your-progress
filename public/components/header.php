<header class="header">
    <div class="row row_grow">
        <img src="public/assets/logo.svg" alt="logo" class="header_logo">
    </div>

    <div class="row row_vcenter row_hright">
        <?php if($_SERVER['REQUEST_URI'] == '/dashboard') echo '<div class="mr-2"><a class="button_primary" href="new-group">New group</a></div>'; ?>
        <div>
            <?php if(isset($_SESSION['user'])) echo '<a class="button_outline" href="logout">Logout</a>'; ?>
        </div>
    </div>
</header>