@extends('front-end.master.front-end')
@section('sass')
    <link rel="shortcut icon" type="image/x-icon" href="https://static.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico">
    <link rel="mask-icon" type="" href="https://static.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style media="" data-href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">button,hr,input{overflow:visible}audio,canvas,progress,video{display:inline-block}progress,sub,sup{vertical-align:baseline}html{font-family:sans-serif;line-height:1.15;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}body{margin:0} menu,article,aside,details,footer,header,nav,section{display:block}h1{font-size:2em;margin:.67em 0}figcaption,figure,main{display:block}figure{margin:1em 40px}hr{box-sizing:content-box;height:0}code,kbd,pre,samp{font-family:monospace,monospace;font-size:1em}a{background-color:transparent;-webkit-text-decoration-skip:objects}a:active,a:hover{outline-width:0}abbr[title]{border-bottom:none;text-decoration:underline;text-decoration:underline dotted}b,strong{font-weight:bolder}dfn{font-style:italic}mark{background-color:#ff0;color:#000}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative}sub{bottom:-.25em}sup{top:-.5em}audio:not([controls]){display:none;height:0}img{border-style:none}svg:not(:root){overflow:hidden}button,input,optgroup,select,textarea{font-family:sans-serif;font-size:100%;line-height:1.15;margin:0}button,input{}button,select{text-transform:none}[type=submit], [type=reset],button,html [type=button]{-webkit-appearance:button}[type=button]::-moz-focus-inner,[type=reset]::-moz-focus-inner,[type=submit]::-moz-focus-inner,button::-moz-focus-inner{border-style:none;padding:0}[type=button]:-moz-focusring,[type=reset]:-moz-focusring,[type=submit]:-moz-focusring,button:-moz-focusring{outline:ButtonText dotted 1px}fieldset{border:1px solid silver;margin:0 2px;padding:.35em .625em .75em}legend{box-sizing:border-box;color:inherit;display:table;max-width:100%;padding:0;white-space:normal}progress{}textarea{overflow:auto}[type=checkbox],[type=radio]{box-sizing:border-box;padding:0}[type=number]::-webkit-inner-spin-button,[type=number]::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}[type=search]::-webkit-search-cancel-button,[type=search]::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}[hidden],template{display:none}/*# sourceMappingURL=normalize.min.css.map */</style>
    <style>
        @import url(//fonts.googleapis.com/css?family=Quicksand:400,700);

        blockquote, q {
            quotes: none;
        }

        blockquote:after, blockquote:before, q:after, q:before {
            content: '';
            content: none;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        :focus {
            outline: 0;
        }


        ::-moz-focus-inner {
            border: 0;
            padding: 0;
        }


        .hidden {
            display: none;
        }

        .u-isVisuallyHidden {
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            border: 0;
            position: absolute;
            clip: rect(0 0 0 0);
            overflow: hidden;
        }

        .footer {
            position: fixed;
            right: 0;
            bottom: 0;
            left: 0;
        }

        .withanes {
            display: block;
            position: absolute;
            right: 5px;
            bottom: 5px;
            width: 24px;
            height: 32px;
        }
        .withanes:after {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            width: 2px;
            height: 2px;
            box-shadow: 8px 2px #795f41, 10px 2px #795f41, 12px 2px #795f41, 14px 2px #795f41, 16px 2px #795f41, 18px 2px #795f41, 6px 4px #795f41, 8px 4px #795f41, 10px 4px #795f41, 12px 4px #795f41, 14px 4px #795f41, 16px 4px #795f41, 18px 4px #795f41, 20px 4px #795f41, 4px 6px #795f41, 6px 6px #795f41, 8px 6px #e9d8bc, 10px 6px #795f41, 12px 6px #795f41, 14px 6px #795f41, 16px 6px #795f41, 18px 6px #cbb490, 20px 6px #795f41, 22px 6px #795f41, 4px 8px #795f41, 6px 8px #e9d8bc, 8px 8px #e0c9a4, 10px 8px #e0c9a4, 12px 8px #e0c9a4, 14px 8px #e0c9a4, 16px 8px #e0c9a4, 18px 8px #cbb490, 20px 8px #cbb490, 22px 8px #795f41, 2px 10px #7e6f5d, 4px 10px #e9d8bc, 6px 10px #e0c9a4, 8px 10px #e0c9a4, 10px 10px #e0c9a4, 12px 10px #e0c9a4, 14px 10px #e0c9a4, 16px 10px #e0c9a4, 18px 10px #e0c9a4, 20px 10px #cbb490, 22px 10px #cbb490, 24px 10px #7e6f5d, 2px 12px #7e6f5d, 4px 12px #e9d8bc, 6px 12px #e0c9a4, 8px 12px #e0c9a4, 10px 12px #e0c9a4, 12px 12px #e0c9a4, 14px 12px #e0c9a4, 16px 12px #e0c9a4, 18px 12px #e0c9a4, 20px 12px #e0c9a4, 22px 12px #cbb490, 24px 12px #7e6f5d, 2px 14px #7e6f5d, 4px 14px #e9d8bc, 6px 14px #e0c9a4, 8px 14px #cbb490, 10px 14px #cbb490, 12px 14px #e0c9a4, 14px 14px #e0c9a4, 16px 14px #cbb490, 18px 14px #cbb490, 20px 14px #e0c9a4, 22px 14px #cbb490, 24px 14px #7e6f5d, 2px 16px #b6a281, 4px 16px #e9d8bc, 6px 16px #e0c9a4, 8px 16px #000000, 10px 16px #000000, 12px 16px #e9d8bc, 14px 16px #e0c9a4, 16px 16px #000000, 18px 16px #000000, 20px 16px #e0c9a4, 22px 16px #cbb490, 24px 16px #b6a281, 2px 18px #cbb490, 4px 18px #e9d8bc, 6px 18px #e0c9a4, 8px 18px #e0c9a4, 10px 18px #e0c9a4, 12px 18px #e9d8bc, 14px 18px #e0c9a4, 16px 18px #e0c9a4, 18px 18px #e0c9a4, 20px 18px #e0c9a4, 22px 18px #cbb490, 24px 18px #cbb490, 4px 20px #795f41, 6px 20px #e0c9a4, 8px 20px #e0c9a4, 10px 20px #e0c9a4, 12px 20px #e9d8bc, 14px 20px #e0c9a4, 16px 20px #e0c9a4, 18px 20px #e0c9a4, 20px 20px #e0c9a4, 22px 20px #795f41, 4px 22px #795f41, 6px 22px #e0c9a4, 8px 22px #e0c9a4, 10px 22px #e0c9a4, 12px 22px #cbb490, 14px 22px #cbb490, 16px 22px #e0c9a4, 18px 22px #e0c9a4, 20px 22px #cbb490, 22px 22px #795f41, 4px 24px #795f41, 6px 24px #795f41, 8px 24px #795f41, 10px 24px #795f41, 12px 24px #795f41, 14px 24px #795f41, 16px 24px #795f41, 18px 24px #795f41, 20px 24px #795f41, 22px 24px #795f41, 6px 26px #795f41, 8px 26px #795f41, 10px 26px #e0c9a4, 12px 26px #e0c9a4, 14px 26px #e0c9a4, 16px 26px #b6a281, 18px 26px #795f41, 20px 26px #795f41, 8px 28px #7e6f5d, 10px 28px #e0c9a4, 12px 28px #7e6f5d, 14px 28px #7e6f5d, 16px 28px #b6a281, 18px 28px #7e6f5d, 8px 30px #7e6f5d, 10px 30px #795f41, 12px 30px #7e6f5d, 14px 30px #7e6f5d, 16px 30px #795f41, 18px 30px #7e6f5d, 10px 32px #7e6f5d, 12px 32px #7e6f5d, 14px 32px #7e6f5d, 16px 32px #7e6f5d;
        }

        .withanes-name {
            box-sizing: border-box;
            position: absolute;
            bottom: 4px;
            right: 16px;
            padding: 5px 7px;
            /*     width: 0; */
            text-align: center;
            font-size: 12px;
            font-weight: 700;
            background-color: white;
            opacity: 0;
            transform: translateX(0);
            color: black;
            white-space: nowrap;
            overflow: hidden;
            transition: opacity 250ms ease-in-out, width 0 linear 250ms, transform 250ms cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }
        .withanes-name:after {
            width: 0;
            height: 0;
            content: '';
            position: absolute;
            z-index: 2;
            border-top: 5px solid transparent;
            border-bottom: 5px solid transparent;
            border-left: 8px solid white;
            position: absolute;
            top: calc(50% - 5px);
            right: -6px;
        }

        .withanes:hover .withanes-name {
            /*     width: 120px; */
            overflow: visible;
            opacity: 1;
            transform: translateX(-20px) rotate(0deg);
            box-shadow: 0 0 16px rgba(0, 0, 0, 0.33);
            transition: opacity 125ms ease-in-out 100ms, transform 250ms cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .withanes:hover:before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: -20px;
        }

        .withanes-name > .heart {
            margin: 0 3px;
            position: relative;
            display: inline-block;
            width: 6px;
            height: 6px;
            background-color: #D13E35;
            transform: rotate(45deg);
        }
        .withanes-name > .heart:before, .withanes-name > .heart:after {
            content: '';
            position: absolute;
            display: inline-block;
            width: 6px;
            height: 6px;
            top: 0;
            left: 0;
            background-color: #D13E35;
            border-radius: 50%;
        }
        .withanes-name > .heart:before {
            left: -3px;
        }
        .withanes-name > .heart:after {
            top: -3px;
        }

        .grid {
            display: block;
            /* IE9 fallback for Flex */
            display: flex;
            /* Using Flex for equal height containers */
            flex-wrap: wrap;
            /* Children need to wrap */
            margin-top: -20px;
            margin-left: -20px;
            align-items: stretch;
            /* For equal height */
            font-size: 0;
            /* Horiontal gap fix for inline-block fallback */
        }

        .grid + .grid {
            margin-top: 0;
            /* reset margin on stacked grids */
        }

        .grid-col {
            box-sizing: border-box;
            /* Using box-sizing so padding doesn't affect width */
            display: inline-block;
            /* IE9 fallback */
            width: 100%;
            padding-top: 20px;
            padding-left: 20px;
            vertical-align: top;
            font-size: 16px;
            /* Resetting font-size for horizontal gap fix */
        }

        .grid-col_1of12 {
            width: 8.3333333333%;
        }

        .grid-col_2of12 {
            width: 16.6666666667%;
        }

        .grid-col_3of12 {
            width: 25%;
        }

        .grid-col_4of12 {
            width: 33.3333333333%;
        }

        .grid-col_5of12 {
            width: 41.6666666667%;
        }

        .grid-col_6of12 {
            width: 50%;
        }

        .grid-col_7of12 {
            width: 58.3333333333%;
        }

        .grid-col_8of12 {
            width: 66.6666666667%;
        }

        .grid-col_9of12 {
            width: 75%;
        }

        .grid-col_10of12 {
            width: 83.3333333333%;
        }

        .grid-col_11of12 {
            width: 91.6666666667%;
        }

        .grid-col_12of12 {
            width: 100%;
        }

        @media (min-width: 768px) {
            .grid-col_1of12SM {
                width: 8.3333333333%;
            }

            .grid-col_2of12SM {
                width: 16.6666666667%;
            }

            .grid-col_3of12SM {
                width: 25%;
            }

            .grid-col_4of12SM {
                width: 33.3333333333%;
            }

            .grid-col_5of12SM {
                width: 41.6666666667%;
            }

            .grid-col_6of12SM {
                width: 50%;
            }

            .grid-col_7of12SM {
                width: 58.3333333333%;
            }

            .grid-col_8of12SM {
                width: 66.6666666667%;
            }

            .grid-col_9of12SM {
                width: 75%;
            }

            .grid-col_10of12SM {
                width: 83.3333333333%;
            }

            .grid-col_11of12SM {
                width: 91.6666666667%;
            }

            .grid-col_12of12SM {
                width: 100%;
            }
        }
        @media (min-width: 960px) {
            .grid-col_1of12MD {
                width: 8.3333333333%;
            }

            .grid-col_2of12MD {
                width: 16.6666666667%;
            }

            .grid-col_3of12MD {
                width: 25%;
            }

            .grid-col_4of12MD {
                width: 33.3333333333%;
            }

            .grid-col_5of12MD {
                width: 41.6666666667%;
            }

            .grid-col_6of12MD {
                width: 50%;
            }

            .grid-col_7of12MD {
                width: 58.3333333333%;
            }

            .grid-col_8of12MD {
                width: 66.6666666667%;
            }

            .grid-col_9of12MD {
                width: 75%;
            }

            .grid-col_10of12MD {
                width: 83.3333333333%;
            }

            .grid-col_11of12MD {
                width: 91.6666666667%;
            }

            .grid-col_12of12MD {
                width: 100%;
            }
        }
        .blocks {
            margin: -30px 0 0 -30px;
            /* offset blocks horizontal and vertical spacing - must match padding of blocks items */
            font-size: 0;
            /* remove inline block whitespace */
        }

        .blocks > * {
            box-sizing: border-box;
            display: inline-block;
            padding: 30px 0 0 30px;
            /* space blocks horizontally and vertically - offset is handled by .blocks */
            font-size: 16px;
            /* return the font size */
        }

        .blocks_2up > * {
            width: 50%;
        }

        .blocks_3up > * {
            width: 33.33333%;
        }

        .blocks_4up > * {
            width: 25%;
        }

        .u-srOnly {
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            border: 0;
            position: absolute;
            clip: rect(0 0 0 0);
            overflow: hidden;
        }

        .container2 {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 80vh;
        }


        .error404page {
            width: 300px;
            height: 700px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .body404,
        .head404,
        .eyes404,
        .leftarm404,
        .rightarm404,
        .chair404,
        .leftshoe404,
        .rightshoe404,
        .legs404,
        .laptop404 {
            background: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/15979/404-character-new.png) 0 0 no-repeat;
            width: 200px;
            height: 200px;
        }

        .newcharacter404,
        .torso404,
        .body404,
        .head404,
        .eyes404,
        .leftarm404,
        .rightarm404,
        .chair404,
        .leftshoe404,
        .rightshoe404,
        .legs404,
        .laptop404 {
            background-size: 750px;
            position: absolute;
            display: block;
        }

        .newcharacter404 {
            width: 400px;
            height: 800px;
            left: 50%;
            top: 20px;
            margin-left: -200px;
        }

        .torso404 {
            position: absolute;
            display: block;
            top: 138px;
            left: 0px;
            width: 389px;
            height: 252px;
            animation: sway 20s ease infinite;
            transform-origin: 50% 100%;
        }

        .body404 {
            position: absolute;
            display: block;
            top: 0px;
            left: 0px;
            width: 389px;
            height: 253px;
        }

        .head404 {
            position: absolute;
            top: -148px;
            left: 106px;
            width: 160px;
            height: 194px;
            background-position: 0px -265px;
            transform-origin: 50% 85%;
            animation: headTilt 20s ease infinite;
        }

        .eyes404 {
            position: absolute;
            top: 92px;
            left: 34px;
            width: 73px;
            height: 18px;
            background-position: -162px -350px;
            animation: blink404 10s steps(1) infinite, pan 10s ease-in-out infinite;
        }

        .leftarm404 {
            position: absolute;
            top: 159px;
            left: 0;
            width: 165px;
            height: 73px;
            background-position: -265px -341px;
            transform-origin: 9% 35%;
            transform: rotateZ(0deg);
            animation: typeLeft 0.4s linear infinite;
        }

        .rightarm404 {
            position: absolute;
            top: 148px;
            left: 231px;
            width: 157px;
            height: 91px;
            background-position: -442px -323px;
            transform-origin: 90% 25%;
            animation: typeLeft 0.4s linear infinite;
        }

        .chair404 {
            position: absolute;
            top: 430px;
            left: 55px;
            width: 260px;
            height: 365px;
            background-position: -12px -697px;
        }

        .legs404 {
            position: absolute;
            top: 378px;
            left: 4px;
            width: 370px;
            height: 247px;
            background-position: -381px -443px;
        }

        .leftshoe404 {
            position: absolute;
            top: 591px;
            left: 54px;
            width: 130px;
            height: 92px;
            background-position: -315px -749px;
        }

        .rightshoe404 {
            position: absolute;
            top: 594px;
            left: 187px;
            width: 135px;
            height: 81px;
            background-position: -453px -749px;
            transform-origin: 35% 12%;
            animation: tapRight 1s linear infinite;
        }

        .laptop404 {
            position: absolute;
            top: 186px;
            left: 9px;
            width: 365px;
            height: 216px;
            background-position: -2px -466px;
            transform-origin: 50% 100%;
            animation: tapWobble 0.4s linear infinite;
        }

        .laptop404 .text{
            position: absolute;
            z-index: 999;
            margin: 0 auto;
            left: 0;
            right: 0;
            top: 25%; /* Adjust this value to move the positioned div up and down */
            text-align: center;
            width: 60%; /* Set the width of the positioned div */
        }

        @keyframes sway {
            0% {
                transform: rotateZ(0deg);
            }
            20% {
                transform: rotateZ(0deg);
            }
            25% {
                transform: rotateZ(4deg);
            }
            45% {
                transform: rotateZ(4deg);
            }
            50% {
                transform: rotateZ(0deg);
            }
            70% {
                transform: rotateZ(0deg);
            }
            75% {
                transform: rotateZ(-4deg);
            }
            90% {
                transform: rotateZ(-4deg);
            }
            100% {
                transform: rotateZ(0deg);
            }
        }
        @keyframes headTilt {
            0% {
                transform: rotateZ(0deg);
            }
            20% {
                transform: rotateZ(0deg);
            }
            25% {
                transform: rotateZ(-4deg);
            }
            35% {
                transform: rotateZ(-4deg);
            }
            38% {
                transform: rotateZ(2deg);
            }
            42% {
                transform: rotateZ(2deg);
            }
            45% {
                transform: rotateZ(-4deg);
            }
            50% {
                transform: rotateZ(0deg);
            }
            70% {
                transform: rotateZ(0deg);
            }
            82% {
                transform: rotateZ(0deg);
            }
            85% {
                transform: rotateZ(4deg);
            }
            90% {
                transform: rotateZ(4deg);
            }
            100% {
                transform: rotateZ(0deg);
            }
        }
        @keyframes typeLeft {
            0% {
                transform: rotateZ(0deg);
            }
            25% {
                transform: rotateZ(7deg);
            }
            75% {
                transform: rotateZ(-6deg);
            }
            100% {
                transform: rotateZ(0deg);
            }
        }
        @keyframes typeRight {
            0% {
                transform: rotateZ(0deg);
            }
            25% {
                transform: rotateZ(-6deg);
            }
            75% {
                transform: rotateZ(7deg);
            }
            100% {
                transform: rotateZ(0deg);
            }
        }
        @keyframes tapWobble {
            0% {
                transform: rotateZ(-0.2deg);
            }
            50% {
                transform: rotateZ(0.2deg);
            }
            100% {
                transform: rotateZ(-0.2deg);
            }
        }
        @keyframes tapRight {
            0% {
                transform: rotateZ(0deg);
            }
            90% {
                transform: rotateZ(-6deg);
            }
            100% {
                transform: rotateZ(0deg);
            }
        }
        @keyframes blink404 {
            0% {
                background-position: -162px -350px;
            }
            94% {
                background-position: -162px -350px;
            }
            98% {
                background-position: -162px -368px;
            }
            100% {
                background-position: -162px -350px;
            }
        }
        @keyframes pan {
            0% {
                transform: translateX(-2px);
            }
            49% {
                transform: translateX(-2px);
            }
            50% {
                transform: translateX(2px);
            }
            99% {
                transform: translateX(2px);
            }
            100% {
                transform: translateX(-2px);
            }
        }

    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
@endsection
{{--@section('search')
    <div class="container">
        <div class="row search">
            <div class="col-12 col-m-12">
                <div class="card form">
                    <p class="card__title">Search</p>
                    <form class="form_form" action="{{route('search')}}">
                        <div class="form__form-group form__form-group--without-label">
                            <input class="form__input js-field__search" type="text" name="search" id="search"
                                   placeholder="I am looking for...">
                            <button type="submit" class="form__input-icon"
                                    style="background-color: transparent; background-repeat: no-repeat; border: none; overflow: hidden; outline: none;z-index: 100">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection--}}
@section('content')
    <div class="col-12 col-m-12" style="margin-top: 15%">

        @if(empty($events))
        <section class="section">

                        <h3 class="section__title">Sorry, this event is not yet started</h3>


                {{--<div class="countdownwrap" style="margin-right: auto; margin-left: auto"></div>--}}

            <div class="container2">
                <div class="error404page">
                    <div class="newcharacter404">
                        <div class="chair404"></div>
                        <div class="leftshoe404"></div>
                        <div class="rightshoe404"></div>
                        <div class="legs404"></div>
                        <div class="torso404">
                            <div class="body404"></div>
                            <div class="leftarm404"></div>
                            <div class="rightarm404"></div>
                            <div class="head404">
                                <div class="eyes404"></div>
                            </div>
                        </div>
                        <div class="laptop404">
                            <div class="text">
                                @php $site_logo = Voyager::setting('site.logo', ''); @endphp
                                <img class="menu__logo-img" style="max-width: 200px;height: auto"
                                     src="{{asset('storage/'.$site_logo)}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @else
            <section class="section">

                <h3 class="section__title">Please wait</h3>

                <div class="countdownwrap" style="margin-left: 30%"></div>

            </section>
        @endif
    </div>
@endsection

@section('js')
    @isset($events)
    <script>
        var buka = "{{ $events->tgl_buka }}";
        var mulai = "{{ $events->tgl_mulai }}";
        var selesai = "{{ $events->tgl_selesai }}";

        var ringer = {
            countdown_to: buka,
            rings: {
                'DAYS': {
                    s: 86400000, // mseconds in a day,
                    max: 365
                },
                'HOURS': {
                    s: 3600000, // mseconds per hour,
                    max: 24
                },
                'MINUTES': {
                    s: 60000, // mseconds per minute
                    max: 60
                },
                'SECONDS': {
                    s: 1000,
                    max: 60
                },
                'MICROSEC': {
                    s: 10,
                    max: 100
                }
            },
            r_count: 5,
            r_spacing: 10, // px
            r_size: 100, // px
            r_thickness: 5, // px
            update_interval: 11, // ms


            init: function(){

                $r = ringer;
                $r.cvs = document.createElement('canvas');

                $r.size = {
                    w: ($r.r_size + $r.r_thickness) * $r.r_count + ($r.r_spacing*($r.r_count-1)),
                    h: ($r.r_size + $r.r_thickness)
                };



                $r.cvs.setAttribute('width',$r.size.w);
                $r.cvs.setAttribute('height',$r.size.h);
                $r.ctx = $r.cvs.getContext('2d');
                $(".countdownwrap").append($r.cvs);
                $r.cvs = $($r.cvs);
                $r.ctx.textAlign = 'center';
                $r.actual_size = $r.r_size + $r.r_thickness;
                $r.countdown_to_time = new Date($r.countdown_to).getTime();
                $r.cvs.css({ width: $r.size.w+"px", height: $r.size.h+"px" });
                $r.go();
            },
            ctx: null,
            go: function(){
                var idx=0;

                $r.time = (new Date().getTime()) - $r.countdown_to_time;


                for(var r_key in $r.rings) $r.unit(idx++,r_key,$r.rings[r_key]);

                setTimeout($r.go,$r.update_interval);
            },
            unit: function(idx,label,ring) {
                var x,y, value, ring_secs = ring.s;
                value = parseFloat($r.time/ring_secs);
                $r.time-=Math.round(parseInt(value)) * ring_secs;
                value = Math.abs(value);

                x = ($r.r_size*.5 + $r.r_thickness*.5);
                x +=+(idx*($r.r_size+$r.r_spacing+$r.r_thickness));
                y = $r.r_size*.5;
                y += $r.r_thickness*.5;


                // calculate arc end angle
                var degrees = 360-(value / ring.max) * 360.0;
                var endAngle = degrees * (Math.PI / 180);

                $r.ctx.save();

                $r.ctx.translate(x,y);
                $r.ctx.clearRect($r.actual_size*-0.5,$r.actual_size*-0.5,$r.actual_size,$r.actual_size);

                // first circle
                $r.ctx.strokeStyle = "rgba(128,128,128,0.2)";
                $r.ctx.beginPath();
                $r.ctx.arc(0,0,$r.r_size/2,0,2 * Math.PI, 2);
                $r.ctx.lineWidth =$r.r_thickness;
                $r.ctx.stroke();

                // second circle
                $r.ctx.strokeStyle = "rgba(253, 128, 1, 0.9)";
                $r.ctx.beginPath();
                $r.ctx.arc(0,0,$r.r_size/2,0,endAngle, 1);
                $r.ctx.lineWidth =$r.r_thickness;
                $r.ctx.stroke();

                // label
                $r.ctx.fillStyle = "#000000";

                $r.ctx.font = '12px Helvetica';
                $r.ctx.fillText(label, 0, 23);
                $r.ctx.fillText(label, 0, 23);

                $r.ctx.font = 'bold 40px Helvetica';
                $r.ctx.fillText(Math.floor(value), 0, 10);

                $r.ctx.restore();
            }
        }

        ringer.init();
    </script>
    @endisset
@endsection