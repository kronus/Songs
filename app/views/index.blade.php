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

     	<div class="mSong" ng-hide="loading" ng-model="$scope.songData.data" ng-repeat="song in songData.data">
     	    <span class="songContent">
     	        <h3><% song.id %>) <song-title data-ng-model="songData[$index].title"></song-title> <small>by <% song.original_band %></h3>
     	        <blockquote>
                    <p><% song.description %></p>
                    <p><% song.date_posted %></p>
     		    </blockquote>
     		</span>
     	</div>

         <div ng-include="btm_nav_tpl" ng-hide="print_layout"></div>
     </div>
     <script type="text/javascript">
     $(document).ready(function(){
        var mTO = setTimeout(function(){
            $(".mLink").each(function(){
                var tempUrl = '';
                tempUrl = $(this).attr("href").replace(/ /g,"-");
                $(this).attr("href",tempUrl);
                // console.log(tempUrl)
            })
        },1000);
     });
     </script>
    @stop