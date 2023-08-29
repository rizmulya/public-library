
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
                                        <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2">Status Peminjaman</a>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl flex flex-row justify-between">
                            Status Peminjaman
                            <?php Flasher::flash_flowbite(); ?>
                        </h1>
                    </div>
                    <div class="sm:flex">
                        <div class=" items-center mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0">
                            <form class="lg:pr-3" action="<?= BASEURL; ?>/borrow/status" method="POST">
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
                                        Cari berdasarkan no.referensi / tgl / qty / status
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>

                                <a href="<?= BASEURL; ?>/borrow/status" class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100">
                                    <button data-tooltip-target="reset" type="button" >
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
                                    </button>
                                    <div id="reset" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                        reset pencarian
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                                 <button data-tooltip-target="statusz" type="button" >
                                    <a href="<?= BASEURL; ?>/borrow/print_status" class="inline-flex justify-center items-center py-2 px-3 w-1/2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 hover:scale-[1.02] transition-transform sm:w-auto">
                                        <svg class="mr-2 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd"></path></svg>
                                        Export
                                    </a>
                                </button>
                                <div id="statusz" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                    Export status peminjaman ke pdf
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col my-6 mx-4 rounded-2xl shadow-xl shadow-gray-200">
                <div class="overflow-x-auto rounded-2xl">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden shadow-lg">
                            <table class="min-w-full divide-y divide-gray-200 table-fixed">
                                <thead class="bg-white">
                                    <tr>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                                            
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                                            No
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                                            Judul Buku
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                                            Kode buku
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                                            Nomor Referensi
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                                            Tanggal Peminjaman
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                                            QTY
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                                            Status
                                        </th>
                                        <!-- <th scope="col" class="p-4 lg:p-5 ">
                                        </th> -->
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php
                                    $i = $data['pagination']['startData'] + 1; // Mulai menghitung dari nomor yang benar berdasarkan paginasi
                                    foreach ($data['pagination']['paginatedData'] as $datum) : ?>
                                        <tr class="hover:bg-gray-100">
                                            <td class="p-4 w-4 lg:p-5">
                                                <div class="flex items-center">
                                                    <input type="checkbox" name="id_cart[]"  value="<?= $datum['id']; ?>" id="checkbox-1" aria-describedby="checkbox-1" class="w-5 h-5 rounded border-gray-300 focus:ring-0 checked:bg-dark-900">
                                                </div>
                                            </td>
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5">
                                                <?= $i++; ?>
                                            </td>
                                            <td class="flex items-center p-4 mr-12 space-x-6 whitespace-nowrap lg:p-5 lg:mr-0">
                                                <img class="w-8 h-10 rounded" src="<?= BASEURL; ?>/img/books/<?=  $datum['gambar']; ?>" alt="Neil Sims avatar">
                                                <div class="text-sm font-normal text-gray-500">
                                                <div class="text-base font-semibold text-gray-900"><?= $datum['judul']; ?></div>
                                                </div>
                                            </td>
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5"><?= $datum['kode_buku'] ?></td>
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5"><?= $datum['noref'] ?></td>
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5"><?= $datum['tgl'] ?></td>
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5"><?= $datum['qty'] ?></td>
                                            <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap lg:p-5 flex items-center">
                                                <?php if($datum['status'] == 'Terkonfirmasi' || $datum['status'] == 'Dikembalikan'): ?>
                                                    <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div>
                                                <?php else : ?> 
                                                    <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div>
                                                <?php endif; ?>
                                                <?= $datum['status'] ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody> </form>


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
                        <a href="<?= BASEURL; ?>/borrow/status/<?= ($data['pagination']['currentPage'] - 1) ?>" class="inline-flex flex-1 justify-center items-center py-2 px-3 text-sm font-medium text-center text-white bg-gradient-to-br from-dark-700 to-dark-900 rounded-lg shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform">
                            <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            Previous
                        </a>
                    <?php endif; ?>

                    <?php if ($data['pagination']['currentPage'] < $data['pagination']['totalPages']) : ?>
                        <a href="<?= BASEURL; ?>/borrow/status/<?= ($data['pagination']['currentPage'] + 1) ?>" class="inline-flex flex-1 justify-center items-center py-2 px-3 text-sm font-medium text-center text-white bg-gradient-to-br from-dark-700 to-dark-900 rounded-lg shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform">
                            Next
                            <svg class="ml-1 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        </a>
                    <?php endif; ?>
                </div>
            </div>         

            <?php include"status_delete.php"; ?>
    </main>
