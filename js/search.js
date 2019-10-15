  var autocomplete, autocomplete2;

  function initAutocomplete() {

      autocomplete = new google.maps.places.Autocomplete(
          (document.getElementById('autocomplete')), {
              types: ['geocode'],
              componentRestrictions: {
                  country: "fr"
              }
          });
      
       autocomplete2 = new google.maps.places.Autocomplete(
          (document.getElementById('autocomplete2')), {
              types: ['geocode'],
              componentRestrictions: {
                  country: "fr"
              }
          });
      
      autocomplete.addListener('place_changed', fillInAddress);
      autocomplete2.addListener('place_changed', fillInAddress);
  }

  function fillInAddress() {

      document.getElementById("autocomplete").value = autocomplete.getPlace().name;
      document.getElementById("autocomplete2").value = autocomplete2.getPlace().name;

  }
