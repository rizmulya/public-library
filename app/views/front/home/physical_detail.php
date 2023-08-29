
      <div class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:inset-0 h-modal sm:h-full" id="physical-modal">
        <div class="relative px-4 w-full max-w-2xl h-full md:h-auto">
          <div class="relative bg-white rounded-2xl shadow-xl shadow-gray-700">
            <div class="flex justify-between items-start p-5 rounded-t border-b">
              <h3 class="text-xl font-bold">
                Detail
              </h3>
            </div>

            <div class="p-6 space-y-6">
                <div class="grid grid-cols-6 gap-6">
                  <div class="col-span-6 sm:col-span-3">
                    <img id="img_book" src="" class="rounded-tl-lg rounded-tr-lg" />
                  </div>
                  <div class="col-span-6 sm:col-span-3">
                    <p class="font-bold">Judul: <div class="mb-2" id="judul"></div> </p> 
                    <p class="font-bold">Kategori: <div class="mb-2" id="kategori"></div> </p>
                    <p class="font-bold">Kode Buku: <div class="mb-2" id="kode_buku"></div> </p>
                    <p class="font-bold">Stok: <div class="mb-2" id="stok"></div> </p>
                    <p class="font-bold">Dipinjam: <div class="mb-3" id="dipinjam"></div> </p>
                    <p class="font-bold">Detail:</p>
                    <p> <div id="detail"></div> </p>
                  </div>
                </div>
                </div>
                <div class="p-6 rounded-b border-t border-gray-200 flex flex-row justify-between">
                  <div class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-2xl text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="physical-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </div>
                </div>
            </div>
          </div>
        </div>
