      <!-- ADD PRODUK -->
      <div class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:inset-0 h-modal sm:h-full" id="add-buku-modal">
        <div class="relative px-4 w-full max-w-2xl h-full md:h-auto">
          <div class="relative bg-white rounded-2xl shadow-xl shadow-gray-700">
            <div class="flex justify-between items-start p-5 rounded-t border-b">
              <h3 class="text-xl font-semibold">
                Tambah Buku
              </h3>
              <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-2xl text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="add-buku-modal">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
              </button>
            </div>

            <div class="p-6 space-y-6">
              <form action="<?= BASEURL ?>/borrow/buku_add" method="POST" enctype="multipart/form-data">
                <div class="grid grid-cols-6 gap-6">
                  <div class="col-span-6 sm:col-span-3">
                    <label for="judul" class="block mb-2 text-sm font-medium text-gray-900">Judul Buku</label>
                    <input type="text" name="judul" id="judul" class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5" placeholder="Apple Imac 27”" required>
                  </div>
                  <div class="col-span-6 sm:col-span-3">
                    <label for="id_kategori" class="block mb-2 text-sm font-medium text-gray-900">Kategori</label>
                    <select name="id_kategori" class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5">
                        <?php foreach ($data['allkategori'] as $kat): ?>
                            <option value="<?= $kat['id']; ?>" ><?= $kat['kategori']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <!-- <input type="text" name="id_kategori" id="id_kategori" class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5" placeholder="Electronics" required> -->
                  </div>
                  <div class="col-span-6 sm:col-span-3">
                    <label for="kode_buku" class="block mb-2 text-sm font-medium text-gray-900">ID</label>
                    <input type="text" name="kode_buku" id="kode_buku" class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5" placeholder="Apple" required>
                  </div>
                  <div class="col-span-6 sm:col-span-3">
                    <label for="stok" class="block mb-2 text-sm font-medium text-gray-900">Stok</label>
                    <input type="number" name="stok" id="stok" class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5" placeholder="$2300" required>
                  </div>
                </div>
                <div class="col-span-full mt-4">
                  <label for="detail" class="block mb-2 text-sm font-medium text-gray-900">Product Details</label>
                  <textarea id="detail" name="detail" rows="6" class="block p-4 w-full text-gray-900 border border-gray-300 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300" placeholder="e.g. 3.8GHz 8-core 10th-generation Intel Core i7 processor, Turbo Boost up to 5.0GHz, Ram 16 GB DDR4 2300Mhz"></textarea>
                </div>
                <div class="flex flex-row justify-between mt-4">
                  <div class="flex justify-center items-center w-1/2">
                    <label class="flex flex-col w-full h-32 rounded border-2 border-gray-300 border-dashed cursor-pointer hover:bg-gray-50">
                      <div class="flex flex-col justify-center items-center pt-5 pb-6">
                        <svg class="w-10 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                          <p class="py-1 text-sm text-gray-600">Upload a file or drag and drop</p>
                          <p class="text-xs text-gray-500">PNG, JPG, JPEG up to 2MB</p>
                      </div>
                      <input type="file" name="gambar" class="hidden" id="imageInput-Add" accept="image/*"/>
                      
                    </label>
                  </div>
                  <div class="flex items-center my-4 space-x-5 justify-center w-1/2">
                    <div id="imagePreview-Add" class="w-full h-full justify-center ml-5 mr-0"></div>
                    <div id="removePreview-Add" style="display: none;" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-2xl text-sm p-1.5 ml-auto inline-flex items-center">
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </div>
                  </div>
                </div>
                </div>
                <div class="p-6 rounded-b border-t border-gray-200 flex flex-row justify-between">
                  <button type="submit" class="w-1/3 text-white font-medium text-sm px-5 py-2.5 text-center rounded-lg bg-gradient-to-br from-pink-500 to-voilet-500 shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform" type="submit">
                    Simpan
                  </button>
                  <div class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-2xl text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="add-buku-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
