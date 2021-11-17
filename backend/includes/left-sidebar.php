<nav class="sidenav shadow-right sidenav-light">
    <div class="sidenav-menu">
        <div class="nav accordion" id="accordionSidenav">
            <?php 
                if ($curr_page == 'index.php') { ?>
                    <a class="nav-link collapsed pt-4 active" href="index.php">
                        <div class="nav-link-icon"><i data-feather="activity"></i></div>
                        Dashboard
                    </a>
                <?php } else { ?>
                    <a class="nav-link collapsed pt-4" href="index.php">
                        <div class="nav-link-icon"><i data-feather="activity"></i></div>
                        Dashboard
                    </a>
                <?php }
            ?>
            <?php 
                if ($curr_page == 'all-post.php' || $curr_page== 'add-new.php' || $curr_page == 'edit-post.php') { ?>
                    <a class="nav-link active" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"><div class="nav-link-icon"><i data-feather="layout"></i></div>
                        Posts
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse show" id="collapseLayouts" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
                            <a class="nav-link" href="all-post.php">All Posts</a>
                            <a class="nav-link" href="add-new.php">Add New Post</a>
                        </nav>
                    </div>
                <?php } else { ?>
                    <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"><div class="nav-link-icon"><i data-feather="layout"></i></div>
                        Posts
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
                            <a class="nav-link" href="all-post.php">All Posts</a>
                            <a class="nav-link" href="add-new.php">Add New Post</a>
                        </nav>
                    </div>
                <?php }
            ?>

            <?php 
                if ($curr_page == 'categories.php' || $curr_page == 'new-category.php' || $curr_page == 'edit-category.php') { ?>
                    <a class="nav-link active" href="categories.php" ><div class="nav-link-icon"><i data-feather="chevrons-up"></i></div>
                        Categories
                    </a>
                <?php } else { ?>
                    <a class="nav-link" href="categories.php" ><div class="nav-link-icon"><i data-feather="chevrons-up"></i></div>
                        Categories
                    </a>
                <?php }
            ?>

            <a class="nav-link" href="pages.php" ><div class="nav-link-icon"><i data-feather="book-open"></i></div>
                Pages
            </a>

            <?php 
                if ($curr_page == 'users.php' || $curr_page == 'new-user.php' || $curr_page == 'user-update.php') { ?>
                    <a class="nav-link active" href="users.php" ><div class="nav-link-icon"><i data-feather="users"></i></div>
                        Users
                    </a>
                <?php } else { ?>
                    <a class="nav-link" href="users.php" ><div class="nav-link-icon"><i data-feather="users"></i></div>
                        Users
                    </a>
                <?php }
            ?>

            <a class="nav-link" href="comments.php" ><div class="nav-link-icon"><i data-feather="package"></i></div>
                Comments
            </a>
            <?php 
                if ($curr_page == 'messages.php' || $curr_page == 'reply.php') { ?>
                    <a class="nav-link active" href="messages.php" ><div class="nav-link-icon"><i data-feather="mail"></i></div>
                        Messages
                    </a>
                <?php } else { ?>
                    <a class="nav-link" href="messages.php" ><div class="nav-link-icon"><i data-feather="mail"></i></div>
                        Messages
                    </a>
                <?php }
            ?>
            

            <a class="nav-link" href="profile.php" ><div class="nav-link-icon"><i data-feather="user"></i></div>
                Profile
            </a>
        </div>
    </div>

    <div class="sidenav-footer">
        <div class="sidenav-footer-content">
            <?php 
                if (isset($_COOKIE['_uid_'])) {
                    $user_id = base64_decode($_COOKIE['_uid_']);
                } elseif (isset($_SESSION['user_id'])) {
                    $user_id = $_SESSION['user_id'];
                } else {
                    $user_id = -1;
                }

                $sql = "SELECT * FROM users WHERE user_id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':id' => $user_id
                ]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                $user_name = $user['user_name'];                
            ?>
            <div class="sidenav-footer-subtitle">Logged in as:</div>
            <div class="sidenav-footer-title"><?php echo $user_name; ?></div>
        </div>
    </div>

</nav>