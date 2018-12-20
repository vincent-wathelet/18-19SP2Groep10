@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{ asset('global/vendor/icheck/icheck.css')}}">
    <link rel="stylesheet" href="{{ asset('global/fonts/font-awesome/font-awesome.css')}}">
@endsection
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
                        <th>Name</th>
                        <th>Acountstatus</th>
                        <th>Accept</th>
                        <th>Refuse</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($entries as $entry)
                        <tr>
                             <td>{{$entry->user->name}}</td>
                             
                             <td class="" >
                                    <i
                                            @if($entry->user->banned == true)
                                            class="icon fa-check-square"
                                            @else
                                           class="fa fa-exclamation-triangle"
                                            @endif
                                            aria-hidden="true"></i>
                                </td>
                                <td>
                                    <div class="checkbox checkbox-default">
                                        <input type="checkbox" name="inputCheckboxes"
                                               @if($entry->bevestigt == true)
                                               checked
                                               @endif
                                        />
                                        <label></label>
                                        <div class="hide entryid">{{$entry->id}}</div>

                                    </div>
                                </td>
                                <td>
                                    <div class="checkbox checkbox-default">
                                        <input type="checkbox" name="inputCheckboxes"
                                               @if($entry->bevestigt == false)
                                               checked
                                               @endif

                                        />
                                        <label></label>
                                        <div class="hide entryid">{{$entry->id}}</div>

                                    </div>
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
<style>
    .checkbox input[type=checkbox], 
    .checkbox-inline input[type=checkbox],
    .radio input[type=radio], .radio-inline input[type=radio] {
        margin-left: 0px !important;
    }
</style>

@endsection

@section('js')
    <script src="{{ asset('global/vendor/icheck/icheck.min.js')}}"></script>
    <script src="{{ asset('global/js/components/icheck.js')}}"></script>
    <script>
        $('[name="inputCheckboxes"]').on('change', function () {
            id = $(this).parent().find('.entryid').html();
            // $.ajax({
            //     url: 'myevents',
            //
            // })

            window.location.href = "{{asset('myevents/accept')}}/" + id;
        })
    </script>
@endsection