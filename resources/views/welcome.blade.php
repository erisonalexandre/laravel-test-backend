<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Projeto</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endif
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <svg width="82" height="82" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M99.9986 57.5252C100.001 57.4186 100 57.3124 99.9973 57.2057C100.01 55.6229 99.4646 54.0264 98.3587 52.3796C98.2324 52.1917 98.1092 52.0027 97.9898 51.812C96.8388 49.7475 96.0973 47.5909 96.0044 45.0592C95.8447 40.9866 94.0079 37.7787 89.7352 36.4608C89.6414 36.4324 89.5512 36.3992 89.4592 36.3681C87.8576 35.5093 86.3423 34.5471 84.9356 33.4218C84.2612 32.7658 83.6247 32.062 83.0003 31.3499C82.3361 30.5849 81.637 29.9714 80.89 29.51C79.4577 28.3766 77.6425 28.028 75.6115 28.5413C73.7731 29.0097 71.8984 29.2553 70.0288 29.2697C68.1593 29.2553 66.2846 29.0097 64.4461 28.5413C62.4152 28.028 60.5996 28.3766 59.1677 29.51C58.4206 29.9714 57.7218 30.5849 57.0573 31.3499C56.4331 32.062 55.7965 32.7659 55.122 33.4218C53.7154 34.5473 52.2001 35.5095 50.5983 36.3681C50.5063 36.3992 50.4161 36.4324 50.3224 36.4608C46.0498 37.7785 44.213 40.9866 44.0533 45.0592C43.9604 47.5908 43.2187 49.7473 42.068 51.812C41.9484 52.0027 41.8253 52.1917 41.699 52.3796C40.593 54.0264 40.048 55.6229 40.0604 57.2057C40.0576 57.3124 40.0571 57.4186 40.0591 57.5252C40.0576 57.607 40.0573 57.6889 40.0588 57.771C40.0418 59.359 40.5869 60.95 41.6972 62.6156C41.7901 62.754 41.8806 62.8929 41.9701 63.0323C43.1695 65.1429 43.9464 67.3426 44.0416 69.9359C44.2013 74.0086 46.0381 77.2165 50.3108 78.5347C50.4252 78.569 50.5358 78.6092 50.6474 78.6479C52.1796 79.4714 53.6332 80.3886 54.9873 81.4549C55.7075 82.1441 56.3837 82.8899 57.0458 83.6455C57.7376 84.4422 58.467 85.0732 59.249 85.5405C60.6698 86.63 62.4596 86.9591 64.4576 86.4542C66.2922 85.9866 68.1633 85.7411 70.0288 85.7257C71.8943 85.7411 73.7655 85.9866 75.6 86.4542C77.598 86.9591 79.3874 86.63 80.8085 85.5405C81.5906 85.0732 82.3204 84.4417 83.0118 83.6455C83.6739 82.8902 84.35 82.1441 85.0703 81.4549C86.4241 80.3885 87.8778 79.4714 89.4101 78.6479C89.5219 78.6092 89.6324 78.5694 89.7467 78.5347C94.0194 77.217 95.8562 74.0086 96.0159 69.9359C96.1113 67.3426 96.8879 65.143 98.0876 63.0323C98.1769 62.8929 98.2676 62.7536 98.3605 62.6156C99.4708 60.95 100.016 59.359 99.9989 57.771C100 57.6889 100 57.6068 99.9986 57.5252ZM70.1298 80.7835C70.0959 80.7844 70.0626 80.7841 70.0288 80.7847C69.9951 80.7841 69.9616 80.7844 69.9279 80.7835C67.3392 80.7728 64.8164 80.3456 62.4405 79.5622C53.3176 76.3796 46.5244 67.4143 46.4507 57.5838C46.4499 57.4759 46.4515 57.3692 46.4519 57.2619C46.5924 47.5065 53.3387 38.6291 62.392 35.4484C64.7827 34.6547 67.3231 34.2221 69.93 34.2111C69.9633 34.2104 69.9958 34.2108 70.0288 34.2101C70.0619 34.2107 70.0944 34.2102 70.1276 34.2111C72.7344 34.2221 75.275 34.6548 77.6655 35.4484C86.719 38.6289 93.4653 47.5065 93.6055 57.2619C93.6061 57.3692 93.6078 57.4759 93.6068 57.5838C93.5332 67.4148 86.7397 76.38 77.617 79.5622C75.2413 80.3456 72.7185 80.7728 70.1298 80.7835Z" fill="#088091"/>
                        <path d="M86.7181 61.5236L86.9578 61.3506L90.2453 59.101L85.8663 52.2865L82.3923 54.4958L82.2725 54.5755L86.7181 61.5236Z" fill="#088091"/>
                        <path d="M54.3079 61.2175L58.5006 54.2297L54.8004 51.8605L50.3549 58.662L54.3079 61.2175Z" fill="#088091"/>
                        <path d="M81.5405 55.1083L81.6606 55.0283V55.0149L79.7439 56.0398L73.7409 52.3396C73.7409 52.3396 65.3851 54.7295 64.0247 58.5952L67.2192 59.101L71.1855 56.6787L82.4326 64.9842L85.9864 62.0423L81.5405 55.1083Z" fill="#088091"/>
                        <path d="M41.9104 77.5092H38.1835V81.2361H41.9104V77.5092Z" fill="#088091"/>
                        <path d="M39.8639 44.9054C39.9789 41.9713 40.7613 39.4341 42.1896 37.3537C43.7917 35.0205 46.1123 33.3722 49.0872 32.4547L49.1044 32.4495C50.8844 31.9088 52.3296 30.3833 53.8991 28.5931C54.7365 27.6299 55.6364 26.8278 56.5937 26.1853C56.7086 26.0266 56.8243 25.8671 56.9408 25.7063C53.0409 21.5269 49.2475 17.494 45.3345 13.3146C42.3663 16.509 25.5689 35.9686 22.481 38.2842V32.8539H11.5V50.7292C11.3935 50.8755 2.71527 61.1111 0 64.5719H11.114V84.6303C11.6198 84.1775 12.0723 83.7784 12.4716 83.3259C19.8587 75.1668 27.4455 67.194 34.4733 58.7291C34.9878 58.1115 35.4528 57.452 35.883 56.7637C36.0002 54.6726 36.6993 52.5752 37.9687 50.514C39.229 48.478 39.7942 46.8038 39.8639 44.9054Z" fill="#088091"/>
                        <path d="M38.2094 64.9404C37.7104 64.1917 37.2907 63.4381 36.9503 62.681L17.4 84.6301H25.2869L39.8255 68.3864C39.4928 67.2006 38.9534 66.0473 38.2186 64.9543L38.2094 64.9404Z" fill="#088091"/>
                        <path d="M38.1437 72.1053V75.832H41.1188C40.6099 74.6838 40.3067 73.4325 40.2282 72.1053H38.1437Z" fill="#088091"/>
                        <path d="M44.8386 81.2361H46.4531C45.8789 80.9495 45.3406 80.6295 44.8386 80.2788V81.2361Z" fill="#088091"/>
                        <path d="M81.2875 66.1822L71.052 58.6619L67.3516 60.3257L62.8794 59.5533C62.174 56.9313 67.0322 53.8036 67.0322 53.8036C66.2602 53.3507 61.2822 55.7866 61.2822 55.7866L59.3656 54.7218L55.2261 61.8426L57.6755 63.44C57.6755 63.44 59.5874 65.988 60.7634 67.1153C65.2371 71.4042 68.3354 72.0636 71.8922 72.2915C75.1178 72.4981 81.0568 66.4207 81.2875 66.1822Z" fill="#088091"/>
                    </svg>
                    <div style="margin-left: 15px; color: #088090">
                        <h1 style="font-size: 2em; margin: 0.67em 0; font-weight: 800">Sistema de gerenciamento de propriedades</h1>
                    </div>
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="px-12 text-center">
                        <div class="p-6">
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    <div>
                                        Gerencie suas propriedades e contratos fechado para elas e quem contratou a propriedade.
                                    </div>
                                    <div class="mt-8">
                                        Sistema desenvolvido utilizando Vue.js, Inertia, Jetstream e Laravel.
                                    </div>
                                </div>
                                <div class="flex items-center justify-center mt-4">
                                    <x-jet-button class="ml-4" style="margin: 0">
                                        <a href="{{ route('dashboard') }}">Entrar</a>
                                    </x-jet-button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
