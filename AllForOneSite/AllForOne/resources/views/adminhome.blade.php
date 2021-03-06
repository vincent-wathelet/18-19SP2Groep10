@extends('layouts.admin')

@section('content')
<div class="wrapper">
        <!-- Sidebar Holder -->
       
        @include('layouts.sidebar')
        
        <!-- Page Content Holder -->
        <div id="content">
        
            <nav class="navbar navbar-default">
            <div class="container-fluid">
     
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Naam</th>
                        <th>Categorie Id</th>
                        <th>Lokaal Id</th>
                        <th>Max Inschrijvingen</th>
                        <th>Begin Date</th>
                        <th>End Date</th>
                        <th>Auto Accept</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                        @foreach ($admins as $admin)
                        <tr>
                           <td> {{ $admin['id'] }} </td>

                           <td> {{ $admin['naam'] }} </td>

                           <td> {{ $admin['categorieId'] }} </td>

                           <td> {{ $admin['lokaalId'] }} </td>

                           <td> {{ $admin['maxInschrijvingen'] }} </td>

                           <td> {{ $admin['begindate'] }} </td>

                           <td> {{ $admin['enddate'] }} </td>

                           <td> {{ $admin['autoaccept'] }} </td>

                           <td>
                               <a href="admin-homepage/edit/{{ $admin['id'] }}"> <button class="btn"  >Edit </button></a>
                               <a href="admin-homepage/{{ $admin['id'] }}"> <button class="btn"  >Reload </button></a>
                                <button class="btn"  >Delete </button>
                           </td>
                        </tr>   
                        @endforeach
                    
                </tbody>
            </table>
    
            
         </div>
        </div>

<script>
    $(document).ready(function() {
        $("#sidebarCollapse").on("click", function() {
        $("#sidebar").toggleClass("active");
        $(this).toggleClass("active");
        });
    });
</script> 
@endsection
