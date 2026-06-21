<!DOCTYPE html>
<html lang="en">
@include('components.head')
@if (!env('MEME'))
<body>
@include('components.navbar')
<br>
<div>
    <h1 class="text-center text-4xl mx-2 sm:mx-auto">Website Map</h1>
    <br>
    <p class="font-light text-lg text-center">

    </p>
</div>
<div id="cy" class="bg-white"></div>

<script src="https://cdn.jsdelivr.net/npm/cytoscape@3.20.1/dist/cytoscape.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        var cy = cytoscape({
            container: document.getElementById('cy'),
            elements: [
                { data: { id: 'home', label: 'Home Page' } },
                { data: { id: 'about', label: 'About Us' } },
                { data: { id: 'join', label: 'Join Us' } },
                { data: { id: 'vision', label: 'Our Vision' } },
                { data: { id: 'edge1', source: 'home', target: 'about' } },
                { data: { id: 'edge2', source: 'home', target: 'join' } },
                { data: { id: 'edge3', source: 'home', target: 'vision' } }
            ],
            layout: {
                name: 'cose',
                padding: 10,
                animate: false,
                nodeSpacing: 10,
                edgeLength: 150
            },
            style: [
                {
                    selector: 'node',
                    style: {
                        'background-color': '#ffffff',
                        'label': 'data(label)',
                        'text-wrap': 'wrap',
                        'text-valign': 'center',
                        'text-halign': 'center',
                        'color': '#2563eb',
                        'width': '120px',
                        'height': '60px',
                        'shape': 'roundrectangle',
                        'border-color': '#e5e7eb',
                        'border-width': 1,
                        'border-style': 'solid',
                        'border-radius': '4px'
                    }
                },
                {
                    selector: 'edge',
                    style: {
                        'width': 1,
                        'line-color': '#e5e7eb'
                    }
                }
            ]
        });
    });
</script>
<style>
    #cy {
        width: 100%;
        height: 600px;
        display: block;
    }
</style>
@include('components.footer')
@endif


@if (env('MEME'))
<body>
<link href='https://fonts.googleapis.com/css?family=Old+Standard+TT' rel='stylesheet' type='text/css'>
<audio autoplay >
    <source src="{{url('audio/zelda.mp3')}}" type="audio/mpeg">
</audio>
<div class="zelda-container">
    <div class="background-holder"></div>
    <div class="stage">
        <div class="triangle one">
            <figure class="front"></figure>
            <figure class="back"></figure>
            <figure class="side1"></figure>
            <figure class="side2"></figure>
            <figure class="side3"></figure>
        </div>
        <div class="triangle two">
            <figure class="front"></figure>
            <figure class="back"></figure>
            <figure class="side1"></figure>
            <figure class="side2"></figure>
            <figure class="side3"></figure>
        </div>
        <div class="triangle three">
            <figure class="front"></figure>
            <figure class="back"></figure>
            <figure class="side1"></figure>
            <figure class="side2"></figure>
            <figure class="side3"></figure>
        </div>
    </div>
    <div class="zeldatext">
        <h2>The legend of
            <h1><span class="z">Z</span>EL<span class="closer">DA</span></h1>
            <h3><a href="https://www.youtube.com/watch?v=0Rzvtl12g78">A link to the CSS</a></h3>
    </div>
</div>
</body>
<style>body {
        background: #000;
        animation: animate-background 6s linear;
    }

    .zelda-container {
        width: 768px;
        height: 432px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .background-holder {
        position: absolute;
        width: 768px;
        height: 432px;
        background: url(http://hop.ie/zelda/images/bg.png);
        animation: animate-background-picture 6s linear forwards;
    }

    .zeldatext {
        position: absolute;
        top: 100px;
        left: 140px;
        width: 505px;
        height: 220px;
        animation: showZeldaText 6.5s linear;
    }
    .zeldatext h1 {
        position: absolute;
        top: 60px;
        margin: 0;
        font-size: 180px;
        line-height: 180px;
        font-family: "EB Garamond", Serif;
        padding-left: 80px;
        color: #8b3536;
        text-fill-color: #b62f22;
        stroke-fill-color: #8b3536;
        text-stroke-width: 2px;
        letter-spacing: -5px;
    }
    .zeldatext h1 .z {
        position: absolute;
        left: -80px;
        top: 0px;
        font-size: 280px;
    }
    .zeldatext h1 span.closer {
        letter-spacing: -28px;
    }
    .zeldatext h2, .zeldatext h3 {
        position: absolute;
        text-transform: uppercase;
        font-family: "Old Standard TT";
        color: #aaa;
        font-size: 40px;
        text-fill-color: #ddd;
        stroke-fill-color: #8b3536;
        text-stroke-width: 0.2px;
        text-shadow: 0 0 2px #000;
    }
    .zeldatext h2 {
        top: -10px;
        left: 100px;
    }
    .zeldatext h3 {
        top: 170px;
        left: 100px;
        width: 500px;
    }
    .zeldatext h3 a {
        text-decoration: none;
        color: #aaa;
        text-fill-color: #ddd;
    }

    .stage {
        width: 300px;
        height: 300px;
        left: 220px;
        top: 50px;
        position: absolute;
        perspective: 800px;
        perspective-origin: 50% 190px;
    }
    .stage .triangle {
        position: absolute;
        top: 0;
        left: 75px;
        width: 150px;
        height: 150px;
        transform-style: preserve-3d;
        transform-origin: 125px 50%;
    }
    .stage .triangle.one {
        animation: rotate 5s infinite linear, introduce-1 5s linear;
    }
    .stage .triangle.two {
        top: 150px;
        left: 0;
        animation: rotate 5s infinite linear, introduce-2 5s linear;
    }
    .stage .triangle.three {
        top: 150px;
        left: 150px;
        animation: rotate 5s infinite linear, introduce-3 5s linear;
    }
    .stage .triangle figure {
        display: block;
        position: absolute;
        backface-visibility: hidden;
    }
    .stage .triangle figure.front {
        width: 0;
        height: 0;
        border-left: 75px solid transparent;
        border-right: 75px solid transparent;
        border-bottom: 150px solid #ffe403;
        transform: translateZ(20px);
    }
    .stage .triangle figure.back {
        width: 0;
        height: 0;
        border-left: 75px solid transparent;
        border-right: 75px solid transparent;
        border-bottom: 150px solid #ffe403;
        transform: rotateY(180deg) translateZ(20px);
    }
    .stage .triangle figure.side1 {
        content: " ";
        display: block;
        position: absolute;
        height: 168px;
        width: 40px;
        background-color: #ffd200;
        transform: translateY(-9px) translateX(18px) rotateY(-90deg) rotateX(26.5deg);
    }
    .stage .triangle figure.side2 {
        content: " ";
        display: block;
        position: absolute;
        height: 168px;
        width: 40px;
        background-color: #ffd200;
        transform: translateY(-9px) translateX(92px) rotateY(90deg) rotateX(26.5deg);
    }
    .stage .triangle figure.side3 {
        content: " ";
        background-color: #ffd200;
        width: 150px;
        height: 40px;
        transform: translateY(130px) rotateX(-90deg);
    }

    @keyframes rotate {
        0% {
            -moz-transform: rotateY(0);
            -ms-transform: rotateY(0);
            -webkit-transform: rotateY(0);
            transform: rotateY(0);
        }
        100% {
            -moz-transform: rotateY(360deg);
            -ms-transform: rotateY(360deg);
            -webkit-transform: rotateY(360deg);
            transform: rotateY(360deg);
        }
    }

    @keyframes showZeldaText {
        0%, 80% {
            -moz-transform: scale(0.6) translateZ(-100px);
            -ms-transform: scale(0.6) translateZ(-100px);
            -webkit-transform: scale(0.6) translateZ(-100px);
            transform: scale(0.6) translateZ(-100px);
            opacity: 0;
            -webkit-filter: blur(2px);
        }
        90% {
            -webkit-filter: blur(0);
        }
        100% {
            -moz-transform: scale(1) translateZ(0);
            -ms-transform: scale(1) translateZ(0);
            -webkit-transform: scale(1) translateZ(0);
            transform: scale(1) translateZ(0);
            opacity: 1;
        }
    }

    @keyframes introduce-1 {
        0% {
            top: -200px;
            opacity: 0;
        }
        45% {
            top: -100px;
            -moz-transform: rotateY(180deg) rotateX(-180deg);
            -ms-transform: rotateY(180deg) rotateX(-180deg);
            -webkit-transform: rotateY(180deg) rotateX(-180deg);
            transform: rotateY(180deg) rotateX(-180deg);
            opacity: 1;
        }
        90%, 100% {
            top: 0;
            -moz-transform: rotateY(360deg) rotateX(-360deg);
            -ms-transform: rotateY(360deg) rotateX(-360deg);
            -webkit-transform: rotateY(360deg) rotateX(-360deg);
            transform: rotateY(360deg) rotateX(-360deg);
        }
    }

    @keyframes introduce-2 {
        0% {
            left: -150px;
            top: 250px;
            opacity: 0;
        }
        45% {
            left: -75px;
            top: 200px;
            -moz-transform: rotateY(180deg) rotateX(-180deg);
            -ms-transform: rotateY(180deg) rotateX(-180deg);
            -webkit-transform: rotateY(180deg) rotateX(-180deg);
            transform: rotateY(180deg) rotateX(-180deg);
            opacity: 1;
        }
        90%, 100% {
            top: 150px;
            left: 0;
            -moz-transform: rotateY(360deg) rotateX(-360deg);
            -ms-transform: rotateY(360deg) rotateX(-360deg);
            -webkit-transform: rotateY(360deg) rotateX(-360deg);
            transform: rotateY(360deg) rotateX(-360deg);
        }
    }

    @keyframes introduce-3 {
        0% {
            left: 350px;
            top: 250px;
            opacity: 0;
        }
        45% {
            left: 275px;
            top: 200px;
            -moz-transform: rotateY(180deg) rotateX(-180deg);
            -ms-transform: rotateY(180deg) rotateX(-180deg);
            -webkit-transform: rotateY(180deg) rotateX(-180deg);
            transform: rotateY(180deg) rotateX(-180deg);
            opacity: 1;
        }
        90%, 100% {
            top: 150px;
            left: 150px;
            -moz-transform: rotateY(360deg) rotateX(-360deg);
            -ms-transform: rotateY(360deg) rotateX(-360deg);
            -webkit-transform: rotateY(360deg) rotateX(-360deg);
            transform: rotateY(360deg) rotateX(-360deg);
        }
    }

    @keyframes animate-background {
        0% {
            background: #000;
        }
        83% {
            background: #000;
        }
        84% {
            background: #fff;
        }
        87%, 100% {
            background: #000;
        }
    }

    @keyframes animate-background-picture {
        0%,86% {
            opacity: 0;
        }
        86.01%, 100% {
            opacity: 1;
        }
    }
</style>
@endif
</body>
