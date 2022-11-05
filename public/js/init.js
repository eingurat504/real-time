$(document).ready(function(){
  
    let map;
    let markerArr=[];
  
    let data = {
        "features": [
          { "type": "Feature", "properties": 
            { 
              "Company": "FedEx",
              "Latitude": 2.304302, 
              "Longitude": 32.782520
            }
          },
          { "type": "Feature", "properties": 
            { 
              "Company": "FedEx",
              "Latitude": 0.347596, 
              "Longitude": 32.582520
            }
          },
          { "type": "Feature", "properties": 
            { 
              "Company": "FedEx",
              "Latitude": 0.647596, 
              "Longitude": 33.582520
            }
          },
          { "type": "Feature", "properties": 
            { 
              "Company": "FedEx",
              "Latitude": 0.747596, 
              "Longitude": 36.080025
            }
          },
          { "type": "Feature", "properties": 
            { 
              "Company": "FedEx",
              "Latitude": -0.303099, 
              "Longitude": 33.682520
            }
          },
          { "type": "Feature", "properties": 
            { 
              "Company": "Kenya",
              "Latitude": -1.286389, 
              "Longitude": 36.817223
            }
          },
          { "type": "Feature", "properties": 
            { 
              "Company": "Kenya",
              "Latitude": -2.595739, 
              "Longitude":  38.076368
            }
          },
          { "type": "Feature", "properties": 
            { 
              "Company": "Kenya",
              "Latitude": -4.043740, 
              "Longitude":  39.658871
            }
          },
           { "type": "Feature", "properties": 
            { 
              "Company": "FedEx",
              "Latitude": 2.304302, 
              "Longitude": 32.782520
            }
          },
          { "type": "Feature", "properties": 
            { 
              "Company": "FedEx",
              "Latitude": 0.347596, 
              "Longitude": 32.582520
            }
          },
          { "type": "Feature", "properties": 
            { 
              "Company": "FedEx",
              "Latitude": 0.647596, 
              "Longitude": 33.582520
            }
          },
          { "type": "Feature", "properties": 
            { 
              "Company": "FedEx",
              "Latitude": 2.747596, 
              "Longitude": 36.080025
            }
          },
          { "type": "Feature", "properties": 
            { 
              "Company": "FedEx",
              "Latitude": -5.303099, 
              "Longitude": 33.682520
            }
          },
          { "type": "Feature", "properties": 
            { 
              "Company": "Kenya",
              "Latitude": -2.586389, 
              "Longitude": 36.817223
            }
          },
          { "type": "Feature", "properties": 
            { 
              "Company": "Kenya",
              "Latitude": -3.595739, 
              "Longitude":  38.076368
            }
          },
          { "type": "Feature", "properties": 
            { 
              "Company": "Kenya",
              "Latitude": -4.243740, 
              "Longitude":  39.658871
            }
          },
        ]
      }
  
    function initialize() {
  
      let mapOptions = {
        zoom: 7,
        mapTypeControl: false,
        center: new google.maps.LatLng(0.368990, 33.569520)
      };
      
      map = new google.maps.Map(document.getElementById('map'), mapOptions);
  
      let img = new Image();   // Create new img element
      img.src = 'images/truck.png'; // Set source path
  
      let myIcon = img.src;
      
      //preparing the image so it can be used as a marker
      //https://developers.google.com/maps/documentation/javascript/reference#Icon
      //includes hacky fix "size" to allow for wobble
      let catIcon = {
        url: myIcon,
        size: new google.maps.Size(70, 30),
        scaledSize: new google.maps.Size(50, 20),
        origin: new google.maps.Point(-15,0)
      }
  
      for (let i=0; i < data.features.length; i++){
        let eachData = data.features[i].properties
        let latLng = new google.maps.LatLng(eachData.Latitude, eachData.Longitude);
        let marker = new google.maps.Marker({
            position:latLng,
            map: map,
            // set the icon as catIcon declared above
            icon: catIcon,
            // must use optimized false for CSS
            optimized: false,
            title: markerArr.length.toString()
        });
        markerArr.push(marker);
  
        let infoWindow = new google.maps.InfoWindow({
          content: eachData.Company
        });
        
        //add a click handler that does nothing at the moment
        google.maps.event.addListener(marker, 'click', function() {
          let thisTitle= Number(this.title);
          //$('#markerLayer img').eq(thisTitle)
          infoWindow.open(map, marker);
  
        })
        
      }
      
      //gets GeoJSON from external file
      // $.getJSON('test.json', function(data) {
      //     var length= data.features.length
      //     for (var i=0; i < length; i++){
      //       var eachData = data.features[i].properties
      //       var latLng = new google.maps.LatLng(eachData.Latitude, eachData.Longitude);
      //       var marker = new google.maps.Marker({
      //           position:latLng,
      //           map: map,
      //           // set the icon as catIcon declared above
      //           icon: catIcon,
      //           // must use optimized false for CSS
      //           optimized: false,
      //           title: markerArr.length.toString()
      //       });
      //       markerArr.push(marker);
            
      //       //add a click handler that does nothing at the moment
      //       google.maps.event.addListener(marker, 'click', function() {
      //         var thisTitle= Number(this.title);
      //         //$('#markerLayer img').eq(thisTitle)
      //       })
            
      //     }
      // });  
      
         // Overlay view allows you to organize your markers in the DOM
          // https://developers.google.com/maps/documentation/javascript/reference#OverlayView
         let myoverlay = new google.maps.OverlayView();
         myoverlay.draw = function () {
             // add an id to the layer that includes all the markers so you can use it in CSS
             this.getPanes().markerLayer.id='markerLayer';
         };
         myoverlay.setMap(map);
          
    }
  
    initialize();
    
    // use jQuery to change the markers animation based on toggle button
    $('.btn').click(function(){
      let type = $(this).data('anim');
      $('#markerLayer img').css('animation', type+ ' 1s infinite alternate');
      $('#markerLayer img').css('-webkit-animation', type+ ' 1s infinite alternate')
    })
    
  });
  
  