<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>My Event Details</title>
    <link rel="stylesheet" href="{{ URL::asset('css/EventsCSS.css')}}">
    <script src="{{ URL::asset('js/EventDetails.js')}}"></script>

</head>
<body>

<h1>My Events Details</h1>

<form name="eventform" id="eventform" action="eventdetails.blade.php" method="POST">
        {{ csrf_field() }}
        <div class="left">
            Titel
            <input type="text" name="titel" required><br>
            Categorie
            <input type="text" name="categorie" required><br>

            Start Datum
            <input type="date" id="startdatum" min="2018-11-11" required><br>
            Eind Datum
            <input type="date" id="einddatum" required><br>
            Max aantal inschrijvingen
            <select name="maxinschrijvingen">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select><br>

            Auto Accept
            <input type="checkbox" name="autoaccept" autofocus onlick="return true;" />
        </div>

        <div class="right">
            Computer nodig
            <input type="checkbox" name="computer" checked autofocus onlick="return true;" /><br>

            Lokaal
            <select name="lokaal">
                <option value="A1">Audi 1</option>
                <option value="A2">Audi 2</option>
                <option value="A3">Audi 3</option>
                <option value="A4">Audi 4</option>
            </select>

            <button type="button" id="lokalen">Vrije lokalen</button><br>

            Description<br>
            <textarea rows="4" cols="15" name="description" form="eventform"></textarea>
            <br>
            <button type="save" value="Save" id="save">Save</button>
        </div>


</form>

</body>
</html>
