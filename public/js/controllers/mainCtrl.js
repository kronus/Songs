/**
 * Created by tam3 on 11/25/14.
 */
var mSongs = [];
var mSubmittedSong = {
    id: 0,
    title:"",
    original_band:"",
    description:"",
    date_posted:""
};

angular.module('mainCtrl', [])

    .controller('mainController', function($scope, $http, Song) {
        // templates used
        $scope.top_nav_tpl = 'angular/views/top_nav.html';
        $scope.btm_nav_tpl = 'angular/views/btm_nav.html';

        // little function to help with simple links
        $scope.go = function(hash){
            location.href = hash;
        }

        $scope.getPgn = function(pageNum) {
            console.log("pageNum: "+pageNum);
            Song.getPage(pageNum)
                .success(function (data) {
                    $scope.songData = {};
                    $scope.songData = data;
                    mSongs = data;
                    $scope.loading = false;
                });
        }

        // object to hold all the data for the new song form
        $scope.songData = {};

        // loading variable to show the spinning loading icon
        $scope.loading = true;

        // get all the songs first and bind it to the $scope.songs object
        Song.get()
            .success(function (data) {
                $scope.songData = data;
                mSongs = data;
                $scope.loading = false;
                var mTO2 = setTimeout(function(){
                    ($("#mLoc").val()=="create")? $(".pagination").fadeOut("fast") : $(".pagination").fadeIn("fast");

                    console.log($("#mLoc").val())
                }, 500);
            });


        // function to handle submitting the form
        $scope.submitSong = function() {
            $scope.loading = true;
            mSubmittedSong = {
                id: 0,
                title:"",
                original_band:"",
                description:"",
                date_posted:""
            };
            mSubmittedSong.id=$scope.songData.id;
            mSubmittedSong.title=$scope.songData.title;
            mSubmittedSong.original_band=$scope.songData.original_band;
            mSubmittedSong.description=$scope.songData.description;
            mSubmittedSong.date_posted=$scope.songData.date_posted;
            console.log(mSubmittedSong.date_posted);

            // save the song. pass in song data from the form
            Song.save(mSubmittedSong)
                .success(function(data) {
                    $scope.songData = {};
                    // if successful, we'll need to refresh the song list
                    Song.get()
                        .success(function(getData) {
                            $scope.songs = getData;
                            $scope.loading = false;
                        });

                })
                .error(function(data) {
                    console.log(data);
                });
        };

        // function to handle deleting a song
        $scope.updateSong = function(mId) {
            $scope.loading = true;
            console.log(mId);
            mSubmittedSong = {
                id: 0,
                title:"",
                original_band:"",
                description:"",
                date_posted:""
            };
            mSubmittedSong.id=document.getElementById("id"+mId).value;
            mSubmittedSong.title=document.getElementById("title"+mId).value;
            mSubmittedSong.original_band=document.getElementById("original_band"+mId).value;
            mSubmittedSong.description=document.getElementById("description"+mId).value;
            mSubmittedSong.date_posted=document.getElementById("date_posted"+mId).value;
            console.log(mSubmittedSong.date_posted);
            $scope.songData = {};
            $scope.songData = mSubmittedSong;

            Song.put(mId, mSubmittedSong)
                .success(function(data) {
                    $scope.songData = {};
                    // if successful, we'll need to refresh the song list
                    Song.get()
                        .success(function(getData) {
                            $scope.songs = getData;
                            $scope.loading = false;
                        });

                });
        };


        // function to handle deleting a song
        $scope.deleteSong = function(id) {
            $scope.loading = true;

            Song.destroy(id)
                .success(function(data) {
                    $scope.songData = {};
                    // if successful, we'll need to refresh the song list
                    Song.get()
                        .success(function(getData) {
                            $scope.songs = getData;
                            $scope.loading = false;
                        });

                });
        };

    });