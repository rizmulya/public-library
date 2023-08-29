

      <div class="md:flex md:flex-row lg:mt-0 mt-20">
        <div class="md:w-2/5 flex flex-col justify-center items-center">
          <h2 class="font-serif text-5xl text-gray-600 mb-4 text-center md:self-start md:text-left" id="about">Rizm public library</h2>
          <p class="uppercase text-gray-600 tracking-wide text-center md:self-start md:text-left">Explore, Discover, and Learn.</p>
          <p class=" text-gray-600 tracking-wide md:self-start md:text-left mb-5">Your Gateway to Knowledge <br>at the Public Library</p>
          <a href="<?= BASEURL; ?>#readNow" class="bg-gradient-to-r from-red-600 to-pink-500 rounded-full py-4 px-8 text-gray-50 uppercase text-xl md:self-start my-5">Read Now</a>
        </div>
        <div class="md:w-3/5">
          <img src="<?= BASEURL; ?>/img/books.webp" class="w-full" />
        </div>
      </div><!-- Hero sectioin -->

      <div class="my-20">
        <div class="flex flex-row justify-between my-5">
          <h2 class="text-3xl" id="readNow">Physical books</h2>
          <a href="<?= BASEURL; ?>/home/physical" class="flex flex-row text-lg hover:text-purple-700">
            View All
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
          </a>
        </div>
      <div class="grid grid-flow-row grid-cols-1 md:grid-cols-3 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10">

        <?php for($i=0; $i<3; $i++) : ?>
        <?php $buku = $data['pagination']['paginatedData'][$i]; ?>
        <div class="shadow-lg rounded-lg">
          <a href="#">
            <img src="<?= BASEURL; ?>/img/books/<?= $buku['gambar'] ?>" class="rounded-tl-lg rounded-tr-lg" />
          </a>
          <div class="p-5">
            <h3 class="text-xl text-gray-600 font-semibold mb-2"><a href="#"><?= $buku['judul']; ?></a></h3>
            <div class="flex flex-col lg:flex-row justify-between">

              <?php if(isset($_SESSION[SESSION_ADMIN]) || (isset($_SESSION[SESSION_USER]))) : ?>
                <button  type="button" data-modal-toggle="physical-borrow" data-id="<?= $buku['id'] ?>" class="modalBorrow-Physical2 bg-gradient-to-r from-red-600 to-pink-500 rounded-full py-2 px-4 my-2 text-sm text-white hover:bg-pink-600 hover:from-pink-600 hover:to-pink-600 flex flex-row justify-center">
              <?php else : ?>
                <a  href="<?= BASEURL; ?>/borrow/validate" class="bg-gradient-to-r from-red-600 to-pink-500 rounded-full py-2 px-4 my-2 text-sm text-white hover:bg-pink-600 hover:from-pink-600 hover:to-pink-600 flex flex-row justify-center">
              <?php endif; ?>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9" />
                </svg>
                Borrow
              <?php if(isset($_SESSION[SESSION_ADMIN]) || (isset($_SESSION[SESSION_USER]))) : ?>
                </button>
              <?php else : ?>
                </a>
              <?php endif; ?>

              <button type="button" data-modal-toggle="physical-modal" data-id="<?= $buku['id'] ?>" class="modalDetail-Physical bg-purple-600 rounded-full py-2 px-4 my-2 text-sm text-white hover:bg-purple-700 flex flex-row justify-center" >
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                  View Details
              </button>
            </div>
          </div>
        </div>
        <?php endfor; ?>

      </div>
    </div> <!-- Physical books -->

    <div class="my-20">
        <div class="flex flex-row justify-between my-5">
          <h2 class="text-3xl" id="readNow">E-books</h2>
          <a href="#" class="flex flex-row text-lg hover:text-purple-700">
            View All
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
          </a>
        </div>
      <div class="grid grid-flow-row grid-cols-1 md:grid-cols-3 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10">
        <div class="shadow-lg rounded-lg">
          <a href="#">
            <img src="<?= BASEURL; ?>/img/books/quran.jpg" class="rounded-tl-lg rounded-tr-lg" />
          </a>
          <div class="p-5">
            <h3 class="text-xl text-gray-600 font-semibold mb-2"><a href="#">Holy Quran</a></h3>
            <div class="flex flex-col lg:flex-row justify-between">
              <a href="<?= BASEURL; ?>/quran" class="bg-gradient-to-r from-red-600 to-pink-500 rounded-full py-2 px-4 my-2 text-sm text-white hover:bg-pink-600 hover:from-pink-600 hover:to-pink-600 flex flex-row justify-center" >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9" />
                </svg>
                Read Now
              </a>
              <a href="<?= BASEURL; ?>/quran" class="bg-purple-600 rounded-full py-2 px-4 my-2 text-sm text-white hover:bg-purple-700 flex flex-row justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
                View Details
              </a>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- Holy books -->



    <div class="rounded-lg shadow-lg my-20 flex flex-row" id="join">
      <div class="lg:w-3/5 w-full bg-gradient-to-r from-black to-purple-900 lg:from-black lg:via-purple-900 lg:to-transparent rounded-lg text-gray-100 p-12">
        <div class="lg:w-1/2">
          <h3 class="text-2xl font-extrabold mb-4">Be the First to Know!</h3>
          <p class="mb-4 leading-relaxed">Interested in staying updated on our latest borrowing opportunities? Join our library community by signing up for notifications, and we'll let you know every time there's a new book to borrow.</p>
          <div>
            <input type="email" placeholder="Enter email address" class="bg-gray-600 text-gray-200 placeholder-gray-400 px-4 py-3 w-full rounded-lg focus:outline-none mb-4" />
            <button type="submit" class="bg-red-600 py-3 rounded-lg w-full">Subscribe</button>
          </div>
        </div>
      </div>
      <div class="lg:w-2/5 w-full lg:flex lg:flex-row hidden">
        <img src="<?= BASEURL; ?>/img/kind.png" class="h-96" />
      </div>
    </div><!-- Newsletter Section -->

    <?php include"physical_detail.php"; ?>
    <?php include"physical_borrow.php"; ?>


