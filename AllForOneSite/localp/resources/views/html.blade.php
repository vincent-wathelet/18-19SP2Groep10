{{-- <html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">

	<title>SELECT2</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />

	<link rel="stylesheet" href="select222.css">
	<link rel="stylesheet" href=""> --}}
@extends('layout')
	
@section('content')
	<div class="container">
		<div class="row">
            <div class="col-md-3">
                <h4>checkbox</h4>
                <select class="js-select2" multiple="multiple">
                    <option value="O1" data-badge="">Option1</option>
                    <option value="O2" data-badge="">Option2</option>
                    <option value="O3" data-badge="">Option3</option>
                    <option value="O4" data-badge="">Option4</option>
                    <option value="O5" data-badge="">Option5</option>
                    <option value="O6" data-badge="">Option6</option>
                    <option value="O7" data-badge="">Option7</option>
                    <option value="O8" data-badge="">Option8</option>
                    <option value="O9" data-badge="">Option9</option>
                    <option value="O10" data-badge="">Option10</option>
                    <option value="O11" data-badge="">Option11</option>
                    <option value="O12" data-badge="">Option12</option>
                    <option value="O13" data-badge="">Option13</option>
                </select>
            </div>  
            <div class="col-md-9">
                
            </div>      
		</div>
	</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>	
<script>
    $(".js-select2").select2({
        closeOnSelect : false,
        placeholder : "Placeholder",
        allowHtml: true,
        allowClear: true,
        tags: true
    });

    $('.icons_select2').select2({
        width: "100%",
        templateSelection: iformat,
        templateResult: iformat,
        allowHtml: true,
        placeholder: "Placeholder",
        dropdownParent: $( '.select-icon' ),
        allowClear: true,
        multiple: false
    });


    function iformat(icon, badge,) {
        var originalOption = icon.element;
        var originalOptionBadge = $(originalOption).data('badge');
        
        return $('<span><i class="fa ' + $(originalOption).data('icon') + '"></i> ' + icon.text + '<span class="badge">' + originalOptionBadge + '</span></span>');
    }

</script>  
@endsection


</body>
</html>