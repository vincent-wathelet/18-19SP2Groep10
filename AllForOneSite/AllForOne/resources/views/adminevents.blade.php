@extends('layouts.admin')

@section('content')
<!--
* adminevents.blade.php
* Author: Abdelali Ez Zyn
* Last update: 20/12/2018
-->
<div class="wrapper">
        <!-- Sidebar Holder -->
       
        @include('layouts.sidebar')
        
        <!-- Page Content Holder -->
        <div id="content">
                @include('layouts.icon')
            <nav class="navbar navbar-default">
            <div class="container-fluid">
     
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Category ID</th>
                        <th>Lokaal ID</th>
                        <th>Max Subscriptions</th>
                        <th>Startdate</th>
                        <th>Enddate</th>
                        <th>Autoaccept</th>
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

                           <td>{{--  {{ $admin['begindate'] }} --}} 

                                <?php $newDate = date("m-d-Y H:i:s", strtotime($admin['begindate']));
                                echo $newDate."\n"; ?>
                           </td>

                           <td> {{-- {{ $admin['enddate'] }} --}} 
                                <?php $newDate = date("m-d-Y H:i:s", strtotime($admin['enddate']));
                                echo $newDate."\n"; ?>
                           </td>

                           <td> {{ $admin['autoaccept'] }} </td>

                           <td>
                               <a href="edit-events/edit/{{ $admin['id'] }}"> <button class="btn"  >Edit </button></a>
                               <a href="edit-events/{{ $admin['id'] }}"> <button class="btn"  >Approval </button></a>
                               <a href="edit-events/delete/{{ $admin['id'] }}"><button class="btn">Delete</button></a>
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