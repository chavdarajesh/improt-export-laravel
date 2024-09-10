<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME', 'Laravel App') }} | Project Details</title>
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ isset($favicon) && isset($favicon->value) && $favicon != null && $favicon->value != '' ? asset($favicon->value) : asset('custom-assets/admin/siteimages/logo/favicon.ico') }}" />
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ isset($favicon) && isset($favicon->value) && $favicon != null && $favicon->value != '' ? asset($favicon->value) : asset('custom-assets/admin/siteimages/logo/favicon.ico') }}" />
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ isset($favicon) && isset($favicon->value) && $favicon != null && $favicon->value != '' ? asset($favicon->value) : asset('custom-assets/admin/siteimages/logo/favicon.ico') }}" />
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #000;
        }

        #container {
            width: 100vw;
            height: 100vh;
        }
    </style>
</head>

<body>
    <div id="container"></div>
    <script src="{{ asset('assets/front/js/three.min.js') }}"></script>
    <script src="{{ asset('assets/front/js//panolens.min.js') }}"></script>

    <script>
        const imgURL = '{{ asset($Project->arvr_image) }}';
        const title = '{{ $Project->title }}';
        var panorama, viewer, container, infospot;
        container = document.querySelector('#container');
        panorama = new PANOLENS.ImagePanorama(imgURL);
        infospot = new PANOLENS.Infospot(350, PANOLENS.DataImage.Info);
        infospot.position.set(0, 0, -5000);
        infospot.addHoverText(title, 300);
        panorama.add(infospot);

        viewer = new PANOLENS.Viewer({
            container: container,
            autoRotate: true,
            autoRotateSpeed: 1,
            autoRotateActivationDuration: 5000
        });
        viewer.add(panorama);

        viewer.addUpdateCallback(function() {

        });
    </script>
</body>

</html>
