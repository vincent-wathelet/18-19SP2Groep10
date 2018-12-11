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

      <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
          </div>
       
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
