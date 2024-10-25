$(document).ready(function() {


    // For VIN btn click event
    $('#vin-btn').on('click', function() {
        event.preventDefault();
        
        var vin = $('#vin-vehicle').val();
        var url = 'https://vpic.nhtsa.dot.gov/api/vehicles/DecodeVin/' + vin + '?format=json';
        console.log(vin);

        fetch(url)
            .then(response => response.json())
            .then(data => {
                var brand = '';
                var model = '';
                var year = '';

                data.Results.forEach(function(item) {
                    if(item.Variable === 'Make') {
                        brand = item.Value;
                    }
                    if(item.Variable === 'Model') {
                        model = item.Value;
                    }
                    if(item.Variable === 'Model Year') {
                        year = item.Value;
                    }
                });

                $('#car-brand').val(brand);
                $('#car-model').val(model);
                $('#car-year').val(year);
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to decode VIN. Please check the VIN and try again.');
            });
    });
});