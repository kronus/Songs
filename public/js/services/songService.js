/**
 * Created by tam3 on 11/25/14.
 */
angular.module('songService', [])

    .factory('Song', function($http) {
        return {
            get : function() {
                return $http.get('/api/songs');
            },
            show : function(id) {
                return $http.get('/api/songs/' + id);
            },
            put : function(id,songData) {
                // console.log("songData 2: "+songData.date_posted)
                return $http({
                    method: 'PUT',
                    url: '/api/songs/' + id,
                    headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                    data: $.param(songData)
                });
            },
            save : function(songData) {
                // console.log("songData 2: "+songData.date_posted)
                return $http({
                    method: 'POST',
                    url: '/api/songs',
                    headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                    data: $.param(songData)
                });
            },
            destroy : function(id) {
                return $http.delete('/api/songs/' + id);
            },
            getPage : function(id) {
                return $http.get('/api/songs/?page=' + id);
            }
        }

    });
