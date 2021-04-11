<div class="bg-dark mb-3">

<section class="container px-0 pb-4 pt-sm-4 px-sm-3">
    <div class="card bg-darkness border-0">
        <img class="card-img-top" height="66%" src="https://picsum.photos/1000/660/?random" alt="">
        <div class="card-body text-white">
            <header>
                <small class="text-uppercase">
                    <span class="text-nacional">Nacional /</span>
                    <span>20 de Agosto de 2018</span>
                </small>
                <h2 class="card-title h2">
                    <a href="#" class="text-white font-weight-bold">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</a>
                </h2>
            </header>
            <div class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Animi, sunt totam adipisci atque enim saepe sapiente veritatis, cupiditate vitae, accusamus dolor temporibus nostrum reiciendis? Animi voluptatibus iure quisquam doloremque aliquid.</div>
        </div>
        <div class="card-footer text-right">
            <a href="#" class="badge badge-pill badge-warning p-2 text-white" data-toggle="tooltip" data-placement="top" title="Imágenes">
                <i class="fas fa-image"></i>
            </a>
            <a href="#" class="badge badge-pill badge-danger p-2" data-toggle="tooltip" data-placement="top" title="Video">
                <i class="fab fa-youtube"></i>
            </a>
            <a href="#" class="badge badge-pill badge-facebook p-2" data-toggle="tooltip" data-placement="top" title="Likes">
                <i class="fas fa-thumbs-up"></i>
                <span class="">4200</span>
            </a> 
        </div>
    </div>    
</section>

<!-- Row 2 -->
<section class="container pb-3 d-sm-none d-md-block">

    <div class="row">
       
        <?php for($i = 1; $i < 4; $i++): ?>
        <div class="col-sm col-md-4 <?= $i <> 2 ?: 'my-3 my-sm-0' ?>">
            <div class="card bg-darkness border-0">
                <img class="card-img-top" height="66%" src="https://picsum.photos/350/250/?random" alt="">
                <div class="card-body text-white">
                    <header>
                        <small class="text-uppercase">
                            <span class="text-nacional">Nacional /</span>
                            <span class="text-nowrap">20 de Agosto de 2018</span>
                        </small>
                        <h2 class="card-title lead">
                            <a href="#" class="text-white font-weight-bold">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</a>
                        </h2>
                    </header>
                </div>
                <div class="card-footer text-right">
                    <a href="#" class="badge badge-pill badge-warning p-2 text-white" data-toggle="tooltip" data-placement="top" title="Imágenes">
                        <i class="fas fa-image"></i>
                    </a>
                    <a href="#" class="badge badge-pill badge-danger p-2" data-toggle="tooltip" data-placement="top" title="Video">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="#" class="badge badge-pill badge-facebook p-2" data-toggle="tooltip" data-placement="top" title="Likes">
                        <i class="fas fa-thumbs-up"></i>
                        <span class="">4200</span>
                    </a> 
                </div>
            </div>            
        </div>
        <?php endfor ?>
        
    </div>
</section>

</div>