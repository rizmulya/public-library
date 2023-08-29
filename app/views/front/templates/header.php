<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $data['title'] ?></title>
  <link rel="stylesheet" href="<?= BASEURL; ?>/css/tailwind.css" />
  <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css" />
  <link rel="stylesheet" href="<?= BASEURL; ?>/css/flowbite.min.css" />
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" /> -->
</head>
<body>
  <div class="container mx-auto p-5">
    <div class="md:flex md:flex-row md:justify-between text-center text-sm sm:text-base">
      <div class="flex flex-row justify-center">
        <div class="mt-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="rgb(75,85,99)" class="w-8 h-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
          </svg>        
        </div>
        <h1 class="text-3xl text-gray-600 ml-2 mt-1">Rizm</h1>
      </div>
      <div class="mt-2">
        <a href="<?= BASEURL; ?>" class="text-gray-600 hover:text-purple-600 p-4 px-3 sm:px-4">Home</a>
        <a href="<?= BASEURL; ?>#about" class="text-gray-600 hover:text-purple-600 p-4 px-3 sm:px-4">About</a>
        <a href="<?= BASEURL; ?>#join" class="text-gray-600 hover:text-purple-600 p-4 px-3 sm:px-4">Join us</a>
        <a href="<?= BASEURL; ?>/borrow" class="bg-gradient-to-br from-rose-500 to-purple-700 text-white hover:bg-pink-600 hover:from-pink-500 hover:to-purple-600 p-3 px-3 sm:px-5 rounded-full">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9" />
          </svg>
          Borrow books 
        </a>
      </div>
    </div><!-- Main Navigation -->

    
    