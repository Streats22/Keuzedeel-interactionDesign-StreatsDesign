<!DOCTYPE html>

<html lang="en">
<head>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-NJW35BN');</script>
  <!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    <meta name="keywords" content="streets design, design, dtp, webdesigner, website maken, ontwerp, bedrijf">
    <meta name="description" 
      content="Neem contact op met ons!">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href="fontawsome/css/all.css" rel="stylesheet">
    <link href="/streatsdesign_js/src/main.js">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
    <title>Contact</title>
  </head>
  <body>
<nav class="flex items-center justify-between flex-wrap hover:bg-white p-6 bg-transparent rounded-brW">
 <div class=" flex items-center flex-shrink-0 text-black mr-6">
  <svg class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54" onclick="hide" ></svg>
  <a href="#"></a>
  <span class="font-semibold text-xl tracking-tight"><img src="StreatsDesign_Logo.jpg" width="40px" height="40px"> </span>
 </div>
 <div class="block lg:hidden">
  <button class="flex items-center px-3 py-2 border rounded text-teal-lighter border-teal-light hover:text-white hover:border-white">
    <svg class="h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
  </button>
 </div>
 <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto" id="nav_menu">
  <div class="text-sm lg:flex-grow">
    <a href="index.html" class="block mt-4 lg:inline-block lg:mt-0 text-gray-400 hover:text-gray-800 hover:overflow-auto mr-4 achtergrond_01">
        Home
      </a>
    <a href="Portfolio.html" class="block mt-4 lg:inline-block lg:mt-0 text-gray-400 hover:text-black mr-4">
      Portfolio
    </a>
    <a href="Pricing.html" class="block mt-4 lg:inline-block lg:mt-0 text-gray-400 hover:text-black mr-4">
      Prijs
    </a>
    <a href="Contact.php" class="block mt-4 lg:inline-block lg:mt-0 text-black hover:text-black hover:overflow-auto mr-4">
      Contact
    </a>
    <a href="Over_ons.html" class="block mt-4 lg:inline-block lg:mt-0 text-gray-400  hover:text-black hover:overflow-auto mr-4">
      Over ons
    </a>
  </div>
 </div>
</nav>
      
    <div class="leading-loose w-full">
  <form class="w-full m-4 p-10 bg-white rounded shadow-xl" action="mail.php" method="POST"> 
    <p class="text-gray-800 font-medium">informatie</p>
    <div class="">
      <label class="block text-sm text-gray-00" for="cus_name">Naam</label>
      <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" name="Naam" type="text" required="" placeholder="Naam" aria-label="Name">
    </div>
    <div class="mt-2">
      <label class="block text-sm text-gray-600" for="cus_email">Email</label>
      <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded"  name="Email" type="text" required="" placeholder="Email" aria-label="Email">
    </div>
    <div class="mt-2">
      <label class=" block text-sm text-gray-600" for="cus_email">Address</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded"  name='Straat'  type="text" required="" placeholder="Straat"  >
    </div>
    <div class="mt-2">
      <label class="hidden text-sm block text-gray-600" for="cus_email">Stad</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded"  name='Stad'   type="text" required="" placeholder="Stad" >
    </div>
    <div class="inline-block mt-2 w-1/2 pr-1">
      <label class="hidden block text-sm text-gray-600" for="cus_email">Land</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded"   name='Land'  type="text" required="" placeholder="Land" >
    </div>
    <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
      <label class="hidden block text-sm text-gray-600" for="cus_email" >Postcode</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name='Postcode'type="text" required="" placeholder="Postcode" >
    </div>
    <div class="mt-2">
    <label class="block text-sm text-gray-600" for="cus_message">Bericht</label>
   
    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded"   name="Bericht" type="text" required="" placeholder="Bericht" >
    <div class="block">
      <br>
    </div>
      <span class="text-gray-700">Wat voor werk zoekt u?</span>
      <div class="mt-2">
        <div>
          <label class="inline-flex items-center">
            <input type="checkbox" class=" form-checkbox text-indigo-600" id='grafischeWerk1' name='grafischeWerk[]' value='Webdesign - wordpress' >
            <span class="ml-2">Webdesign - wordpress</span>
          </label>
        </div>
        <div>
          <label class="inline-flex items-center">
            <input type="checkbox" class=" form-checkbox text-green-500" id='grafischeWerk2' name='grafischeWerk[]' value='Webdesign - gecodeerd of custom' />
            <span class="ml-2">Webdesign - gecodeerd / custom</span>
          </label>
        </div>
        <div>
          <label class="inline-flex items-center">
            <input type="checkbox" class=" form-checkbox text-pink-600" id='grafischeWerk3' name='grafischeWerk[]' value='Groot project' /> 
            <span class="ml-2">Groot project</span>
          </label>
        </div>
      </div>
      <div class="align-middle">
        <div>
          <label class="inline-flex items-center">
            <input type="checkbox" class=" form-checkbox text-yellow-600" id='grafischeWerk4' name='grafischeWerk[]' value='Printwerk' >
            <span class="ml-2">Folder, Flyer, etc</span>
          </label>
        </div>
        <div>
          <label class="inline-flex items-center">
            <input type="checkbox" class=" form-checkbox text-gray-500" id='grafischeWerk5' name='grafischeWerk[]' value='Digitaal werk' />
            <span class="ml-2">Digitaal werk</span>
          </label>
        </div>
        <div>
          <label class="inline-flex items-center">
            <input type="checkbox" class="form-checkbox text-black" id='grafischeWerk6' name='grafischeWerk[]' value='Anders' /> 
            <span class="ml-2">Anders</span>
          </label>
        </div>
      </div>
    </div>
    <br>
    <br>
    <input class="w-24 px-2 py-2 p-6 text-gray-700 bg-aqua rounded"  type="submit" value="Verzenden" > <input class="w-24 px-4 py-2 p-6 text-gray-700 bg-aqua rounded"  type="reset" value="Clear" >

  </form>
</div>
<footer>
    <section>
      <div class="w-full huisstijl-groen 50% text-white lg:table content-center sm:text-center lg:text-left">
        <div class="p-2 lg:w-1/3 py-4 px-2 lg:inline-block ">
          
       <ol class="lg:w-full py-8 px-20 p-20">
        <h1 class="text-lg underline">Social Media</h1> 
         <li>
          <a class="hover:text-black" href="https://www.facebook.com/Streatsdesign/">Facebook 
          </a>
          
         </li>
         <li>
           <a class="hover:text-black" href="https://twitter.com/streatsdesign">Twitter 
           </a>
           
          </li>
          <li>
           <a class="hover:text-black" href="https://www.instagram.com/streatsdesign/">Instagram
           </a>
           
          </li>
       </ol>
       
        </div>
   
        <div class="p-2 lg:w-1/3 py-4 px-2 lg:inline-block ">
         <ol class=" py-8 px-20 p-20">
          <h1 class="text-lg underline">About</h1> 
           <li>
            <a class="hover:text-black" href="Over_ons.html">Company 
            </a>
           </li>
           <li>
             <a class="hover:text-black" href="Portfolio.html">Wat bieden wij?
             </a>
            </li>
            <li>
             <a class="hover:text-black" href="Over_ons.html">KVK
             </a>
            </li>
         </ol>
          </div>
          <div class="p-2 lg:w-1/3 py-4 px-2 lg:inline-block">
           <ol class=" py-8 px-20 p-20">
            <h1 class="text-lg underline">StreatsDesign</h1> 
             <li>
              <a class="hover:text-black" href="Portfolio.html">Portfolio
              </a>
             </li>
             <li>
               <a class="hover:text-black" href="Pricing.html">Prijs 
               </a>
              </li>
              <li>
               <a class="hover:text-black" href="mailto:info@streatsdesign.com">Heeft u vragen? Mail nu!
               </a>
              </li>
           </ol>
            </div>
            <div class="h-2 "></div>
            <h1 class="w-full text-center p-1 italic ">Copyright by StreatsDesign</h1>
      </div>
    </section>
   </section>
</footer> 
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-162701262-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-162701262-1');
 </script>    
</body>
</html>
  