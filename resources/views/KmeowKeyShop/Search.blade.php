<div class="search-place">
    <div class="hide-search"></div>
    <div class="search-content">
        <form id="search-form">
            <input type="text" class="search-box bg-gray-600 text-gray-200 caret-gray-200" id="search-input" placeholder="Search...">
        </form>
        <br>

        <div class="search-items" id="search-results">
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                var searchInput = $('#search-input');
                var searchResults = $('#search-results');

                searchInput.on('keyup', function() {
                    var query = $(this).val();

                    if (query.length >= 1) {
                        // Make an Ajax request to the search route
                        $.ajax({
                            url: '{{ route('search') }}',
                            type: 'GET',
                            data: { query: query },
                            success: function(response) {
                                displayResults(response);
                            }
                        });
                    } else {
                        searchResults.empty();
                    }
                });

                function displayResults(results) {
                    searchResults.empty();

                    if (results.length > 0) {
                        $.each(results, function(index, result) {
                            var link = '/ProductDetail/' + result.product_types.Name + '/' + result.id;
                            var anchor = $('<a href="' + link + '" class="search-item"></a>');
                            var img = $('<img src="{{ asset('ProductImages') }}/' + result.Image + '" alt="">');
                            var title = $('<h3 class="search-title text-2xl max-sm:text-sm mx-2">' + result.Name + '</h3>');
                            var price = $('<h3 class="search-price text-2xl max-sm:text-sm min-w-[3rem]">$ ' + result.Price + '</h3>');

                            anchor.append(img);
                            anchor.append(title);
                            anchor.append(price);
                            searchResults.append(anchor);
                        });
                    } else {
                        searchResults.append('<h3 class="text-light">No results found.</h3>');
                    }
                }
            });
        </script>
    </div>
</div>
