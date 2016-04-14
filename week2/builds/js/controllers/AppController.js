/**
 * Created by Nomad_Mystic on 3/6/2016.
 */
(function() {
    //Angular Functions 'ngAnimate', 'ui.bootstrap'
    var app = angular.module('movieApp', [])
        .directive('onFinishRender', function ($timeout) {
            return {
                restrict: 'A',
                link: function (scope, element, attr) {
                    if (scope.$last === true) {
                        $timeout(function () {
                            scope.$emit('ngRepeatFinished');
                        });
                    }
                }
            }
        }); // end app

// App Controller
    app.controller('AppController', ['$scope', '$http', function($scope, $http) {

        /*--newArrivals--*/
        $http({
            method: 'GET',
            url: 'data/newArrivals.json'
        }).then(function success(newArrivals) {
            $scope.newArrivals = newArrivals.data;

        }, function error(error) {
            console.log(error);
        });

        /*--topRated--*/
        $http({
           method: 'GET',
            url: 'data/topRated.json'
        }).then(function success(topRated) {
            $scope.topRated = topRated.data;

        }, function error() {
            console.log(error);
        });

        /*---trending--*/
        $http({
            method: 'GET',
            url: 'data/trending.json'
        }).then(function success(trending) {
            $scope.trending = trending.data;

        }, function error() {
            console.log(error);
        });

        /*random Picks---*/
        $http({
            method: 'GET',
            url: 'data/randomPicks.json'
        }).then(function success(random) {
            $scope.random = random.data;

        }, function error() {
            console.log(error);
        });

        // For loading jQuery plugin after ngRepeat finishes
        $scope.$on('ngRepeatFinished', function (ngRepeatFinishedEvent) {
            jQueryFunctions.loadingCarousels();
            jQueryFunctions.toggleToolTip();
            jQueryFunctions.toggleHover();
            jQueryFunctions.googleAnalytics();

        });
    }]); // End app.controller

// jQuery Functions
    var jQueryFunctions = {
        loadingCarousels: function() {
            $('#newArrivalsCarousel, #historyCarousel, #trendingCarousel, #randomCarousel').owlCarousel({
                    items : 6, //items above 1000px browser width
                    itemsDesktop : [1199,6], //items between 1000px and 901px
                    itemsDesktopSmall : [900,4], //betweem 900px and 601px
                    itemsTablet: [600,4], //items between 600 and 0
                    itemsMobile : [479,3],
                    pagination : false,
                    rewindNav : true,
                    lazyLoad: true,
                    navigation: true,
                    navigationText: [
                        "<i class='fa fa-step-backward'></i>",
                        "<i class='fa fa-step-forward'></i>"
                    ],
                    scrollPerPage : true,
                    slideSpeed : 1000,
                    responsiveRefreshRate: 400
            });
        },
        toggleToolTip: function() {
            $('[data-toggle="popover"]').popover({
                trigger: 'hover',
                html: true,
                animation: false
            });
        },
        toggleHover: function() {
            $('.tooltipAnchor').mouseover(function (event) {
                // adding style to current tooltip item
                var parent = event.target.parentNode.parentNode.parentNode;

                parent.style.position = 'relative';
                parent.style.zIndex = '1000';
                jQueryFunctions.sliceOverview();

            }).mouseleave(function () {
                var owlItem = document.getElementsByClassName('owl-item');
                // removing style from all of the tooltip items
                for (var i = 0; i < owlItem.length; i++) {
                    owlItem[i].style.position = '';
                    owlItem[i].style.zIndex = '';
                }
            });
        },
        sliceOverview: function() {
            // for popover overview text
            var windowInnerWidth = window.innerWidth;
            var i;
            var j;
            var overviews = document.getElementsByClassName('overview');
            var popovers = document.getElementsByClassName('popover');

            if (windowInnerWidth <= 600) {
                for (j = 0; j < popovers.length; j++) {
                    popovers[j].style.top = 0;
                }
                for (i = 0; i < overviews.length; i++) {
                    overviews[i].innerText = overviews[i].innerText.slice(0, 125) + '...';
                }

            } else if (windowInnerWidth <= 992) {
                for (i = 0; i < overviews.length; i++) {
                    overviews[i].innerText = overviews[i].innerText.slice(0, 150) + '...';
                }

            } else {
                for (i = 0; i < overviews.length; i++) {
                    overviews[i].innerText = overviews[i].innerText.slice(0, 175) + '...';
                }
            }
        },
        googleAnalytics: function() {
            // Sending google message if someone clicks fa-step-forward
            $('.owl-next').on('click', function(event) {
                ga('send', 'event', 'Stepping', '.owl-next button was used on the site.');
            });

            // Sending google message if someone clicks fa-step-backwards
            $('.owl-prev').on('click', function(event) {
                ga('send', 'event', 'Stepping', '.owl-prev button was used on the site.');
            });

            // Sending message to google analytics if someone mouseovers .owl-pagination .owl-page
            $('.owl-pagination .owl-page').on('mouseover', function(event) {
               ga('send', 'event', 'Hover Featured Pagination', 'Someone mouseovered the pagination in the featured area of index.html');
            });

            // Sending google message if client screen size is less then 768px
            if(window.innerWidth <= 768) {
                ga('send', 'event', 'Client Window Size', 'Client window size is less then 768px')
            }
        }
    }; // End jQueryFunctions
})(); // End closure




