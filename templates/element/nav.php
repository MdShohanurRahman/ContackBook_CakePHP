

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Contact Book</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">


        </ul>
        <ul class="navbar-nav ml-auto">
        <?php if($username): ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?=$username ?>

                </a>
            
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                
                    <!-- <div class="dropdown-divider"></div> -->
                    
                    <?= $this->Html->link(__('LogOut'), ['controller'=>'Users','action' => 'logout'], ['class' => 'dropdown-item']) ?>

                </div>
                
            </li>
            <?php else: ?>
            <li class="nav-item dropdown">
            <?= $this->Html->link(__('Login'), ['controller'=>'Users','action' => 'login'], ['class' => 'text-white']) ?>
                </li>
                <?php endif; ?>
        </ul>
    
    </div>
</nav>
