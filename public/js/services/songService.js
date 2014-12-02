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

angular.module('SharedServices', [])
    .config(function ($httpProvider) {
        $httpProvider.responseInterceptors.push('myHttpInterceptor');
        var spinnerFunction = function (data, headersGetter) {
            // todo start the spinner here
            $('#loading').show();
            return data;
        };
        $httpProvider.defaults.transformRequest.push(spinnerFunction);
    })
// register the interceptor as a service, intercepts ALL angular ajax http calls
    .factory('myHttpInterceptor', function ($q, $window) {
        return function (promise) {
            return promise.then(function (response) {
                // do something on success
                // todo hide the spinner
                $('#loading').hide();
                return response;

            }, function (response) {
                // do something on error
                // todo hide the spinner
                $('#loading').hide();
                return $q.reject(response);
            });
        };
    });