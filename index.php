<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Automóviles</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Marcas y Modelos de Automóviles</h1>
    <button id="getBrands">Obtener Marcas</button>
    <div id="brands"></div>
    <div id="models"></div>

    <script>
        $(document).ready(function() {
            $('#getBrands').on('click', function() {
                $.post('cliente.php', { action: 'getBrands' }, function(data) {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        var brandsHtml = '<ul>';
                        $.each(data, function(index, brand) {
                            brandsHtml += '<li><a href="#" class="brand" data-brand="' + brand + '">' + brand + '</a></li>';
                        });
                        brandsHtml += '</ul>';
                        $('#brands').html(brandsHtml);
                    }
                }, 'json');
            });

            $(document).on('click', '.brand', function(e) {
                e.preventDefault();
                var brand = $(this).data('brand');
                $.post('cliente.php', { action: 'getModels', brand: brand }, function(data) {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        var modelsHtml = '<ul>';
                        $.each(data, function(index, model) {
                            modelsHtml += '<li>' + model + '</li>';
                        });
                        modelsHtml += '</ul>';
                        $('#models').html(modelsHtml);
                    }
                }, 'json');
            });
        });
    </script>
</body>
</html>
