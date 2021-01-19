<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name')}}</title>
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat&display=swap">
    <style>
        #app {
            /* font-family: 'Roboto'; */
            font-family: 'Montserrat', sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            font-style: normal;
            font-weight: normal;
            text-align: center;
            /*color: #2c3e50;*/
        }

        [v-cloak]>* {
            display: none
        }

        @keyframes spinner {
            to {
                transform: rotate(360deg);
            }
        }

        [v-cloak]:before {
            content: "";
            box-sizing: border-box;
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            margin-top: -10px;
            margin-left: -10px;
            border-radius: 50%;
            border: 2px solid #ccc;
            border-top-color: #333;
            animation: spinner 0.6s linear infinite;
            text-indent: 100%;
            white-space: nowrap;
            overflow: hidden;
        }

    </style>
</head>

<body>
    <v-app id="app" style="text-align: left" v-cloak>
        <v-content>
            <v-navigation-drawer :value="InvestorModule.drawer" style="z-index:1000" app expand-on-hover permanent dark>
                <v-list-item>
                    <v-list-item-content>
                        <v-list-item-title class="title">
                            <img width="100%" src="/images/logo-white.png" alt="image">
                        </v-list-item-title>
                        <v-list-item-subtitle>
                           <div class="caption"> Panel Investor</div>
                        </v-list-item-subtitle>
                    </v-list-item-content>
                </v-list-item>

                <v-divider></v-divider>

                <v-list dense nav>
                    <v-list-item link @click="$router.push('/')">
                        <v-list-item-icon>
                            <v-icon>mdi-home</v-icon>
                        </v-list-item-icon>

                        <v-list-item-content>
                            <v-list-item-title>Dashboard</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>

                    <v-list-item link @click="$router.push('/investment')">
                        <v-list-item-icon>
                            <v-icon>trending_up</v-icon>
                        </v-list-item-icon>

                        <v-list-item-content>
                            <v-list-item-title>Investasi saya</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>

                    <v-list-item link @click="$router.push('/location')">
                        <v-list-item-icon>
                            <v-icon>public</v-icon>
                        </v-list-item-icon>

                        <v-list-item-content>
                            <v-list-item-title>Lokasi</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>

                    <v-list-item link @click="$router.push('/faq')">
                        <v-list-item-icon>
                            <v-icon>help</v-icon>
                        </v-list-item-icon>

                        <v-list-item-content>
                            <v-list-item-title>Bantuan</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>

                    <v-list-item link @click="$router.push('/mailcampaign')">
                        <v-list-item-icon>
                            <v-icon>email</v-icon>
                        </v-list-item-icon>

                        <v-list-item-content>
                            <v-list-item-title>Mail Campaign</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>

                    <v-list-item link @click="$router.push('/mailtemplatelist')">
                        <v-list-item-icon>
                            <v-icon>email</v-icon>
                        </v-list-item-icon>

                        <v-list-item-content>
                            <v-list-item-title>Mail Template</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>

                    <v-list-item link href="/">
                        <v-list-item-icon>
                            <v-icon>web</v-icon>
                        </v-list-item-icon>

                        <v-list-item-content>
                            <v-list-item-title>Kembali ke Web</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-list>
            </v-navigation-drawer>
            @yield('content')
        </v-content>
    </v-app>
    <script src="{{mix('js/investor.js')}}"></script>
</body>

</html>
