@extends('master')
    @section('content')

    <div class="col-md-8 col-md-offset-2">

    	<!-- THE COMMENTS -->
    	<!-- hide these comments if the loading variable is true -->
     <div class="col-md-8 col-md-offset-2" ng-app="songApp" ng-controller="mainController">
        <div ng-include="top_nav_tpl" ng-hide="print_layout"></div>

     	<!-- LOADING ICON -->
     	<!-- show loading icon if the loading variable is set to true -->
     	<div id="loading" ng-show="loading">
            <img src="images/loading1.gif" class="ajax-loader"/>
        </div>

     	<!-- THE COMMENTS -->
     	<!-- hide these comments if the loading variable is true -->
     	<div class="mSong" ng-hide="loading" ng-model="$scope.songData.data" ng-repeat="song in songData.data">
     	    <span class="songContent">
     	        <form>
     	            <p class="formfield">
                        <label for="id<%$index+1%>">ID:</label>
                        <input disabled type="text" data-ng-model="songData.data[$index].id" id="id<%$index+1%>" name="id<%$index+1%>" value="<% song.data[$index].id %>">
                    </p>
                    <p class="formfield">
                        <label for="title<%$index+1%>">Title:</label>
                        <input type="text" data-ng-model="songData.data[$index].title" id="title<%$index+1%>" name="title<%$index+1%>" value="<%song.data[$index].title%>">
                    </p>
                    <p class="formfield">
                        <label for="original_band<%$index+1%>">Original Band:</label>
                        <input type="text" data-ng-model="songData.data[$index].original_band" id="original_band<%$index+1%>" name="original_band<%$index+1%>" value="<% song.data[$index].original_band %>">
                    </p>
                    <p class="formfield">
                        <label for="description<%$index+1%>">Description:</label>
                        <textarea data-ng-model="songData.data[$index].description" id="description<%$index+1%>"> name="description<%$index+1%>"><% song.data[$index].description %></textarea>
                    </p>
                    <p class="formfield">
                        <label for="date_posted<%$index+1%>">Date Posted:</label>
                        <input data-ng-model="songData.data[$index].date_posted" type="text" id="date_posted<%$index+1%>" name="date_posted<%$index+1%>" value="<% song.data[$index].date_posted %>">
                    </p>
                    <nav>
                        <button class="btn btn-warning" ng-click="updateSong(song.id)" class="text-muted">Update</button>
                    </nav>
     		    </form>
     		</span>
     	</div>
        <div ng-include="btm_nav_tpl" ng-hide="print_layout"></div>
     </div>
    @stop