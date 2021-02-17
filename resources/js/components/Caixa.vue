<template>


                        <div class="white-box">
                         
                            <h3 class="box-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{titulo}}</font></font></h3>
                            <ul class="list-inline two-part">
                                 <li><a :href="url"><i :class="icone"></i> </a></li>
                                <li class="text-right"><span class="counter"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{qtd}}</font></font></span></li>
                            </ul>
                       
                        </div>
                   
 
</template>

<script>
    export default {
       props:['qtd','titulo','url','cor','icone'],
       computed: {
         defineCor: function(){
           return "background-color: "+this.cor+" !important;"
         }
       },
    }
</script>

<style media="screen">
.bg-aqua {
    background-color: #00c0ef !important;
}

.bg-green{
    background-color: #00a65a !important;
}

.white-box {
    background: #fff;
    padding: 25px;
    margin-bottom: 30px;
}

.small-box:hover{
  text-decoration:none;
  color:#fff;
}



.small-box>.inner {
    padding: 10px;
}

.small-box h3 {
    font-size: 38px;
    font-weight: bold;
    margin: 0 0 10px 0;
    white-space: nowrap;
    padding: 0;
}




.small-box h3, .small-box p {
    z-index: 5;
}

.small-box h3, .small-box p {
    z-index: 5;
}

.small-box p {
    font-size: 15px;
}

p {
    margin: 0 0 10px;
}

.small-box .icon {
    -webkit-transition: all .3s linear;
    -o-transition: all .3s linear;
    transition: all .3s linear;
    position: absolute;
    top: -10px;
    right: 10px;
    z-index: 0;
    font-size: 90px;
    color: rgba(0,0,0,0.15);
}

.small-box:hover .icon {
    font-size: 95px;
}

 .small-box>.small-box-footer {
    position: relative;
    text-align: center;
    padding: 3px 0;
    color: #fff;
    color: rgba(255,255,255,0.8);
    display: block;
    z-index: 10;
    background: rgba(0,0,0,0.1);
    text-decoration: none;
}

 a {
    color: #3c8dbc;
}

.small-box>.small-box-footer:hover{
  color:#fff;
  background:rgba(0,0,0,0.15);
}

a:hover,a:active, a:focus {
  outline: none;
  text-decoration:none;
  color:#72afd2;
}

</style>