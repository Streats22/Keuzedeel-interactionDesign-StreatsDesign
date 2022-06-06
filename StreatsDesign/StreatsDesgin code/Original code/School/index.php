<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href="fontawsome/css/all.css" rel="stylesheet">
    <link href="/streatsdesign_js/src/main.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Thuis</title>
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
        <a href="index.html" class="block mt-4 lg:inline-block lg:mt-0 text-black hover:text-gray-800 hover:overflow-auto mr-4 achtergrond_01">
            Home
          </a>
        <a href="Portfolio.html" class="block mt-4 lg:inline-block lg:mt-0 text-gray-400 hover:text-black mr-4">
          Portfolio
        </a>
        <a href="Pricing.html" class="block mt-4 lg:inline-block lg:mt-0 text-gray-400 hover:text-black mr-4">
          Pricing
        </a>
        <a href="Contact.html" class="block mt-4 lg:inline-block lg:mt-0 text-gray-400 hover:text-black hover:overflow-auto">
          Contact
        </a>
      </div>
      <div>
        <a href="Contact.html"  class="inline-block text-sm px-4 py-2 leading-none border rounded text-black border-black hover:border-transparent hover:text-gray-800 hover:bg-white mt-4 lg:mt-0">Contact now!</a>
      </div>
    </div>
  </nav>
      
      <div class="w-full">
          <img src="StreatsDesign Banner.jpg" alt="None found" class="w-auto h-48 items-center">
        </div>
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
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded"  name="Adress" type="text" required="" placeholder="Straat" >
    </div>
    <div class="mt-2">
      <label class="hidden text-sm block text-gray-600" for="cus_email">Stad</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded"  name="Adress" type="text" required="" placeholder="Stad" >
    </div>
    <div class="inline-block mt-2 w-1/2 pr-1">
      <label class="hidden block text-sm text-gray-600" for="cus_email">Land</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded"  name="Adress" type="text" required="" placeholder="Land" >
    </div>
    <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
      <label class="hidden block text-sm text-gray-600" for="cus_email">Postcode</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded"  name="Adress" type="text" required="" placeholder="Postcode" >
    </div>
    <div class="mt-2">
    <label class="block text-sm text-gray-600" for="cus_message">Bericht</label>
    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded"   name="Bericht" type="text" required="" placeholder="Bericht" >
    <br>
    <br>
    <input class="w-24 px-2 py-2 p-6 text-gray-700 bg-aqua rounded"  type="submit" value="Verzenden" > <input class="w-24 px-4 py-2 p-6 text-gray-700 bg-aqua rounded"  type="reset" value="Clear" >
  </form>
</div>
</body>
</html>
