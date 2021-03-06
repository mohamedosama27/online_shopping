@extends('bar')

@section('content')
<link rel="stylesheet" href="/css/welcome.css">
<link rel="stylesheet" href="/css/item_design.css">

  <!-- Top  Carousel -->
  @if(count($home_images)>0)
<div id="carousel-example-generic" class="carousel slide topCarousel mainCarousel" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
  @foreach($home_images as $home_image)
  @if ($loop->first)
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active">
      <img src={{ URL::asset("images/Logo-2.png")}} width="100%">      

    </li>
    @else
    <li data-target="#carousel-example-generic" data-slide-to="1">
      <img  src={{ URL::asset("images/Logo-2.png")}} width="100%">      

    </li>
    @endif
  @endforeach
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
  @foreach($home_images as $home_image)
  @if ($loop->first)

    <div class="item active" >
    <img class="carouselImg" src={{ URL::asset("images/{$home_image->name}")}} width="100%" >      
    <!-- <div class="carousel-caption">
        <a class="btn  shopnowBtn brandcolor raleway">SHOP NOW</a>
      </div> -->
    </div>
    @else
  
    <div class="item">
    <img class="carouselImg" src={{ URL::asset("images/{$home_image->name}")}} width="100%">      
      <div class="carousel-caption">
        ...
      </div>
    </div>
    @endif
  @endforeach
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic"
   role="button" data-slide="prev">
  <i class="fa fa-3x fa-angle-left"></i>

  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
  <i class="fa fa-3x fa-angle-right" ></i>
  </a>
</div>
@endif
  <!-- End Top  Carousel -->

<br>
  <!-- SHOP LATEST ARRIVALSl SECTION-->

<h3 class="text-center raleway titles" > SHOP LATEST ARRIVALS</h3>
<div class="container">
    <div class="row">
    @foreach($newArrivals as $item)

        <div class="product col-xs-6 col-md-3">

            <div class="productImg">
           
                <img src={{ URL::asset("images/{$item->images->first()->name}")}} width="100%">      
                <button class="btn center-block" data-toggle="modal" data-target="#myModal{{$item->id}}">Quick View</button>
              </div>
               <!-- Modal -->
  <div class="modal fade" id="myModal{{$item->id}}" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content quickview">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <div id="carousel{{$item->id}}" class="carousel topCarousel" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
  @foreach($item->images as $image)
  @if ($loop->first)

    <li data-target="#carousel{{$item->id}}" data-slide-to="0" class="active">
      <img src={{ URL::asset("images/Logo-2.png")}} width="100%">      

    </li>
    @else

    <li data-target="#carousel{{$item->id}}" data-slide-to="1">
      <img  src={{ URL::asset("images/Logo-2.png")}} width="100%">      

    </li>
    @endif
  @endforeach
  </ol>

  <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
        @foreach($item->images as $image)

    @if ($loop->first)
    <div class="item active" >
    <img src={{ URL::asset("images/{$image->name}")}}>
      </div>    
    @else
      <div class="item">
        <img src={{ URL::asset("images/{$image->name}")}}>
        
      </div>
  

  @endif
  @endforeach
          ...
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel{{$item->id}}"
        role="button" data-slide="prev">
        <i class="fa fa-3x fa-angle-left"></i>

        </a>
        <a class="right carousel-control" href="#carousel{{$item->id}}" role="button" data-slide="next">
        <i class="fa fa-3x fa-angle-right" ></i>
        </a>
      </div>      
      </div>

      </div>
      
    </div>
  </div>
  <a href="{{route('item.show',['id' => $item->id])}}"> 
  <p>{{$item->name}}</p>
</a>
            <p>{{$item->price}} LE</p>
            <button class="btn brandcolor raleway btnWeight btn-addtocart" data-value="{{$item->id}}">
              Add To Cart</button><br>
            <a data-value="{{$item->id}}"  class="btn-addToFavorite raleway addtowishlist">
              Add To Wishlist <img  src={{ URL::asset("images/favorite.svg")}} 
              width="12" height="12" >
            </a>

        </div>
       @endforeach
    </div>
</div>
  <!-- END SHOP LATEST ARRIVALSl SECTION IN SM , MD , LG-->


    <!-- START CRAFTSMANSHIP SECTION-->
    <div class="container-fluid">
<section class="craftsmanship hidden-xs">
  <div class="col-xs-9 brandcolor">
      <img src={{ URL::asset("images/Craftsmanship.png")}} class="col-md-4 col-xs-9 CraftsmanshipImg" >  
      <div class="col-sm-6 col-sm-push-6 col-xs-9 raleway">   
        <h3>CRAFTSMANSHIP</h3>
        <p> OMASHA is all about the revival of the world’s rich history, vast cul-
            tures, and art to the betterment of today’s creativity. Each Omasha
            product has a unique provenance with deep cultural associations.
            To manufacture their products, Aya and Mounaz felt compelled to
            take a philanthropic approach to their work by joining forces with arti-
            sans from Egypt, Italy, Spain, and Dubai.
        </p>
      </div> 
  </div>
  <img src={{ URL::asset("images/pattern1.png")}} class="col-xs-2 pull-right pattern" >  

</section>
</div>
    <!-- END CRAFTSMANSHIP SECTION IN SM , MD , LG-->


    <!-- START CRAFTSMANSHIP SECTION IN XS -->

<section class="craftsmanship visible-xs">
    <div class="row">
      <div class="col-xs-9 raleway brandcolor ">   
        <h3>CRAFTSMANSHIP</h3>
        <p> OMASHA is all about the revival of the world’s rich history, vast cul-
            tures, and art to the betterment of today’s creativity. Each Omasha
            product has a unique provenance with deep cultural associations.
            To manufacture their products, Aya and Mounaz felt compelled to
            take a philanthropic approach to their work by joining forces with arti-
            sans from Egypt, Italy, Spain, and Dubai.
        </p>

      </div> 
      <div class="col-xs-6 img pull-right">
      <img src={{ URL::asset("images/Craftsmanship.png")}} class="CraftsmanshipImg pull-right" >  

      </div>

  </div>

  <!-- <img src={{ URL::asset("images/pattern1.png")}} class="col-xs-2 pull-right pattern" >   -->

</section>
    <!-- END CRAFTSMANSHIP SECTION IN-->
<br>
    <!--START OMASHA 'S FAVORITES --> 




    <h3 class="text-center raleway titles favoritestitle" > OMASHA 'S FAVORITES</h3>

  <!-- <div class="container-fluid favoritesSection">
<div class="images center-block">
        <img src={{ URL::asset("images/Fav2.png")}} class="first">  

        <img src={{ URL::asset("images/Fav1.png")}} class="second">  

        <img src={{ URL::asset("images/Fav3.jpg")}} class="third pull-right">

        <img src={{ URL::asset("images/Fav4.jpg")}} class="fourth">  
 
</div>
 
    </div> -->
    <div class="favoritesSection">
      <div class="images center-block">
        <img src={{ URL::asset("images/Square_2.png")}} class="first">  
        <img src={{ URL::asset("images/Square_1.jpeg")}} class="second">  
        <img src={{ URL::asset("images/Fav1.png")}} class="third"> 
      </div>
      <!-- <img src={{ URL::asset("images/Fav1.png")}} class="second">  
      <img src={{ URL::asset("images/Fav1.jpg")}} class="third"> -->
    </div>
    <div class="text-center">
    <a class="btn brandcolor raleway btnWeight" href="{{route('shop')}}">VIEW ALL</a><br>
    </div>

 
    <!--END OMASHA 'S FAVORITES --> 

<br>
    <!-- START DONATE SECTION -->
@if(count($donation) == 2)
<div class="donate brandcolor">
  
  <img class="donate-title" src={{ URL::asset("images/donate_title.png")}} />
  <div class="first-item">
    <img class="item-img" src={{ URL::asset("images/dogs-2.jpg")}} />

    <p>{{$donation[0]->name}}</p>
    <p class="raleway">{{$donation[0]->price}} LE</p>
    <p class="description raleway">{{$donation[0]->description}}</p>
     <button class="btn brandcolor raleway btnWeight btn-addtocart" data-value="{{$donation[0]->id}}">
              Add To Cart</button><br>
            <a class="btn-addToFavorite raleway addtowishlist"  data-value="{{$donation[0]->id}}">
              Add To Wishlist <img  src={{ URL::asset("images/favorite.svg")}} 
              width="12" height="12" >
            </a>
  </div>
  <br>
  <br>
  <br>

  <div class="second-item ">
    <img class="item-img" src={{ URL::asset("images/Cancer.JPG")}} />
    <div class="content">
        <p class="raleway">{{$donation[1]->name}}</p>
        <p class="raleway">{{$donation[1]->price}} LE</p>

        <p class="raleway description">{{$donation[1]->description}}</p>

        <button class="btn brandcolor raleway btnWeight btn-addtocart"  data-value="{{$donation[1]->id}}">
                  Add To Cart</button>
                  <br clear="all">

                <a class="btn-addToFavorite raleway addtowishlist"  data-value="{{$donation[1]->id}}">
                  Add To Wishlist <img  src={{ URL::asset("images/favorite.svg")}} 
                  width="12" height="12" >
                </a>
  </div>
  </div>

  <br>
  <br>
  <br>

</div>
@endif
    <!-- END DONATE SECTION -->

<!-- Start Items -->
<div class="container">
    <div class="row">
    @foreach($items as $item)

        <div class="product col-xs-6 col-md-3">

            <div class="productImg">
           
                <img src={{ URL::asset("images/{$item->images->first()->name}")}} width="100%">      
                <button class="btn center-block" data-toggle="modal" data-target="#myModal{{$item->id}}">Quick View</button>
              </div>
               <!-- Modal -->
  <div class="modal fade" id="myModal{{$item->id}}" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content quickview">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <div id="carousel{{$item->id}}" class="carousel topCarousel" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
  @foreach($item->images as $image)
  @if ($loop->first)

    <li data-target="#carousel{{$item->id}}" data-slide-to="0" class="active">
      <img src={{ URL::asset("images/Logo-2.png")}} width="100%">      

    </li>
    @else

    <li data-target="#carousel{{$item->id}}" data-slide-to="1">
      <img  src={{ URL::asset("images/Logo-2.png")}} width="100%">      

    </li>
    @endif
  @endforeach
  </ol>

  <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
        @foreach($item->images as $image)

    @if ($loop->first)
    <div class="item active" >
    <img src={{ URL::asset("images/{$image->name}")}}>
      </div>    
    @else
      <div class="item">
        <img src={{ URL::asset("images/{$image->name}")}}>
        
      </div>
  

  @endif
  @endforeach
          ...
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel{{$item->id}}"
        role="button" data-slide="prev">
        <i class="fa fa-3x fa-angle-left"></i>

        </a>
        <a class="right carousel-control" href="#carousel{{$item->id}}" role="button" data-slide="next">
        <i class="fa fa-3x fa-angle-right" ></i>
        </a>
      </div>      
      </div>

      </div>
      
    </div>
  </div>
  <a href="{{route('item.show',['id' => $item->id])}}"> 
  <p>{{$item->name}}</p>
</a>
            <p>{{$item->price}} LE</p>
            <button class="btn brandcolor raleway btnWeight btn-addtocart" data-value="{{$item->id}}">
              Add To Cart</button><br>
            <a data-value="{{$item->id}}"  class="btn-addToFavorite raleway addtowishlist">
              Add To Wishlist <img  src={{ URL::asset("images/favorite.svg")}} 
              width="12" height="12" >
            </a>

        </div>
       @endforeach
    </div>
</div>
<!-- End Items -->
<!-- START OMASHA CELEBRITIES SECTION -->
    <div class="celebritiesSection">
    <img class="center-block celebrities-title" src={{ URL::asset("images/Celebrities.png")}} width="270" height="100" >

      <!-- <div class="container center-block"> -->
        <div class="celebritiesDiv center-block">
            <div class="img-div">
              <img src={{ URL::asset("images/AzizMarka.png")}}> 
              <p class="brandcolor text-center battalion">Aziz Marka</p>
            </div>
            <div class="img-div">
              <img src={{ URL::asset("images/ZapTharwat.png")}}>
              <p class="brandcolor text-center battalion">Zap Tharwat</p>

            </div>

            <div class="img-div">
              <img src={{ URL::asset("images/SaraSabry.png")}}> 
              <p class="brandcolor text-center battalion">Sara Sabry</p>
            
            </div>

            <div class="img-div">
              <img src={{ URL::asset("images/Pablo.png")}}>
              <p class="brandcolor text-center battalion">Pablo</p>
            </div>
            <div class="visible-lg">
              <br clear="all" >
            </div>
            <div class="img-div">
              <img src={{ URL::asset("images/Cairokee.png")}}> 
              <p class="brandcolor text-center battalion">Cairokee</p>
            </div>
            <div class="img-div">
              <img src={{ URL::asset("images/ElMotaba3.png")}}>
              <p class="brandcolor text-center battalion">ElMoraba3</p>

            </div>

            <div class="img-div">
              <img src={{ URL::asset("images/MasarEgbari.png")}}> 
              <p class="brandcolor text-center battalion">Masar Egbari</p>
            
            </div>

            <div class="img-div">
              <img src={{ URL::asset("images/Mashro3leila.png")}}>
              <p class="brandcolor text-center battalion">Mashro3 leila</p>
            </div>
            
          </div>
        </div>
</div>
      
</div>
    <br clear="all" >
    <!-- START OMASHA CELEBRITIES SECTION  -->

    <!-- START SHOP COLLECTION SECTION-->
    <div class="container-fluid shopCollection">
    <h3 class="raleway text-center titles">SHOP COLLECTION</h3>
      <div class="center-block">
          <div class="imageDiv ">
            <img src={{ URL::asset("images/Mashro3Leila.png")}}>
            <p>MASHRO3 LEILA</p>
          </div>

          <div class="imageDiv ">
            <img src={{ URL::asset("images/AhmedKamel.png")}}>
            <p>AHMED KAMEL</p>
          </div>

          <div class="imageDiv ">
            <img src={{ URL::asset("images/Englishquotes.png")}}>
            <p>ENGLISH QUOTES</p>
          </div>

          <div class="imageDiv ">
            <img src={{ URL::asset("images/RAP.png")}}>
            <p>RAP</p>
          </div>
          
          <div class="imageDiv ">
            <img src={{ URL::asset("images/Horoscopes.png")}}>
            <p>HOROSCOPES</p>
          </div>

          <div class="imageDiv ">
            <img src={{ URL::asset("images/Socks.png")}}>
            <p>SOCKS</p>
          </div>

          <div class="imageDiv ">
            <img src={{ URL::asset("images/Sharmofers.png")}}>
            <p>SHARMOFERS</p>
          </div>
          
          <div class="imageDiv ">
            <img src={{ URL::asset("images/Pinkfloyd.png")}}>
            <p>PINK FLOYD</p>
          </div>

          <div class="imageDiv ">
            <img src={{ URL::asset("images/Cairokeeee.png")}}>
            <p>CAIROKEE</p>
          </div>

          <div class="imageDiv ">
            <img src={{ URL::asset("images/Masaregbari.png")}}>
            <p>MASAR EGBARI</p>
          </div>

          <div class="imageDiv ">
            <img src={{ URL::asset("images/MixBands.png")}}>
            <p>MIX BANDS</p>
          </div>

          <div class="imageDiv ">
            <img src={{ URL::asset("images/Randomarabic.png")}}>
            <p>RANDOM ARABIC</p>
          </div>

      </div>
    </div>

    <!-- END SHOP COLLECTION SECTION-->


    <!-- START LOGO -->
    <img class="slogo center-block" src={{ URL::asset("images/Slogan.png")}}>

    <!-- END LOGO -->

    <!-- START SUBSCRIBE -->
<div class="subscribe text-center">
  <h6 class="raleway">SUBSCRIBE FOR UPDATES ABOUT NEW ARIVALLS, EXCLUSIVE NEWS, AND SPECIAL SALES</h6>
    <form id="subscribe" class="form-inline" >
   
        <input class="form-control" type="email" name="email" id="email" placeholder="Enter your email">
      <button type="submit" class="btn brandcolor raleway">SUBSCRIBE</button>
      @error('email')
      <br>

                                     <span role="alert" style="color:red;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
    </form>
</div>
<!-- END SUBSCRIBE -->


@include('errormessage')


<script type="text/javascript">


    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
   
$(document).on("click", '.btn-addToFavorite', function(e) {

e.preventDefault();

var id = $(this).data('value');;
$.ajax({

    type: 'POST',

    url: 'addToFavorite',

    data: { id: id },

    success: function(data) {

        $('#messaga').text(data.message)
        $('#errormessage').modal();
        $(".countfavorites").text(data.countFavorites);

    }

});
});

  $(document).on("click", '.btn-addtocart', function(e) { 

        e.preventDefault();

            var str =  $(this).data('value');;
          $.ajax({

            type:'POST',

            url:"{{ route('item.addToCart') }}",

            data:{name:str},

            success:function(data){

              if (data.message === undefined) {

                $(".countCart").text(data.countCart);
                $('#messaga').text("Added Sucessfully")
                $('#errormessage').modal();
                } else {
                $('#messaga').text(data.message)
                $('#errormessage').modal();
                }
                                
            }

          });
    });

   
$('#subscribe').on('submit',function(event){
    event.preventDefault();

    email = $('#email').val();

    $.ajax({
      url: "{{route('createSubscriber')}}",
      type:"POST",
      data:{       
        email:email,
      },
      success:function(response){
        $("#email").val('');
        $('#messaga').text(response.success)
        $('#errormessage').modal();

      },
     });
    });
  </script>
@endsection
