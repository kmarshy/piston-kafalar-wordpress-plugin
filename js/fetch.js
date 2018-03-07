jQuery(document).ready(function($){

    
    const  $siteURL = document.location.origin ;


    /*** START: Fetch News 4rm Main Site **/

    const  $callURL = $siteURL + '/wp-json/wp/v2/posts/?categories=269&per_page=4&_embed';
    var    $dataPromise = fetch( $callURL) ;
    console.log($callURL);
   

    $dataPromise
    .then(response=>response.json())
    .then(data=>{
        //console.log(data);
        var  $htmllist = `<hr>
                       <div class="container ">
                            <header class="masthead">
                                    <h4 class="left marT0 marB0">Haberler</h4>
                                    <a class="view-all right" href="http://www.pistonkafalar.com/">Tümünü Gör<i class="icon-angle-right"></i></a>
                                        <div class="clear"></div>
                                </header>
                       </div>
                        
                        <div id="data-container" class="container ">
                        <div class="row">

        `;
        var chck = true;
        for(info in data) {


            let obj = data[info];
            let summary = obj.excerpt.rendered.substr(0,150);
            let imgURL = obj._embedded['wp:featuredmedia']['0'].source_url;
            
            if(chck) {
                $htmllist += `
                        <div class="col-md-6">
                           <div class="panel1"> 
                           <img src="${imgURL }" class="img-responsive" width="550" >
                           <h4><a href="${ obj.link }">${ obj.title.rendered }</a></h4>
                           <p>${ obj.excerpt.rendered }</p>
                            </div> 
                          </div>
                          <div class="col-md-6">
                          <div class="row"> 
                       `;
                chck = false;      
            }
            else {
                $htmllist += `
                   <div class="col-md-12 panel2"> 
                       <div class="image-featured"><img src="${imgURL }" class="img-responsive" width="350" > </div>
                       <div class="text">
                       <h4><a href="${ obj.link }">${ obj.title.rendered }</a></h4>
                       <p>${ summary } [...]</p>
                       </div>
                    </div> 
                `;

            }
            console.log(obj);
            
    
            
        }

        $htmllist += '</div></div></div></div>';

        $('.home .featured-listings').append($htmllist);
   
 
    })
     .catch(error=>{
        console.log('we dont know what is happening');
       
     }) ;
     
     /*** END: Fetch News 4rm Main Site **/

});

     