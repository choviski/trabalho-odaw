<!doctype html>
<html>
<head>
    <title>UDESCussão</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <style>
        /* Estilo básico para a "fachada" do dropdown */
        .custom-dropdown {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

        .modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%; /* Ajuste conforme necessário */
            max-width: 600px; /* Ajuste conforme necessário */
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            z-index: 1;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .modal-content {
            background-color: #fff;
            border-radius: 8px;
            max-width: 80%; /* Ajuste conforme necessário */
            width: 100%;
            padding: 20px;
        }

        .dropdown-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 6px;
            border: 1px solid #ccc;
            border-radius: 4px;
            cursor: pointer;
        }

        .dropdown-header i {
            transition: transform 0.2s ease-in-out;
        }

        .dropdown-list {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 1;
        }

        .dropdown-item {
            padding: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body class="bg-green-200">
<div class="w-full flex bg-white px-5 py-1 items-center"
     style="box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);">
    <a href="{{route('timeline')}}">
        <img width="180px" src="{{asset('images/logos/logo.png')}}">
    </a>

    <div class="custom-dropdown w-2/12 ml-5" id="customDropdown">
        <div class="dropdown-header" onclick="toggleDropdown()">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 576 512">
                    <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                    <path
                        d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/>
                </svg>
                <span class="text-gray-500 text-md ml-3">
                    Página Inicial
                </span>
            </div>

            <svg xmlns="http://www.w3.org/2000/svg" height="12" viewBox="0 0 512 512">
                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                <path
                    d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/>
            </svg>
        </div>
        <div class="dropdown-list" id="dropdownList">
            <span class="text-gray-500 text-sm mt-4 p-3 border-b w-full">
                Feeds
            </span>
            <div class="dropdown-item mt-5" onclick="selectOption('home', 'Página Inicial')">
                <a href="{{route('timeline')}}">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 576 512">
                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                            <path
                                d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/>
                        </svg>
                        <span class="text-gray-500 text-md ml-3">
                    Página Inicial
                </span>
                    </div>
                </a>
            </div>

            <div class="dropdown-item" onclick="selectOption('created', 'Publicações Feitas')">
                <a href="{{route('minhas-publicacoes')}}">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="12" viewBox="0 0 384 512">
                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                            <path
                                d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM80 64h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16s7.2-16 16-16zm16 96H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V256c0-17.7 14.3-32 32-32zm0 32v64H288V256H96zM240 416h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H240c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/>
                        </svg>
                        <span class="text-gray-500 text-md ml-3">
                        Publicações Feitas
                    </span>
                    </div>
                </a>
            </div>

            <div class="dropdown-item" onclick="selectOption('like', 'Publicações Curtidas')">
                <a href="{{route('publicacoes-curtidas')}}">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                            <path
                                d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/>
                        </svg>
                        <span class="text-gray-500 text-md ml-3">
                    Publicações Curtidas
                </span>
                    </div>
                </a>
            </div>

            <div class="dropdown-item">
                <a href="{{route('grupos')}}">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 640 512">
                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                            <path
                                d="M72 88a56 56 0 1 1 112 0A56 56 0 1 1 72 88zM64 245.7C54 256.9 48 271.8 48 288s6 31.1 16 42.3V245.7zm144.4-49.3C178.7 222.7 160 261.2 160 304c0 34.3 12 65.8 32 90.5V416c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V389.2C26.2 371.2 0 332.7 0 288c0-61.9 50.1-112 112-112h32c24 0 46.2 7.5 64.4 20.3zM448 416V394.5c20-24.7 32-56.2 32-90.5c0-42.8-18.7-81.3-48.4-107.7C449.8 183.5 472 176 496 176h32c61.9 0 112 50.1 112 112c0 44.7-26.2 83.2-64 101.2V416c0 17.7-14.3 32-32 32H480c-17.7 0-32-14.3-32-32zm8-328a56 56 0 1 1 112 0A56 56 0 1 1 456 88zM576 245.7v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM320 32a64 64 0 1 1 0 128 64 64 0 1 1 0-128zM240 304c0 16.2 6 31 16 42.3V261.7c-10 11.3-16 26.1-16 42.3zm144-42.3v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM448 304c0 44.7-26.2 83.2-64 101.2V448c0 17.7-14.3 32-32 32H288c-17.7 0-32-14.3-32-32V405.2c-37.8-18-64-56.5-64-101.2c0-61.9 50.1-112 112-112h32c61.9 0 112 50.1 112 112z"/>
                        </svg>
                        <span class="text-gray-500 text-md ml-3">
                    Grupos
                </span>
                    </div>
                </a>
            </div>

        </div>
    </div>

    <div class="w-5/12 ml-5">
        <form method="get" action="{{route('buscar')}}">
            <div class="flex">
                <input class="focus:outline-none focus:border-green-500 w-full rounded-xl border-2 h-10 p-3" type="text"
                       placeholder="Pesquisar..." name="term">
                <button
                    class="rounded-full ml-2 px-5 flex justify-center items-center bg-green-500"
                    type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                        <path
                            fill="#fff"
                            d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/>
                    </svg>
                </button>
            </div>
        </form>
    </div>

    <div class="w-5/12 ml-5">
        <div class="h-20 rounded-lg flex p-2 px-5 justify-between"
             style="background-color: {{$user->background_color}}">
            <img class="rounded-full" src="{{asset($user->attachments[0]->path)}}">
            <div class="text-white font-semibold text-md ml-4">
                <div class="flex items-center">
                    <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 0 448 512">
                        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                        <path
                            fill="#fff"
                            d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                    </svg>
                    {{$user->name}}
                </div>

                <div class="flex items-center">
                    <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 0 448 512">
                        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                        <path
                            fill="#fff"
                            d="M96 0C43 0 0 43 0 96V416c0 53 43 96 96 96H384h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V384c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32H384 96zm0 384H352v64H96c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16zm16 48H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/>
                    </svg>
                    {{$user->course->name}}
                </div>
            </div>

            <a href="{{route('logout')}}">
                <div class="flex items-center ml-5 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                        <path
                            fill="#fff"
                            d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/>
                    </svg>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="w-full flex justify-center">
    <div class="w-6/12 mt-10 p-3">
        @if(!count($publications))
            <div class="w-full bg-white border border-green-500 rounded-lg p-5 mt-2">
                <p class="text-2xl text-green-500 font-semibold text-center"> Sem Publicações Por enquanto...</p>
                <img width="90%" src="{{asset('images/first-reg/newPublication.png')}}">
                <p class="text-sm text-gray-500">Enquanto isso tente:</p>
                <button id="openNewGroupModalBtn2"
                        class=" w-full mt-4 bg-green-500 text-white px-2 py-1 rounded text-sm"
                        type="button">
                    Criar novo Grupo
                </button>

                <a href="{{route('grupos')}}">
                    <button class=" w-full mt-2 bg-blue-500 text-white px-2 py-1 rounded text-sm"
                            type="button">
                        Encontrar novo Grupo
                    </button>
                </a>
            </div>
        @endif
        @foreach($publications as $publication)
            <div class="w-full bg-white border border-green-500 rounded-lg p-5 mt-2">
                <div class="w-full flex items-center justify-between border-b">
                    <div class="flex">
                        <img class="rounded-full" width="64px"
                             src="{{asset($publication->userCreator?->attachments[0]?->path)}}">
                        <div class="ml-4 text-gray-500">
                            <p class="text-lg font-semibold">
                                {{$publication->userCreator?->name}} em {{$publication->group->name}}
                            </p>
                            <p class="text-xs">
                                {{$publication->userCreator?->course->name}}
                            </p>
                            <p class="text-xs">
                                Em {{$publication->created_at->format('d/m/Y')}}
                                ás {{$publication->created_at->format('H:i')}}
                            </p>
                        </div>
                    </div>
                    @if($publication->user_id == $user->id)
                        <div class="flex h-24">
                            <div class="bg-blue-500 p-2 rounded-full h-8 mr-2 cursor-pointer" title="Editar">
                                <svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 512 512">
                                    <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                    <path
                                        fill="#fff"
                                        d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/>
                                </svg>
                            </div>

                            <form action="{{ route('remove-publicacao', ['id' => $publication->id]) }}" method="POST"
                                  onsubmit="return confirm('Tem certeza que deseja excluir esta publicação?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit">
                                    <div class="bg-red-500 p-2 rounded-full h-8 cursor-pointer" title="Excluir">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 448 512">
                                            <!-- Seu ícone SVG aqui -->
                                            <path fill="#fff"
                                                  d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                                        </svg>
                                    </div>
                                </button>
                            </form>
                        </div>
                    @endif
                </div>

                <div class="w-full mt-6">
            <span class="text-xl text-gray-700 font-normal">
                {{$publication->content}}
            </span>
                    <div class="p-3">
                        <img width="90%" src="{{asset($publication->attachments[0]->path)}}">
                    </div>
                </div>

                <div class="w-full flex mt-5 border-t p-3">
                    <a href="{{route('like-publicacao',['id'=>$publication->id])}}">
                        <div class="flex items-baseline mr-10 cursor-pointer">

                            @if($user->likedPublications->contains($publication->id))

                                <svg xmlns="http://www.w3.org/2000/svg" height="32" viewBox="0 0 512 512">
                                    <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                    <path
                                        d="M313.4 32.9c26 5.2 42.9 30.5 37.7 56.5l-2.3 11.4c-5.3 26.7-15.1 52.1-28.8 75.2H464c26.5 0 48 21.5 48 48c0 18.5-10.5 34.6-25.9 42.6C497 275.4 504 288.9 504 304c0 23.4-16.8 42.9-38.9 47.1c4.4 7.3 6.9 15.8 6.9 24.9c0 21.3-13.9 39.4-33.1 45.6c.7 3.3 1.1 6.8 1.1 10.4c0 26.5-21.5 48-48 48H294.5c-19 0-37.5-5.6-53.3-16.1l-38.5-25.7C176 420.4 160 390.4 160 358.3V320 272 247.1c0-29.2 13.3-56.7 36-75l7.4-5.9c26.5-21.2 44.6-51 51.2-84.2l2.3-11.4c5.2-26 30.5-42.9 56.5-37.7zM32 192H96c17.7 0 32 14.3 32 32V448c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V224c0-17.7 14.3-32 32-32z"/>
                                </svg>
                            @else
                                <svg class="fill-gray-600" xmlns="http://www.w3.org/2000/svg" height="32"
                                     viewBox="0 0 512 512">
                                    <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                    <path
                                        d="M323.8 34.8c-38.2-10.9-78.1 11.2-89 49.4l-5.7 20c-3.7 13-10.4 25-19.5 35l-51.3 56.4c-8.9 9.8-8.2 25 1.6 33.9s25 8.2 33.9-1.6l51.3-56.4c14.1-15.5 24.4-34 30.1-54.1l5.7-20c3.6-12.7 16.9-20.1 29.7-16.5s20.1 16.9 16.5 29.7l-5.7 20c-5.7 19.9-14.7 38.7-26.6 55.5c-5.2 7.3-5.8 16.9-1.7 24.9s12.3 13 21.3 13L448 224c8.8 0 16 7.2 16 16c0 6.8-4.3 12.7-10.4 15c-7.4 2.8-13 9-14.9 16.7s.1 15.8 5.3 21.7c2.5 2.8 4 6.5 4 10.6c0 7.8-5.6 14.3-13 15.7c-8.2 1.6-15.1 7.3-18 15.2s-1.6 16.7 3.6 23.3c2.1 2.7 3.4 6.1 3.4 9.9c0 6.7-4.2 12.6-10.2 14.9c-11.5 4.5-17.7 16.9-14.4 28.8c.4 1.3 .6 2.8 .6 4.3c0 8.8-7.2 16-16 16H286.5c-12.6 0-25-3.7-35.5-10.7l-61.7-41.1c-11-7.4-25.9-4.4-33.3 6.7s-4.4 25.9 6.7 33.3l61.7 41.1c18.4 12.3 40 18.8 62.1 18.8H384c34.7 0 62.9-27.6 64-62c14.6-11.7 24-29.7 24-50c0-4.5-.5-8.8-1.3-13c15.4-11.7 25.3-30.2 25.3-51c0-6.5-1-12.8-2.8-18.7C504.8 273.7 512 257.7 512 240c0-35.3-28.6-64-64-64l-92.3 0c4.7-10.4 8.7-21.2 11.8-32.2l5.7-20c10.9-38.2-11.2-78.1-49.4-89zM32 192c-17.7 0-32 14.3-32 32V448c0 17.7 14.3 32 32 32H96c17.7 0 32-14.3 32-32V224c0-17.7-14.3-32-32-32H32z"/>
                                </svg>
                            @endif

                            <span class="text-xs ml-1">
                                {{$publication->up_vote_count}}
                            </span>
                        </div>
                    </a>
                    <div class="flex items-baseline mr-10 cursor-pointer"
                         onclick="toggleComments('comments_{{$publication->id}}')">

                        <svg class="fill-gray-600" xmlns="http://www.w3.org/2000/svg" height="32" viewBox="0 0 512 512">
                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                            <path
                                d="M123.6 391.3c12.9-9.4 29.6-11.8 44.6-6.4c26.5 9.6 56.2 15.1 87.8 15.1c124.7 0 208-80.5 208-160s-83.3-160-208-160S48 160.5 48 240c0 32 12.4 62.8 35.7 89.2c8.6 9.7 12.8 22.5 11.8 35.5c-1.4 18.1-5.7 34.7-11.3 49.4c17-7.9 31.1-16.7 39.4-22.7zM21.2 431.9c1.8-2.7 3.5-5.4 5.1-8.1c10-16.6 19.5-38.4 21.4-62.9C17.7 326.8 0 285.1 0 240C0 125.1 114.6 32 256 32s256 93.1 256 208s-114.6 208-256 208c-37.1 0-72.3-6.4-104.1-17.9c-11.9 8.7-31.3 20.6-54.3 30.6c-15.1 6.6-32.3 12.6-50.1 16.1c-.8 .2-1.6 .3-2.4 .5c-4.4 .8-8.7 1.5-13.2 1.9c-.2 0-.5 .1-.7 .1c-5.1 .5-10.2 .8-15.3 .8c-6.5 0-12.3-3.9-14.8-9.9c-2.5-6-1.1-12.8 3.4-17.4c4.1-4.2 7.8-8.7 11.3-13.5c1.7-2.3 3.3-4.6 4.8-6.9c.1-.2 .2-.3 .3-.5z"/>
                        </svg>
                        <span class="text-xs ml-1">
                            {{count($publication->comments)}}
                    </span>
                    </div>
                </div>
                <div id="comments_{{$publication->id}}" class="px-10 py-2 border hidden rounded-lg mt-4">
                    <div class="text-md text-green-500">Comentários</div>

                    @foreach($publication->comments as $comment)
                        <div class="p-2 border-b flex">
                            <img class="h-16 rounded-full" src="{{asset($comment->user->attachments[0]->path)}}">
                            <div class="ml-4">
                                <p class="text-sm font-semibold text-gray-500">
                                    {{$comment->user->name}}
                                </p>
                                <p class="text-sm p-2 text-gray-500">
                                    {{$comment->content}}
                                </p>
                            </div>
                        </div>
                    @endforeach
                    <div class="mt-2 w-full">
                        <span class="text-sm text-gray-500 font-semibold">Insira seu Comentário:</span>
                        <form method="post" action="{{route('criar-comentário')}}">
                            @csrf
                            <div class="flex">
                                <textarea
                                    class="focus:outline-none focus:border-green-500 w-full rounded-md border px-3 mr-3"
                                    name="content" required></textarea>
                                <input type="hidden" name="publication_id" value="{{$publication->id}}">
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                <input type="hidden" name="up_vote_count" value="0">
                                <input type="hidden" name="down_vote_count" value="0">
                                <input
                                    class="px-2 py-1 border border-green-500 text-green-500 hover:text-white hover:bg-green-500 rounded-lg"
                                    type="submit" value="Comentar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="w-3/12 mt-12 p-3">
        <div class="bg-white border border-green-500 rounded-lg h-76 p-3">
            <div class="flex items-center border-b py-2 px-4">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 576 512">
                    <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                    <path
                        class="fill-gray-500"
                        d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/>
                </svg>
                <span class="text-gray-500 text-xl ml-3 font-semibold">
                    Página Inicial
                </span>
            </div>
            <p class="text-md text-gray-500 mt-2 border-b">
                Página Inicial do UDESCussão que lista as publicações dos grupos que você faz parte, aproveite a
                plataforma!
            </p>

            <div class="flex justify-center w-full mt-5">
                <button id="openNewGroupModalBtn" class="bg-blue-500 rounded-lg w-full p-1 text-sm text-white">
                    Criar Novo Grupo
                </button>
            </div>

            <div class="mt-2 flex justify-center w-full pb-3">
                <button id="openNewPublicationsModalBtn" class="bg-green-500 rounded-lg w-full p-1 text-sm text-white">
                    Criar Nova Publicação
                </button>
            </div>
        </div>
    </div>
</div>

</div>

<div id="newGroupModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-8 rounded-lg w-10/12">
        <div class="flex justify-center text-xl text-green-500 font-semibold border-b border-green-500">
            Novo Grupo
        </div>
        <form action="{{route('salva-grupo')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="w-full flex items-center mt-4">
                <div class="w-6/12 mr-2">
                    <label class="text-green-500 text-sm mb-1">
                        Nome:
                    </label>
                    <input class="focus:outline-none focus:border-green-500 w-full rounded-md border h-8 p-3"
                           type="text" placeholder="Insira o Nome do Grupo" name="name" required>
                </div>

                <div class="w-6/12">
                    <label class="text-green-500 text-sm mb-1">
                        Relacionado ao Curso:
                    </label>
                    <select
                        class="focus:outline-none focus:border-green-500 w-full rounded-md border h-8 bg-white"
                        name="course_id">
                        @foreach($courses as $course)
                            <option class="rounded-md mt-2" value="{{$course->id}}">
                                <span title="{{$course->description}}">
                                    {{$course->name}}
                                </span>
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="w-full flex items-center mt-4">
                <div class="w-full">
                    <label class="text-green-500 text-sm mb-1">
                        Descrição do Grupo:
                    </label>
                    <textarea class="focus:outline-none focus:border-green-500 w-full rounded-md border px-3"
                              name="description" required></textarea>
                </div>
            </div>

            <div class="flex">
                <div class="w-6/12">
                    <input type="hidden" value="{{$user->id}}" name="user_id">
                    <label class="text-green-500 mb-2 text-sm"> Cor de Fundo: </label>
                    <input
                        class="focus:outline-none focus:border-green-500 w-full rounded-md border"
                        type="color" name="background_color" id="background_color"
                        onchange="previewImage(document.getElementById('image'))">
                </div>

                <div class="w-6/12 ml-2">
                    <label class="block text-sm text-green-500">
                        Imagem de Perfil:
                    </label>
                    <div class="relative border border-gray-300 rounded-md px-2 text-sm py-1">
                        <input
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                            type="file"
                            name="image"
                            id="image"
                            onchange="previewImage(this)">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-500">Escolher arquivo</span>
                            <span class="text-green-500 hover:text-green-700">Procurar</span>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <span class="text-sm text-green-500 mt-5">
                    Pré - visualização :
                </span>
                <div id="imagePreview" class="mt-2 w-full flex justify-center">
                </div>
            </div>
            <button type="submit" class="mt-4 bg-green-500 text-white px-2 py-1 text-sm rounded">Criar Grupo</button>

            <button id="closeNewGroupModalBtn" class="mt-4 bg-gray-500 text-white px-2 py-1 rounded text-sm"
                    type="button">
                Fechar
            </button>
        </form>
    </div>
</div>

<div id="newPublicationsModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-8 rounded-lg w-10/12">
        <div class="flex justify-center text-xl text-green-500 font-semibold border-b border-green-500">
            Nova Publicação
        </div>
        <form action="{{route('salva-publicacao')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="w-full flex items-center mt-4">
                <div class="w-full">
                    <label class="text-green-500 text-sm mb-1">
                        Grupo que Será Postada a Publicação:
                    </label>
                    <select
                        class="focus:outline-none focus:border-green-500 w-full rounded-md border h-8 bg-white"
                        name="group_id">
                        @foreach($user->groups as $group)
                            <option class="rounded-md mt-2" value="{{$group->id}}">
                                <span title="{{$group->description}}">
                                    {{$group->name}}
                                </span>
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="w-full flex items-center mt-4">
                <div class="w-full">
                    <label class="text-green-500 text-sm mb-1">
                        Conteúdo da Publicação:
                    </label>
                    <textarea class="focus:outline-none focus:border-green-500 w-full rounded-md border px-3"
                              name="content" required></textarea>
                </div>
            </div>

            <div class="flex">
                <div class="w-full">
                    <label class="block text-sm text-green-500">
                        Imagem da Publicação:
                    </label>
                    <div class="relative border border-gray-300 rounded-md px-2 text-sm py-1">
                        <input
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                            type="file"
                            name="imagePublication"
                            id="imagePublication"
                        <div class="flex items-center justify-between">
                            <span class="text-gray-500">Escolher arquivo</span>
                            <span class="text-green-500 hover:text-green-700">Procurar</span>
                        </div>
                    </div>
                </div>

                <div>
                    <button type="submit" class="mt-4 bg-green-500 text-white px-2 py-1 text-sm rounded">Criar
                        Publicação
                    </button>

                    <button id="closeNewPublicationsModalBtn"
                            class="mt-4 bg-gray-500 text-white px-2 py-1 rounded text-sm"
                            type="button">
                        Fechar
                    </button>
                </div>
        </form>
    </div>
</div>

</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    function toggleComments(elementName) {
        const openComments = document.getElementById(elementName);

        if (openComments.classList.contains('hidden')) {
            openComments.classList.remove('hidden')
        } else {
            openComments.classList.add('hidden')
        }
    }
</script>

<script>
    const openNewGroupModalBtn = document.getElementById('openNewGroupModalBtn');
    const openNewGroupModalBtn2 = document.getElementById('openNewGroupModalBtn2');
    const closeNewGroupModalBtn = document.getElementById('closeNewGroupModalBtn');
    const newGroupModal = document.getElementById('newGroupModal');

    const openNewPublicationsModalBtn = document.getElementById('openNewPublicationsModalBtn');
    const closeNewPublicationsModalBtn = document.getElementById('closeNewPublicationsModalBtn');
    const newPublicationsModal = document.getElementById('newPublicationsModal');

    openNewGroupModalBtn.addEventListener('click', () => {
        newGroupModal.classList.remove('hidden');
    });

    openNewGroupModalBtn2?.addEventListener('click', () => {
        newGroupModal.classList.remove('hidden');
    });

    openNewPublicationsModalBtn.addEventListener('click', () => {
        newPublicationsModal.classList.remove('hidden');
    });

    closeNewPublicationsModalBtn.addEventListener('click', () => {
        newPublicationsModal.classList.add('hidden');
    });

    closeNewGroupModalBtn.addEventListener('click', () => {
        newGroupModal.classList.add('hidden');
    });
</script>

<script>
    function toggleDropdown() {
        $('#dropdownList').toggle();
        $('#customDropdown i').toggleClass('rotate-180');
    }

    function selectOption(value, text) {
        console.log('Opção selecionada:', value, text);
        $('#customDropdown .dropdown-header span').text(text);
        $('#dropdownList').hide();
        $('#customDropdown i').removeClass('rotate-180');
    }
</script>

<script>
    function previewImage(input) {
        const preview = document.getElementById('imagePreview');
        const backGroupColor = document.getElementById('background_color').value
        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.innerHTML = `
                    <div class="w-6/12 h-48 rounded-lg flex " style="background-color: ${backGroupColor};">
                        <img src="${e.target.result}" alt="Preview" class="object-cover rounded-full w-32 h-32 ml-5 mt-3">
                    <div>
`;
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.innerHTML = '';
        }
    }
</script>
