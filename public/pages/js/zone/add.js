var drawingManager;

var all_overlays = [];

var selectedShape;

var colors = ['#1E90FF', '#FF1493', '#32CD32', '#FF8C00', '#4B0082'];

var selectedColor;
var colorButtons = {};

function clearSelection() {

    if (selectedShape) {

        selectedShape.setEditable(!1);

        selectedShape = null
    }

}

function setSelection(shape) {

    clearSelection();

    selectedShape = shape;

    shape.setEditable(!0);

    selectColor(shape.get('fillColor') || shape.get('strokeColor'))

}

function deleteSelectedShape() {

    document.getElementById("p_polygon_coordinates").value = "";

    if (selectedShape) {
        selectedShape.setMap(null)
    }
}

function deleteAllShape() {

    document.getElementById("p_polygon_coordinates").value = "";

    for (var i = 0; i < all_overlays.length; i++) {

        all_overlays[i].overlay.setMap(null)
    }

    all_overlays = []

}

function selectColor(color) {

    selectedColor = color;

    for (var i = 0; i < colors.length; ++i) {

        var currColor = colors[i];
    }


    var polygonOptions = drawingManager.get('polygonOptions');

    polygonOptions.fillColor = color;

    drawingManager.set('polygonOptions', polygonOptions)

}

function setSelectedShapeColor(color) {

    if (selectedShape) {

        if (selectedShape.type == google.maps.drawing.OverlayType.POLYLINE) {

            selectedShape.set('strokeColor', color)

        } else {
            selectedShape.set('fillColor', color)
        }
    }

}

function makeColorButton(color) {

    var button = document.createElement('span');

    button.className = 'color-button';

    button.style.backgroundColor = color;

    google.maps.event.addDomListener(button, 'click', function () {

        selectColor(color);
        setSelectedShapeColor(color)
    });

    return button

}

function buildColorPalette() {

    var colorPalette = document.getElementById('color-palette');

    for (var i = 0; i < colors.length; ++i) {

        var currColor = colors[i];

        var colorButton = makeColorButton(currColor);

        colorPalette.appendChild(colorButton);

        colorButtons[currColor] = colorButton
    }

    selectColor(colors[0])
}


function saveSelectedShape() {

    document.getElementById("p_polygon_coordinates").value = "";

    var my_polygon = "";

    if (selectedShape) {

        if (selectedShape.type == google.maps.drawing.OverlayType.MARKER) {

            my_polygon = (selectedShape.getPosition().lat() + ',' + selectedShape.getPosition().lng() + ';')

        } else if (selectedShape.type == google.maps.drawing.OverlayType.CIRCLE) {

            my_polygon = ('Center: (' + selectedShape.getCenter().lat()
                + ',' + '' + selectedShape.getCenter().lng()
                + ') Radius: ' + selectedShape.getRadius()
            )

        } else if (selectedShape.type == google.maps.drawing.OverlayType.RECTANGLE) {

            var ne = selectedShape.getBounds().getNorthEast();

            var sw = selectedShape.getBounds().getSouthWest();

            my_polygon = ('NE: (' + ne.lat() + ',' + ne.lng() + ') SW: (' + sw.lat() + ',' + sw.lng() + ';')

        } else if (selectedShape.type == google.maps.drawing.OverlayType.POLYLINE) {

            var path = selectedShape.getPath();

            var points = "";

            for (var i = 0; i < path.getLength(); i++) {
                points += "" + path.getAt(i).toUrlValue(5) + ";"
            }

            my_polygon = (points.replace(/;+$/, ""))

        } else if (selectedShape.type == google.maps.drawing.OverlayType.POLYGON) {

            var vertices = selectedShape.getPath();

            var points = "";

            for (var i = 0; i < vertices.getLength(); i++) {

                points += "" + vertices.getAt(i).toUrlValue(5) + ";"

            }

            my_polygon = (points.replace(/;+$/, ""))

        }

        document.getElementById("p_polygon_coordinates").value = my_polygon

    }

}

function initialize() {

    var map = new google.maps.Map(document.getElementById('map'),
        {
            zoom: 8, center: new google.maps.LatLng(-0.966673, 33.930867),

            mapTypeId: google.maps.MapTypeId.ROADMAP, disableDefaultUI: !0,

            zoomControl: !0
        }
    );
    monitorMapCall(window.location.href);
    var polyOptions = {

        strokeWeight: 0,

        fillOpacity: 0.45,

        editable: !0
    };

    drawingManager = new google.maps.drawing.DrawingManager(
        {
            drawingMode: google.maps.drawing.OverlayType.POLYGON,
            drawingControl: true,
            drawingControlOptions: {
                position: google.maps.ControlPosition.TOP_CENTER,
                drawingModes: ['polygon']
            },
            polygonOptions: polyOptions,

            map: map

        });

    google.maps.event.addListener(drawingManager, 'overlaycomplete', function (e) {
        all_overlays.push(e);

        if (e.type != google.maps.drawing.OverlayType.MARKER) {

            drawingManager.setDrawingMode(null);

            var newShape = e.overlay;

            newShape.type = e.type;

            google.maps.event.addListener(newShape, 'click', function () {

                setSelection(newShape)
            });

            setSelection(newShape)
        }
    });

    google.maps.event.addDomListener(document.getElementById('delete-button'), 'click', deleteSelectedShape);

    google.maps.event.addDomListener(document.getElementById('save-button'), 'click', saveSelectedShape);

}

