

    <form method="post" class="my-7">
    <div class="flex flex-col lg:flex-row">
        <label for="surahDropdown" class="mr-3 mt-3 mb-3 lg:mb-0">Select Surah:</label>
            <select name="surahDropdown" id="surahDropdown" class="border border-gray-300 rounded-md px-3 py-0 mb-3 lg:mb-0">
                <?php
                $surahDataUrl = 'https://quran-endpoint.vercel.app/quran';
                $surahData = json_decode(file_get_contents($surahDataUrl), true);

                foreach ($surahData['data'] as $surah) {
                    $number = $surah['number'];
                    $namaSurahShort = $surah['asma']['id']['short'];
                    echo "<option value='$number'>$number - $namaSurahShort</option>";
                }
                ?>
            </select>
            <button type="button" id="getSurahButton" class="bg-gradient-to-r from-red-600 to-pink-500 rounded-full py-2 px-4 my-2 mx-3 text-sm text-white hover:bg-pink-600 hover:from-pink-600 hover:to-pink-600 flex-row justify-center">Select</button>
        </div>
    </form>

    
    <div id="surahData"></div>
    <div class="flex flex-col lg:flex-row justify-center">
        <button id="prevButton" class="hidden bg-gradient-to-r from-red-600 to-pink-500 rounded-full py-2 px-4 my-2 mx-1 text-sm text-white hover:bg-pink-600 hover:from-pink-600 hover:to-pink-600 flex-row justify-center">
            < previous
        </button>
        <button id="nextButton" class="hidden bg-purple-600 rounded-full py-2 px-4 my-2 mx-1 text-sm text-white hover:bg-purple-700 flex-row justify-center">
            next >
        </button>
    </div>
    