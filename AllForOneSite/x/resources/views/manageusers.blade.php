@extends('layouts.admin')

@section('content')
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
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Admin</th>
                        <th>banned</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                        @foreach ($users as $user)
                        <tr>    
                           <td>{{ $user['id'] }}</td>

                           <td>{{ $user['name'] }}</td>

                           <td>{{ $user['email'] }}</td>

                           <td>
                               <?php 
                                if($user['admin'] == 0){
                                    echo "No";
                                }elseif($user['admin']){
                                    echo "Yes";
                                }
                               ?>
                           </td>

                           <td>
                                <?php 
                                  if($user['banned'] == 0){
                                        echo "No";
                                    }elseif($user['banned'] == 1){
                                        echo "Yes";
                                    }
                                ?>
                            </td>    

                           <td>
                           <a href="manage-users/edit/{{ $user['id'] }}"> <button class="btn">Edit</button></a>
                                <a href=""> <button class="btn">Delete</button></a>
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
