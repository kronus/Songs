/**
 * Created by tam3 on 11/26/14.
 */
songApp.directive('songTitle', function factory(){
    return {
        restrict: 'E',
        template: '<a class="mLink" href="http://kronusproductions.com/uploads/playMp3.php?mPlaySong=<% songData.data[$index].title %>.mp3"><% songData.data[$index].title %></a>'
    };
});
songApp.directive('songTitleLabel', function factory(){
    return {
        restrict: 'E',
        template: '<label for="title<%$index%>"><% songData[$index].title %></label>'
    };
});