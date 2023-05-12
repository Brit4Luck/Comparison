(function($) {
  $(document).ready(function() {
    // Load products on page load
    loadProducts().then(function(products) {
      console.log(loadProducts);
      products.forEach(function(product) {
        var html = '<div class="product">';
        html += '<h2>' + product.name + '</h2>';
        html += '<p>' + product.description + '</p>';
        html += '<p>Price: $' + product.price + '</p>';
        html += '<p>Type: ' + product.type_name + '</p>';
        html += '<p>Rating: ' + product.rating + '</p>';
        html += '</div>';
        $('#products').append(html);
      });
    }).catch(function() {
      // Handle error
      alert('Failed to load products');
    });
  
    // Filter products on form submit
    $('form').on('submit', function(event) {
      event.preventDefault();
      loadProducts().then(function(products) {
        // Clear existing products
        $('#products').empty();

        // Append new products
        products.forEach(function(product) {
          var html = '<div class="product">';
          html += '<h2>' + product.name + '</h2>';
          html += '<p>' + product.description + '</p>';
          html += '<p>Price: $' + product.price + '</p>';
          html += '<p>Type: ' + product.type_name + '</p>';
          html += '<p>Rating: ' + product.rating + '</p>';
          html += '</div>';
          $('#products').append(html);
        });
      }).catch(function() {
        // Handle error
        alert('Failed to load products');
      });
    });
  
    function loadProducts() {
      const DEFAULT_URL = 'fetch_products.php';

      var url = DEFAULT_URL;
      var minPrice = $('#min-price').val();
      var maxPrice = $('#max-price').val();
      var search = $('#search').val();
      var typeFilter = $('#type-filter').val();
      var ratingFilter = $('#rating-filter').val();
      
      if (minPrice || maxPrice || search || typeFilter || ratingFilter) {
        // Append filter parameters to URL
        url += '?';
        if (minPrice) {
          url += 'min-price=' + encodeURIComponent(minPrice) + '&';
        }
        if (maxPrice) {
          url += 'max-price=' + encodeURIComponent(maxPrice) + '&';
        }
        if (search) {
          url += 'search=' + encodeURIComponent(search) + '&';
        }
        if (typeFilter) {
          url += 'type=' + encodeURIComponent(typeFilter) + '&';
        }
        if (ratingFilter) {
          url += 'rating=' + encodeURIComponent(ratingFilter) + '&';
        }
      }
      
      // Make GET request to get_products.php with filter parameters
      return new Promise(function(resolve, reject) {
        $.get(url, {
          'min-price': minPrice,
          'max-price': maxPrice,
          'search': search,
          'type': typeFilter,
          'rating': ratingFilter
        }).done(function(data) {
          // Convert data to an array of product objects
          var products = data.map(function(productData) {
           console.log(products);  
            return {
              name: productData.name,
              description: productData.description,
              price: productData.price,
              type_name: productData.type_name,
              rating: productData.rating
            };
          });
          resolve(products);
        }).fail(function() {
          reject();
        });
      });
    }
  });
})(jQuery);
