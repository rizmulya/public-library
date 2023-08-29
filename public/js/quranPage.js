$(function() {
    $("#getSurahButton").on("click", function() {
        var selectedSurah = $("#surahDropdown").val();
        var jsonDataUrl = "https://quran-endpoint.vercel.app/quran/" + selectedSurah;
        
        $.getJSON(jsonDataUrl, function(data) {
            var surahDataDiv = $("#surahData");
            surahDataDiv.empty();
            
            var number = data.data.number;
            var namaSurahShort = data.data.asma.id.short;
            
            var surahHeader = $("<h3>").text("Surah: " + namaSurahShort + " (Number: " + number + ")");
            surahDataDiv.append(surahHeader);
            
            var ayahs = data.data.ayahs;
            var perPage = 10;
            var totalPages = Math.ceil(ayahs.length / perPage);
            
            var currentPage = 1;
            var startIndex = 0;
            var endIndex = perPage;
            
            function renderAyahs() {
                surahDataDiv.empty();
                
                for (var i = startIndex; i < endIndex; i++) {
                    if (i < ayahs.length) {
                        var ayahNumberInSurah = ayahs[i].number.insurah;
                        var ayahTextAr = ayahs[i].text.ar;
                        var ayahTranslationId = ayahs[i].translation.id;
                        
                        var ayahElement = $("<div>").html(
                            "<div class='style=\" lg:mx-8 \" '><p><strong>Ayah " + ayahNumberInSurah + ":</strong></p>" +
                            "<p style='font-family: \"Uthmanic\"; font-size: 30px; text-align: right;'>" + ayahTextAr + "</p>" +
                            "<p>Arti: " + ayahTranslationId + "</p>" +
                            "<hr><br/></div>"
                        );
                        surahDataDiv.append(ayahElement);
                    }
                }
                $(window).scrollTop(0); // Scroll to the top of the page
                
                // Control visibility of "Previous" and "Next" buttons
                $("#prevButton").toggle(currentPage > 1);
                $("#nextButton").toggle(currentPage < totalPages);
            }
            
            renderAyahs();
            
            var prevButton = $("#prevButton");
            var nextButton = $("#nextButton");

            prevButton.on("click", function() {
                if (currentPage > 1) {
                    currentPage--;
                    startIndex -= perPage;
                    endIndex -= perPage;
                    renderAyahs();
                }
            });

            nextButton.on("click", function() {
                if (currentPage < totalPages) {
                    currentPage++;
                    startIndex += perPage;
                    endIndex += perPage;
                    renderAyahs();
                }
            });
        });
    });
});