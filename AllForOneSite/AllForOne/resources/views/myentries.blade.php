<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Entries</title>
    <link rel="stylesheet" href="{{ URL::asset('css/EventsCSS.css')}}">
    <script src="{{ URL::asset('js/EventDetails.js')}}"></script>

</head>
<body>

<h1>My Entries</h1>

<table>
    <tr>
        <th>Name</th>
        <th data-type="date">Date</th>
        <th>Location</th>
        <th>Accepted</th>
        <th>Archive</th>
    </tr>
    <tr>
        <td>DeepDive S4/HANA</td>
        <td>19-01-2019</td>
        <td>A209</td>
        <td><input type="checkbox" name="accepted" disabled="disabled"/></td>
        <td><button>
            <img src="{{ URL::asset('images/235B97EF-E87E-477B-A501-91AD6CBAE194.png')}}" id="archivebutton">
        </button></td>
    </tr>
    <tr>
        <td>Dungon And Dragons</td>
        <td>08-02-2019</td>
        <td>A0011</td>
        <td><input type="checkbox" name="accepted" checked disabled="disabled"/></td>
        <td><button>
            <img src="{{ URL::asset('images/235B97EF-E87E-477B-A501-91AD6CBAE194.png')}}" id="archivebutton">
        </button></td>
    </tr>
    <tr>
        <td>HAck The Erasmus</td>
        <td>05-04-2019</td>
        <td>C209</td>
        <td><input type="checkbox" name="accepted" disabled="disabled" /></td>
        <td><button>
            <img src="{{ URL::asset('images/235B97EF-E87E-477B-A501-91AD6CBAE194.png')}}" id="archivebutton">
        </button></td>
    </tr>
</table>

</body>
</html>