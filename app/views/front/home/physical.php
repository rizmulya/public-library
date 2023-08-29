
<main>
    <div class="block justify-between items-center p-4 mx-4 mt-4 mb-6 bg-white rounded-2xl shadow-xl shadow-gray-200 lg:p-5 sm:flex">
        <div class="mb-1 w-full">
            <div class="mb-4">
                <nav class="flex mb-5" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="<?= BASEURL; ?>/borrow" class="inline-flex items-center text-gray-700 hover:text-gray-900">
                                <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                                Home
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2">books</a>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl flex flex-row justify-between">
                    Physical Books
                    <?php Flasher::flash_flowbite(); ?>
                </h1>
            </div>
            <div class="sm:flex">
                <div class=" items-center mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0">
                    <form class="lg:pr-3" action="<?= BASEURL; ?>/borrow/cart" method="POST">
                        <label for="users-search" class="sr-only">Search</label>
                        <div class="relative mt-1 lg:w-64 xl:w-96">
                            <input type="text" name="search" id="users-search" class="border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5" placeholder="Search for buku">
                        </div>
                    </form>

                    <div class="flex pl-0 mt-3 space-x-1 sm:pl-2 sm:mt-0 ">
                        <div href="#" class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100">
                            <button data-tooltip-target="searchBy" type="button" >
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                            </button>
                            <div id="searchBy" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                Cari berdasarkan judul / kode buku / qty
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>

                        <a href="<?= BASEURL; ?>/borrow/cart" class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100">
                            <button data-tooltip-target="reset" type="button" >
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
                            </button>
                            <div id="reset" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                reset pencarian
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </a>
                        <!-- <a href="#" class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg>
                        </a> -->
                    </div>
                </div>
                <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col my-6 mx-4 rounded-2xl ">
        <div class="overflow-x-auto rounded-2xl">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow-lg">
                    <table class="min-w-full divide-y divide-gray-200 table-fixed">
                        <thead class="bg-white">
                            <tr>

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                                <tr class="hover:bg-gray-100">
                                <div class="grid grid-flow-row grid-cols-1 md:grid-cols-3 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10">
                                <?php foreach($data['pagination']['paginatedData'] as $datum) : ?>
                                    <div class="shadow-lg rounded-lg">
                                        <a href="#">
                                            <img src="<?= BASEURL; ?>/img/books/<?= $datum['gambar'] ?>" class="rounded-tl-lg rounded-tr-lg" />
                                        </a>
                                        <div class="p-5">
                                            <h3 class="text-xl text-gray-600 font-semibold mb-2"><a href="#"><?= $datum['judul']; ?></a></h3>
                                            <div class="flex flex-col lg:flex-row justify-between">

                                            <?php if(isset($_SESSION[SESSION_ADMIN]) || (isset($_SESSION[SESSION_USER]))) : ?>
                                                <button  type="button" data-modal-toggle="physical-borrow" data-id="<?= $datum['id'] ?>" class="modalBorrow-Physical bg-gradient-to-r from-red-600 to-pink-500 rounded-full py-2 px-4 my-2 text-sm text-white hover:bg-pink-600 hover:from-pink-600 hover:to-pink-600 flex flex-row justify-center">
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

                                            <button type="button" data-modal-toggle="physical-modal" data-id="<?= $datum['id'] ?>" class="modalDetail-Physical bg-purple-600 rounded-full py-2 px-4 my-2 text-sm text-white hover:bg-purple-700 flex flex-row justify-center" >
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                                View Details
                                            </button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                </div>
                                </tr>
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="items-center p-4 my-4 mx-4 bg-white rounded-2xl shadow-xl shadow-gray-200 sm:flex sm:justify-between">
        <div class="flex items-center mb-4 sm:mb-0">
            <span class="text-sm font-normal text-gray-500">
                Showing 
                <?php if ($data['pagination']['totalPages'] !== 0) : ?>
                    <span class="font-semibold text-gray-900"><?= ($data['pagination']['startData'] + 1) ?>-<?= min($data['pagination']['startData'] + $data['pagination']['perPage'], $data['pagination']['totalData']) ?></span>
                <?php endif; ?>
                of <span class="font-semibold text-gray-900"><?= $data['pagination']['totalData'] ?></span>
            </span>
        </div>
        <div class="flex items-center space-x-3">
            <?php if ($data['pagination']['currentPage'] > 1) : ?>
                <a href="<?= BASEURL; ?>/home/physical/<?= ($data['pagination']['currentPage'] - 1) ?>" class="inline-flex flex-1 justify-center items-center py-2 px-3 text-sm font-medium text-center text-white bg-gradient-to-br from-dark-700 to-dark-900 rounded-lg shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform">
                    <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    Previous
                </a>
            <?php endif; ?>

            <?php if ($data['pagination']['currentPage'] < $data['pagination']['totalPages']) : ?>
                <a href="<?= BASEURL; ?>/home/physical/<?= ($data['pagination']['currentPage'] + 1) ?>" class="inline-flex flex-1 justify-center items-center py-2 px-3 text-sm font-medium text-center text-white bg-gradient-to-br from-dark-700 to-dark-900 rounded-lg shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform">
                    Next
                    <svg class="ml-1 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                </a>
            <?php endif; ?>
        </div>
    </div>         

</main>

<?php include"physical_detail.php"; ?>
<?php include"physical_borrow.php"; ?>