<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>{{$title}}</title> --}}
	@vite(['resources/css/app.css','resources/js/app.js'])
	@livewireStyles
</head>
<body class="bg-gray-100">
	@livewireScripts
	<x-navbar></x-navbar>
	<div class="flex flex-col w-full gap-y-4 px-8 my-6">
		{{$slot}}
	</div>
    {{-- <x-footer></x-footer> --}}
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>
</html>
