@extends('master')
    @section('content')
    <div class="col-md-8 col-md-offset-2 create-padding">

    	<!-- THE COMMENTS -->
    	<!-- hide these comments if the loading variable is true -->
     <div class="col-md-8 col-md-offset-2" ng-app="songApp" ng-controller="mainController">
        <div ng-include="top_nav_tpl" ng-hide="print_layout"></div>

     	<!-- LOADING ICON -->
     	<!-- show loading icon if the loading variable is set to true -->
     	<div id="loading" ng-show="loading">
            <img src="images/loading1.gif" class="ajax-loader"/>
        </div>

        <!-- NEW COMMENT FORM =============================================== -->
        <form ng-submit="submitSong()"> <!-- ng-submit will disable the default form action and use our function -->

            <!-- AUTHOR -->
            <div class="form-group">
                <input type="text" class="form-control input-lg" id="id" name="id" ng-model="songData.id" placeholder="ID">
            </div>

            <!-- COMMENT TEXT -->
            <div class="form-group">
                <input type="text" class="form-control input-lg" id="title" name="title" ng-model="songData.title" placeholder="Title">
            </div>

            <div class="form-group">
                <input type="text" class="form-control input-lg" id="original_band" name="original_band" ng-model="songData.original_band" placeholder="Original Band or Composer">
            </div>

            <!-- COMMENT TEXT -->
            <div class="form-group">
                <input type="text" class="form-control input-lg" id="description" name="description" ng-model="songData.description" placeholder="Description">
            </div>

            <div class="form-group">
                <input type="text" class="form-control input-lg" id="date_posted" name="date_posted" ng-model="songData.date_posted" placeholder="YYYY:MM:DD 00:00:00">
            </div>

            <!-- SUBMIT BUTTON -->
            <div class="form-group text-right">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
        <div ng-include="btm_nav_tpl" ng-hide="print_layout"></div>
     </div>
    </div>
    @stop