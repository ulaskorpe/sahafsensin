<div class="container-fluid bg-dark mb-30">
    <div class="row px-xl-5">
       
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Ürün Kategorileri</h6>

                <i class="fa fa-angle-down text-dark"></i>
            </a>
      
            <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                <div class="navbar-nav w-100" id="navbarNavDropdown">

                    @foreach($categories as $cat)
                        @if($cat->subcategory()->count()>0)
                    <div class="nav-item dropdown dropright" >
                        <a href="{{route('category-page',$cat['slug'])}}" class="nav-link"  id="navbarDropdownMenuLink{{$cat['id']}}"  data-toggle="dropdown">{{$cat['name']}} <i class="fa fa-angle-right float-right mt-1"></i></a>
                        <div class="dropdown-menu position-absolute rounded-0 border-0 m-0" aria-labelledby="navbarDropdownMenuLink{{$cat['id']}}">
                            @foreach ($cat->subcategory()->get() as $subcat)
                           
                            <a href="{{route('category-page',$subcat['slug'])}}" onclick="window.open('{{route('category-page',$subcat['slug'])}}','_self')" class="dropdown-item">{{$subcat['name']}}</a>

                      
                            
                            @endforeach
                            
                          
                        </div>
                    </div>
                        @else
                    <a href="{{route('category-page',$cat['slug'])}}" class="nav-item nav-link">{{$cat['name']}}</a>
                        @endif
                    @endforeach

 
                </div>
            </nav>

            

            
        </div>
       
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <span class="h1 text-uppercase text-dark bg-light px-2">Mul44ti</span>
                    <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="index.html" class="nav-item nav-link @if(false)active @endif">Mağazalar</a>
                        <a href="shop.html" class="nav-item nav-link">Son Eklenenler</a>
                        <a href="detail.html" class="nav-item nav-link">Gündem</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Bloglar <i class="fa fa-angle-down mt-1"></i></a>
                            <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                @foreach($blog_categories as $blog_cat)
                                <a href="cart.html" class="dropdown-item">{{$blog_cat['name']}}</a>
                                @endforeach
                            </div>
                        </div>
                  
                    </div>
                    <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                        <a href="" class="btn px-0">
                            <i class="fas fa-heart text-primary"></i>
                            <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                        </a>
                        <a href="" class="btn px-0 ml-3">
                            <i class="fas fa-shopping-cart text-primary"></i>
                            <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>